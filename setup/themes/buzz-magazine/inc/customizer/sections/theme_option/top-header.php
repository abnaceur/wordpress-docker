<?php
/**
 * Theme Option >> Top Header
 * Registers Top Header Section
 * @package Buzz_Magazine
 */
$wp_customize->add_section( 'top_header_theme_option',
    array(
        'title'                 => esc_html__( 'Top Header','buzz-magazine' ),
        'description'           => esc_html__( 'Top Header Section','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting( 'top_header_toggle_button',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean'

    )
);

$wp_customize->add_control(  new Buzz_Magazine_Customizer_Toggle_Control( $wp_customize,'top_header_toggle_button',
    array(
        'label'         => esc_html__( 'Enable Top bar section', 'buzz-magazine' ),
        'section'       => 'top_header_theme_option',
        'priority'      => 10,
        'type'          => 'buzz-magazine-flat',

    )
));

$wp_customize->add_setting( 'top_header_section_left_element',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'social-icon',
        'sanitize_callback' => 'buzz_magazine_sanitize_select',
    )
);

$wp_customize->add_control( 'top_header_section_left_element',
    array(
        'type'        => 'select',
        'section'     => 'top_header_theme_option',
        'label'       => esc_html__( 'Top Bar Left Element','buzz-magazine' ),
        'active_callback'    => 'buzz_magazine_top_header_toggle',
        'choices'     => array(
	        'none'              => esc_html__('None','buzz-magazine'),
	        'menu'              => esc_html__('Menu','buzz-magazine'),
            'social-icon'       => esc_html__( 'Icon','buzz-magazine' ),
            'address-email'     => esc_html__( 'Address/number/Email','buzz-magazine' ),
            'date'              => esc_html__('Date','buzz-magazine'),

        ),
    ) );
$wp_customize->add_setting( 'top_header_section_right_element',
    array(
        'capability' => 'edit_theme_options',
        'default' => 'menu',
        'sanitize_callback' => 'buzz_magazine_sanitize_select',
    )
);

$wp_customize->add_control( 'top_header_section_right_element',
    array(
        'type'        => 'select',
        'section'     => 'top_header_theme_option',
        'active_callback'    => 'buzz_magazine_top_header_toggle',
        'label'       => esc_html__( 'Top Bar Right Element','buzz-magazine' ),
        'choices'     => array(
	        'none'              => esc_html__('None','buzz-magazine'),
	        'menu'              => esc_html__('Menu','buzz-magazine'),
            'icon'              => esc_html__( 'Icon','buzz-magazine' ),
            'address-email'     => esc_html__( 'Address/number/Email','buzz-magazine' ),
            'date'              => esc_html__('Date','buzz-magazine'),
        ),
    ) );


$wp_customize->add_setting('top_header_section_phone',
    array(
        'transport' => 'refresh',
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key'

    )
);

$wp_customize->add_control('top_header_section_phone',
    array(
        'label' => esc_html__('Number', 'buzz-magazine'),
        'section' => 'top_header_theme_option',
        'active_callback'  => 'buzz_magazine_top_header_number_address',
        'priority' => 10,
        'type' => 'number',
    )
);

$wp_customize->add_setting('top_header_section_address',
    array(
        'transport' => 'refresh',
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('top_header_section_address',
    array(
        'label' => esc_html__('Address', 'buzz-magazine'),
        'section' => 'top_header_theme_option',
        'active_callback'  => 'buzz_magazine_top_header_number_address',
        'priority' => 10,
        'type' => 'text',
    )
);

$wp_customize->add_setting('top_header_section_email',
    array(
        'transport' => 'refresh',
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('top_header_section_email',
    array(
        'label' => esc_html__('Email', 'buzz-magazine'),
        'section' => 'top_header_theme_option',
        'active_callback'  => 'buzz_magazine_top_header_number_address',
        'priority' => 10,
        'type' => 'text',

    )
);

