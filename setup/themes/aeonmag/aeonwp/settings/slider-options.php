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
/*Slider Options*/
$wp_customize->add_section( 'aeonmag_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Featured Slider Settings', 'aeonmag' ),
   'panel' 		 => 'aeonmag_front_page',
) );

/*callback functions slider*/
if ( !function_exists('aeonmag_slider_active_callback') ) :
  function aeonmag_slider_active_callback(){
      global $aeonmag_theme_options;
      $enable_slider = absint($aeonmag_theme_options['aeonmag_enable_slider'])? absint($aeonmag_theme_options['aeonmag_enable_slider']): 0;
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['aeonmag_enable_slider'],
   'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control(
    'aeonmag_options[aeonmag_enable_slider]', 
    array(
       'label'     => __( 'Enable Featured Section', 'aeonmag' ),
       'description' => __('You can select the category for the slider and other settings below. More Options are available on premium version.', 'aeonmag'),
       'section'   => 'aeonmag_slider_section',
       'settings'  => 'aeonmag_options[aeonmag_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );        

/*Slider Category Selection*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new AeonMag_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aeonmag_options[aeonmag-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'aeonmag' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'aeonmag'),
            'section'   => 'aeonmag_slider_section',
            'settings'  => 'aeonmag_options[aeonmag-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'aeonmag_slider_active_callback',
        )
    )

);

/*Slider Right Category Selection*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-select-category-slider-right]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag-select-category-slider-right'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new AeonMag_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aeonmag_options[aeonmag-select-category-slider-right]',
        array(
            'label'     => __( 'Select Category For Slider Right', 'aeonmag' ),
            'description' => __('The foru post of same category will be displayed right to the slider. More options are in premium version.', 'aeonmag'),
            'section'   => 'aeonmag_slider_section',
            'settings'  => 'aeonmag_options[aeonmag-select-category-slider-right]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'aeonmag_slider_active_callback',
        )
    )

);