<?php
/**
 *  Grip Blog Page Option
 *
 * @since Grip 1.0.0
 *
 */
/* About Theme Section */
$wp_customize->add_section( 'grip_about_theme_section', array(
	'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'About Grip', 'grip' ),
	'panel' 		 => 'grip_panel',
) );
$wp_customize->add_setting( 'upgrade_text', array(
	'default' => '',
	'sanitize_callback' => '__return_false'
) );

$wp_customize->add_control( new Grip_Customize_Static_Text_Control( $wp_customize, 'upgrade_text', array(
	'section'     => 'grip_about_theme_section',
	'description' => array('')
) ) );

/**
 * Load customizer custom-controls
 */
require get_template_directory() . '/candidthemes/customizer-pro/customize-controls.php';	