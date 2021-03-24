<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_footer_register' ) ) :
function colon_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'colon_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'colon' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'colon_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Copyrights', 'colon' ),
		    'section'     => 'colon_footer_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'colon_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'colon_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'colon_footer_copyright_text',
        array(
            'settings'      => 'colon_footer_copyright_text',
            'section'       => 'colon_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'colon' ),
            'description'   => esc_html__( 'Copyright text to be displayed in the footer. No HTML allowed.', 'colon' )
        )
    ); 

    // Add an option to center the text
    $wp_customize->add_setting( 
        'colon_enable_center_copyrights_text', 
        array(
            'default'           => true,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'colon_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Toggle_Control( $wp_customize, 'colon_enable_center_copyrights_text', 
        array(
            'label'       => esc_html__( 'Center Align Copyright Text', 'colon' ),
            'section'     => 'colon_footer_settings',
            'type'        => 'colon-toggle',
            'settings'    => 'colon_enable_center_copyrights_text',
        ) 
    ));

    // Title label
    $wp_customize->add_setting( 
        'colon_label_footer_columns_title', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Title_Info_Control( $wp_customize, 'colon_label_footer_columns_title', 
        array(
            'label'       => esc_html__( 'Footer Columns', 'colon' ),
            'section'     => 'colon_footer_settings',
            'type'        => 'colon-title',
            'settings'    => 'colon_label_footer_columns_title',
        ) 
    ));

    // select footer columns
    $wp_customize->add_setting( 
        'colon_footer_widgets', 
        array(
            'default'           => '4',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'colon_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Text_Radio_Control( $wp_customize, 'colon_footer_widgets', 
        array(
            'label'       => esc_html__( 'Choose Footer Columns', 'colon' ),
            'section'     => 'colon_footer_settings',
            'type'        => 'colon-text-radio',
            'settings'    => 'colon_footer_widgets',
            'choices' => array(
                '1' => esc_html__( '1 Column','colon' ), 
                '2' => esc_html__( '2 Columns','colon' ),
                '3' => esc_html__( '3 Columns','colon' ),
                '4' => esc_html__( '4 Columns','colon' ),
            ),
        )
    ));

    // Title label
    $wp_customize->add_setting( 
        'colon_label_footer_color_settings', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Title_Info_Control( $wp_customize, 'colon_label_footer_color_settings', 
        array(
            'label'       => esc_html__( 'Footer Color Settings', 'colon' ),
            'section'     => 'colon_footer_settings',
            'type'        => 'colon-title',
            'settings'    => 'colon_label_footer_color_settings',
        ) 
    ));      

    // Footer background color
    $wp_customize->add_setting(
        'colon_footer_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'colon_footer_bg_color',
        array(
        'label'      => esc_html__( 'Footer Background Color', 'colon' ),
        'section'    => 'colon_footer_settings',
        'settings'   => 'colon_footer_bg_color',
        ) )
    );    
   

    // Footer Content Color
    $wp_customize->add_setting(
        'colon_footer_content_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'colon_footer_content_color',
        array(
        'label'      => esc_html__( 'Footer Content Color', 'colon' ),
        'section'    => 'colon_footer_settings',
        'settings'   => 'colon_footer_content_color',
        ) )
    );  

    // Footer links Color
    $wp_customize->add_setting(
        'colon_footer_links_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#b3b3b3',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'colon_footer_links_color',
        array(
        'label'      => esc_html__( 'Footer Links Color', 'colon' ),
        'section'    => 'colon_footer_settings',
        'settings'   => 'colon_footer_links_color',
        ) )
    );

    // Title label
    $wp_customize->add_setting( 
        'colon_label_footer_spacing_settings', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Title_Info_Control( $wp_customize, 'colon_label_footer_spacing_settings', 
        array(
            'label'       => esc_html__( 'Footer Spacing', 'colon' ),
            'section'     => 'colon_footer_settings',
            'type'        => 'colon-title',
            'settings'    => 'colon_label_footer_spacing_settings',
        ) 
    ));

    //Content spacing
    $wp_customize->add_setting( 
        'colon_footer_content_spacing', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_footer_content_spacing', 
        array(
            'label' => esc_html__( 'Content Spacing from top(px)','colon' ),
            'description' => esc_html__( 'Default is 70','colon' ),
            'section' => 'colon_footer_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 200,
                'step' => 1,
            ),
        )
    ));

    //Footer spacing
    $wp_customize->add_setting( 
        'colon_footer_spacing', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_footer_spacing', 
        array(
            'label' => esc_html__( 'Section Spacing from top(px)','colon' ),
            'description' => esc_html__( 'Default is 70','colon' ),
            'section' => 'colon_footer_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 200,
                'step' => 1,
            ),
        )
    ));

}
endif;

add_action( 'customize_register', 'colon_customizer_footer_register' );