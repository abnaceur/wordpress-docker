<?php
/**
 * Clients Section options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add Clients section
$wp_customize->add_section( 'sociable_clients_section', array(
	'title'             => esc_html__( 'Clients','sociable' ),
	'description'       => esc_html__( 'Clients Section options.', 'sociable' ),
	'panel'             => 'sociable_front_page_panel',
) );

// Clients content enable control and setting
$wp_customize->add_setting( 'sociable_theme_options[clients_section_enable]', array(
	'default'			=> 	$options['clients_section_enable'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[clients_section_enable]', array(
	'label'             => esc_html__( 'Clients Section Enable', 'sociable' ),
	'section'           => 'sociable_clients_section',
	'on_off_label' 		=> sociable_switch_options(),
) ) );

for ( $i = 1; $i <= 5; $i++ ) :
	// clients pages drop down chooser control and setting
	$wp_customize->add_setting( 'sociable_theme_options[clients_content_page_' . $i . ']', array(
		'sanitize_callback' => 'sociable_sanitize_page',
	) );

	$wp_customize->add_control( new Sociable_Dropdown_Chooser( $wp_customize, 'sociable_theme_options[clients_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'sociable' ), $i ),
		'section'           => 'sociable_clients_section',
		'choices'			=> sociable_page_choices(),
		'active_callback'	=> 'sociable_is_clients_section_enable',
	) ) );

endfor;
