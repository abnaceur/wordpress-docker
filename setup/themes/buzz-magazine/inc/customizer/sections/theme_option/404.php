<?php
/**
 * Theme Option >> 404-page
 * Registers 404 Page Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( '404_page',
    array(
        'title'                 => esc_html__( '404 Page','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting( '404_page_image',
    array(
        'default'           => esc_url(BUZZ_MAGAZINE_IMAGE_URI.'error.jpg'),
        'transport'         => 'refresh',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '404_page_image',
    array(
        'label' => esc_html__('Upload Image','buzz-magazine'),
        'settings'  => '404_page_image',
        'section'   => '404_page'
    ) ));

$wp_customize->add_setting('404_page_primary_title',
    array(
        'transport' => 'postMessage',
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

    )
);

$wp_customize->add_control('404_page_primary_title',
    array(
        'label' => esc_html__('Primary Title', 'buzz-magazine'),
        'section' => '404_page',
        'priority' => 10,
        'type' => 'text',

    )
);


$wp_customize->add_setting('404_page_secondary_title',
    array(
        'transport' => 'postMessage',
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

    )
);

$wp_customize->add_control('404_page_secondary_title',
    array(
        'label' => '',
        'section' => '404_page',
        'priority' => 10,
        'type' => 'text',

    )
);

$wp_customize->add_setting('404_page_button_title',
    array(
        'transport' => 'postMessage',
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

    )
);

$wp_customize->add_control('404_page_button_title',
    array(
        'label' => esc_html__('Button Title', 'buzz-magazine'),
        'description' => esc_html__('Clicking on button redirects to homepage','buzz-magazine'),
        'section' => '404_page',
        'priority' => 10,
        'type' => 'text',
    )
);

