<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'sociable_topbar_section', array(
	'title'             => esc_html__( 'Header Meta','sociable' ),
	'description'       => esc_html__( 'Header Meta options.', 'sociable' ),
	'panel'             => 'sociable_front_page_panel',
) );

// top bar menu visible
$wp_customize->add_setting( 'sociable_theme_options[topbar_social_enable]',
	array(
		'default'       	=> $options['topbar_social_enable'],
		'sanitize_callback' => 'sociable_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[topbar_social_enable]',
    array(
		'label'      		=> esc_html__( 'Display Social Menu', 'sociable' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show topbar menu.', 'sociable' ), esc_html__( 'Click Here', 'sociable' ), esc_html__( 'to create menu', 'sociable' ) ),
		'section'    		=> 'sociable_topbar_section',
		'on_off_label' 		=> sociable_switch_options(),
    )
) );
