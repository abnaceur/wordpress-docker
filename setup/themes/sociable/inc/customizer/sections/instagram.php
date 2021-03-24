<?php
/**
 * Instagram Section options
 *
 * @package Theme Palace
 * @subpackage Sociable Pro
 * @since Sociable Pro 1.0.0
 */

if ( !class_exists('SbiWidget') ) {
    return;
}


// Add Instagram section
$wp_customize->add_section( 'sociable_instagram_section', array(
	'title'             => esc_html__( 'Instagram','sociable' ),
	'description'       => sprintf( sociable_santize_allow_tag('Instagram Section options. <a href="%1$s">click here </a> to link instagram account', 'sociable'), admin_url( $path = '?page=sb-instagram-feed', $scheme = 'admin' ) ),
	'panel'             => 'sociable_front_page_panel',
) );

// Instagram content enable control and setting
$wp_customize->add_setting( 'sociable_theme_options[instagram_section_enable]', array(
	'default'			=> 	$options['instagram_section_enable'],
	'sanitize_callback' => 'sociable_sanitize_switch_control',
) );

$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[instagram_section_enable]', array(
	'label'             => esc_html__( 'Instagram Section Enable', 'sociable' ),
	'section'           => 'sociable_instagram_section',
	'on_off_label' 		=> sociable_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'sociable_theme_options[instagram_section_enable]', array(
		'selector'            => '#instagram-section .wrapper',
		'settings'            => 'sociable_theme_options[instagram_section_enable]',
    ) );
}


// Instagram title setting and control
$wp_customize->add_setting( 'sociable_theme_options[instagram_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['instagram_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'sociable_theme_options[instagram_title]', array(
	'label'           	=> esc_html__( 'Instagram Title', 'sociable' ),
	'section'        	=> 'sociable_instagram_section',
	'active_callback' 	=> 'sociable_is_instagram_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'sociable_theme_options[instagram_title]', array(
		'selector'            => '#instagram-section .section-header h2.section-title',
		'settings'            => 'sociable_theme_options[instagram_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'sociable_instagram_title_partial',
    ) );
}

// Instagram description setting and control
$wp_customize->add_setting( 'sociable_theme_options[instagram_description]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['instagram_description'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'sociable_theme_options[instagram_description]', array(
	'label'           	=> esc_html__( 'Instagram Description', 'sociable' ),
	'section'        	=> 'sociable_instagram_section',
	'active_callback' 	=> 'sociable_is_instagram_section_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'sociable_theme_options[instagram_description]', array(
		'selector'            => '#instagram-section .section-subtitle p',
		'settings'            => 'sociable_theme_options[instagram_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'sociable_instagram_description_partial',
    ) );
}

