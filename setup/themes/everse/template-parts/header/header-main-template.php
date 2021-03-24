<?php
/**
 * The main header template file
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} ?>

<div class="nav__header">

	<!-- Logo -->
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-url logo-dark" itemtype="https://schema.org/Organization" itemscope="itemscope">
		<?php if ( get_theme_mod( 'everse_settings_logo_dark' ) || get_theme_mod( 'everse_settings_logo_dark_retina' ) ) : ?>
			<img src="<?php echo esc_url( get_theme_mod( 'everse_settings_logo_dark' ) ) ?>" srcset="<?php echo esc_url( get_theme_mod( 'everse_settings_logo_dark' ) ) . ' 1x' ?>, <?php echo esc_url( get_theme_mod( 'everse_settings_logo_dark_retina' ) ) . ' 2x' ?>" class="logo logo--dark" alt="<?php bloginfo( 'name' ) ?>">
		<?php else : ?>
			<h1 class="site-title site-title--dark"><?php bloginfo( 'name' ) ?></h1>
			<?php $everse_tagline = get_bloginfo( 'description', 'display' ); ?>
			<p class="site-tagline"><?php echo esc_html( $everse_tagline ); ?></p>
		<?php endif; ?>
	</a>

	<?php everse_menu_mobile(); ?>

</div> <!-- .nav__header -->

<?php if ( 'header-layout-2' === get_theme_mod( 'everse_settings_header_layout', 'header-layout-1' ) ) : ?>
	<div class="nav__navbar-holder">
<?php endif; ?>

	<?php everse_menu_before(); ?>

	<?php if ( has_nav_menu('primary-menu') ) : ?>
		<!-- Navbar -->
		<nav class="nav__wrap collapse navbar-collapse" id="navbar-collapse" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" aria-label="<?php echo esc_attr__( 'Primary menu', 'everse' ); ?>">
			<?php			
				wp_nav_menu( array(
					'theme_location'  => 'primary-menu',
					'fallback_cb'			=> '__return_false',
					'container'       => false,
					'menu_class'      => 'nav__menu',
					'walker'          => new Everse_Walker_Nav_Menu()
				) );
			?>

			<?php everse_last_menu_item_after(); ?>

		</nav> <!-- end nav__wrap -->
	<?php endif; ?>

	<?php everse_menu_after(); ?>

<?php if ( 'header-layout-2' === get_theme_mod( 'everse_settings_header_layout', 'header-layout-1' ) ) : ?>
	</div> <!-- end nav__navbar-holder -->
<?php endif; ?>