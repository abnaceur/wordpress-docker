<?php
/**
 * Theme Option >> Advertisement
 * Registers Advertisement Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( 'advertisement_section',
    array(
        'title'                 => esc_html__( 'Advertisement ','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);


$wp_customize->add_setting( 'advertisement_image',
array(
'default'           => '',
'transport'         => 'refresh',
'capability'        => 'edit_theme_options',
'sanitize_callback' => 'esc_url_raw'
)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'advertisement_image',
array(
'label'             => esc_html__('Advertisement Image','buzz-magazine'),
'settings'          => 'advertisement_image',
'section'           => 'advertisement_section',
) ));