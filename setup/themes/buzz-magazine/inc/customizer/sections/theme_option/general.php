<?php
/**
 * Theme Option >> General
 * Registers General Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( 'general_section',
    array(
        'title'                 => esc_html__( 'General ','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting('buzz_magazine_global_sidebar',
    array(
        'default'           => 'right',
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    ));

$wp_customize->add_control('buzz_magazine_global_sidebar',
        array(
            'label'       => esc_html__('Global Sidebar', 'buzz-magazine' ),
            'description' => esc_html__( 'Changes will appears in top home sidebar,archive,page and posts','buzz-magazine' ),
            'type'        => 'radio',
            'section'     => 'general_section',
            'settings'    => 'buzz_magazine_global_sidebar',
            'choices'     => array(
                'left'         =>  esc_html__('Left Sidebar','buzz-magazine'),
                'right'        =>  esc_html__('Right Sidebar','buzz-magazine'),
            )
        )
);

$wp_customize->add_setting( 'toggle_sidebar_archive',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_checkbox'

    )
);

$wp_customize->add_setting('buzz_magazine_bottom_home_sidebar',
    array(
        'default'           => 'right',
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    ));

$wp_customize->add_control('buzz_magazine_bottom_home_sidebar',
    array(
        'label'       => esc_html__('Home Bottom Sidebar', 'buzz-magazine' ),
        'description' => esc_html__( 'Changes only sees in bottom homepage','buzz-magazine' ),
        'type'        => 'radio',
        'section'     => 'general_section',
        'settings'    => 'buzz_magazine_bottom_home_sidebar',
        'choices'     => array(
            'left'         =>  esc_html__('Left Sidebar','buzz-magazine'),
            'right'        =>  esc_html__('Right Sidebar','buzz-magazine'),

        )
    )
);

$wp_customize->add_setting('buzz_magazine_content_type',
    array(
        'default'           => esc_html__('content','buzz-magazine'),
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    ));

$wp_customize->add_control('buzz_magazine_content_type',
    array(
        'label'       => esc_html__('Content Type', 'buzz-magazine' ),
        'description' => esc_html__( 'Content Shows all the text whereas excerpt shows only 55 character','buzz-magazine' ),
        'type'        => 'radio',
        'section'     => 'general_section',
        'settings'    => 'buzz_magazine_content_type',
        'choices'     => array(
            'content'         =>  esc_html__('Content','buzz-magazine'),
            'excerpt'         =>  esc_html__('Excerpt','buzz-magazine'),

        )
    )

);

$wp_customize->add_setting('general_title_layout',
    array(
        'default'           => 'layout-1',
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    ));

$wp_customize->add_control('general_title_layout',
    array(
        'label'       => esc_html__('Title Layout', 'buzz-magazine' ),
        'type'        => 'radio',
        'section'     => 'general_section',
        'settings'    => 'general_title_layout',
        'choices'     => array(
            'layout-1'         =>  esc_html__('Layout 1','buzz-magazine'),
            'layout-5'         =>  esc_html__('Layout 2','buzz-magazine'),

        )
    )

);
