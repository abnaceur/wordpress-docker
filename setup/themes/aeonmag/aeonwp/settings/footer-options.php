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
/*Footer Options*/
$wp_customize->add_section('aeonmag_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'aeonmag'),
    'panel' => 'aeonmag_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('aeonmag_options[aeonmag-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aeonmag_options[aeonmag-footer-copyright]', array(
    'label' => __('Copyright Text', 'aeonmag'),
    'description' => __('Enter your own copyright text.', 'aeonmag'),
    'section' => 'aeonmag_footer_section',
    'settings' => 'aeonmag_options[aeonmag-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));
