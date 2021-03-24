<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'sociable_reset_section', array(
	'title'             => esc_html__('Reset all settings','sociable'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'sociable' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'sociable_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'sociable_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'sociable_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'sociable' ),
	'section'           => 'sociable_reset_section',
	'type'              => 'checkbox',
) );
