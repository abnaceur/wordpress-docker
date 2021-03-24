<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'sociable_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','sociable' ),
	'description'       => esc_html__( 'Excerpt section options.', 'sociable' ),
	'panel'             => 'sociable_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'sociable_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'sociable_sanitize_number_range',
	'validate_callback' => 'sociable_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'sociable_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'sociable' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'sociable' ),
	'section'     		=> 'sociable_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

