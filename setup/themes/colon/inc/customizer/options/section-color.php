<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_color_register' ) ) :
function colon_customizer_color_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'colon_color_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Color Settings', 'colon' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'colon_label_color_settings_title', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_color_settings_title', 
		array(
		    'label'       => esc_html__( 'Colors', 'colon' ),
		    'section'     => 'colon_color_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_color_settings_title',
		) 
	));

	// Primary color
    $wp_customize->add_setting(
        'colon_site_primary_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ed516c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_site_primary_color',
	        array(
	        	'label'      => esc_html__( 'Primary Color', 'colon' ),
	        	'section'    => 'colon_color_settings',
	        	'settings'   => 'colon_site_primary_color',
	        )
	    )
    );

    // Secondary color
    $wp_customize->add_setting(
        'colon_site_secondary_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ca2e49',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_site_secondary_color',
	        array(
	        	'label'      => esc_html__( 'Secondary Color', 'colon' ),
	        	'section'    => 'colon_color_settings',
	        	'settings'   => 'colon_site_secondary_color',
	        )
	    )
    );

}
endif;

add_action( 'customize_register', 'colon_customizer_color_register' );