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
$enable_slider = absint($aeonmag_theme_options['aeonmag_enable_slider']);
$enable_box = $aeonmag_theme_options['aeonmag_enable_promo'];
$enable_grid = absint($aeonmag_theme_options['aeonmag_enable_grid_post_front']);
$preloader = absint($aeonmag_theme_options['aeonmag-front-page-preloader']);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('boxed-design'); ?>>
<!-- Preloader -->
<?php if($preloader == 1 ){ ?>
<div class="dtr-preloader">
    <div class="dtr-preloader-inner">
        <div class="dtr-loader"><?php esc_html_e('Loading...', 'aeonmag'); ?></div>
    </div>
</div>
<?php } ?>
<!--/ End Preloader -->
<?php
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}else { 
    do_action( 'wp_body_open' ); 
}
?>
<div id="page" class="site ">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aeonmag' ); ?></a>

	<?php
    /**
     * Hook - aeonmag_action_header.
     *
     * @hooked aeonmag_add_main_header - 10
     */
    do_action( 'aeonmag_action_header' );
    ?>

	 <?php if ($enable_slider == 1 && (is_home() || is_front_page())) { ?>
        <section class="slider-wrapper">
            <?php
            /*
            * Slider Section Hook
            */
                do_action('aeonmag_action_slider');
            ?>
        </section>
    <?php } ?>
    <?php if (is_active_sidebar('below-slider-area') && (is_home() || is_front_page())) { ?>
        <section class=" slider-below-widget-wrapper banner-add-area">
            <div class="container">
                <?php 
                /*
                * Widget area below slider
                */
                dynamic_sidebar( 'below-slider-area' ); ?>
            </div>
        </section>
    <?php } ?>
    <?php if ($enable_box == 1 && (is_home() || is_front_page() ) )  { ?>
        <section class="promo-slider-wrapper">
            <?php
            
            /*
            * Boxes Section Hook
            */
            do_action('aeonmag_action_boxes');
            ?>
        </section>
    <?php } ?>

    <?php if ($enable_grid == 1 && (is_home() || is_front_page() ) )  { ?>
        <section class="promo-grid-slider-wrapper">
            <?php
            
            /*
            * Grid Slider
            */
            do_action('aeonmag_front_page_grid_slider_hook');
            ?>
        </section>
    <?php } ?>

    