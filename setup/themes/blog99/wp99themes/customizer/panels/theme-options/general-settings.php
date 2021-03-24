<?php
/**
 * Header  Settings
 *
 * @package Blog99
 */
function blog99_customize_register_general_setting( $wp_customize ) {

    $wp_customize->get_section( 'colors' )->title = esc_html__('Theme Colors Setting', 'blog99');
    //$wp_customize->get_section( 'colors' )->priority = 8;

    // Primary Color.
    /*$wp_customize->add_setting('blog99_primary_color', array(
        'default' => '#165da5',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control('blog99_primary_color', array(
        'type' => 'color',
        'label' => esc_html__('Primary Color', 'blog99'),
        'section' => 'colors',
        'priority' => 1,
    ));*/

    //header section
    $wp_customize->add_section( 'blog99_general_section', array(
        'title'      => esc_html__( 'General Settings', 'blog99' ),
        'priority'   => 1
    ) );


    //Theme layout
    $wp_customize->add_setting(
        'blog99_theme_layout_settings',
        array(
            'default'           =>  'blog99-wide-layout',
            'sanitize_callback' =>  'blog99_sanitize_radio'
        )
    );
    
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_theme_layout_settings', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'WebPage Layout Settings', 'blog99' ),
            'section'       => 'blog99_general_section',
            'choices'       => array(
                    'blog99-wide-layout'             =>  esc_url( BLOG99_THEME_IMG . 'box-layout/wide-layout.jpg'),
                    'blog99-box-layout'             =>  esc_url( BLOG99_THEME_IMG . 'box-layout/box-layout.jpg'),
                )
            )
        )
    );

    //Disable the Social Links
    $wp_customize->add_setting(
        'blog99_header_enable_sticky_menu',
        array(
            'default'           => false,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_header_enable_sticky_menu',
			array(
				'section'	  => 'blog99_general_section',
                'label'		  => esc_html__( 'Enable Sticky Menu', 'blog99' ),
                'description' =>    esc_html__('Sticky menu behaviour', 'blog99')
			)
		)
    );

    //Disable page animation
    $wp_customize->add_setting(
        'blog99_disable_page_scroll_animation',
        array(
            'default'           => false,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_disable_page_scroll_animation',
			array(
				'section'	  => 'blog99_general_section',
                'label'		  => esc_html__( 'Disable page scroll animation', 'blog99' ),
                'description'		  => esc_html__( 'Page load animation while scroll page', 'blog99' ),
			)
		)
    );

    //Disable sidebar sticky
    $wp_customize->add_setting(
        'blog99_disable_sidebar_sticky',
        array(
            'default'           => false,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_disable_sidebar_sticky',
			array(
				'section'	  => 'blog99_general_section',
                'label'		  => esc_html__( 'Disable sidebar sticky', 'blog99' ),
			)
		)
    );

    //enable dark version
    $wp_customize->add_setting(
        'blog99_enable_dark_version',
        array(
            'default'           => false,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_enable_dark_version',
			array(
				'section'	  => 'blog99_general_section',
                'label'		  => esc_html__( 'Enable Dark Version', 'blog99' ),
                'description'		  => esc_html__( 'Enable Dark Version theme', 'blog99' ),
			)
		)
    );
}
add_action( 'customize_register', 'blog99_customize_register_general_setting' );