<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_misc_register' ) ) :
function colon_customizer_misc_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'colon_misc_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Misc Settings', 'colon' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'colon_label_misc_minify_styles_scripts_settings', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_misc_minify_styles_scripts_settings', 
		array(
		    'label'       => esc_html__( 'Minify Styles and Scripts', 'colon' ),
		    'section'     => 'colon_misc_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_misc_minify_styles_scripts_settings',
		) 
	));

	// Add an option to enable the minification of styles & scripts
	$wp_customize->add_setting( 
		'colon_enable_minify_styles_scripts', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_minify_styles_scripts', 
		array(
		    'label'       => esc_html__( 'Minify Styles and Scripts', 'colon' ),
		    'section'     => 'colon_misc_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_minify_styles_scripts',
		) 
	));

    // Title label
	$wp_customize->add_setting( 
		'colon_label_misc_ts_settings', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_misc_ts_settings', 
		array(
		    'label'       => esc_html__( 'Theme Support', 'colon' ),
		    'section'     => 'colon_misc_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_misc_ts_settings',
		) 
	));

	// Add an option to enable the block styles
	$wp_customize->add_setting( 
		'colon_enable_block_styles', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_block_styles', 
		array(
		    'label'       => esc_html__( 'Enable Block Styles', 'colon' ),
		    'section'     => 'colon_misc_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_block_styles',
		) 
	));

	// Add an option to enable the wide alignment
	$wp_customize->add_setting( 
		'colon_enable_block_wide_alignment', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_block_wide_alignment', 
		array(
		    'label'       => esc_html__( 'Enable Block Wide alignment', 'colon' ),
		    'section'     => 'colon_misc_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_block_wide_alignment',
		) 
	));

}
endif;

add_action( 'customize_register', 'colon_customizer_misc_register' );