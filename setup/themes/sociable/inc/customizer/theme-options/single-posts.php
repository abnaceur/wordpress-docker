<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'sociable_single_post_section', array(
	'title'             => esc_html__( 'Single Post','sociable' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'sociable' ),
	'panel'             => 'sociable_theme_options_panel',
) );

// single date meta setting and control.
$wp_customize->add_setting( 'sociable_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'sociable' ),
	'section'           => 'sociable_single_post_section',
	'on_off_label' 		=> sociable_hide_options(),
) ) );

// single author category setting and control.
$wp_customize->add_setting( 'sociable_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'sociable' ),
	'section'           => 'sociable_single_post_section',
	'on_off_label' 		=> sociable_hide_options(),
) ) );

// single tag category setting and control.
$wp_customize->add_setting( 'sociable_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'sociable' ),
	'section'           => 'sociable_single_post_section',
	'on_off_label' 		=> sociable_hide_options(),
) ) );

// single author setting and control.
$wp_customize->add_setting( 'sociable_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'sociable' ),
	'section'           => 'sociable_single_post_section',
	'on_off_label' 		=> sociable_hide_options(),
) ) );