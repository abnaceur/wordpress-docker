<?php
/**
 *  Grip Typography Option
 *
 * @since Grip 1.0.0
 *
 */
/*Font and Typography Options*/
$wp_customize->add_section( 'grip_font_options', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Typography Options', 'grip' ),
   'panel' 		 => 'grip_panel',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'grip_options[grip-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-font-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = grip_google_fonts();
$wp_customize->add_control( 'grip_options[grip-font-family-url]', array(
    'label'     => __( 'Body Paragraph Font Family', 'grip' ),
    'description' => __( 'Select the required font from the dropdown.', 'grip' ),
    'section'   => 'grip_font_options',
    'choices'  	=> $choices,
    'settings'  => 'grip_options[grip-font-family-url]',
    'type'      => 'select',
    'priority'  => 15,
) );
/*Paragraph font Size*/
$wp_customize->add_setting( 'grip_options[grip-font-paragraph-font-size]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-font-paragraph-font-size'],
    'sanitize_callback' => 'grip_sanitize_number_range'
) );
$wp_customize->add_control( 'grip_options[grip-font-paragraph-font-size]', array(
    'label'     => __( 'Paragraph Font Size', 'grip' ),
    'description' => __('Size apply only for paragraphs, not headings. Font size between 12px to 20px.', 'grip'),
    'section'   => 'grip_font_options',
    'settings'  => 'grip_options[grip-font-paragraph-font-size]',
    'type'      => 'number',
    'priority'  => 15,
    'input_attrs' => array(
     'min' => 12,
     'max' => 20,
     'step' => 1,
 ),
) );

/*
* Heading Fonts Options
* Heading  Font Option Section
* Grip 1.0.2
*/

/*Font Family URL*/
$wp_customize->add_setting( 'grip_options[grip-font-heading-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-font-heading-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = grip_google_fonts();
$wp_customize->add_control( 'grip_options[grip-font-heading-family-url]', array(
    'label'     => __( 'Select Heading Font Family', 'grip' ),
    'description' => __( 'Select the required font from the dropdown.', 'grip' ),
    'choices'  	=> $choices,
    'section'   => 'grip_font_options',
    'settings'  => 'grip_options[grip-font-heading-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );