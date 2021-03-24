<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_fonts_register' ) ) :
function colon_customizer_fonts_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'colon_fonts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Fonts Settings', 'colon' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'colon_label_fonts_settings_title', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_fonts_settings_title', 
		array(
		    'label'       => esc_html__( 'Google Fonts', 'colon' ),
		    'section'     => 'colon_fonts_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_fonts_settings_title',
		) 
	));

	// Add an option to enable the Poppins font
	$wp_customize->add_setting( 
		'colon_enable_poppings_font', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_poppings_font', 
		array(
		    'label'       => esc_html__( 'Enable Poppins Font', 'colon' ),
		    'section'     => 'colon_fonts_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_poppings_font',
		) 
	));

}
endif;

add_action( 'customize_register', 'colon_customizer_fonts_register' );