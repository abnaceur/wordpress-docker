<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package blogtay
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
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
$options = get_theme_mod( 'theme_options' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogtay' ); ?></a>
	<header id="masthead" class="site-header">
		<?php
		$blogtay_top_header_section = isset( $options['blogtay_show_hide_option']) ? $options['blogtay_show_hide_option'] : 'hide';	
		if ( 'show' ===  $blogtay_top_header_section ) {
			?>
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-8">
							
								<?php
								wp_nav_menu( array(
									'theme_location' => 'top-nav-info',
									'menu_id'        => 'top-nav-info',
									'menu_class'        => 'info-list'
									
								) );
								?>

						</div>
						<div class="col-sm-12 col-md-4">
							
								<?php
								wp_nav_menu( array(
									'theme_location' => 'social-links',
									'menu_id'        => 'social-links',
									'menu_class'        => 'social-list'
									
								) );
								?>

						</div>
					</div>
				</div>
			</div> <!-- end / header-top -->
			<?php 
			}
		?>

		<div class="main-header">
			<div class="container">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$blogtay_description = get_bloginfo( 'description', 'display' );
				if ( $blogtay_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $blogtay_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</div> <!-- end / main-header -->	
</header><!-- #masthead -->

<div id="content" class="site-content">

	<?php
	if ( is_home() || is_front_page()) :
		$options = get_theme_mod( 'theme_options' ); 
		$blogtay_banner = isset( $options['blogtay_banner_show_hide_option'] ) ? $options['blogtay_banner_show_hide_option'] : 'show';
		if ( 'show' ===  $blogtay_banner ) {
			do_action('blogtay_slider_action', $options);
		}
	endif;
	?>
