<?php
/**
* Recommended plugins options
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_recomm_plugin_options($wp_customize) {

    // Customizer Section: Recommended Plugins
    $wp_customize->add_section( 'gridme_section_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'gridme' ), 'panel' => 'gridme_main_options_panel', 'priority' => 620 ));

    $wp_customize->add_setting( 'gridme_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'install_plugins', 'sanitize_callback' => '__return_false' ) );

    $wp_customize->add_control( new GridMe_Customize_Recommended_Plugins( $wp_customize, 'gridme_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'gridme' ), 'section' => 'gridme_section_recommended_plugins', 'settings' => 'gridme_options[recommended_plugins]', 'type' => 'themesdna-recommended-wpplugins', 'capability' => 'install_plugins' ) ) );

}