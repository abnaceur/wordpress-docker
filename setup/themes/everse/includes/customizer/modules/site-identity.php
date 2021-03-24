<?php
/**
 * Customizer Site Identity
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'title_tagline',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Site Logo', 'everse' ) . '</h3>',
) );

// Logo Image Upload
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'image',
	'settings'    => 'everse_settings_logo_dark',
	'label'       => esc_html__( 'Upload logo', 'everse' ),
	'section'     => 'title_tagline',
) );	

// Logo Retina Image Upload
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'image',
	'settings'    => 'everse_settings_logo_dark_retina',
	'label'       => esc_html__( 'Upload retina logo', 'everse' ),
	'description' => esc_html__( 'Logo 2x bigger size', 'everse' ),
	'section'     => 'title_tagline',
) );