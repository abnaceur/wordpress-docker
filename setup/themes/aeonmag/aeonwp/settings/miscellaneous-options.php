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
/*Extra Options*/

        $wp_customize->add_section( 'aeonmag_miscellaneous_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Miscellaneous Settings', 'aeonmag' ),
            'panel'          => 'aeonmag_panel',
        ) );

        /*Front Page content*/
        $wp_customize->add_setting( 'aeonmag_options[aeonmag-front-page-content]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['aeonmag-front-page-content'],
            'sanitize_callback' => 'aeonmag_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'aeonmag_options[aeonmag-front-page-content]', array(
            'label'     => __( 'Enable Front Page Content', 'aeonmag' ),
            'description' => __( 'This will help to hide the content in Front Page, blog and home page content.', 'aeonmag' ),
            'section'   => 'aeonmag_miscellaneous_options',
            'settings'  => 'aeonmag_options[aeonmag-front-page-content]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );

         /*Enable Preloader*/
        $wp_customize->add_setting( 'aeonmag_options[aeonmag-front-page-preloader]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['aeonmag-front-page-preloader'],
            'sanitize_callback' => 'aeonmag_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'aeonmag_options[aeonmag-front-page-preloader]', array(
            'label'     => __( 'Enable Preloader', 'aeonmag' ),
            'description' => __( 'Hide the preloader. It loads before the site loads.', 'aeonmag' ),
            'section'   => 'aeonmag_miscellaneous_options',
            'settings'  => 'aeonmag_options[aeonmag-front-page-preloader]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );

        /*Enable Category Color*/
        $wp_customize->add_setting( 'aeonmag_options[aeonmag-category-color]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['aeonmag-category-color'],
            'sanitize_callback' => 'absint'
        ) );

        $wp_customize->add_control( 'aeonmag_options[aeonmag-category-color]', array(
            'label'     => __( 'Enable Category Color', 'aeonmag' ),
            'description' => __( 'Add different color on different categories.', 'aeonmag' ),
            'section'   => 'colors',
            'settings'  => 'aeonmag_options[aeonmag-category-color]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );

//category color options
$i = 1;
$args = array(
    'orderby' => 'id',
    'hide_empty' => 0
);
$categories = get_categories( $args );
$wp_category_list = array();
foreach ($categories as $category_list ) {
    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

    $wp_customize->add_setting('aeonmag_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']', array(
        'default'           => $default['aeonmag_primary_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'aeonmag_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
            array(
                'label'     => sprintf(__('"%s" Color', 'aeonmag'), $wp_category_list[$category_list->cat_ID] ),
                'section'   => 'colors',
                'settings'  => 'aeonmag_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
                'priority'  => 20,
            )
        )
    );
    $i++;
}