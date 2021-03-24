<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AeonMag
 */
$GLOBALS['aeonmag_theme_options'] = aeonmag_get_options_value();
global $aeonmag_theme_options;
$enable_header = absint($aeonmag_theme_options['aeonmag_enable_top_header']);
$enable_social = absint($aeonmag_theme_options['aeonmag_enable_top_header_social']);
$enable_date = absint($aeonmag_theme_options['aeonmag_enable_top_date']);
$header_ads = absint($aeonmag_theme_options['aeonmag_enable_header_ads']);
$ads_image = esc_url($aeonmag_theme_options['aeonmag-header-ads-image']);
$ads_link = esc_url($aeonmag_theme_options['aeonmag-header-ads-image-link']);
$search_header = absint($aeonmag_theme_options['aeonmag_enable_search']);
$enable_main_trending = absint($aeonmag_theme_options['aeonmag_enable_trending_news_big']);
$logo_position = esc_attr($aeonmag_theme_options['aeonmag-logo-position']);
$highlights_text = esc_html($aeonmag_theme_options['aeonmag_enable_highlight_text_menu']);
?>

<header class="header-1">
	<?php if( $enable_header == 1 ){ ?>
		<section class="top-bar-area">
			<div class="container">
				<div class="row">
						<?php if( $enable_date == 1 ) { ?>
							<div class="col-lg-8 col-md-12 col-sm-12 align-self-center">
									<div class="today-date">
										<p><?php echo date_i18n(__('l, F d, Y','aeonmag')); ?></p>
									</div>
							</div>
						<?php } ?>
					<div class="col-lg-4 col-md-12 col-sm-12 align-self-center">
						<div class="top_date_social">							
							<?php if( $enable_social == 1 ){ ?>
								<div class="social-links">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'container' => 'ul',
											'menu_id'        => 'social-menu',
										) );
									?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>		
	<?php $header_image = esc_url(get_header_image());
	$header_class = ($header_image == "") ? '' : 'header-image';
	?>
	<section class="main-header <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<div class="head_one clearfix <?php echo esc_attr($logo_position);?>">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 align-self-center">
						<div class="logo ">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							endif;
							$aeonmag_description = get_bloginfo( 'description', 'display' );
							if ( $aeonmag_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $aeonmag_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-logo -->
					</div>
					<?php if(!empty($header_ads) && !empty($ads_image)){ ?>
						<div class="col-lg-8 align-self-center">
							<div class="banner1">
								<a href="<?php echo esc_url($ads_link);?>" target="_blank">
									<img src="<?php echo esc_url($ads_image);?>" alt="">
								</a>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</setion><!-- #masthead -->
	<div class="menu-area">
		<div class="container">
			<div class="row align-items-center relative">					
				<nav id="site-navigation" class="col-lg-10 col-12">
					<button class="bar-menu">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<div class="aeonmag-home-icon">
						<a href="<?php echo esc_url(home_url('/')); ?>">
                    		<i class="fa fa-home"></i> 
                		</a>
                	</div>
					<div class="main-menu menu-caret">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => 'ul',
							'menu_class'      => ''
						));
						?>
					</div>
				</nav><!-- #site-navigation -->
				<div class="col-lg-2 col-12 mob-right d-flex justify-content-end align-items-center pl-0">
					<div class="menu_right">
						<?php if(!empty($highlights_text)){ ?>
						<button class="trending__button">
	                        <i class="fa fa-clock-o"></i>
	                        <span class="ml-2"><?php echo esc_html($highlights_text); ?></span>
	                    </button>
	                <?php } ?>
						<?php if( 1 == $search_header ){ ?>
						<div class="search-wrapper">					
							<div class="search-box">
								<a href="javascript:void(0);" class="s_click"><i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i></a>
								<a href="javascript:void(0);" class="s_click"><i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i></a>
							</div>
							<div class="search-box-text">
								<?php echo get_search_form(); ?>
							</div>				
						</div>
						<?php } ?>
					</div>
					<div class="trending__wrap">
	                    <div class="trending__box">
	                    	<?php
	                    	$query_args = array(
				                'post_type' => 'post',
				                'posts_per_page' => '6',
				                'ignore_sticky_posts' => true
				            );
				            $i = 1;
              				$query = new WP_Query($query_args); ?>
	                    	<div class="container">
	                    		<div class="row">
          							<?php if ($query->have_posts()) :
							            while ($query->have_posts()) :
							            $query->the_post();
							        ?>
						            <div class="col-lg-4 col-md-6 col-sm-12">
					                    <!-- Post Article -->
					                    <div class="card__post card__post-list mb-3">
					                    	<span class="number"><?php echo $i; ?></span>
                          					<div class="card__post__body my-auto">
                            					<div class="card__post__content">
                              						<div class="card__post__title">
					                              		<h4 class="mb-1">
					                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					                              		</h4>
                              						</div>
				                            	</div>
				                          	</div>
				                        </div>
						            </div>
						            <?php
						            	$i++;
						                endwhile;
						                wp_reset_postdata();
						              endif;
						              ?>
        						</div> 
        						<button class="closeBtn">
        							<span><i class="fa fa-times"></i></span>
        						</button>
	                    	</div>
	                    </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php  
/*
* Trending Section Hook
*/
do_action('aeonmag_action_trending');
   




