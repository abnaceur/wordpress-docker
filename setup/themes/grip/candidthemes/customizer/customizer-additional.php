<?php
/**
 *  Grip Additional Settings Option
 *
 * @since Grip 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'grip_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Extra Options', 'grip' ),
    'panel'          => 'grip_panel',
) );

/*Preloader Enable*/
$wp_customize->add_setting( 'grip_options[grip-extra-preloader]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-extra-preloader'],
    'sanitize_callback' => 'grip_sanitize_checkbox'
) );
$wp_customize->add_control( 'grip_options[grip-extra-preloader]', array(
    'label'     => __( 'Enable Preloader', 'grip' ),
    'description' => __( 'It will enable the preloader on the website.', 'grip' ),
    'section'   => 'grip_extra_options',
    'settings'  => 'grip_options[grip-extra-preloader]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions for breadcrumb section*/
if ( !function_exists('grip_extra_breadcrumb_active_callback') ) :
    function grip_extra_breadcrumb_active_callback(){
        global $grip_theme_options;
        $grip_theme_options = grip_get_options_value();
        $enable_breadcrumb = absint($grip_theme_options['grip-extra-breadcrumb']);
        if( 1 == $enable_breadcrumb ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'grip_options[grip-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-extra-breadcrumb'],
    'sanitize_callback' => 'grip_sanitize_checkbox'
) );
$wp_customize->add_control( 'grip_options[grip-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'grip' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page', 'grip' ),
    'section'   => 'grip_extra_options',
    'settings'  => 'grip_options[grip-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Breadcrumb Text*/
$wp_customize->add_setting( 'grip_options[grip-breadcrumb-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-breadcrumb-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'grip_options[grip-breadcrumb-text]', array(
    'label'     => __( 'Breadcrumb Text', 'grip' ),
    'description' => __( 'Write your own text in place of You are Here', 'grip' ),
    'section'   => 'grip_extra_options',
    'settings'  => 'grip_options[grip-breadcrumb-text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback' => 'grip_extra_breadcrumb_active_callback',
) );

/*Home Page Content*/
$wp_customize->add_setting( 'grip_options[grip-front-page-content]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-front-page-content'],
    'sanitize_callback' => 'grip_sanitize_checkbox'
) );
$wp_customize->add_control( 'grip_options[grip-front-page-content]', array(
    'label'     => __( 'Hide Front Page Content', 'grip' ),
    'description' => __( 'Checked to hide the front page content from front page.', 'grip' ),
    'section'   => 'grip_extra_options',
    'settings'  => 'grip_options[grip-front-page-content]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );