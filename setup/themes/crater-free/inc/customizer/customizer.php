<?php
/**
 * Crater Theme Customizer
 *
 * @package crater-free
 */


/**
 * Kirki
 */
require get_template_directory() . '/inc/customizer/kirki/class-kirki-installer.php';
require get_template_directory() . '/inc/customizer/kirki/class-crater-kirki.php';

/**
 * Kirki config
 */
CraterFree_Kirki::add_config( 'crater-free', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'crater_free_customize_register' ) ) :
function crater_free_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'crater_free_site_title_callback',
            'fallback_refresh'    => false,
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'crater_free_site_description_callback',
            'fallback_refresh'    => false, 
        ) );
    }

}
endif;
add_action( 'customize_register', 'crater_free_customize_register' );


// Site title and tagline
if ( ! function_exists( 'crater_free_customizer_site_title_tagline' ) ) :
function crater_free_customizer_site_title_tagline( $wp_customize ) {
    // Enable/disable section
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_site_title_tagline',
        'label'    => esc_html__( 'Display Site Title and Tagline', 'crater-free' ),
        'section'  => 'title_tagline',
        'default'  => '1',
    ] );
}
endif;
add_action( 'init', 'crater_free_customizer_site_title_tagline' );


//general settings
get_template_part( 'inc/customizer/options/section-general' );

//logo settings
get_template_part( 'inc/customizer/options/section-logo' );

//menu settings
get_template_part( 'inc/customizer/options/section-menu' );

//header settings
get_template_part( 'inc/customizer/options/section-header' );

//sticky header
get_template_part( 'inc/customizer/options/section-sticky-header' );

//color settings
get_template_part( 'inc/customizer/options/section-color' );

//fonts settings
get_template_part( 'inc/customizer/options/section-fonts' );

//blog settings
get_template_part( 'inc/customizer/options/section-blog' );

//footer settings
get_template_part( 'inc/customizer/options/section-footer' );

//preloader settings
get_template_part( 'inc/customizer/options/section-preloader' );

//page settings
get_template_part( 'inc/customizer/options/section-page' );

//misc settings
get_template_part( 'inc/customizer/options/section-misc' );


/**
* Render callback for site title
* 
* @return void
*/
function crater_free_site_title_callback() {
    bloginfo( 'name' );
}

/**
* Render callback for site description
* 
* @return void
*/
function crater_free_site_description_callback() {
    bloginfo( 'description' );
}

/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'crater_free_enqueue_customizer_stylesheets' ) ) :
function crater_free_enqueue_customizer_stylesheets() {
    wp_register_style( 'crater-free-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'crater-free-customizer-css' );
}
endif;
add_action( 'customize_controls_print_styles', 'crater_free_enqueue_customizer_stylesheets' );