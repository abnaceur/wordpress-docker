<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package blogshop
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blogshop_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	$classes[] = 'preloader-wrapper';
	$get_border_box_shadow = get_theme_mod( 'border_box_shadow_show_hide', true );

	if (false == $get_border_box_shadow) {
		$classes[] = 'border_and_box_shadow_hide';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'blogshop_body_classes' );
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blogshop_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blogshop_pingback_header' );


if ( ! function_exists( 'blogshop_comment_list' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Shape 1.0
	 */
	function blogshop_comment_list( $comment, $args, $depth ) {

		extract( $args, EXTR_SKIP );

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
  <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' == $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID(); ?>" class="comment-body review-list">
	<?php endif; ?>
	<div class="single-comment">
		<div class="commenter-image">
			<?php
			if ( 0 != $args['avatar_size'] ) {
				echo get_avatar( $comment, $args['avatar_size'] );}
			?>
		</div>
		<div class="commnenter-details">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'blogshop' ); ?></em>
			<br />
		<?php endif; ?>
			<h4><?php printf( wp_kses_post( '%s', 'blogshop' ), sprintf( '%s', get_comment_author_link() ) ); ?></h4>
			<div class="comment-time">
				<p>
					<time datetime="<?php comment_time( 'c' ); ?>">
						<?php
							/* translators: 1: comment date, 2: comment time */
							printf( wp_kses_post( '%1$s at %2$s', 'blogshop' ), get_comment_date( '', $comment ), get_comment_time() );
						?>
					</time>
				</p>
			</div>
				<?php comment_text(); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
		</div>
	</div>
		<?php if ( 'div' == $args['style'] ) : ?>
  </div>
			<?php
  endif;

	}
endif; // ends check for blogshop_comment_list()

/**
 * Excerpt Length
 */

function blogshop_get_excerpt($limit, $source = null){
    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
}
/**
 * Footer Credit
 */
if (!function_exists('blogshop_footer_credit')) {
	function blogshop_footer_credit(){
		return '<strong>'.__(' Theme:&nbsp;', 'blogshop').'</strong><a href="'.esc_url('https://theimran.com/themes/wordpress-theme/best-wordpress-themes-for-blogs-and-e-commerce/').'"><span> '.__( 'BlogShop', 'blogshop' ).'</span></a>';
	}
}
/**
 * Blogshop Breadcrumbs
 */
if (!function_exists('blogshop_bredcrumbs')) {
	function blogshop_bredcrumbs(){
		?>
		<nav>
            <div class="breadcrumb">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
                ?>
            </div>
        </nav>
		<?php
	}
}
/**
 * Author VCard
 */
function blogshop_author_vcard(){
	?>
	<div class="author-vcard">
		<div class="author-vcard__image">
			<?php
			echo get_avatar( get_the_author_meta( 'ID' ), 100, '', '', null );
			?>
		</div>
		<div class="author-vcard__about">
			<h4><?php echo get_the_author_meta( 'nickname' ); ?></h4>
			<p><?php echo get_the_author_meta( 'description' ); ?></p>
			<p><?php
			$userpost_count = count_user_posts( get_the_author_meta( 'ID' ), 'post', false );
			if ($userpost_count > 1) {
				$numberingtext = 'posts';
			}else{
				$numberingtext = 'post';
			}
			$userposts = esc_html__( 'the user has only %1$s %2$s', 'blogshop' );
			printf( $userposts , $userpost_count, $numberingtext );
			 ?></p>
		</div>
	</div>
	<?php
	return;
}

/**
 * Blogshop Page title
 */
if (!function_exists('blogshop_banner_title_control')) {
	function blogshop_banner_title_control(){
		echo '<div class="title-breadcrumb-inner">';
		$page_main_title = single_post_title('', false);
		if (is_search()) :
			$page_main_title = sprintf( esc_html__( 'Search Results for: %s', 'blogshop' ), '<span>' . get_search_query() . '</span>' );
		elseif (is_home()) :
			$page_main_title = get_theme_mod( 'blog_header_custom_title', __( 'Build Blog For Free', 'blogshop' ));
		endif;
		if (is_author()) :
			wp_kses_post(blogshop_author_vcard());
		elseif (is_page('support-forum')):
			?>
			<h1 class="page-title"><?php single_post_title( '');?></h1>
			<?php
		elseif (is_tag()) :
			?>
			<h1 class="page-title"><?php single_tag_title();?></h1>
			<?php
		elseif (is_category()) :
			?>
			<h1 class="page-title"><?php single_cat_title();?></h1>
			<?php
		elseif (class_exists('woocommerce') && is_product_category()) :
			?>
				<h1 class="page-title"><?php single_cat_title('');?></h1>
			<?php
		elseif (class_exists('woocommerce') && is_product_tag()) :
			?>
			<h1 class="page-title"><?php single_tag_title();?></h1>
			<?php
		elseif(class_exists('woocommerce') && is_shop()):
			?>
			<h1 class="page-title"><?php woocommerce_page_title();?></h1>
			<?php
		elseif(class_exists('woocommerce') && is_product()):
			?>
			<h1 class="page-title"><?php single_post_title();?></h1>
			<?php
		elseif (is_page()):
			?>
			<h1 class="page-title"><?php single_post_title(''); ?></h1>
			<?php
		elseif (is_archive()) :
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		else :
			?>
	        <h1 class="entry-title"><?php echo $page_main_title; ?></h1>
	       <?php 
   		endif;
    echo '</div>';
	}
}


function blogshop_hide_default_banner_from(){
	if(is_page_template('frontpage.php')){
		$banner_show = false;
	}elseif(is_page_template('blankpage.php')){
		$banner_show = false;
	}elseif(class_exists('woocommerce') && is_product()){
		$banner_show = false;
	}elseif(is_home()){
		$banner_show = false;
	}elseif(is_front_page()){
		$banner_show = false;
	}elseif(is_single()){
		$banner_show = false;
	}else{
		$banner_show = true;
	}
	return $banner_show;
}

/**
 * Default Banner
 * Customize From customizer API
 */
if (!function_exists('blogshop_default_page_banner')) {
	function blogshop_default_page_banner(){
		$thumb_attr = '';
		$extraclass = '';
		if (is_page()) {
			if (has_post_thumbnail()) {
				$get_page_thumbnail = get_the_post_thumbnail_url( get_queried_object_id(), 'post-thumbnail' );
				$thumb_attr = ' style="background-image: url('.esc_url($get_page_thumbnail).')"';
				$extraclass = ' page_header_with_thumnail';
			}

		}
		if (true === blogshop_hide_default_banner_from()) :
			?>
			 <div class="page-banner-area<?php echo esc_attr($extraclass);?>"<?php echo $thumb_attr;?>>
			    <div class="container">
			        <div class="row">
			            <div class="col-md-12 text-center">
			                <div class="page-banner-text">
								<?php
								blogshop_banner_title_control(); 
	  							blogshop_bredcrumbs();
								?>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<?php
		endif;
	}
}

function blogshop_pagination(){
	$pagination_alignment = get_theme_mod('blog_page_pagination', 'center');
    $prev_icon = '<i class="fa fa-angle-left"></i>';
    $next_icon = '<i class="fa fa-angle-right"></i>';
    echo '<div class="pagination-'.$pagination_alignment.'">';
        the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => $prev_icon,
            'next_text' => $next_icon,
        ));
    echo '</div>';
}