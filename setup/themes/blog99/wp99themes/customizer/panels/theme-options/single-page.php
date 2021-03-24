<?php
/**
 * Single Page Disable
 *
 * @package Blog99
 */
function blog99_customize_register_single_page( $wp_customize ) {

    //single page section
    $wp_customize->add_section( 'blog99_single_page_section', array(
        'title'         =>  esc_html__( 'Single Posts Page Settings', 'blog99' ),
        'panel'         =>  'blog99_theme_options_panel'
    ) );

    //Single Page
    $wp_customize->add_setting(
        'blog99_single_page_layout',
        array(
            'default'           =>'blog99-single-one',
            'sanitize_callback' => 'blog99_sanitize_radio'
        )
    );
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_single_page_layout', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'Single Page Layout', 'blog99' ),
            'section'       => 'blog99_single_page_section',
            'choices'       => array(
                    'blog99-single-one'         => esc_url( BLOG99_THEME_IMG . 'page/layout1.png'),
                    'blog99-single-two'         => esc_url( BLOG99_THEME_IMG . 'page/layout2.png'),
                )
            )
        )
    );

    //Disable Metabox
    $wp_customize->add_setting(
        'blog99_single_meta_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        new Blog99_Toggle_Control( 
            $wp_customize,
            'blog99_single_meta_disable',
            array(
                'section'     => 'blog99_single_page_section',
                'label'       => esc_html__( 'Disable Meta Information', 'blog99' ),
            )
        )
    );


    //Disable Author Section
    $wp_customize->add_setting(
        'blog99_single_author_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        new Blog99_Toggle_Control( 
            $wp_customize,
            'blog99_single_author_disable',
            array(
                'section'     => 'blog99_single_page_section',
                'label'       => esc_html__( 'Disable Author Section', 'blog99' ),
            )
        )
    );


    //Disable Related Post
    $wp_customize->add_setting(
        'blog99_single_post_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control(
			$wp_customize,
			'blog99_single_post_disable',
			array(
				'section'	  =>    'blog99_single_page_section',
                'label'		  =>    esc_html__( 'Show Related Post', 'blog99' ),
			)
		)
    );


    //Content Excerpt Limit
    $wp_customize->add_setting(
        'blog99_related_post_header_title',
        array(
            'default'           => esc_html__('Related Post','blog99'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'blog99_related_post_header_title',
		array(
			'section'	  => 'blog99_single_page_section',
			'label'		  => esc_html__( 'Related Post Title', 'blog99' ),
            'type' => 'text'
		)
    );


    //Number of Post Display
    $wp_customize->add_setting(
        'blog99_related_number_of_post',
        array(
            'default'           => 4,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
		'blog99_related_number_of_post',
		array(
			'section'	  => 'blog99_single_page_section',
			'label'		  => esc_html__( 'Number of related post', 'blog99' ),
            'type'        => 'number',
		)
    );

}
add_action( 'customize_register', 'blog99_customize_register_single_page' );