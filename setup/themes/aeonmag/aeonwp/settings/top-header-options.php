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
/*Top Header Options*/
$wp_customize->add_section( 'aeonmag_top_header_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header', 'aeonmag' ),
   'panel' 		 => 'aeonmag_panel',
) );

/*callback functions header section*/
if ( !function_exists('aeonmag_header_active_callback') ) :
  function aeonmag_header_active_callback(){
      global $aeonmag_theme_options;
      $enable_header = absint($aeonmag_theme_options['aeonmag_enable_top_header'])? absint($aeonmag_theme_options['aeonmag_enable_top_header']) : 0;
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Top Header Section*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_top_header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['aeonmag_enable_top_header'],
   'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_top_header]', array(
   'label'     => __( 'Enable Top Header', 'aeonmag' ),
   'description' => __('Checked to show the top header section like search and social icons', 'aeonmag'),
   'section'   => 'aeonmag_top_header_section',
   'settings'  => 'aeonmag_options[aeonmag_enable_top_header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_top_header_social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['aeonmag_enable_top_header_social'],
   'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_top_header_social]', array(
   'label'     => __( 'Enable Social Icons', 'aeonmag' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'aeonmag'),
   'section'   => 'aeonmag_top_header_section',
   'settings'  => 'aeonmag_options[aeonmag_enable_top_header_social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'aeonmag_header_active_callback'
) );

/*Enable date in top Header*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_top_date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_top_date'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_top_date]', array(
    'label'     => __( 'Date in Header', 'aeonmag' ),
    'description' => __('Top Header date will display here.', 'aeonmag'),
    'section'   => 'aeonmag_top_header_section',
    'settings'  => 'aeonmag_options[aeonmag_enable_top_date]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'aeonmag_header_active_callback'
) );

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_header_image_overlay]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['aeonmag_enable_header_image_overlay'],
   'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control(
    'aeonmag_options[aeonmag_enable_header_image_overlay]', 
    array(
       'label'     => __( 'Enable Header Image Overlay Color Height', 'aeonmag' ),
       'description' => __('This option will add colors over the header image.', 'aeonmag'),
       'section'   => 'header_image',
       'settings'  => 'aeonmag_options[aeonmag_enable_header_image_overlay]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

/*callback functions slider getting from post*/
if ( !function_exists('aeonmag_header_overlay_color_active_callback') ) :
  function aeonmag_header_overlay_color_active_callback(){
      global $aeonmag_theme_options;
      $slider_overlay = absint($aeonmag_theme_options['aeonmag_enable_header_image_overlay']) ? absint($aeonmag_theme_options['aeonmag_enable_header_image_overlay']): 0;
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_header_image_height]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'aeonmag_options[aeonmag_header_image_height]', array(
   'label'     => __( 'Header Image Min Height', 'aeonmag' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'aeonmag'),
   'section'   => 'header_image',
   'settings'  => 'aeonmag_options[aeonmag_header_image_height]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'aeonmag_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'aeonmag_options[aeonmag_slider_overlay_color]',
    array(
        'default'           => $default['aeonmag_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'aeonmag_options[aeonmag_slider_overlay_color]',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'aeonmag' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'aeonmag' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'aeonmag_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_slider_overlay_transparent]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_slider_overlay_transparent'],
    'sanitize_callback' => 'aeonmag_sanitize_number'
) );
$wp_customize->add_control( 'aeonmag_options[aeonmag_slider_overlay_transparent]', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'aeonmag' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'aeonmag'),
   'section'   => 'header_image',
   'settings'  => 'aeonmag_options[aeonmag_slider_overlay_transparent]',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'aeonmag_header_overlay_color_active_callback',
) );