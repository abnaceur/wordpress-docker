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

/*Header Options*/
$wp_customize->add_section('aeonmag_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'aeonmag'),
    'panel' => 'aeonmag_panel',
));


/*Header Search Enable Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_search'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_search]', array(
    'label'     => __( 'Enable Search', 'aeonmag' ),
    'description' => __('It will help to display the search in Menu.', 'aeonmag'),
    'section'   => 'aeonmag_header_section',
    'settings'  => 'aeonmag_options[aeonmag_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );


/*Header Advertisement Enable Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_header_ads]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_header_ads'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_header_ads]', array(
    'label'     => __( 'Enable Header Advertisement', 'aeonmag' ),
    'description' => __('You can add the header ads image after enabling it.', 'aeonmag'),
    'section'   => 'aeonmag_header_section',
    'settings'  => 'aeonmag_options[aeonmag_enable_header_ads]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );

/*callback functions header section*/
if ( !function_exists('aeonmag_header_ads_active_callback') ) :
  function aeonmag_header_ads_active_callback(){
      global $aeonmag_theme_options;
      $enable_header = absint($aeonmag_theme_options['aeonmag_enable_header_ads'])? absint($aeonmag_theme_options['aeonmag_enable_header_ads']): 0;
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Header Ads Image*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-header-ads-image]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['aeonmag-header-ads-image'],
    'sanitize_callback' => 'aeonmag_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'aeonmag_options[aeonmag-header-ads-image]',
        array(
            'label'   => __( 'Header Ad Image', 'aeonmag' ),
            'section'   => 'aeonmag_header_section',
            'settings'  => 'aeonmag_options[aeonmag-header-ads-image]',
            'type'      => 'image',
            'priority'  => 5,
            'active_callback' => 'aeonmag_header_ads_active_callback',
            'description' => __( 'Recommended image size of 728*90', 'aeonmag' )
        )
    )
);

/*Ads Image Link*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-header-ads-image-link]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['aeonmag-header-ads-image-link'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'aeonmag_options[aeonmag-header-ads-image-link]', array(
    'label'   => __( 'Header Ads Image Link', 'aeonmag' ),
    'section'   => 'aeonmag_header_section',
    'settings'  => 'aeonmag_options[aeonmag-header-ads-image-link]',
    'type'      => 'url',
    'active_callback' => 'aeonmag_header_ads_active_callback',
    'priority'  => 5
) );

/*Trending News Below Slider*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_trending_news_big]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_trending_news_big'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_trending_news_big]', array(

    'label'     => __( 'Enable Trending News Below Menu', 'aeonmag' ),
    'description' => __('Recent Post will appear here.', 'aeonmag'),
    'section'   => 'aeonmag_header_section',
    'settings'  => 'aeonmag_options[aeonmag_enable_trending_news_big]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );

/*callback functions slider*/
if ( !function_exists('aeonmag_trending_active_callback') ) :
  function aeonmag_trending_active_callback(){
      global $aeonmag_theme_options;
      $enable_trending = absint($aeonmag_theme_options['aeonmag_enable_trending_news_big']);
      if( 1 == $enable_trending ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Category Selection*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-select-big-trending-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag-select-big-trending-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new AeonMag_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aeonmag_options[aeonmag-select-big-trending-category]',
        array(
            'label'     => __( 'Select Category For Trending', 'aeonmag' ),
            'description' => __('Choose one category to show the trending. More settings are in pro version.', 'aeonmag'),
            'section'   => 'aeonmag_header_section',
            'settings'  => 'aeonmag_options[aeonmag-select-big-trending-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=> 'aeonmag_trending_active_callback',
        )
    )

);

/*Highlight text*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_highlight_text_menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_highlight_text_menu'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_highlight_text_menu]', array(

    'label'     => __( 'Enter Highlight Text', 'aeonmag' ),
    'description' => __('You will get more option in the premium version.', 'aeonmag'),
    'section'   => 'aeonmag_header_section',
    'settings'  => 'aeonmag_options[aeonmag_enable_highlight_text_menu]',
    'type'      => 'text',
    'priority'  => 5,
) );