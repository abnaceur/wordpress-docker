<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'sociable_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','sociable' ),
	'description'       => esc_html__( 'Archive section options.', 'sociable' ),
	'panel'             => 'sociable_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'sociable_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'sociable_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'sociable' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'sociable' ),
	'section'           => 'sociable_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'sociable_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'sociable_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'sociable' ),
	'section'           => 'sociable_archive_section',
	'on_off_label' 		=> sociable_hide_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'sociable_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'sociable' ),
	'section'           => 'sociable_archive_section',
	'on_off_label' 		=> sociable_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'sociable_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'sociable' ),
	'section'           => 'sociable_archive_section',
	'on_off_label' 		=> sociable_hide_options(),
) ) );

