<?php
/**
 * Theme Option >> Main Header
 * Registers Main Header Section
 * @package Buzz_Magazine
 */
$wp_customize->add_section( 'main_header_section',
    array(
        'title'                 => esc_html__( 'Main Header','buzz-magazine' ),
        'description'           => esc_html__( 'Top Header Section','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting('main_header_logo_layout',
    array(
        'default'           => 'left',
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    ));

$wp_customize->add_control('main_header_logo_layout',
    array(
        'label'       => esc_html__('Logo Layout', 'buzz-magazine' ),
        'type'        => 'radio',
        'section'     => 'main_header_section',
        'settings'    => 'main_header_logo_layout',
        'choices'     => array(
            'left'         =>  esc_html__('Left','buzz-magazine'),
            'center'       =>  esc_html__('Center','buzz-magazine'),
            'right'        =>  esc_html__('Right','buzz-magazine'),

        )
    )

);

$wp_customize->add_setting( 'main_header_advertisement_image', array(
    'sanitize_callback' => 'absint',
    'capability'        => 'edit_theme_options',


) );

$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'main_header_advertisement_image', array(
    'label' => esc_html__('Advertisement Image', 'buzz-magazine'),
    'section' => 'main_header_section',
    'height' => 150,
    'width' => 750,
    'active_callback' => 'buzz_magazine_main_header_logo_layout',
    'flex_width ' => false,
    'flex_height ' => false,
)));

