<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

$wp_customize->add_section( 'sociable_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','sociable' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'sociable' ),
	'panel'             => 'sociable_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'sociable_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'sociable_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'sociable' ),
	'section'          	=> 'sociable_breadcrumb',
	'on_off_label' 		=> sociable_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'sociable_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'sociable_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'sociable' ),
	'active_callback' 	=> 'sociable_is_breadcrumb_enable',
	'section'          	=> 'sociable_breadcrumb',
) );
