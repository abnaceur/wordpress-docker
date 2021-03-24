<?php
/**
 * Theme Option >> Archive
 * Registers Archive Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( 'archive_section',
    array(
        'title'                 => esc_html__( 'Archive','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);


$wp_customize->add_setting( 'radio_button_post_navigation_archive',
    array(
        'default'           => 'older-newer',
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'

    )
);

$wp_customize->add_control( 'radio_button_post_navigation_archive',
    array(
        'label'       => esc_html__('Pagination Layout', 'buzz-magazine' ),
        'type'        => 'radio',
        'section'     => 'archive_section',
        'settings'    => 'radio_button_post_navigation_archive',
        'choices'     => array(
            'number'             =>  esc_html__('Number','buzz-magazine'),
            'older-newer'        =>  esc_html__('Older and Newer','buzz-magazine'),

        )

));

$wp_customize->add_setting( 'archive_toggle_slider_section',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_validate_boolean'

    )
);

$wp_customize->add_setting( 'archive_post_align',
    array(
        'default'           => 'left',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Text_Radio_Button_Custom_Control( $wp_customize, 'archive_post_align',
    array(
        'label'     => esc_html__( 'Text Alignment','buzz-magazine' ),
        'section'   => 'archive_section',
        'choices'   => array(
            'left'       => esc_html__( 'Left','buzz-magazine' ),
            'center'     => esc_html__( 'Centered' ,'buzz-magazine'),
            'right'      => esc_html__( 'Right','buzz-magazine' )
        )
    )));

