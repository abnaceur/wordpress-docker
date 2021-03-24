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

/*Single Page Options*/
$wp_customize->add_section('aeonmag_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'aeonmag'),
    'panel' => 'aeonmag_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('aeonmag_options[aeonmag-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-single-page-featured-image'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
));

$wp_customize->add_control('aeonmag_options[aeonmag-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'aeonmag'),
    'description' => __('You can hide images on single post from here.', 'aeonmag'),
    'section' => 'aeonmag_single_page_section',
    'settings' => 'aeonmag_options[aeonmag-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('aeonmag_options[aeonmag-sidebar-single-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-sidebar-single-page'],
    'sanitize_callback' => 'aeonmag_sanitize_select'
));

$wp_customize->add_control( 
    new AeonMag_Radio_Image_Control(
        $wp_customize,
    'aeonmag_options[aeonmag-sidebar-single-page]', array(
    'choices' => aeonmag_sidebar_position_array(),
    'label' => __('Select Sidebar', 'aeonmag'),
    'description' => __('From Appearance > Customize > Widgets and add the widgets on the respected widget areas.', 'aeonmag'),
    'section' => 'aeonmag_single_page_section',
    'settings' => 'aeonmag_options[aeonmag-sidebar-single-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Related Post Options*/
$wp_customize->add_setting('aeonmag_options[aeonmag-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-single-page-related-posts'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
));

$wp_customize->add_control('aeonmag_options[aeonmag-single-page-related-posts]', array(
    'label' => __('Related Posts', 'aeonmag'),
    'description' => __('2 posts of same category will appear.', 'aeonmag'),
    'section' => 'aeonmag_single_page_section',
    'settings' => 'aeonmag_options[aeonmag-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('aeonmag_related_post_callback')) :
    function aeonmag_related_post_callback()
    {
        global $aeonmag_theme_options;
        $related_posts = absint($aeonmag_theme_options['aeonmag-single-page-related-posts'])? absint($aeonmag_theme_options['aeonmag-single-page-related-posts']): 0;
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('aeonmag_options[aeonmag-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aeonmag_options[aeonmag-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'aeonmag'),
    'description' => __('Enter the suitable title.', 'aeonmag'),
    'section' => 'aeonmag_single_page_section',
    'settings' => 'aeonmag_options[aeonmag-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'aeonmag_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('aeonmag_options[aeonmag-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-single-social-share'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
));

$wp_customize->add_control('aeonmag_options[aeonmag-single-social-share]', array(
    'label' => __('Social Sharing', 'aeonmag'),
    'description' => __('Enable Social Sharing on Single Posts.', 'aeonmag'),
    'section' => 'aeonmag_single_page_section',
    'settings' => 'aeonmag_options[aeonmag-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));
