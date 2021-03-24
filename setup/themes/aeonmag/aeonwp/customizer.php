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
 * AeonMag Theme Customizer
 *
 * @package AeonMag
 */

if ( !function_exists('aeonmag_default_theme_options_values') ) :

    function aeonmag_default_theme_options_values() {

        $default_theme_options = array(

            /*Logo Options*/
            'aeonmag_logo_width_option' => '600',
            'aeonmag-logo-position'=>'left-logo',

            /*Top Header*/
            'aeonmag_enable_top_header'=> 1, 
            'aeonmag_enable_top_header_social'=> 0,
            'aeonmag_enable_top_menu'=> 1,
            'aeonmag_enable_top_date'=> 1,

            /*Header Image*/
            'aeonmag_enable_header_image_overlay'=> 0,
            'aeonmag_slider_overlay_color'=> '#000000',
            'aeonmag_slider_overlay_transparent'=> '0.1',
            'aeonmag_header_image_height'=> '100',

           /*Header Options*/
            'aeonmag_enable_offcanvas'  => 1,
            'aeonmag_enable_search'  => 0,
            'aeonmag_enable_header_ads'=> 0,
            'aeonmag-header-ads-image'=>'',
            'aeonmag-header-ads-image-link'=>'',
            'aeonmag_enable_trending_news_big'=>'trending-1',
            'aeonmag-select-big-trending-category'=> 0,
            'aeonmag_enable_highlight_text_menu'=> esc_html__('Highlights','aeonmag'),


            /*Front Page Options*/
            'aeonmag_enable_slider'      => 1,
            'aeonmag-select-category'    => 0,
            'aeonmag-select-category-slider-right'=> 0,
            'aeonmag_enable_promo'       => 1,
            'aeonmag-promo-select-category'=> 0,
            'aeonmag_highlights_title'=> esc_html__('Major Highlights','aeonmag'),
            'aeonmag-select-category-trending'=> 0,
            'aeonmag_enable_grid_post_front'=> 1,
            'aeonmag_title_grid_post_front'=> esc_html__('Posts Slider','aeonmag'),
            'aeonmag-grid-slider-select-category'=> 0,
            'aeonmag_enable_missed_post_front'=> 1,
            'aeonmag_title_you_missed_post_front'=> esc_html__('You May Have Missed','aeonmag'),
            'aeonmag-you-missed-select-category'=> 0, 

            /*Colors Options*/
            'aeonmag_primary_color'              => '#ff0000',
 
            /*Blog Page*/
            'aeonmag-sidebar-blog-page' => 'right-sidebar',
            'aeonmag-content-show-from' => 'excerpt',
            'aeonmag-excerpt-length'    => 15,
            'aeonmag-pagination-options'=> 'numeric',
            'aeonmag-blog-exclude-category'=> '',
            'aeonmag-read-more-text'    => '',
            'aeonmag-show-hide-share'   => 1,
            'aeonmag-show-hide-category'=> 1,
            'aeonmag-show-hide-date'=> 1,
            'aeonmag-show-hide-author'=> 1,

            /*Single Page */
            'aeonmag-single-page-featured-image' => 1,
            'aeonmag-single-page-related-posts'  => 0,
            'aeonmag-single-page-related-posts-title' => esc_html__('You May Like','aeonmag'),
            'aeonmag-sidebar-single-page'=> 'single-right-sidebar',
            'aeonmag-single-social-share' => 1,

            /*Sticky Sidebar*/
            'aeonmag-enable-sticky-sidebar' => 1,

            /*Footer Section*/
            'aeonmag-footer-copyright'  => esc_html__('Copyright All Rights Reserved 2021','aeonmag'),

            /*Breadcrumb Options*/
            'aeonmag-extra-breadcrumb' => 'yoast',

            /*Miscellaneous Options*/
            'aeonmag-front-page-content'=> 1,
            'aeonmag-front-page-preloader'=> 1,
            'aeonmag-category-color'=> 0,

        );
return apply_filters( 'aeonmag_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  AeonMag Theme Options and Settings
 *
 * @since AeonMag 1.0.0
 *
 * @param null
 * @return array aeonmag_get_options_value
 *
 */
if ( !function_exists('aeonmag_get_options_value') ) :
    function aeonmag_get_options_value() {
        $aeonmag_default_theme_options_values = aeonmag_default_theme_options_values();
        $aeonmag_get_options_value = get_theme_mod( 'aeonmag_options');
        if( is_array( $aeonmag_get_options_value )){
            return array_merge( $aeonmag_default_theme_options_values, $aeonmag_get_options_value );
        }
        else{
            return $aeonmag_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aeonmag_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'aeonmag_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'aeonmag_customize_partial_blogdescription',
     ) );
  }
  $default = aeonmag_default_theme_options_values();

  /* Theme Options Panel */
        $wp_customize->add_panel( 'aeonmag_panel', array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' => __( 'AeonMag Theme Options', 'aeonmag' ),
) );

/* Theme Settings */
require get_template_directory() . '/aeonwp/settings/logo-options.php';
require get_template_directory() . '/aeonwp/settings/top-header-options.php';
require get_template_directory() . '/aeonwp/settings/header-options.php';
require get_template_directory() . '/aeonwp/settings/color-options.php';
require get_template_directory() . '/aeonwp/settings/slider-options.php';
require get_template_directory() . '/aeonwp/settings/boxes-options.php';
require get_template_directory() . '/aeonwp/settings/blog-page-options.php';
require get_template_directory() . '/aeonwp/settings/single-page-options.php';
require get_template_directory() . '/aeonwp/settings/sticky-sidebar-options.php';
require get_template_directory() . '/aeonwp/settings/footer-options.php';
require get_template_directory() . '/aeonwp/settings/breadcrumb-options.php';
require get_template_directory() . '/aeonwp/settings/miscellaneous-options.php';
require get_template_directory() . '/aeonwp/settings/front-page-options.php';

}
add_action( 'customize_register', 'aeonmag_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aeonmag_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aeonmag_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aeonmag_customize_preview_js() {
	wp_enqueue_script( 'aeonmag-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'aeonmag_customize_preview_js' );

/*
** Customizer Styles
*/
function aeonmag_panels_css() {
     wp_enqueue_style('aeonmag-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'aeonmag_panels_css' );