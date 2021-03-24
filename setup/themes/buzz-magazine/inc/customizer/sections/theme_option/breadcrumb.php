<?php
/**
 * Theme Option >> Breadcrumb
 * Registers Breadcrumb Section
 * @package Buzz_Magazine
*/

$wp_customize->add_section( 'breadcrumb_section',
array(
'title'                 => esc_html__( 'Breadcrumb','buzz-magazine' ),
'priority'              => 150,
'panel'                 =>'theme_option',
'capability'            => 'edit_theme_options',
'description_hidden'    => 'false',
)
);

$wp_customize->add_setting( 'toggle_master_breadcrumb',
array(
'default'           => true,
'capability'        => 'edit_theme_options',
'transport'         => 'refresh',
'sanitize_callback' => 'wp_validate_boolean'

)
);

$wp_customize->add_control(  new Buzz_Magazine_Customizer_Toggle_Control( $wp_customize,'toggle_master_breadcrumb',
array(
'label'           => esc_html__( 'Enable Breadcrumb', 'buzz-magazine' ),
'section'         => 'breadcrumb_section',
'priority'        => 10,
'active_callback' => 'buzz_magazine_toggle_related_posts',
'type'            => 'buzz-magazine-flat',

)
));

$wp_customize->add_setting( 'breadcrumb_background_color',
    array(
        'default'               => '#404d5b',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumb_background_color',
    array(
        'label'      => esc_html__( 'Breadcrumb Background Color', 'buzz-magazine' ),
        'section'    => 'breadcrumb_section',
        'settings'   => 'breadcrumb_background_color',
    ) ) );
