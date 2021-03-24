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
/*Blog Page Options*/
$wp_customize->add_section('aeonmag_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Page Settings', 'aeonmag'),
    'panel' => 'aeonmag_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('aeonmag_options[aeonmag-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-sidebar-blog-page'],
    'sanitize_callback' => 'aeonmag_sanitize_select'
));

$wp_customize->add_control( new AeonMag_Radio_Image_Control(
        $wp_customize,
    'aeonmag_options[aeonmag-sidebar-blog-page]', array(
    'choices' => aeonmag_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'aeonmag'),
    'description' => __('This sidebar will work blog and archive pages.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Blog Page Show content from*/
$wp_customize->add_setting('aeonmag_options[aeonmag-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-content-show-from'],
    'sanitize_callback' => 'aeonmag_sanitize_select'
));

$wp_customize->add_control('aeonmag_options[aeonmag-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'aeonmag'),
        'content' => __('Show from Content', 'aeonmag'),
    ),
    'label' => __('Select Content Display From', 'aeonmag'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('aeonmag_options[aeonmag-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('aeonmag_options[aeonmag-excerpt-length]', array(
    'label' => __('Excerpt Length', 'aeonmag'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('aeonmag_options[aeonmag-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aeonmag_options[aeonmag-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'aeonmag'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('aeonmag_options[aeonmag-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-pagination-options'],
    'sanitize_callback' => 'aeonmag_sanitize_select'

));

$wp_customize->add_control('aeonmag_options[aeonmag-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'aeonmag'),
        'default' => __('Previous and Next Pagination', 'aeonmag'),
    ),
    'label' => __('Pagination Types', 'aeonmag'),
    'description' => __('Choose Required Pagination Type', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('aeonmag_options[aeonmag-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aeonmag_options[aeonmag-read-more-text]', array(
    'label' => __('Read More Text', 'aeonmag'),
    'description' => __('Read more text for blog and archive page.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('aeonmag_options[aeonmag-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-show-hide-share'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
));

$wp_customize->add_control('aeonmag_options[aeonmag-show-hide-share]', array(
    'label' => __('Show Social Share', 'aeonmag'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('aeonmag_options[aeonmag-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-show-hide-category'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
));

$wp_customize->add_control('aeonmag_options[aeonmag-show-hide-category]', array(
    'label' => __('Show Category', 'aeonmag'),
    'description' => __('Option to hide the category on the blog page.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('aeonmag_options[aeonmag-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-show-hide-date'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
));

$wp_customize->add_control('aeonmag_options[aeonmag-show-hide-date]', array(
    'label' => __('Show Date', 'aeonmag'),
    'description' => __('Option to hide the date on the blog page.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('aeonmag_options[aeonmag-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aeonmag-show-hide-author'],
    'sanitize_callback' => 'aeonmag_sanitize_checkbox'
));

$wp_customize->add_control('aeonmag_options[aeonmag-show-hide-author]', array(
    'label' => __('Show Author', 'aeonmag'),
    'description' => __('Option to hide the author on the blog page.', 'aeonmag'),
    'section' => 'aeonmag_blog_page_section',
    'settings' => 'aeonmag_options[aeonmag-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));

