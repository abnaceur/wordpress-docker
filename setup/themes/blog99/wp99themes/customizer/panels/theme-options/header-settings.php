<?php
/**
 * Header  Settings
 *
 * @package Blog99
 */
function blog99_customize_register_header( $wp_customize ) {

    //header section
    $wp_customize->add_section( 'blog99_header_section', array(
        'title'      => esc_html__( 'Header Layout Settings', 'blog99' ),
        'panel'     =>  'blog99_theme_options_panel'
    ) );

    //Disable the Social Links
    $wp_customize->add_setting(
        'blog99_header_social_section_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_header_social_section_disable',
			array(
				'section'	  => 'blog99_header_section',
                'label'		  => esc_html__( 'Enable Social Icon', 'blog99' ),
                'description' =>    esc_html__('hide/show social icons block', 'blog99')
			)
		)
    );

    //Disable the Social Links
    $wp_customize->add_setting(
        'blog99_header_disable_cart',
        array(
            'default'           => false,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_header_disable_cart',
			array(
				'section'	  => 'blog99_header_section',
                'label'		  => esc_html__( 'Show Cart Icon', 'blog99' ),
                'description'		  => esc_html__( 'hide/show woocommerce cart icon; only works if woocommerce enable', 'blog99' ),
			)
		)
    );

    //Disable the Search
    $wp_customize->add_setting(
        'blog99_header_disable_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_header_disable_search',
			array(
				'section'	  => 'blog99_header_section',
                'label'		  => esc_html__( 'Show Search Icon', 'blog99' ),
			)
		)
    );

    //hide site description
    $wp_customize->add_setting(
        'blog99_header_hide_description',
        array(
            'default'           => false,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_header_hide_description',
			array(
				'section'	  => 'blog99_header_section',
                'label'		  => esc_html__( 'Hide site description', 'blog99' ),
			)
		)
    );


    
    //header layout
    $wp_customize->add_setting(
        'blog99_header_layout',
        array(
            'default'           =>  'two',
            'sanitize_callback' =>  'blog99_sanitize_radio'
        )
    );
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_header_layout', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'Header Layout', 'blog99' ),
            'description'   => esc_html__('Try diffrent header layout','blog99'),
            'section'       => 'blog99_header_section',
            'choices'       => array(
                    'one'            => esc_url( BLOG99_THEME_IMG . 'header/blog99-header-one.png'),
                    'two'            => esc_url( BLOG99_THEME_IMG . 'header/blog99-header-two.png'),
                )
            )
        )
    );

    //select refresh
	$wp_customize->selective_refresh->add_partial( 'blog99_header_layout', array(
        'selector' 			=> '.blog99-social-links',
    ) );


    // Social Links
    $wp_customize->add_setting( 
        'blog99_facebook_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 
        'blog99_facebook_url', 
        array(
            'label'     => esc_html__( 'Facebook URL', 'blog99' ),
            'section'   => 'blog99_header_section',
            'type'      => 'text',
        )
    );

    //twitter url
    $wp_customize->add_setting( 
        'blog99_twitter_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 
        'blog99_twitter_url', 
        array(
            'label'     => esc_html__( 'Twitter URL', 'blog99' ),
            'section'   => 'blog99_header_section',
            'type'      => 'text',
        )
    );

    //youtube url
    $wp_customize->add_setting( 
        'blog99_youtube_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 
        'blog99_youtube_url', 
        array(
            'label' => esc_html__( 'Youtube URL', 'blog99' ),
            'section' => 'blog99_header_section',
            'type' => 'text',
        )
    );

    //pinintrest url
    $wp_customize->add_setting( 
        'blog99_pinintrest_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 
        'blog99_pinintrest_url', 
        array(
            'label'         => esc_html__( 'Pinintrest URL', 'blog99' ),
            'section'       => 'blog99_header_section',
            'type'          => 'text',
        )
    );

    #fonts settings for title
    $wp_customize->add_setting( 'blog99_header_title_fonts', array(
            'sanitize_callback' => 'blog99_sanitize_fonts',
            'default'           => 'Lovers Quarrel',
        )
    );
    
    $wp_customize->add_control( 'blog99_header_title_fonts', array(
            'label'     => esc_html__( 'Header title font', 'blog99' ),
            'type'      => 'select',
            'description'   => esc_html__( 'Select your desired font for header title and description.', 'blog99' ),
            'section'       => 'blog99_header_section',
            'choices'       => get_blog99_google_font_list()
        )
    );


    $wp_customize->add_setting( 'blog99_header_title_fonts_size', array(
            'sanitize_callback' => 'blog99_intval',
            'default'           => '100'
        )
    );
    
    $wp_customize->add_control( 'blog99_header_title_fonts_size', array(
            'label'     => esc_html__( 'Header title font size', 'blog99' ),
            'type'      => 'select',
            'description'   => esc_html__( 'Select your desired font size for header title', 'blog99' ),
            'section'       => 'blog99_header_section',
            'choices'       => array(25 => 25, 30=> 30, 40 => 40, 50 => 50, 80 => 80, 100 => 100, 120 => 120, 135 => 135, 150 => 150)
        )
    );

    #fonts settings for description
    $wp_customize->add_setting( 'blog99_header_description_fonts', array(
            'sanitize_callback' => 'blog99_sanitize_fonts',
            'default'           => 'Dancing Script',
        )
    );
    
    $wp_customize->add_control( 'blog99_header_description_fonts', array(
            'label'         => esc_html__( 'Header description font size', 'blog99' ),
            'type'          => 'select',
            'description'   => esc_html__( 'Select your desired font size for header description.', 'blog99' ),
            'section'       => 'blog99_header_section',
            'choices'       => get_blog99_google_font_list()
        )
    );

    $wp_customize->add_setting( 'blog99_header_description_fonts_size', array(
            'sanitize_callback' => 'blog99_intval',
            'default'           => 20,
        )
    );
    
    $wp_customize->add_control( 'blog99_header_description_fonts_size', array(
            'label'     => esc_html__( 'Header description font size', 'blog99' ),
            'type'      => 'select',
            'description'   => esc_html__( 'Select your desired font size for header description', 'blog99' ),
            'section'       => 'blog99_header_section',
            'choices'       => array(10 => 10, 12 => 12, 15 => 15, 20 => 20, 23=> 23, 25 => 25, 30 => 30)
        )
    );
    
}
add_action( 'customize_register', 'blog99_customize_register_header' );