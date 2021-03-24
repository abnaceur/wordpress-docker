<?php
/**
* Header options
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_header_options($wp_customize) {

    // Header
    $wp_customize->add_section( 'sc_blogwp_header', array( 'title' => esc_html__( 'Header Options', 'blogwp' ), 'panel' => 'blogwp_main_options_panel', 'priority' => 240 ) );

    $wp_customize->add_setting( 'blogwp_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'blogwp_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'blogwp' ), 'section' => 'sc_blogwp_header', 'settings' => 'blogwp_options[hide_header_content]', 'type' => 'checkbox', ) );

}