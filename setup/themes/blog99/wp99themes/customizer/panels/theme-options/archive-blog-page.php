<?php
/**
 * Home & Category Posts Settings
 *
 * @package Blog99
 */
function blog99_customize_register_archive_cat_search( $wp_customize ) {

    //header section category
    $wp_customize->add_section( 'blog99_archive_section', array(
        'title'      => esc_html__( 'Home & Category Posts Settings', 'blog99' ),
        'panel'     =>  'blog99_theme_options_panel'
    ) );

    //Disable Metabox
    $wp_customize->add_setting(
        'blog99_archvie_meta_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_archvie_meta_disable',
			array(
				'section'	  => 'blog99_archive_section',
                'label'		  => esc_html__( 'Disable Meta Information', 'blog99' ),
			)
		)
    );


    //Content Excerpt Limit
    $wp_customize->add_setting(
        'blog99_the_excerpt_word_limit',
        array(
            'default'           => 20,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
		'blog99_the_excerpt_word_limit',
		array(
			'section'	  => 'blog99_archive_section',
			'label'		  => esc_html__( 'Word limit for excerpt', 'blog99' ),
			'description' => esc_html__( 'Number of word for excerpt limit.', 'blog99' ),
            'type'        => 'number',
		)		
    );

    //Header Title Archve page
    $wp_customize->add_setting(
        'blog99_blog_header_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'blog99_blog_header_title',
		array(
			'section'	  => 'blog99_archive_section',
			'label'		  => esc_html__( 'HomePage Header Title', 'blog99' ),
            'type'        => 'text',
		)		
    );
    $wp_customize->selective_refresh->add_partial( 'blog99_blog_header_title', array(
        'selector' 			=> '#blog99-main-slider-section',
    ) );


    //Post Layout Settings
    $wp_customize->add_setting(
        'blog99_blog_style',
        array(
            'default'           =>  'list',
            'sanitize_callback' =>  'blog99_sanitize_radio'
        )
    );
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_blog_style', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'Blog Layout', 'blog99' ),
            'description'   => esc_html__(' Select layout 1) List 2) Grid and 3) Masonry. ','blog99'),
            'section'       => 'blog99_archive_section',
            'choices'       => array(
                    'list'             =>  esc_url( BLOG99_THEME_IMG . 'blog/blog-list.png'),
                    'grid'             =>  esc_url( BLOG99_THEME_IMG . 'blog/blog-grid.png'),
                    'masonry'          =>  esc_url( BLOG99_THEME_IMG . 'blog/blog-masonry.png'),
                )
            )
        )
    );

}
add_action( 'customize_register', 'blog99_customize_register_archive_cat_search' );
