<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blogshop
 */
if ( ! function_exists( 'blogshop_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function blogshop_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$timeIcon = '%1$s';

		$posted_on = sprintf(
			$timeIcon,
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;
if ( ! function_exists( 'blogshop_time' ) ) {
	function blogshop_time() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		echo '<i class="blog-time">' . $time_string . '</i>';
	}
}
if ( ! function_exists( 'blogshop_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blogshop_posted_by($author_image = true) {
		$posted_by_format = '<a href="%1$s">%2$s %3$s</a>';
		$post_author_id = get_post_field( 'post_author', get_queried_object_id() );
		$get_author_image = '<span class="fa fa-user-o"></span>';
		if (false === $author_image) {
			$get_author_image = __('Posted by', 'blogshop');
		}
		$postedBy = sprintf(
			$posted_by_format,
			esc_url( get_author_posts_url( get_the_author_meta( $post_author_id ))),
			$get_author_image,
			'<i>'.esc_html( get_the_author_meta('display_name', $post_author_id)).'</i>'
		);
		echo '<span class="posted_by">'.$postedBy.'</span>';
	}
endif;
if ( ! function_exists( 'blogshop_comment_popuplink' ) ) {
	function blogshop_comment_popuplink() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			// $commentIcon = ;
			
			echo '<span class="comments-link"><i class="fa fa-comments-o" aria-hidden="true"></i>';

			$css_class = 'zero-comments';
			$number    = (int) get_comments_number( get_the_ID() );

			if ( 1 === $number )
			    $css_class = 'one-comment';
			elseif ( 1 < $number )
			    $css_class = 'multiple-comments';

			comments_popup_link( 
			    __( 'Post a Comment', 'blogshop' ), 
			    __( '1 Comment', 'blogshop' ), 
			    __( '% Comments', 'blogshop' ),
			    $css_class,
			    __( 'Comments are Closed', 'blogshop' )
			);
			
			echo '</span>';
		}
	}
}

function blogshop_categories(){
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'blogshop' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			
			printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
	return;
}


if ( ! function_exists( 'blogshop_post_tag' ) ) {
	function blogshop_post_tag() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'blogshop' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'blogshop' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		return;
	}
}
if ( ! function_exists( 'blogshop_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function blogshop_post_thumbnail() {
		$post_thumnail = wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'blogshop-thumbnail' );
		if ( has_post_thumbnail() ) :
			?>
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail( 'blogshop-thumbnail' ); ?>
			</a>
			<?php
		elseif ( $post_thumnail ) :
			echo '<a href="'.the_permalink().'"><img src="' . esc_url( $post_thumnail ) . '" alt=""></a>';
		endif;
	}
endif;
function blogshop_cats_related_post() {
    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );
    if(!empty($categories) && is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;
    $current_post_type = get_post_type($post_id);
    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post_not_in'    => array($post_id),
        'posts_per_page'  => '4'
     );
    $related_cats_post = new WP_Query( $query_args );
    if($related_cats_post->have_posts()):
    	?>
			<h4 class="related-post-title"><?php esc_html_e( 'Related Post', 'blogshop' ); ?></h4>
    	<?php
    	echo '<div class="related-post-sldider owl-carousel">';
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            <article class="blogshop-standard-post">
				<div class="blogshop-standard-post__entry-content text-center">
					<div class="blogshop-standard-post__categories">
						<?php blogshop_categories(); ?>
					</div>
					<div class="blogshop-standard-post__post-title">
						<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
					</div>
					<?php
					get_template_part( 'template-parts/content/post-header/header', 'standard' );
					
					?>
				</div>
			</article>
        <?php endwhile;
        echo '</div>';
        // Restore original Post Data
        wp_reset_postdata();
     endif;
}

if ( ! function_exists( 'blogshop_wp_body_open' ) ) :
	/**
	 * Fire the blogshop_wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @since Twenty Nineteen 1.4
	 */
	function blogshop_wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Twenty Nineteen 1.4
		 */
		do_action( 'blogshop_wp_body_open' );
	}
endif;