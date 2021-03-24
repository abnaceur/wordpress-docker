<?php
/**
 * Theme Option >> Flash News
 * Registers Flash News Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( 'footer_section',
    array(
        'title'                 => esc_html__( 'Footer ','buzz-magazine' ),
        'priority'              => 170,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting( 'footer_bar_copy_right',
    array(
        'transport'             => 'postMessage',
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_text_field'
    )
);

$wp_customize->add_control( 'footer_bar_copy_right',
    array(
        'label'         => esc_html__( 'Copy Right Text','buzz-magazine' ),
        'section'       => 'footer_section',
        'priority'      => 10,
        'type'          => 'text',

    )
);


$wp_customize->add_setting( 'footer_section_right_element',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'social-icon',
        'sanitize_callback' => 'buzz_magazine_sanitize_select',
    )
);

$wp_customize->add_control( 'footer_section_right_element',
    array(
        'type'        => 'select',
        'section'     => 'footer_section',
        'label'       => esc_html__( 'Footer Right Element','buzz-magazine' ),
        'choices'     => array(
            'menu'              => esc_html__('Menu','buzz-magazine'),
            'social-icon'       => esc_html__( 'Icon','buzz-magazine' ),

        ),
    ) );