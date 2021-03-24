<?php
/**
 * Charity Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Charity Zone
 */

use WPTRT\Customize\Section\Charity_Zone_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Charity_Zone_Button::class );

    $manager->add_section(
        new Charity_Zone_Button( $manager, 'charity_zone_pro', [
            'title'       => __( 'Charity Zone Pro', 'charity-zone' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'charity-zone' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/charity-wordpress-theme/', 'charity-zone')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'charity-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'charity-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function charity_zone_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title',
            'render_callback' => 'charity_zone_customize_partial_blogname',
        ));
    }
    
    // Top Header
    $wp_customize->add_section('charity_zone_top_header',array(
        'title' => esc_html__('Top Header','charity-zone'),
        'description' => esc_html__('Topbar content','charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_phone_number_info',array(
        'default' => '',
        'sanitize_callback' => 'charity_zone_sanitize_phone_number'
    )); 
    $wp_customize->add_control('charity_zone_phone_number_info',array(
        'label' => esc_html__('Phone Number','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_phone_number_info',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('charity_zone_email_info',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    )); 
    $wp_customize->add_control('charity_zone_email_info',array(
        'label' => esc_html__('Email Address','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_email_info',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('charity_zone_donate_button',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('charity_zone_donate_button',array(
        'label' => esc_html__('Donate Page Link','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_donate_button',
        'type'  => 'url'
    ));

    // Social Link
    $wp_customize->add_section('charity_zone_social_link',array(
        'title' => esc_html__('Social Links','charity-zone'),
        'description' => esc_html__('Social Contact','charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('charity_zone_facebook_url',array(
        'label' => esc_html__('Facebook Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('charity_zone_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('charity_zone_twitter_url',array(
        'label' => esc_html__('Twitter Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('charity_zone_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('charity_zone_intagram_url',array(
        'label' => esc_html__('Intagram Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('charity_zone_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('charity_zone_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('charity_zone_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('charity_zone_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_pintrest_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('charity_zone_top_slider',array(
        'title' => esc_html__('Slider Settings','charity-zone'),
        'description' => esc_html__('Here you have to add 3 different pages in below dropdown. Note: Image Dimensions 1200 x 400 px','charity-zone')
    ));

    for ( $count = 1; $count <= 3; $count++ ) {

        $wp_customize->add_setting( 'charity_zone_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'charity_zone_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'charity_zone_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'charity-zone' ),
            'section'  => 'charity_zone_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Our Services section
    $wp_customize->add_section( 'charity_zone_services_section' , array(
        'title'      => __( 'Services Settings', 'charity-zone' ),
        'priority'   => null
    ) );

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('charity_zone_services',array(
        'default'   => 'select',
        'sanitize_callback' => 'charity_zone_sanitize_choices',
    ));
    $wp_customize->add_control('charity_zone_services',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Services','charity-zone'),
        'description' => __('Image Size (50 x 50)','charity-zone'),
        'section' => 'charity_zone_services_section',
    ));

    //About
    $wp_customize->add_section('charity_zone_about_section',array(
        'title' => esc_html__('About Settings','charity-zone'),
        'description' => esc_html__('Here you have to add 3 different pages in below dropdown. Note: Image Dimensions 1200 x 400 px','charity-zone')
    ));

    $wp_customize->add_setting( 'charity_zone_about_page', array(
        'default'           => '',
        'sanitize_callback' => 'charity_zone_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'charity_zone_about_page', array(
        'label'    => __( 'Select About Page', 'charity-zone' ),
        'section'  => 'charity_zone_about_section',
        'type'     => 'dropdown-pages'
    ) );
    
    // Footer
    $wp_customize->add_section('charity_zone_site_footer_section', array(
        'title' => esc_html__('Footer', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('charity_zone_footer_text_setting', array(
        'label' => __('Replace the footer text', 'charity-zone'),
        'section' => 'charity_zone_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'charity_zone_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function charity_zone_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function charity_zone_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function charity_zone_customize_preview_js(){
    wp_enqueue_script('charity-zone-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'charity_zone_customize_preview_js');