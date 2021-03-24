<?php
/*This file is part of gossip-news, gossip-news child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/


if ( ! function_exists( 'gossip_news_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function gossip_news_scripts() {
		$gossip_news_theme_version = wp_get_theme()->get( 'Version' );
		$gossip_news_parent_theme_version = wp_get_theme(get_template())->get( 'Version' );

		/* If using a child theme, auto-load the parent theme style. */
		if ( is_child_theme() ) {
			wp_enqueue_style( 'gossip-news-style', get_template_directory_uri() . '/style.css', array(), $gossip_news_parent_theme_version );
		}
		
	}
endif;
add_action( 'wp_enqueue_scripts', 'gossip_news_scripts' );



add_action( "customize_register","gossip_news_customize_register",999,1);

function gossip_news_customize_register($wp_customize){
	global $wp_customize;
	$wp_customize->remove_section('ample_magazine_section_Popular_tag');
	$wp_customize->remove_section('section_breaking_news');

}




if ( !function_exists('ample_magazine_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function ample_magazine_get_default_theme_options()
	{

		$default = array();
        $default['ample_magazine_breaking_title']      = esc_html__( 'Breaking News', 'gossip-news' );
        $default['ample_magazine_breaking_category_id']      = -1;
        $default['ample_magazine_breaking_post_number']     = 5;
        $default['ample_magazine_breaking_news_option']='show';



//social sharing
        $default['ample_magazine_header_social_option']='show';
        $default['ample_magazine_facebook_url']='#';
        $default['ample_magazine_twitter_url']='#';
        $default['ample_magazine_Google+_url']='#';
        $default['ample_magazine_linkedin_url']='#';

//herader layout
        $default['ample_magazine_header_layout_option']='layout1';

//slider

        $default['ample_magazine_homepage_slider_option']='show';
        $default['ample_magazine_slider_cat_id']=-1;
        $default['ample_magazine_no_of_slider']=5;
        $default['ample_magazine_design_layout_option']='full-width';
        $default['ample_magazine_banner_layout_option']='layout1';

        /*for feature section*/
        $default['ample_magazine_feature_cat_id']=-1;
        $default['ample_magazine_homepage_feature_option']='show';


        /*footer section*/
        $default['ample_magazine_copyright']=esc_html__('Copy Right Text', 'gossip-news');

        $default['ample_magazine_date_format_option']='theme-default';
        $default['ample_magazine_meta_date_options']='date-author';

//trending news
        $default['ample_magazine_trending_news_option']='hide';
        $default['ample_magazine_trending_title']      = esc_html__( 'Trending News', 'gossip-news' );
        $default['ample_magazine_trending_category_id']      = -1;
        $default['ample_magazine_trending_post_number']     = 5;



// Blog.
        $default['ample_magazine_sidebar_layout_option'] = 'right-sidebar';
        $default['ample_magazine_blog_title_option'] = esc_html__('Latest Blog', 'gossip-news');
        $default['ample_magazine_blog_excerpt_option'] = 'content';
        $default['ample_magazine_description_length_option'] = 35;
        $default['ample_magazine_show_feature_image_single_option']='show' ;


        $default['ample_magazine_breadcrumb_setting_option']='enable';
        $default['ample_magazine_latest_blog_option']=1;


//color code

        $default['ample-magazine-category-primary-color']='#1e88e5';
        $default['ample_magazine_top_header_background_color']='#000';
        $default['ample_magazine_primary_color']='#bb1919';
        $default['ample_magazine_top_footer_background_color']='#444';
        $default['ample_magazine_bottom_footer_background_color']='#000';
        $default['ample_magazine_banner_layout_option']='layout1';
        $default['ample_magazine_design_layout_option']='container';
        $default['ample_magazine_site_layout_options']='full-width';
        $default['ample_magazine_date_format_option']='theme-default';
        $default['ample_magazine_meta_date_options']='date-author';
        $default['ample_magazine_Popular_tag_option']='hide';
        $default['ample_magazine_popular_tag_title']=esc_html__('Popular Tag', 'gossip-news');
        $default['ample_magazine_popular_tag_post_number']=8;
        $default['ample_magazine_front_page_hide_option']='show';
// Pass through filter.
		$default['ample_magazine_front_page_hide_option']='show';
		$default['ample_magazine_header_social_option']='show';
		$default['ample_magazine_facebook_url']='#';
		$default['ample_magazine_twitter_url']='#';
		$default['ample_magazine_Google+_url']='#';
		$default['ample_magazine_linkedin_url']='#';


		$default['ample_magazine_header_layout_option']='layout2';


		$default['ample_magazine_breaking_news_option']='show';

		$default['ample_magazine_homepage_slider_option']='show';
		$default['ample_magazine_slider_cat_id']=-1;
		$default['ample_magazine_no_of_slider']=5;

		$default['ample_magazine_feature_cat_id']=-1;

// breaking News

		$default['ample_magazine_breaking_title']      = esc_html__( 'Breaking News', 'gossip-news' );
		$default['ample_magazine_breaking_category_id']      = -1;
		$default['ample_magazine_breaking_post_number']     = 5;

		$default['ample_magazine_trending_title']      = esc_html__( 'Trending News', 'gossip-news' );
		$default['ample_magazine_trending_category_id']      = -1;
		$default['ample_magazine_trending_post_number']     = 5;
		$default['ample_magazine_trending_news_option']='show';


		/*for feature section*/
		$default['ample_magazine_feature_cat_id']=-1;
		$default['ample_magazine_homepage_feature_option']='show';



		/*footer section*/
		$default['ample_magazine_copyright']='';





		// Blog.
		$default['ample_magazine_sidebar_layout_option'] = 'right-sidebar';
		$default['ample_magazine_blog_title_option'] = esc_html__('Latest Blog', 'gossip-news');
		$default['ample_magazine_blog_excerpt_option'] = 'content';
		$default['ample_magazine_description_length_option'] = 35;
		$default['ample_magazine_show_feature_image_single_option']='show' ;


		$default['ample_magazine_breadcrumb_setting_option']='enable';
		$default['ample_magazine_latest_blog_option']=1;


		//color code
		$default['gossip-news-category-primary-color']='#2319bb';
        //color code
        $default['ample_magazine_top_header_background_color']='#000';
        $default['ample_magazine_primary_color']='#034d5d ';
        $default['ample_magazine_top_footer_background_color']='#444';
        $default['ample_magazine_bottom_footer_background_color']='#000';
        $default['ample_magazine_banner_layout_option']='layout1';
        $default['ample_magazine_design_layout_option']='container';
        $default['ample_magazine_site_layout_options']='Boxed';
        $default['ample_magazine_date_format_option']='theme-default';
        $default['ample_magazine_meta_date_options']='date-author';
        $default['ample_magazine_Popular_tag_option']='hide';
        $default['ample_magazine_popular_tag_title']=esc_html__('Popular Tag', 'gossip-news');
        $default['ample_magazine_popular_tag_post_number']=8;

// Pass through filter.
		$default = apply_filters( 'ample_magazine_get_default_theme_options', $default );
		return $default;
	}
endif;






/*=====================================feature section 2================================================*/

if (!function_exists('ample_magazine_feature_news_2')) :

	function ample_magazine_feature_news_2()
	{
		$ample_magazine_feature_section_option = ample_magazine_get_option('ample_magazine_homepage_feature_option');
		if ($ample_magazine_feature_section_option == 'show') {

			$ample_magazine_feature_section_cat_id = ample_magazine_get_option('ample_magazine_feature_cat_id');
			$ample_magazine_slider_section_option = ample_magazine_get_option('ample_magazine_homepage_slider_option');
			if ($ample_magazine_slider_section_option == 'show') {
				?>

				<div class="col-md-5 col-xs-12 left-side">
			<?php }else {?>
				<div class="col-md-12 col-xs-12 left-side">
			<?php  }

			?>
			<div class="row">
				<?php
				$i = 1;
				if (!empty($ample_magazine_feature_section_cat_id)) {
					$ample_magazine_home_feature_section = array('cat' => $ample_magazine_feature_section_cat_id, 'posts_per_page' => 3);
					$ample_magazine_home_feature_section_query = new WP_Query($ample_magazine_home_feature_section);
					if ($ample_magazine_home_feature_section_query->have_posts()) {
						while ($ample_magazine_home_feature_section_query->have_posts()) {
							$ample_magazine_home_feature_section_query->the_post();
							 if ($i == 1) {


                                            ?>
                                            <div class="col-sm-12">
                                                <div class="post-overaly-style contentTop hot-post-top clearfix">
                                                    <div class="post-thumb">
                                                       <?php if (has_post_thumbnail()) {
                                                            $image_id = get_post_thumbnail_id();
                                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>

                                                           <img
                                                                        class="img-responsive"
                                                                        src="<?php echo esc_url($image_url[0]); ?>"
                                                                        alt=""/>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="post-content">
                                                        <div class="post-cat" ><?php ample_magazine_get_category(get_the_ID()); ?></div>
                                                        <h2 class="post-title title-large">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                         <span class="post-date"> <?php ample_magazine_posted_on_theme(); ?></span>
                                                    </div><!-- Post content end -->
                                                     <?php ample_magazine_post_formats(get_the_ID()); ?>

                                                </div><!-- Post Overaly end -->
                                            </div><!-- Col end -->
                                        <?php } else {
								 ?>

								 <div class="col-sm-6 small-right">
									 <?php
									 if ($ample_magazine_slider_section_option == 'hide') {
									 ?>
									 <div class="hide-slider">
										 <?php } ?>
										 <div class="ample-overaly-style contentTop hot-post-bottom clearfix">
											 <div class="img-post">

												 <?php if (has_post_thumbnail()) {
													 $image_id = get_post_thumbnail_id();
													 $image_url = wp_get_attachment_image_src($image_id, 'large', true); ?>

													 <img
															 class="img-responsive"
															 src="<?php echo esc_url($image_url[0]); ?>"
															 alt="<?php the_title_attribute(); ?>"/>
												 <?php } ?>
											 </div>
											 <div class="ample-content">
												 <div
													 class="post-cat"><?php ample_magazine_get_category(get_the_ID()); ?></div>
												 <h2 class="post-title title-medium">
													 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												 </h2>
												 <span
													 class="post-date"> <?php ample_magazine_posted_on_theme(); ?></span>

											 </div><!-- Post content end -->
											 <?php ample_magazine_post_formats(get_the_ID()); ?>

										 </div><!-- Post Overaly end -->
										 <?php
										 if ($ample_magazine_slider_section_option == 'hide') {
										 ?>
									 </div>
								 <?php } ?>
								 </div><!-- Col end -->
								 <?php
							 }
							$i++;
						}


					}
					wp_reset_postdata();
				}


				?>

			</div>
			</div><!-- Col 5 end -->

			<?php


		}
	}

endif;

add_action('ample-magazine-feature-news-2', 'ample_magazine_feature_news_2', 20, 3);


/*Widgets load*/

require get_stylesheet_directory() . '/inc/ample-themes/widgets/layout-5.php';
