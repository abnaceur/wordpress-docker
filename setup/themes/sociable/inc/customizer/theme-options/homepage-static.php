<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Sociable
* @since Sociable 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'sociable_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'sociable_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'sociable_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'sociable' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'sociable' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );