<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_blog_register' ) ) :
function colon_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'colon_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'colon' ),
        )
    );

	// Section Posts ===================================================
    $wp_customize->add_section(
        'colon_posts_settings',
        array (
        	'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'colon' ),
            'panel'          => 'colon_blog_settings_panel',
        )
    ); 


    // Blog page bg Title label
	$wp_customize->add_setting( 
		'colon_label_blog_bg_settings', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_blog_bg_settings', 
		array(
		    'label'       => esc_html__( 'Blog Background', 'colon' ),
		    'section'     => 'colon_posts_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_blog_bg_settings',
		    'active_callback' => 'colon_header_transparent_enable_page_title_disable',
		) 
	));

	// Blog bg color
    $wp_customize->add_setting(
        'colon_blog_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ca2e49',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_blog_bg_color',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'colon' ),
	        	'section'    => 'colon_posts_settings',
	        	'settings'   => 'colon_blog_bg_color',
	        	'active_callback' => 'colon_header_transparent_enable_page_title_disable',
	        )
	    )
    );


    // Title label
	$wp_customize->add_setting( 
		'colon_label_post_meta_settings', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_post_meta_settings', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'colon' ),
		    'section'     => 'colon_posts_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_post_meta_settings',
		) 
	));

    // Post meta
	$wp_customize->add_setting( 
		'colon_blog_post_meta_pill_checkbox',
		array(
			'default' => 'author,date,comments,readmore,image',
			'transport' => 'refresh',
			'sanitize_callback' => 'colon_sanitize_text_field'
		)
	);

	$wp_customize->add_control( 
		new Colon_Checkbox_Control( $wp_customize, 'colon_blog_post_meta_pill_checkbox',
		array(
			'label' => esc_html__( 'Post Meta Settings', 'colon' ),
			'description' => esc_html__( 'Hide/Show the post meta for blog page', 'colon' ),
			'section' => 'colon_posts_settings',
			'input_attrs' => array(
				'sortable' => false,
				'fullwidth' => true,
			),
			'choices' => array(
				'author' => esc_html__( 'Author', 'colon' ),
				'date' => esc_html__( 'Date', 'colon' ),
				'comments' => esc_html__( 'Comments', 'colon'  ),
				'readmore' => esc_html__( 'Read More', 'colon'  ),
				'image' => esc_html__( 'Featured Image', 'colon'  ),
			)
		)
	) );

	// Title label
	$wp_customize->add_setting( 
		'colon_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'colon' ),
		    'section'     => 'colon_posts_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'colon_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'colon_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Colon_Radio_Image_Control( $wp_customize,'colon_blog_sidebar_layout',
            array(
                'settings'		=> 'colon_blog_sidebar_layout',
                'section'		=> 'colon_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'colon' ),
                'choices'		=> array(
                    'right'	        => COLON_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => COLON_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => COLON_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


	// Section Single Post ===================================================
    $wp_customize->add_section(
        'colon_single_post_settings',
        array (
        	'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'colon' ),
            'panel'          => 'colon_blog_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'colon_label_single_page_title_section_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_single_page_title_section_show', 
		array(
		    'label'       => esc_html__( 'Page Title Section', 'colon' ),
		    'section'     => 'colon_single_post_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_single_page_title_section_show',
		) 
	));
	

	// Add an option to enable the page title section
	$wp_customize->add_setting( 
		'colon_enable_single_page_title_section', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_single_page_title_section', 
		array(
		    'label'       => esc_html__( 'Show Page Title Section', 'colon' ),
		    'section'     => 'colon_single_post_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_single_page_title_section',
		) 
	));


	// Add an option to enable the page title
	$wp_customize->add_setting( 
		'colon_enable_single_page_title', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_single_page_title', 
		array(
		    'label'       => esc_html__( 'Show Page Title', 'colon' ),
		    'section'     => 'colon_single_post_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_single_page_title',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'colon_label_single_post_title_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_single_post_title_show', 
		array(
		    'label'       => esc_html__( 'Post Heading', 'colon' ),
		    'section'     => 'colon_single_post_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_single_post_title_show',
		) 
	));


	// Add an option to enable the post heading
	$wp_customize->add_setting( 
		'colon_enable_single_page_heading', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_single_page_heading', 
		array(
		    'label'       => esc_html__( 'Show Post Heading', 'colon' ),
		    'section'     => 'colon_single_post_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_single_page_heading',
		) 
	));



	// Title label
	$wp_customize->add_setting( 
		'colon_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'colon' ),
		    'section'     => 'colon_single_post_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_single_pos_meta_show',
		) 
	));


	// Post meta
	$wp_customize->add_setting( 
		'colon_single_post_meta_pill_checkbox',
		array(
			'default' => 'date,author,categories,tags,comments,image,links',
			'transport' => 'refresh',
			'sanitize_callback' => 'colon_sanitize_text_field'
		)
	);

	$wp_customize->add_control( 
		new Colon_Checkbox_Control( $wp_customize, 'colon_single_post_meta_pill_checkbox',
		array(
			'label' => esc_html__( 'Post Meta Settings', 'colon' ),
			'description' => esc_html__( 'Hide/Show the post meta for single post', 'colon' ),
			'section' => 'colon_single_post_settings',
			'input_attrs' => array(
				'sortable' => false,
				'fullwidth' => true,
			),
			'choices' => array(
				'date' => esc_html__( 'Date', 'colon' ),
				'author' => esc_html__( 'Author', 'colon' ),
				'categories' => esc_html__( 'Categories', 'colon'  ),
				'tags' => esc_html__( 'Tags', 'colon'  ),
				'comments' => esc_html__( 'Comments', 'colon'  ),
				'image' => esc_html__( 'Featured Image', 'colon'  ),
				'links' => esc_html__( 'Previous/Next Links', 'colon'  ),
			)
		)
	) );

	// Title label
	$wp_customize->add_setting( 
		'colon_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'colon' ),
		    'section'     => 'colon_single_post_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'colon_blog_single_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'colon_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Colon_Radio_Image_Control( $wp_customize,'colon_blog_single_sidebar_layout',
            array(
                'settings'		=> 'colon_blog_single_sidebar_layout',
                'section'		=> 'colon_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'colon' ),
                'choices'		=> array(
                    'right'	        => COLON_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => COLON_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => COLON_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

}
endif;

add_action( 'customize_register', 'colon_customizer_blog_register' );