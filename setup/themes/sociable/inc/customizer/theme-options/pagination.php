<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'sociable_pagination', array(
	'title'               => esc_html__('Pagination','sociable'),
	'description'         => esc_html__( 'Pagination section options.', 'sociable' ),
	'panel'               => 'sociable_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'sociable_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'sociable_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'sociable' ),
	'section'             => 'sociable_pagination',
	'on_off_label' 		=> sociable_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'sociable_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'sociable_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'sociable_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'sociable' ),
	'section'             => 'sociable_pagination',
	'type'                => 'select',
	'choices'			  => sociable_pagination_options(),
	'active_callback'	  => 'sociable_is_pagination_enable',
) );
