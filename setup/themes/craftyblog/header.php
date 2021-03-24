<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package craftyblog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
	if (function_exists('wp_body_open')) {
        wp_body_open();
    }else {
    	do_action( 'wp_body_open' );
    }
	 ?>
<div id="page" class="site">
	<header id="masthead" class="site-header" style="background-image: url(<?php echo esc_url(get_header_image());?>);">
		<div class="site-branding-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 text-left">
						<div class="social-icon">
							<?php craftyblog_social_activity(); ?>
						</div>
					</div>
					<div class="col-lg-6 col-md-5 text-center">
						<div class="site-branding text-center">
							<?php
							if ( has_custom_logo() ) :
								the_custom_logo();
							else :
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								endif;
								$craftyblog_description = get_bloginfo( 'description', 'display' );
								if ( $craftyblog_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html($craftyblog_description); /* WPCS: xss ok. */ ?></p>
									<?php
								endif;
							endif;
							?>
						</div><!-- .site-branding -->
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="search-form-header">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="nav-bar-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="cssmenu menu-1" id="cssmenu">
							<!--navbar nav-->
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container' => 'ul',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
