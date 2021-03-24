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
/* Primary Color Section Inside Core Color Option */
$wp_customize->add_setting( 'aeonmag_options[aeonmag_primary_color]',
    array(
        'default'           => $default['aeonmag_primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'aeonmag_options[aeonmag_primary_color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'aeonmag' ),
            'description' => esc_html__( 'Change your whole site color from here. More are available in premium version.', 'aeonmag' ),
            'section'     => 'colors',  
        )
    )
);