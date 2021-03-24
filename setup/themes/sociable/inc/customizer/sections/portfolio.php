<?php
/**
 * Portfolio Section options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add Portfolio section
$wp_customize->add_section( 'sociable_portfolio_section', array(
	'title'             => esc_html__( 'Main Portfolio','sociable' ),
	'description'       => esc_html__( 'Portfolio Section options.', 'sociable' ),
	'panel'             => 'sociable_front_page_panel',
) );

// Portfolio content enable control and setting
$wp_customize->add_setting( 'sociable_theme_options[portfolio_section_enable]', array(
	'default'			=> 	$options['portfolio_section_enable'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[portfolio_section_enable]', array(
	'label'             => esc_html__( 'Portfolio Section Enable', 'sociable' ),
	'section'           => 'sociable_portfolio_section',
	'on_off_label' 		=> sociable_switch_options(),
) ) );

$wp_customize->add_setting( 'sociable_theme_options[portfolio_icon]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['portfolio_icon'],
) );

$wp_customize->add_control( new Sociable_Icon_Picker( $wp_customize, 'sociable_theme_options[portfolio_icon]', array(
	'label'             => esc_html__( 'Select Icon', 'sociable' ),
	'section'           => 'sociable_portfolio_section',
	'active_callback'	=> 'sociable_is_portfolio_section_enable',
) ) );

// Portfolio title setting and control
$wp_customize->add_setting( 'sociable_theme_options[portfolio_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['portfolio_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'sociable_theme_options[portfolio_title]', array(
	'label'           	=> esc_html__( 'Portfolio Title', 'sociable' ),
	'section'        	=> 'sociable_portfolio_section',
	'active_callback' 	=> 'sociable_is_portfolio_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'sociable_theme_options[portfolio_title]', array(
		'selector'            => '#our-projects .section-header h2.section-title',
		'settings'            => 'sociable_theme_options[portfolio_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'sociable_portfolio_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'sociable_theme_options[portfolio_content_category]', array(
	'sanitize_callback' => 'sociable_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Sociable_Dropdown_Category_Control( $wp_customize,'sociable_theme_options[portfolio_content_category]', array(
	'label'             => esc_html__( 'Select Categories', 'sociable' ),
	'description'      	=> esc_html__( 'Note: Press CTRL and select multiple categories.', 'sociable' ),
	'section'           => 'sociable_portfolio_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'sociable_is_portfolio_section_enable'
) ) );
