<?php

/**
 * Customizer Footer
 *
 * @package Everse
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Show footer
Kirki::add_field( 'everse_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'everse_settings_footer_show',
    'label'    => esc_attr__( 'Show default footer', 'everse' ),
    'section'  => 'everse_settings_footer',
    'default'  => true,
) );
// Show footer widgets
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'toggle',
    'settings'        => 'everse_settings_footer_widgets_show',
    'label'           => esc_attr__( 'Show footer widgets', 'everse' ),
    'section'         => 'everse_settings_footer',
    'default'         => true,
    'active_callback' => array( array(
    'setting'  => 'everse_settings_footer_show',
    'operator' => '==',
    'value'    => true,
) ),
) );
// Show footer bottom menu
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'toggle',
    'settings'        => 'everse_settings_footer_bottom_menu_show',
    'label'           => esc_attr__( 'Show bottom footer menu', 'everse' ),
    'section'         => 'everse_settings_footer',
    'default'         => true,
    'active_callback' => array( array(
    'setting'  => 'everse_settings_footer_show',
    'operator' => '==',
    'value'    => true,
) ),
) );
// Bottom footer text
Kirki::add_field( 'everse_settings_config', array(
    'type'              => 'textarea',
    'settings'          => 'everse_settings_footer_bottom_text',
    'section'           => 'everse_settings_footer',
    'label'             => esc_html__( 'Bottom footer text', 'everse' ),
    'description'       => esc_html__( 'Allowed HTML: a, img, span, i, em, strong', 'everse' ),
    'sanitize_callback' => 'wp_kses_post',
    'default'           => esc_html__( 'Copyright &copy; [current_year]. All Rights Reserved.', 'everse' ),
    'active_callback'   => array( array(
    'setting'  => 'everse_settings_footer_show',
    'operator' => '==',
    'value'    => true,
) ),
) );
everse_pro_customizer_options( 'everse_settings_footer', $uniqid );