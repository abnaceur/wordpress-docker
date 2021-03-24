<?php
/**
 * Theme Option >> Single Page / Post
 * Registers Single Page / Post Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section( 'single_page_post',
    array(
        'title'                 => esc_html__( 'Single Page/Post ','buzz-magazine' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting( 'toggle_related_posts',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean'

    )
);

$wp_customize->add_control(  new Buzz_Magazine_Customizer_Toggle_Control( $wp_customize,'toggle_related_posts',
    array(
        'label'           => esc_html__( 'Enable Related Posts', 'buzz-magazine' ),
        'section'         => 'single_page_post',
        'priority'        => 10,
        'type'            => 'buzz-magazine-flat',

    )
));


$wp_customize->add_setting('related_posts_title',
    array(
        'transport'         => 'refresh',
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('related_posts_title',
    array(
        'label'         => esc_html__('Related Posts Title', 'buzz-magazine'),
        'section'       => 'single_page_post',
        'priority'      => 10,
        'active_callback' => 'buzz_magazine_toggle_related_posts',
        'type'          => 'text',
    )
);


$wp_customize->add_setting('related_per_posts',
    array(
        'transport' => 'refresh',
        'default' => absint(4),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key'

    )
);

$wp_customize->add_control('related_per_posts',
    array(
        'label' => esc_html__('Number Of Related Posts', 'buzz-magazine'),
        'section' => 'single_page_post',
        'priority' => 10,
        'active_callback' => 'buzz_magazine_toggle_related_posts',
        'type' => 'number',
    )
);

$wp_customize->add_setting( 'single_post_align',
    array(
        'default'           => 'left',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Text_Radio_Button_Custom_Control( $wp_customize, 'single_post_align',
    array(
        'label'     => esc_html__( 'Text Alignment','buzz-magazine' ),
        'section'   => 'single_page_post',
        'choices'   => array(
            'left'       => esc_html__( 'Left','buzz-magazine' ),
            'center'     => esc_html__( 'Centered' ,'buzz-magazine'),
            'right'      => esc_html__( 'Right','buzz-magazine' )
        )
    )));


$wp_customize->add_setting( 'simple_notice_page',
    array(
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_title'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Simple_Notice_Custom_control( $wp_customize, 'simple_notice_page',
    array(
        'label'     => esc_html__( 'Page','buzz-magazine' ),
        'style'     => esc_attr('font-size:18px;color:#555D66;text-align:center;'),
        'section'   => 'single_page_post'
    )
) );

$wp_customize->add_setting( 'page_align',
    array(
        'default'           => 'left',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'buzz_magazine_sanitize_select'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Text_Radio_Button_Custom_Control( $wp_customize, 'page_align',
    array(
        'label'     => esc_html__( 'Text Alignment','buzz-magazine' ),
        'section'   => 'single_page_post',
        'choices'   => array(
            'left'       => esc_html__( 'Left','buzz-magazine' ),
            'center'     => esc_html__( 'Centered' ,'buzz-magazine'),
            'right'      => esc_html__( 'Right','buzz-magazine' )
        )
    )));


