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
/*Extra Options for Breadcrumb*/

$wp_customize->add_section( 'aeonmag_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'aeonmag' ),
    'panel'          => 'aeonmag_panel',
) );

/*Breadcrumb Enable from plugins*/
$wp_customize->add_setting('aeonmag_options[aeonmag-extra-breadcrumb]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-extra-breadcrumb'],
    'sanitize_callback' => 'aeonmag_sanitize_select'
));

$wp_customize->add_control('aeonmag_options[aeonmag-extra-breadcrumb]', array(
    'choices' => array(
        'yoast' => __('Yoast Breadcrumb', 'aeonmag'),
        'rankmath' => __('Rank Math Breadcrumb', 'aeonmag'),
        'no-breadcrumb' => __('Hide Breadcrumb', 'aeonmag'),
    ),
    'label' => __('Select Breadcrumb', 'aeonmag'),
    'description' => __('Breadcrumb will appear on all pages except home page. You need Yoast SEO or Rank Math plugin installed for it.', 'aeonmag'),
    'section' => 'aeonmag_extra_options',
    'settings' => 'aeonmag_options[aeonmag-extra-breadcrumb]',
    'type' => 'select',
    'priority' => 15,
));