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
/*Logo Options on theme*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'aeonmag_options[aeonmag_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'aeonmag' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 600px.', 'aeonmag'),
   'section'   => 'title_tagline',
   'settings'  => 'aeonmag_options[aeonmag_logo_width_option]',
   'type'      => 'range',
   'priority'  => 30,
   'input_attrs' => array(
          'min' => 100,
          'max' => 600,
        ),
) );

/*Logo Option*/
$wp_customize->add_setting('aeonmag_options[aeonmag-logo-position]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-logo-position'],
    'sanitize_callback' => 'aeonmag_sanitize_select'
));

$wp_customize->add_control('aeonmag_options[aeonmag-logo-position]', array(
    'choices' => array(
        'center-logo' => __('Center Logo', 'aeonmag'),
        'left-logo' => __('Left Logo', 'aeonmag'),
    ),
    'label' => __('Logo Position in Header', 'aeonmag'),
    'description' => __('Logo Position in the header, left or in center.', 'aeonmag'),
    'section' => 'title_tagline',
    'settings' => 'aeonmag_options[aeonmag-logo-position]',
    'type' => 'select',
    'priority' => 30,
));