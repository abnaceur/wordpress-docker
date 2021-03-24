<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_layout_register' ) ) :
function colon_customizer_layout_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'colon_layout_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Layout Settings', 'colon' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'colon_label_layout_settings_title', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_layout_settings_title', 
		array(
		    'label'       => esc_html__( 'Layout Content Width', 'colon' ),
		    'section'     => 'colon_layout_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_layout_settings_title',
		) 
	));

	//Layout options
    $wp_customize->add_setting( 
        'colon_layout_content_width_settings', 
        array(
            'default' => 1170,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_layout_content_width_settings', 
        array(
            'label' => esc_html__( 'Layout Content Width(px)','colon' ),
            'description' => esc_html__( 'Default is 1170','colon' ),
            'section' => 'colon_layout_settings',
            'input_attrs' => array(
                'min' => 650, 
                'max' => 1400,
                'step' => 1,
            ),
        )
    ));

    // Info label
    $wp_customize->add_setting( 
        'colon_layout_width_ratio_label', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Info_Control( $wp_customize, 'colon_layout_width_ratio_label', 
        array(
            'label'       => esc_html__( 'You might need to refresh the page to see the changes. Default is 1170', 'colon' ),
            'section'     => 'colon_layout_settings',
            'type'        => 'colon-info',
            'settings'    => 'colon_layout_width_ratio_label',
        ) 
    ));

    // Title label
    $wp_customize->add_setting( 
        'colon_label_page_full_width_settings_title', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Title_Info_Control( $wp_customize, 'colon_label_page_full_width_settings_title', 
        array(
            'label'       => esc_html__( 'Page Content Width', 'colon' ),
            'section'     => 'colon_layout_settings',
            'type'        => 'colon-title',
            'settings'    => 'colon_label_page_full_width_settings_title',
        ) 
    ));

    // set full width page content
    $wp_customize->add_setting( 
        'colon_enable_full_width_page_content', 
        array(
            'default'           => false,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'colon_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Toggle_Control( $wp_customize, 'colon_enable_full_width_page_content', 
        array(
            'label'       => esc_html__( 'Set Page Content to full width', 'colon' ),
            'section'     => 'colon_layout_settings',
            'type'        => 'colon-toggle',
            'settings'    => 'colon_enable_full_width_page_content',
        ) 
    ));

    // Info label
    $wp_customize->add_setting( 
        'colon_layout_full_width_page_info', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Info_Control( $wp_customize, 'colon_layout_full_width_page_info', 
        array(
            'label'       => esc_html__( 'This will make the content width to full width instead of default layout width. The header and footer width will not be affected. Use this for Gutenberg full width page', 'colon' ),
            'section'     => 'colon_layout_settings',
            'type'        => 'colon-info',
            'settings'    => 'colon_layout_full_width_page_info',
            'active_callback' => '',
        ) 
    ));

}
endif;

add_action( 'customize_register', 'colon_customizer_layout_register' );