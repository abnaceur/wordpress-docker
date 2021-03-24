<?php
/**
 * Customizer General
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Preloader
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_preloader_show',
	'label'       => esc_html__( 'Enable/Disable theme preloader', 'everse' ),
	'section'     => 'everse_settings_preloader',
	'default'     => false,
) );

// Back to top
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_back_to_top_show',
	'label'       => esc_html__( 'Back to top arrow', 'everse' ),
	'section'     => 'everse_settings_back_to_top',
	'default'     => true,
) );


/* Form Elements
/*-------------------------------------------------------*/

Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'everse_settings_general_form_elements',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Buttons', 'everse' ) . '</h3>',
) );

// Buttons padding
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'everse_settings_buttons_padding',
	'label'       => esc_attr__( 'Padding', 'everse' ),
	'section'     => 'everse_settings_general_form_elements',
	'default'     => array(
		'padding-top'    => '17px',
		'padding-right'  => '24px',
		'padding-bottom' => '17px',
		'padding-left' 	 => '24px',
	),
	'output' => array(
		array(
			'element'  => 'input[type="button"],
			input[type="reset"],
			input[type="submit"],
			button,
			.btn--lg,
			.button,
			.wp-block-button .wp-block-button__link',
		),
		array(
			'element'  => isset( $selectors['shop_buttons_background_color'] ) ? $selectors['shop_buttons_background_color'] : null,
		),
	),
	'transport' => 'auto',
) );

// Buttons border radius
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_buttons_border_radius',
	'label'       => esc_attr__( 'Border radius', 'everse' ),
	'section'     => 'everse_settings_general_form_elements',
	'default'     => 3,
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'   => $selectors['buttons'],
			'property'  => 'border-radius',
			'units'     => 'px',
		),
		array(
			'element'  => isset( $selectors['shop_buttons_background_color'] ) ? $selectors['shop_buttons_background_color'] : null,
			'property' => 'border-radius',
			'units'    => 'px',
		),		
	),
	'transport' => 'auto',
) );


// Buttons shadow
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_buttons_shadow',
	'label'       => esc_attr__( 'Buttons shadow', 'everse' ),
	'section'     => 'everse_settings_general_form_elements',
	'default'			=> false,
) );


// Buttons shadow color
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'color',
	'settings'    => 'everse_settings_buttons_shadow_color',
	'label'       => esc_html__( 'Buttons shadow color', 'everse' ),
	'section'     => 'everse_settings_general_form_elements',
	'choices'     => array(
		'alpha' => true,
	),
	'default' => 'rgba(59.999999999999936, 45.999999999999986, 116, 0.2)',
	'output' => array(
		array(
			'element'   		=> $selectors['buttons'],
			'property'    	=> 'box-shadow',
			'value_pattern' => '0px 3px 10px 0px $',
		),
		array(
			'element'  => isset( $selectors['shop_buttons_background_color'] ) ? $selectors['shop_buttons_background_color'] : null,
			'property' => 'box-shadow',
			'value_pattern' => '0px 3px 10px 0px $',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_buttons_shadow',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );