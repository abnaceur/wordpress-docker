<?php
/**
 * Theme Layout Hear
 *
 * @package blog99
 */

function blog99_sidebar_layout_settings( $wp_customize ) {
	
    //Products Category
    $wp_customize->add_section( 'blog99_theme_sidebar_section', array(
        'title'    => esc_html__( 'Page Design Layout Settings', 'blog99' ),
        'panel'    =>'blog99_theme_options_panel'
    ) );
    
    //Archive or blog page section
    $wp_customize->add_setting(
        'blog99_archiver_sierbar_layout',
        array(
            'default' =>'blog99-right-sidebar',
            'sanitize_callback' => 'blog99_sanitize_radio'
        )
    );
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_archiver_sierbar_layout', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'Home & Category Page Layout', 'blog99'  ),
            'description'   => esc_html__('Home and category page sidebar layout.','blog99' ),
            'section'       => 'blog99_theme_sidebar_section',
            'priority'      => 1,
            'choices'       => array(
                    'blog99-left-sidebar'           => esc_url( BLOG99_THEME_IMG . 'sidebar/left-sidebar.jpg'),
                    'blog99-right-sidebar'          => esc_url( BLOG99_THEME_IMG . 'sidebar/right-sidebar.jpg'),
                    'blog99-both-sidebar'           => esc_url( BLOG99_THEME_IMG . 'sidebar/both-sidebar.jpg'),
                    'blog99-full-width'             => esc_url( BLOG99_THEME_IMG . 'sidebar/full-width.jpg'),
                )
            )
        )
    ); 


    //Single page siebar section
    $wp_customize->add_setting(
        'blog99_single_page_sierbar_layout',
        array(
            'default' =>'blog99-right-sidebar',
            'sanitize_callback' => 'blog99_sanitize_radio'
        )
    );
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_single_page_sierbar_layout', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'Single Posts Detail Layout', 'blog99'  ),
            'description'   => esc_html__('Single posts detail sidebar layout.','blog99' ),
            'section'       => 'blog99_theme_sidebar_section',
            'priority'      => 2,
            'choices'       => array(
                    'blog99-left-sidebar'           => esc_url( BLOG99_THEME_IMG . 'sidebar/left-sidebar.jpg'),
                    'blog99-right-sidebar'          => esc_url( BLOG99_THEME_IMG . 'sidebar/right-sidebar.jpg'),
                    'blog99-both-sidebar'           => esc_url( BLOG99_THEME_IMG . 'sidebar/both-sidebar.jpg'),
                    'blog99-full-width'             => esc_url( BLOG99_THEME_IMG . 'sidebar/full-width.jpg'),
                )
            )
        )
    );


    //Page siebar section
    $wp_customize->add_setting(
        'blog99_page_sierbar_layout',
        array(
            'default' =>'blog99-right-sidebar',
            'sanitize_callback' => 'blog99_sanitize_radio'
        )
    );
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_page_sierbar_layout', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'Page Sidebar Layout', 'blog99'  ),
            'description'   => esc_html__('Page sidebar layout. Ex left-sidebar','blog99' ),
            'section'       => 'blog99_theme_sidebar_section',
            'priority'      => 3,
            'choices'       => array(
                    'blog99-left-sidebar'           => esc_url( BLOG99_THEME_IMG . 'sidebar/left-sidebar.jpg'),
                    'blog99-right-sidebar'          => esc_url( BLOG99_THEME_IMG . 'sidebar/right-sidebar.jpg'),
                    'blog99-both-sidebar'           => esc_url( BLOG99_THEME_IMG . 'sidebar/both-sidebar.jpg'),
                    'blog99-full-width'             => esc_url( BLOG99_THEME_IMG . 'sidebar/full-width.jpg'),
                )
            )
        )
    );

}
add_action( 'customize_register', 'blog99_sidebar_layout_settings' );