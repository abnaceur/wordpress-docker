<?php
/**
 * Theme Option >> Flash News
 * Registers Flash News Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( 'flash_news_option',
    array(
        'title'                 => esc_html__( 'Flash News','buzz-magazine' ),
        'description'           => esc_html__( 'Top Header Section','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting( 'flash_news_toggle_button',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean'


    )
);

$wp_customize->add_control(  new Buzz_Magazine_Customizer_Toggle_Control( $wp_customize,'flash_news_toggle_button',
    array(
        'label'         => esc_html__( 'Enable Flash News Section', 'buzz-magazine' ),
        'section'       => 'flash_news_option',
        'priority'      => 10,
        'type'            => 'buzz-magazine-flat',

    )
));


$wp_customize->add_setting( 'flash_news_social_button',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean'


    )
);

$wp_customize->add_control(  new Buzz_Magazine_Customizer_Toggle_Control( $wp_customize,'flash_news_social_button',
    array(
        'label'         => esc_html__( 'Enable Social section', 'buzz-magazine' ),
        'section'       => 'flash_news_option',
        'priority'      => 10,
        'type'            => 'buzz-magazine-flat',
        'active_callback' => 'buzz_magazine_flash_news_toggle',


    )
));

$wp_customize->add_setting('flash_news_title',
    array(
        'transport'         => 'postMessage',
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('flash_news_title',
    array(
        'label'         => esc_html__('Flash News Title', 'buzz-magazine'),
        'section'       => 'flash_news_option',
        'priority'      => 10,
        'type'          => 'text',
        'active_callback' => 'buzz_magazine_flash_news_toggle',

    )
);



$wp_customize->add_setting( 'flash_news_radio_option',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'category',
        'sanitize_callback' => 'buzz_magazine_sanitize_select',
    )
);

$wp_customize->add_control( 'flash_news_radio_option',
    array(
        'type'        => 'radio',
        'section'     => 'flash_news_option',
        'active_callback' => 'buzz_magazine_flash_news_toggle',
        'choices'     => array(
            'latest'                => esc_html__('Show Latest Posts','buzz-magazine'),
            'category'              => esc_html__( 'Show Posts From Category','buzz-magazine' ),

        ),
    ) );


$wp_customize->add_setting( 'flash_news_filter_category',
    array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control( new Buzz_Magazine_Category( $wp_customize, 'flash_news_filter_category',
        array(
            'section'       => 'flash_news_option',
            'label'         => esc_html__( 'Choose category', 'buzz-magazine' ),
            'description'   => esc_html__( 'Filter Posts According To Category', 'buzz-magazine' ),
            'active_callback' => 'buzz_magazine_flash_news_category',
            'dropdown_args' => array(
                'taxonomy' => 'category'),
        )
    )
);
