<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package x-blog-free
 */
$x_blog_free_theme_layout = get_theme_mod('theme_layout');
$x_blog_free_logo_position = get_theme_mod('logo_position','logo-center');
$x_blog_free_menu_position = get_theme_mod('menu_position','center');
$x_blog_free_slider_text = get_theme_mod('slider_text');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		 if(function_exists('wp_body_open')){
		 	wp_body_open();
		 } 
	 ?>

<div id="page" class="site x-blog">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'x-blog-free' ); ?></a>
	<header id="masthead" class="site-header baby-head-img">
        <?php if( has_header_image() ): ?>
        <div class="header-img"> 
        <?php the_header_image_tag(); ?>
        </div>
        <?php else: ?>
        <div class="no-header-img"> 
        
        <?php endif; ?>
		<div class="baby-container site-branding <?php echo esc_attr($x_blog_free_logo_position); ?>">
            <?php
            if(has_custom_logo()):
                the_custom_logo();
            else:
            ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
            endif;
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html($description); ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
		<div class="xmenu-bar">
			<div class="container">
				<nav id="site-navigation" class="main-navigation text-<?php echo esc_attr($x_blog_free_menu_position); ?>">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="mshow"><?php esc_html_e( 'Menu', 'x-blog-free' ); ?></span><span class="mhide"><?php esc_html_e( 'Close Menu', 'x-blog-free' ); ?></span></button>
					<?php
					if ( has_nav_menu( 'menu-1' ) ) {

						wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'walker'        => new xblogFree_Walker_Nav_Menu(),
						)
						);

					} elseif ( ! has_nav_menu( 'expanded' ) ) { ?>
					<ul id="primary-menu" class="menu nav-menu">
					<?php
						wp_list_pages(
							array(
								'match_menu_classes' => true,
								'show_sub_menu_icons' => true,
								'title_li' => false,
								'walker'   => new xblogFree_Walker_Page(),
							)
						);
						?>
					</ul>
					<?php

					}
					
					?>
					<button class="screen-reader-text mmenu-hide"><?php esc_html_e( 'Close Menu', 'x-blog-free' ); ?></button>
				</nav><!-- #site-navigation -->
			</div>
		</div>

		
	</header><!-- #masthead -->

	<?php if(!empty($x_blog_free_slider_text) && is_home()): ?>
	<section class="home-feature-slider">
		<?php echo wp_kses_post(do_shortcode($x_blog_free_slider_text)); ?>
	</section>
	<?php endif; ?>

	<div id="content" class="baby-container site-content <?php echo esc_attr($x_blog_free_theme_layout); ?>">
