<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'sociable_blog_section', array(
	'title'             => esc_html__( 'Blog','sociable' ),
	'description'       => esc_html__( 'Blog Section options.', 'sociable' ),
	'panel'             => 'sociable_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'sociable_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'sociable' ),
	'section'           => 'sociable_blog_section',
	'on_off_label' 		=> sociable_switch_options(),
) ) );

$wp_customize->add_setting( 'sociable_theme_options[blog_icon]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_icon'],
) );

$wp_customize->add_control( new Sociable_Icon_Picker( $wp_customize, 'sociable_theme_options[blog_icon]', array(
	'label'             => esc_html__( 'Select Icon', 'sociable' ),
	'section'           => 'sociable_blog_section',
	'active_callback'	=> 'sociable_is_blog_section_enable',
) ) );

// blog title setting and control
$wp_customize->add_setting( 'sociable_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'sociable_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'sociable' ),
	'section'        	=> 'sociable_blog_section',
	'active_callback' 	=> 'sociable_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'sociable_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'sociable_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'sociable_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'sociable_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'sociable_sanitize_select',
) );

$wp_customize->add_control( 'sociable_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'sociable' ),
	'section'           => 'sociable_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'sociable_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'sociable' ),
		'recent' 	=> esc_html__( 'Recent', 'sociable' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'sociable_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'sociable_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Sociable_Dropdown_Taxonomies_Control( $wp_customize,'sociable_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'sociable' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'sociable' ),
	'section'           => 'sociable_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'sociable_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'sociable_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'sociable_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Sociable_Dropdown_Category_Control( $wp_customize,'sociable_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'sociable' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press CTRL key select multilple categories.', 'sociable' ),
	'section'           => 'sociable_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'sociable_is_blog_section_content_recent_enable'
) ) );
