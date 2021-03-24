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
$GLOBALS['aeonmag_theme_options'] = aeonmag_get_options_value();

/*Promo Section Options*/

$wp_customize->add_section( 'aeonmag_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Highlights News Section', 'aeonmag' ),
    'panel'          => 'aeonmag_front_page',
) );

/*callback functions slider*/
if ( !function_exists('aeonmag_promo_active_callback') ) :
    function aeonmag_promo_active_callback(){
        global $aeonmag_theme_options;
        $enable_promo = absint($aeonmag_theme_options['aeonmag_enable_promo'])? absint($aeonmag_theme_options['aeonmag_enable_promo']): 0;
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Highlights Enable Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_promo'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_promo]', array(
    'label'     => __( 'Enable Highlights', 'aeonmag' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'aeonmag'),
    'section'   => 'aeonmag_promo_section',
    'settings'  => 'aeonmag_options[aeonmag_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Title of Highlights*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_highlights_title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_highlights_title'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_highlights_title]', array(
    'label'     => __( 'Title of Highlights', 'aeonmag' ),
    'description' => __('Enter the suitable title for the highlights.', 'aeonmag'),
    'section'   => 'aeonmag_promo_section',
    'settings'  => 'aeonmag_options[aeonmag_highlights_title]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'aeonmag_promo_active_callback'

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new AeonMag_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aeonmag_options[aeonmag-promo-select-category]',
        array(
            'label'     => __( 'Category For Highlights', 'aeonmag' ),
            'description' => __('From the dropdown select the category for the Highlights. Category having post will display in Highlights section.', 'aeonmag'),
            'section'   => 'aeonmag_promo_section',
            'settings'  => 'aeonmag_options[aeonmag-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'aeonmag_promo_active_callback'
        )
    )
);