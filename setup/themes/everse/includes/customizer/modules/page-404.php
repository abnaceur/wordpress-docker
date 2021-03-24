<?php
/**
 * Customizer Page 404
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page 404 Image
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'image',
	'settings'    => 'everse_settings_page_404_image',
	'label'       => esc_attr__( 'Page 404 image', 'everse' ),
	'section'     => 'everse_settings_page_404',
	'default'     => EVERSE_URI . '/assets/img/404/everse_404-min.png'
) );

// Title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'text',
	'settings'    => 'everse_settings_page_404_title',
	'label'       => esc_attr__( 'Page 404 title', 'everse' ),
	'section'     => 'everse_settings_page_404',
	'default'     => esc_html__( 'Page Not Found', 'everse' ),
) );

// Description text
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'text',
	'settings'    => 'everse_settings_page_404_description',
	'label'       => esc_attr__( 'Page 404 description text', 'everse' ),
	'section'     => 'everse_settings_page_404',
	'default'     => esc_html__( 'Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'everse' ),
) );

// Button text
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'text',
	'settings'    => 'everse_settings_page_404_button_text',
	'label'       => esc_attr__( 'Page 404 button text', 'everse' ),
	'section'     => 'everse_settings_page_404',
	'default'     => esc_html__( 'Take Me Back Home', 'everse' ),
) );