<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_forms_register' ) ) :
function colon_customizer_forms_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'colon_forms_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Forms Settings', 'colon' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'colon_label_forms_button_styles', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_forms_button_styles', 
		array(
		    'label'       => esc_html__( 'Button Styles', 'colon' ),
		    'section'     => 'colon_forms_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_forms_button_styles',
		) 
	));

	//choose button type
	$wp_customize->add_setting( 
        'colon_choose_forms_button_styles', 
        array(
            'default'           => 'square',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'colon_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Text_Radio_Control( $wp_customize, 'colon_choose_forms_button_styles', 
        array(
            'label'       => esc_html__( 'Choose Button Type', 'colon' ),
            'section'     => 'colon_forms_settings',
            'type'        => 'colon-text-radio',
            'settings'    => 'colon_choose_forms_button_styles',
            'choices' => array(
            	'square' => esc_html__( 'Square','colon' ),
                'round' => esc_html__( 'Rounded','colon' ),
            ),
        )
    ));

}
endif;

add_action( 'customize_register', 'colon_customizer_forms_register' );