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

/* Front Page Options Panel */
    $wp_customize->add_panel( 'aeonmag_front_page', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'title' => __( 'AeonMag Front Page Options', 'aeonmag' ),
) );

$wp_customize->add_section( 'aeonmag_front_page_grid_posts', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Posts Slider', 'aeonmag' ),
    'panel'          => 'aeonmag_front_page',
) );

/*Enable Grid Post Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_grid_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_grid_post_front'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_grid_post_front]', array(
    'label'     => __( 'Enable Post Slider', 'aeonmag' ),
    'description' => __('Posts of the selected category will appear as a slider.', 'aeonmag'),
    'section'   => 'aeonmag_front_page_grid_posts',
    'settings'  => 'aeonmag_options[aeonmag_enable_grid_post_front]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*callback functions slider*/
if ( !function_exists('aeonmag_grid_slider_active_callback') ) :
    function aeonmag_grid_slider_active_callback(){
        global $aeonmag_theme_options;
        $enable_grid = absint($aeonmag_theme_options['aeonmag_enable_grid_post_front'])? absint($aeonmag_theme_options['aeonmag_enable_grid_post_front']): 0;
        if( 1 == $enable_grid ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Title Grid Post Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_title_grid_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_title_grid_post_front'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_title_grid_post_front]', array(
    'label'     => __( 'Title Post Slider', 'aeonmag' ),
    'description' => __('Enter the title for this section.', 'aeonmag'),
    'section'   => 'aeonmag_front_page_grid_posts',
    'settings'  => 'aeonmag_options[aeonmag_title_grid_post_front]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=> 'aeonmag_grid_slider_active_callback',

) );

/*Category Selection*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-grid-slider-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag-grid-slider-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new AeonMag_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aeonmag_options[aeonmag-grid-slider-select-category]',
        array(
            'label'     => __( 'Category For Slider', 'aeonmag' ),
            'description' => __('From the dropdown select the category for the grid slider. Category having post will display in grid section.', 'aeonmag'),
            'section'   => 'aeonmag_front_page_grid_posts',
            'settings'  => 'aeonmag_options[aeonmag-grid-slider-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'aeonmag_grid_slider_active_callback'
        )
    )
);

//Footer you may missed section
$wp_customize->add_section( 'aeonmag_front_page_you_may_missed', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'You May Missed', 'aeonmag' ),
    'panel'          => 'aeonmag_front_page',
) );

/*Enable you may Post Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_enable_missed_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_enable_missed_post_front'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_enable_missed_post_front]', array(
    'label'     => __( 'Enable You May Missed', 'aeonmag' ),
    'description' => __('This section will appear on the footer section.', 'aeonmag'),
    'section'   => 'aeonmag_front_page_you_may_missed',
    'settings'  => 'aeonmag_options[aeonmag_enable_missed_post_front]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*callback functions you may missed*/
if ( !function_exists('aeonmag_you_may_missed_active_callback') ) :
    function aeonmag_you_may_missed_active_callback(){
        global $aeonmag_theme_options;
        $enable_missed = absint($aeonmag_theme_options['aeonmag_enable_missed_post_front'])? absint($aeonmag_theme_options['aeonmag_enable_missed_post_front']): 0;
        if( 1 == $enable_missed ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Title you may missed Post Option*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag_title_you_missed_post_front]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag_title_you_missed_post_front'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'aeonmag_options[aeonmag_title_you_missed_post_front]', array(
    'label'     => __( 'Title You May Missed', 'aeonmag' ),
    'description' => __('Enter the title for this section.', 'aeonmag'),
    'section'   => 'aeonmag_front_page_you_may_missed',
    'settings'  => 'aeonmag_options[aeonmag_title_you_missed_post_front]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=> 'aeonmag_you_may_missed_active_callback',

) );

/*Category Selection*/
$wp_customize->add_setting( 'aeonmag_options[aeonmag-you-missed-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aeonmag-you-missed-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new AeonMag_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aeonmag_options[aeonmag-you-missed-select-category]',
        array(
            'label'     => __( 'Category For Missed Section', 'aeonmag' ),
            'description' => __('From the dropdown select the category for the you may missed. Category having post will display in missed section.', 'aeonmag'),
            'section'   => 'aeonmag_front_page_you_may_missed',
            'settings'  => 'aeonmag_options[aeonmag-you-missed-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'aeonmag_you_may_missed_active_callback'
        )
    )
);