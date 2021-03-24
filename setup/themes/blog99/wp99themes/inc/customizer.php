<?php
/**
 * blog99 Theme Customizer
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog99_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blog99_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blog99_customize_partial_blogdescription',
		) );
	}

	/** header image settings */
	$wp_customize->add_setting( 'blog99_header_image_background_repeat', array(
        'default'        => 'repeat',
        'theme_supports' => 'custom-background',
        'sanitize_callback' => 'blog99_sanitize_radio',
    ) );

    $wp_customize->add_control( 'blog99_header_image_background_repeat', array(
        'label'      => esc_html__( 'Background Repeat' , 'blog99'),
        'section'    => 'header_image',
        'type'       => 'radio',
        'choices'    => array(
            'no-repeat'  => esc_html__('No Repeat', 'blog99'),
            'repeat'     => esc_html__('Tile', 'blog99'),
            'repeat-x'   => esc_html__('Tile Horizontally', 'blog99'),
            'repeat-y'   => esc_html__('Tile Vertically', 'blog99'),
        ),
    ) );

    $wp_customize->add_setting( 'blog99_header_image_background_position_x', array(
        'default'        => 'left',
        'theme_supports' => 'custom-background',
        'sanitize_callback' => 'blog99_sanitize_radio',
    ) );

    $wp_customize->add_control( 'blog99_header_image_background_position_x', array(
        'label'      => esc_html__( 'Background Position' , 'blog99'),
        'section'    => 'header_image',
        'type'       => 'radio',
        'choices'    => array(
            'top'       => esc_html__('Top', 'blog99'),
            'left'       => esc_html__('Left', 'blog99'),
            'center'     => esc_html__('Center', 'blog99'),
            'right'      => esc_html__('Right', 'blog99'),
        ),
    ) );

    $wp_customize->add_setting( 'blog99_header_image_background_attachment', array(
        'default'        => 'fixed',
        'theme_supports' => 'custom-background',
        'sanitize_callback' => 'blog99_sanitize_radio',
    ) );

    $wp_customize->add_control( 'blog99_header_image_background_attachment', array(
        'label'      => esc_html__( 'Background Attachment' , 'blog99'),
        'section'    => 'header_image',
        'type'       => 'radio',
        'choices'    => array(
            'fixed'      => esc_html__('Fixed', 'blog99'),
            'scroll'     => esc_html__('Scroll', 'blog99'),
        ),
	) );
	
	$wp_customize->add_setting( 'blog99_header_image_background_size', array(
        'default'        => 'cover',
        'theme_supports' => 'custom-background',
        'sanitize_callback' => 'blog99_sanitize_radio',
    ) );

    $wp_customize->add_control( 'blog99_header_image_background_size', array(
        'label'      => esc_html__( 'Background Size' , 'blog99'),
        'section'    => 'header_image',
        'type'       => 'radio',
        'choices'    => array(
            'auto'      => esc_html__('Auto', 'blog99'),
            'contain'     => esc_html__('Contain', 'blog99'),
            'cover'     => esc_html__('Cover', 'blog99'),
            'inherit'     => esc_html__('Inherit', 'blog99'),
            'initial'     => esc_html__('Initial', 'blog99'),
            'unset'     => esc_html__('Unset', 'blog99'),
        ),
    ) );



}
add_action( 'customize_register', 'blog99_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog99_customize_partial_blogname() {

	bloginfo( 'name' );
}

//footer copyritht text
if( ! function_exists( 'blog99_banner_footer_copyright_callback' ) ) {
    /**
     * Display product tab
    */
    function blog99_banner_footer_copyright_callback(){
        
        return get_theme_mod( 'blog99_footer_copyright_text' );
    }
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog99_customize_partial_blogdescription() {
    
	bloginfo( 'description' );
}