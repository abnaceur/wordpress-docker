<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

/**
 * Blog99 Header
*/
if ( ! function_exists( 'blog99_header_section' ) ) {
	/**
	 * Blog99 Header
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function blog99_header_section(){
		if( get_theme_mod('blog99_top_header_disable',true) ){
			get_template_part( 'wp99themes/template-parts/header/header-top');
		}
		get_template_part( 'wp99themes/template-parts/header/header', get_theme_mod('blog99_header_layout','two'));
	}
}

add_action( 'blog99_header', 'blog99_header_section' );

/**
 * Blog99 Footer 
*/
if ( ! function_exists( 'blog99_footer_section' ) ) {
	/**
	 * Blog99 Footer
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function blog99_footer_section(){
		get_template_part( 'wp99themes/template-parts/footer/footer-content');
	}
}
add_action( 'blog99_footer', 'blog99_footer_section' );


/**
 * Blog99 before the main content
 * 
 * @since 1.0.0
 * @param int $post_id get the post id 
 * 
 * @return string
 */
if ( ! function_exists( 'blog99_before_main_wrapper_main_sec' ) ) {

	/**
	 * Blog99 Sidebar layout
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function blog99_before_main_wrapper_main_sec() {
		
		echo '<div class="blog99-main-container-wrapper"><div class="container"><div class="row">';
		
	}
}

add_action( 'blog99_before_mainsec', 'blog99_before_main_wrapper_main_sec' );


/**
 * Blog99 before the main content
 * 
 * @since 1.0.0
 * @param int $post_id get the post id 
 * 
 * @return string
 */
if ( ! function_exists( 'blog99_before_main_wrapper_sec' ) ) {

	/**
	 * Blog99 Sidebar layout
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function blog99_before_main_wrapper_sec() {
		echo '</div></div></div>';
	}
}

add_action( 'blog99_after_mainsec', 'blog99_before_main_wrapper_sec' );


/**
* Blog99
* author image ,link and name display
*@since 1.0.0
*/

if( ! function_exists('blog99_meta_authorlink') ) {
	function blog99_meta_authorlink(){
		return '<div class="post-author"><a rel="bookmark" href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'">'. blog99_meta_author_image()  .'</a></div>';
	}
}
if( ! function_exists('blog99_meta_author_image') ) {
	function blog99_meta_author_image(){
		return get_avatar( get_the_author_meta( 'ID' ), 25, null, null, array( 'class' => 'img-circle' ) );
	}
}


/**
 * Blog99 get the category
 * 
 * @since 1.0.0
 */
if( ! function_exists( 'blog99_get_post_categories' ) ) {
	/**
	 * Get Post Category
	 *
	 * @return array
	 * @since 1.0.0
	 */
	function blog99_get_post_categories(){
		
		
		$all_categories = get_categories( );
		
		//default value
		$categories['all'] = 'all';

		foreach( $all_categories as $category ){

			$categories[$category->term_id] = $category->name;    
		}
		
		return $categories;
	}

}


/**
 * Blog99 main slider options
 * 
 * @since 1.0.0
 * @param int $post_id get the post id 
 * 
 * @return string
 */
if ( ! function_exists( 'blog99_main_slider_section' ) ) {

	/**
	 * Blog99 Main sldier section
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function blog99_main_slider_section() {

		if( get_theme_mod('blog99_banner_slider_disable',true) == false ) return;

		/**
		 * get the all customizer control data
		 * 
		 * @since 1.0.0
		 */
		$blog99_homepage_slider = get_theme_mod('blog99_slider_slider_section_enable',true);
		$blog99_slider_tranding_enable = get_theme_mod('blog99_slider_tranding_enable',true);
		$blog99_slider_right_enable = get_theme_mod('blog99_slider_right_enable',true);
		
		/**
		 * Homepage Sldier Section
		 * 
		 * @since 1.0.0
		 */
		if( $blog99_homepage_slider != true ): return; endif;
		?>
		<!------ Latest News full Section -------->
		<div  class="blog99-newsfeed blog99-slider-section   wow fadeInUp ">
			<div class="blog99-newsfeed-outer-wrapper">
				<div class="container">
					<div class="blog99-newsfeed-inner-wrapper">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div id="blog99_banner_slider_display" class="middle-slider blog99-main-slider-wrap main-slider-sec	">
									<div class="blog99-main-slider owl-carousel owl-theme">
										<?php
											/**
											 * latest post args
											 *
											 * @since 1.0.0
											 */
											$blog99_slider_count = get_theme_mod('blog99_main_slider_numberofpost',2);
											$blog99_slider_category_post_id = get_theme_mod('blog99_main_slider_cat_id','all');
											//Start While Loop
											$args = array('post_type'=>'post','posts_per_page'=>$blog99_slider_count,'cat'=>$blog99_slider_category_post_id);
											$blog_query = new WP_Query( $args );
											while($blog_query->have_posts()): $blog_query->the_post();
										?>
										<div class="item">
											<div class="blog99-theme-thumbnail">
												<?php 
													//blog99 main slider section
													if( has_post_thumbnail() ){

														the_post_thumbnail();

													}else{
														//grident-section.jpg
														echo '<img src="'.esc_url( BLOG99_THEME_IMG . 'grident-section.jpg' ).'" />';
													}
												?>
											</div>
											<div class="blog99-article-content p-lg-4 p-md-4 p-2">
												
												<!-- blog99-category start -->
												<?php if( get_theme_mod('blog99_banner_category_disable',true) == true  ): ?>
													<div class="blog99-category-list">
														<?php the_category();?>
													</div>
												<?php endif; ?>
												<!--end blog99 category -->

												<div class="blog99-title">
													<h2 class="blog99-title-heading">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h2>
												</div>

												<div class="row">
														<?php if( get_theme_mod('blog99_banner_metabox_disable',true) == true ): ?>
															<div class="blog99-metabox col-md-8 col-lg-9 col-12 align-self-center">
																<ul class="blog99-meta-file-wrapper">
																	<li>
																		<i class="fa fa-clock-o" aria-hidden="true"></i>
																		<?php echo esc_html(get_the_date()); ?>
																	</li>

																	<!-- blog99 comment section -->
																	<?php
																		$query_post = get_post(get_the_ID());
																		$num = $query_post->comment_count;
																			if( $num == 0 || $num > 1 ) : $num = $num.' Comment'; // change the plural for your language
																			else : $num = $num.' Comments'; // change the singular for your language
																			endif;
																		$permalink = get_permalink(get_the_ID());
																	?>
																	<?php if( $num ): ?>
																		<li class="blog99-item-meta-item">
																			<a href="<?php echo esc_url($permalink . '#comments'); ?>">
																				<i class="fa fa-comment-o" aria-hidden="true"></i>
																				<span><?php echo esc_html( $num ); ?></span>
																			</a>
																		</li>
																	<?php endif; ?>
																	<!-- end blog99 comment section -->
																	
																</ul>
															</div>
														<?php endif; ?>

														<?php if( get_theme_mod('blog99_banner_metabox_disable',true) == true ): ?>
															<div class="blog99-readmore-buttom col-lg-3 col-md-4 col-12 py-3"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','blog99'); ?><svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"/></g></svg></a></div>
														<?php endif; ?>
												</div>

											</div>
										</div>
										<?php
											endwhile; // End of the loop.
											wp_reset_postdata(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

add_action( 'blog99_main_slider', 'blog99_main_slider_section' );



/**
 * Blog99 category postlist
 * 
 * @since 1.0.0
 * 
 * @return string
 */
if ( ! function_exists( 'blog99_category_postlist_section' ) ) {

	/**
	 * Blog99 Main sldier section
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function blog99_category_postlist_section() {

		if( get_theme_mod('blog99_banner_category_grid_disable',true) != true ) return;
		/**
		 * get the all customizer control data
		 * 
		 * @since 1.0.0
		 */
		$blog99_category_layout 	= get_theme_mod('blog99_category_layout', 'blog99-gridlayout-one');
		$categoryid 				= get_theme_mod('blog99_frontpage_category_postlist', array(1));
		$numberofpost 				= get_theme_mod('blog99_frontpage_category_postlist_numberofpost',6);
		
		?>

		<div class="blog99-category-list-section <?php echo esc_attr( $blog99_category_layout ); ?>">
			<div class="container">
				<div class="blog99-fullslider-inner-wrapper">
					<div id="blog99-category-list-section" class="row">

						<?php if( $blog99_category_layout  == 'blog99-gridlayout-three'): ?>
							<?php $blog99_cat_count_inc = 1; ?>
							<?php foreach( $categoryid as $postcategory ): ?>
								<?php if( $blog99_cat_count_inc == '1' ): ?>
									<?php							
										$category_link = get_category_link( $postcategory );
										if( !$category_link) continue;								
										$category_img = blog99_get_category_post_thumbnail_url($postcategory);
									?>
									<div class="col-xl-6 col-md-6 col-sm-6 col-xs-12 pr-xl-3 pr-md-3 pr-0">
										<div class="blog99-article-section first-cat-item">
											<div class="blog99-category-header">
												<?php if( !empty($postcategory) ): ?><h5><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html( get_cat_name($postcategory) ); ?></a></h5><?php endif; ?>
											</div>
											<div class="blog99-category-images">
												<a href="<?php echo esc_url( $category_link ); ?>">
													<?php if( $category_img ): ?>
														<img src="<?php echo esc_url( $category_img ); ?>" />
													<?php else: ?>
														<img src="<?php echo esc_url(trailingslashit ( get_template_directory_uri() ) . 'assets/images/dummyimage.png'); ?>" />
													<?php endif; ?>
												</a>
											</div>	
										</div>
									</div>
								<?php endif; ?>

								<?php if( $blog99_cat_count_inc == '2' || $blog99_cat_count_inc == '3' ): ?>
									<?php							
										$category_link = get_category_link( $postcategory );
										if( !$category_link) continue;								
										$category_img = blog99_get_category_post_thumbnail_url($postcategory);
									?>
									<?php if( $blog99_cat_count_inc == '2' ): ?>
										<div class="col-xl-3 col-md-3 col-sm-3 col-xs-12">
											<div class="row">
									<?php endif; ?>

												<div class="blog99-article-section blog99-article-medium pl-xl-0 pl-md-0 pl-3">
													<div class="blog99-category-header">
														<?php if( !empty($postcategory) ): ?><h5><a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html( get_cat_name($postcategory) ); ?></a></h5><?php endif; ?>
													</div>
													<div class="blog99-category-images">
														<a href="<?php echo esc_url( $category_link ); ?>">
															<?php if( $category_img ): ?>
																<img src="<?php echo esc_url( $category_img ); ?>" />
															<?php else: ?>
																<img src="<?php echo esc_url(trailingslashit ( get_template_directory_uri() ) . 'assets/images/dummyimage.png'); ?>" />
															<?php endif; ?>
														</a>
													</div>	
												</div>
									<?php if( $blog99_cat_count_inc == '3' ): ?>
										</div>
									</div>
									<?php endif; ?>
								<?php endif; ?>

								<?php if( $blog99_cat_count_inc == '4' ): ?>
									<?php							
										$category_link = get_category_link( $postcategory );
										if( !$category_link) continue;								
										$category_img = blog99_get_category_post_thumbnail_url($postcategory);
									?>
									<div class="col-xl-3 col-md-3 col-sm-3 col-xs-12 pr-xl-3 pr-md-3 pr-0">
										<div class="blog99-article-section list-cat-item">
											<div class="blog99-category-header">
												<?php if( !empty($postcategory) ): ?><h5><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html( get_cat_name($postcategory) ); ?></a></h5><?php endif; ?>
											</div>
											<div class="blog99-category-images">
												<a href="<?php echo esc_url( $category_link ); ?>">
													<?php if( $category_img ): ?>
														<img src="<?php echo esc_url( $category_img ); ?>" />
													<?php else: ?>
														<img src="<?php echo esc_url(trailingslashit ( get_template_directory_uri() ) . 'assets/images/dummyimage.png'); ?>" />
													<?php endif; ?>
												</a>
											</div>	
										</div>
									</div>
								<?php endif; ?>

								<?php if( $blog99_cat_count_inc == 4 ){ $blog99_cat_count_inc = 0; } ?>

							<?php $blog99_cat_count_inc++; endforeach; ?>

						<?php else: ?>

							<?php $blog99_cat_count = 0; ?>

							<?php foreach( $categoryid as $postcategory ): ?>
								<?php							
									$category_link = get_category_link( $postcategory );
									if( !$category_link) continue;								
									$category_img = blog99_get_category_post_thumbnail_url($postcategory);
								?>
								<?php 
									//gird categorys list
									if( $blog99_category_layout == 'blog99-gridlayout-one' ){

										if( $blog99_cat_count == 0 ){

											$blog99_category_class = 'col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12   wow fadeInUp ';
										
										}elseif( $blog99_cat_count == 1 ){
											
											$blog99_category_class = 'col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12   wow fadeInUp ';
										
										}else{

											$blog99_category_class = 'col-xl-5 col-lg-5 col-md-5 col-sm-6 col-xs-12   wow fadeInUp ';
										}
									}else{
										$blog99_category_class = 'col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12   wow fadeInUp ';
									}
								?>

								<div class="<?php echo esc_attr( $blog99_category_class ) ;?>">
									<div class="blog99-category">
										<div class="blog99-category-header">
											<?php if( !empty($postcategory) ): ?><h5><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html( get_cat_name($postcategory) ); ?><span class="effect" ></span></a></h5><?php endif; ?>
										</div>
										<div class="blog99-category-images">
											<a href="<?php echo esc_url( $category_link ); ?>">
												<?php if( $category_img ): ?>
													<img src="<?php echo esc_url( $category_img ); ?>" />
												<?php else: ?>
													<img src="<?php echo esc_url(trailingslashit ( get_template_directory_uri() ) . 'assets/images/dummyimage.png'); ?>" />
												<?php endif; ?>
											</a>
										</div>	
									</div>
								</div>
							<?php 
								$blog99_cat_count++;  
								//blog99 cat count
								if( $blog99_cat_count == 3 ){
									$blog99_cat_count = 0;
								}
								endforeach; 
							?>
						<?php endif; ?>

					</div>
				</div>	
			</div>
		</div><!-- end category post list -->
		<?php
	}
}

add_action( 'blog99_home_category_postlist', 'blog99_category_postlist_section' );



/**
 * Blog99 blog99 authoer info
 * 
 * @since 1.0.0
 * 
 * @return string
 */
function blog99_author_info_box( $content ) {
 
	global $post;
	 
	// Detect if it is a single post with a post author
	if ( is_single() && isset( $post->post_author ) ) {
	 
	 	if( get_theme_mod('blog99_single_author_disable',true) == true ){

			// Get author's display name 
			$display_name = get_the_author_meta( 'display_name', $post->post_author );
			 
			// If display name is not available then use nickname as display name
			if ( empty( $display_name ) )
			$display_name = get_the_author_meta( 'nickname', $post->post_author );
			 
			// Get author's biographical information or description
			$user_description = get_the_author_meta( 'user_description', $post->post_author );
			 
			// Get author's website URL 
			$user_website = get_the_author_meta('url', $post->post_author);
			 
			// Get link to the author archive page
			$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
			  
			if ( ! empty( $display_name ) )
			 
			$author_details = '<p class="author_name">' . esc_html( $display_name ). '</p>';
			 
			if ( ! empty( $user_description ) )
			// Author avatar and bio
			 
			$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 300 ) . nl2br( $user_description ). '</p>';
			 
			$author_details .= '<p class="author_links"><a href="'. esc_url( $user_posts ).'">'.esc_html__('View all posts by ','blog99'). esc_html( $display_name ) . '</a>';  
			 
			// Check if author has a website in their profile
			if ( ! empty( $user_website ) ) {
			 
			// Display author website link
			$author_details .= ' | <a href="' . esc_url( $user_website ) .'" target="_blank" rel="nofollow">'.esc_html__('Website','blog99').'</a></p>';
			 
			} else { 
				// if there is no author website then just close the paragraph
				$author_details .= '</p>';
			}
		 
			// Pass all this info to post content  
			$content = $content . '<div class="author_bio_section" >' . wp_kses_post( $author_details ) . '</div>';
		}
	}

	return $content;
}
	 
// Add our function to the post content filter 
add_action( 'the_content', 'blog99_author_info_box' );

/**
 * Retuns the post url
 *
 * @return string the link format url.
 */
function blog99_get_link_url() {

	$content = get_the_content();

	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}


/**
 * Get Blog Class
 */
function blog99_get_list_gird_column_class(){

	$blog99_blog_style = get_theme_mod('blog99_blog_style','list');
	
	if( $blog99_blog_style == 'list' ){

		$class	= 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 wow fadeInUp ';
	}

	elseif( $blog99_blog_style == 'masonry' ){

		$class	= 'col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 masonry wow fadeInUp ';
	}

	else{

		$class	= 'col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 wow fadeInUp ';
	}

	return $class;
}

/**
 * Get Blog Class
 */
function blog99_get_post_link($post_id){

	$blog99_blog_style = get_theme_mod('blog99_blog_style','list');

	$blog99_blog_links = get_the_permalink( $post_id );

	?>
	<div class="blog99-links-sec">
		<div class="blog99-readmore-buttom py-3"><a href="<?php echo esc_url( $blog99_blog_links ); ?>"><?php esc_html_e('Read More','blog99'); ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"></path></g></svg></a></div>
	</div>
	<?php
}



/**
 * get the post thumbnail url
 */
function blog99_get_category_post_thumbnail_url($cat_id){
	//Start While Loop
	$args = array('post_type'=>'post','posts_per_page'=>1,'cat'=>$cat_id);

	$q = new WP_Query( $args );

	$first_post = '';

	while($q->have_posts()): $q->the_post(); 

		if( has_post_thumbnail( $q->post ) ):

			$first_post = get_the_post_thumbnail_url($q->post,'full'); 

		endif;

	endwhile; // End of the loop.

	return $first_post;
}

//blog99_single_page_layout_two
function blog99_single_page_layout_two_section(){

	if ( have_posts() ) : ?>
		<section class="signle-page-layout">
			<div class="container">
				<?php 
					while ( have_posts() ) :

						the_post();

						get_template_part( 'wp99themes/template-parts/single-post/single-content-two');
					
					endwhile;
				?>
			</div>
		</section>
	<?php
	endif;
}
add_action('blog99_single_page_layout_two','blog99_single_page_layout_two_section');




//class pass
function blog99_container_class(){

	$layout = blog99_get_sidebar_layout();

	//sidebar section
	if( $layout == 'blog99-both-sidebar' ){

		$blog99_class = 'site-content-wrap col-xl-6 col-lg-6 col-md-6 col-12';

	}elseif(  $layout == 'blog99-full-width'  ){

		$blog99_class = 'site-content-wrap col-xl-12 col-lg-12 col-md-12 col-12';

	}else{
		
		$blog99_class = 'site-content-wrap col-xl-8 col-lg-8 col-md-8 col-12';
	}

	//wp99theme class
	return $blog99_class;
}



//class pass
function blog99_sidebar_class(){

	$layout = blog99_get_sidebar_layout();

	//sidebar section
	if( $layout == 'blog99-both-sidebar' ){

		$blog99_class = 'col-xl-3 col-lg-3 col-md-3 col-12';

	}else{
		
		$blog99_class = 'col-xl-4 col-lg-4 col-md-4 col-12';
	}

	//wp99theme class
	return $blog99_class;
}


/** 
 * Blog99 Theme Search 
*/
function blog99_header_search_sec(){

	if( get_theme_mod('blog99_header_disable_search', true) == true ){
			
	?>
	<li class="header-search-section">
		<a href="javascript:void(0)" class="header-search">
			<i class="fa fa-search" aria-hidden="true"></i>
		</a>

		<div class="header-search-content">
			<?php 
					$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
						<div>
						<input type="text" value="' . esc_attr(get_search_query()) . '" name="s" id="s" placeholder="'.esc_attr__("Search ..", "blog99").'" />
						<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'blog99' ) .'" />
						</div>
						</form>'; 

				echo $form;
			?>
		</div>
	</li>
	<?php
	}
}
add_action('blog99_header_search_section','blog99_header_search_sec');
