<?php 
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
*/
/*Sticky Sidebar*/
$wp_customize->add_section( 'aeonmag_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'aeonmag' ),
   'panel' 		 => 'aeonmag_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag-enable-sticky-sidebar'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'aeonmag' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'aeonmag'),
    'section'   => 'aeonmag_sticky_sidebar',
    'settings'  => 'aeonmag_options[aeonmag-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );