<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'sociable_layout', array(
	'title'               => esc_html__('Layout','sociable'),
	'description'         => esc_html__( 'Layout section options.', 'sociable' ),
	'panel'               => 'sociable_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'sociable_theme_options[site_layout]', array(
	'sanitize_callback'   => 'sociable_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Sociable_Custom_Radio_Image_Control ( $wp_customize, 'sociable_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'sociable' ),
	'section'             => 'sociable_layout',
	'choices'			  => sociable_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'sociable_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'sociable_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Sociable_Custom_Radio_Image_Control ( $wp_customize, 'sociable_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'sociable' ),
	'section'             => 'sociable_layout',
	'choices'			  => sociable_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'sociable_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'sociable_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Sociable_Custom_Radio_Image_Control ( $wp_customize, 'sociable_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'sociable' ),
	'section'             => 'sociable_layout',
	'choices'			  => sociable_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'sociable_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'sociable_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Sociable_Custom_Radio_Image_Control( $wp_customize, 'sociable_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'sociable' ),
	'section'             => 'sociable_layout',
	'choices'			  => sociable_sidebar_position(),
) ) );