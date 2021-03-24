<?php
/**
 * Theme Option >> Slider
 * Registers Slider Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( 'slider_section',
    array(
        'title'                 => esc_html__( 'Slider','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);


$wp_customize->add_setting( 'slider_section_option_toggle',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean'


    )
);

$wp_customize->add_control(  new Buzz_Magazine_Customizer_Toggle_Control( $wp_customize,'slider_section_option_toggle',
    array(
        'label'         => esc_html__( 'Enable Slider Section', 'buzz-magazine' ),
        'section'       => 'slider_section',
        'priority'      => 10,
        'type'            => 'buzz-magazine-flat',

    )
));

$wp_customize->add_setting( 'slider_simple_notice_post',
    array(
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_title'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Simple_Notice_Custom_control( $wp_customize, 'slider_simple_notice_post',
    array(
        'label'     => esc_html__( 'Slider','buzz-magazine' ),
        'style'     => esc_attr('font-size:17px;color:#555D66;text-align:center'),
        'active_callback'=> 'buzz_magazine_slider_toggle',
        'section'   => 'slider_section'
    )
) );
$wp_customize->add_setting( 'slider_select_category',
    array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

$wp_customize->add_control( new Buzz_Magazine_Category( $wp_customize, 'slider_select_category',
    array(
        'section'       => 'slider_section',
        'label'         => esc_html__( 'Categories', 'buzz-magazine' ),
        'active_callback'=> 'buzz_magazine_slider_toggle',
        'description'   => esc_html__( 'Filter Posts According to Category', 'buzz-magazine' ),
        'dropdown_args' => array(
            'taxonomy' => 'category'
        )
    )
) );


$wp_customize->add_setting( 'slider_per_post',
    array(
        'default'               => 4,
        'transport'             => 'refresh',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'absint'
    )
);

$wp_customize->add_control( 'slider_per_post',
    array(
        'label'         => esc_html__( 'See Per Post','buzz-magazine' ),
        'section'       => 'slider_section',
        'priority'      => 10,
        'type'          => 'number',
        'active_callback'=> 'buzz_magazine_slider_toggle',
    )
);

$wp_customize->add_setting( 'featured_posts_layout_simple_notice_post',
    array(
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_title'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Simple_Notice_Custom_control( $wp_customize, 'featured_posts_layout_simple_notice_post',
    array(
        'label'     => esc_html__( 'Featured Posts','buzz-magazine' ),
        'active_callback'   =>'buzz_magazine_slider_featured_latest_posts',
        'style'     => esc_attr('font-size:17px;color:#555D66;text-align:center'),
        'section'   => 'slider_section',

    )
) );

$wp_customize->add_setting( 'slider_featured_per_post',
    array(
        'default'               => 6,
        'transport'             => 'refresh',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'absint'
    )
);

$wp_customize->add_control( 'slider_featured_per_post',
    array(
        'label'         => esc_html__( 'See Per Post','buzz-magazine' ),
        'active_callback'   =>'buzz_magazine_slider_featured_latest_posts',
        'section'       => 'slider_section',
        'priority'      => 10,
        'type'          => 'number',
    )
);


$wp_customize->add_setting( 'slider_layout_simple_notice_post',
    array(
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_title'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Simple_Notice_Custom_control( $wp_customize, 'slider_layout_simple_notice_post',
    array(
        'label'     => esc_html__( 'Layout','buzz-magazine' ),
        'style'     => esc_attr('font-size:17px;color:#555D66;text-align:center'),
        'section'   => 'slider_section',
        'active_callback'=> 'buzz_magazine_slider_toggle',

    )
) );

$wp_customize->add_setting('buzz_magazine_slider_layout',
    array(
        'default'           => 'layout-one',
        'transport'         => 'refresh',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    ));

$wp_customize->add_control('buzz_magazine_slider_layout',
    array(
        'label'       => esc_html__('Slider Layout', 'buzz-magazine' ),
        'type'        => 'radio',
        'active_callback'=> 'buzz_magazine_slider_toggle',
        'section'     => 'slider_section',
        'settings'    => 'buzz_magazine_slider_layout',
        'choices'     => array(
            'layout-one'         =>  esc_html__('Layout 1','buzz-magazine'),
            'layout-two'         =>  esc_html__('Layout 2','buzz-magazine'),
        )
    )

);