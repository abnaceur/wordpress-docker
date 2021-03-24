<?php
/**
 * Blogzilla Theme Customizer
 *
 * @package blogzilla
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogzilla_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $blogzilla_options = blogzilla_theme_options();
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blogzilla_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blogzilla_customize_partial_blogdescription',
		) );
	}

    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Theme Options', 'blogzilla'),
            'priority' => 2,
        )
    );

    $wp_customize->add_section(
        'blogzilla_header_section',
        array(
            'title' => esc_html__( 'Header & Footer Social Icons','blogzilla' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('blogzilla_theme_options[facebook_link]',
        array(
            'type' => 'option',
            'default' => $blogzilla_options['facebook_link'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('blogzilla_theme_options[facebook_link]',
        array(
            'label'           => esc_html__('Facebook Link','blogzilla'),
            'type'            => 'text',
            'section'         => 'blogzilla_header_section',
            'settings'        => 'blogzilla_theme_options[facebook_link]',
        )
    );
    $wp_customize->add_setting('blogzilla_theme_options[youtube_link]',
        array(
            'type' => 'option',
            'default' => $blogzilla_options['youtube_link'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('blogzilla_theme_options[youtube_link]',
        array(
            'label'           => esc_html__('Youtube Link','blogzilla'),
            'type'            => 'text',
            'section'         => 'blogzilla_header_section',
            'settings'        => 'blogzilla_theme_options[youtube_link]',
        )
    );

    $wp_customize->add_setting('blogzilla_theme_options[twitter_link]',
        array(
            'type' => 'option',
            'default' => $blogzilla_options['twitter_link'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('blogzilla_theme_options[twitter_link]',
        array(
            'label'           => esc_html__('Twitter Link','blogzilla'),
            'type'            => 'text',
            'section'         => 'blogzilla_header_section',
            'settings'        => 'blogzilla_theme_options[twitter_link]',
        )
    );
    $wp_customize->add_setting('blogzilla_theme_options[pinterest_link]',
        array(
            'type' => 'option',
            'default' => $blogzilla_options['pinterest_link'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('blogzilla_theme_options[pinterest_link]',
        array(
            'label'           => esc_html__('Pinterest Link','blogzilla'),
            'type'            => 'text',
            'section'         => 'blogzilla_header_section',
            'settings'        => 'blogzilla_theme_options[pinterest_link]',
        )
    );
    $wp_customize->add_setting('blogzilla_theme_options[instagram_link]',
        array(
            'type' => 'option',
            'default' => $blogzilla_options['instagram_link'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('blogzilla_theme_options[instagram_link]',
        array(
            'label'           => esc_html__('Instagram Link','blogzilla'),
            'type'            => 'text',
            'section'         => 'blogzilla_header_section',
            'settings'        => 'blogzilla_theme_options[instagram_link]',
        )
    );



    $wp_customize->add_section(
        'blogzilla_banner_section',
        array(
            'title' => esc_html__( 'Hero Banner Section','blogzilla' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('blogzilla_theme_options[banner_show_checkbox]',
        array(
            'type' => 'option',
            'default'        => 1,
            'default' => $blogzilla_options['banner_show_checkbox'],
            'sanitize_callback' => 'blogzilla_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('blogzilla_theme_options[banner_show_checkbox]',
        array(
            'label' => esc_html__('Show Banner Section', 'blogzilla'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blogzilla_banner_section',

        )
    );

	$wp_customize->add_setting('blogzilla_theme_options[banner_image_title]',
	    array(
	        'type' => 'option',
	        'default' => $blogzilla_options['banner_image_title'],
	        'sanitize_callback' => 'esc_html',
	    )
	);
	$wp_customize->add_control('blogzilla_theme_options[banner_image_title]',
	    array(
	        'label'           => esc_html__( 'Title', 'blogzilla' ),
	        'type'            => 'text',
	        'section'         => 'blogzilla_banner_section',
	    )
	);

	$wp_customize->add_setting('blogzilla_theme_options[banner_image_description]',
	    array(
	        'type' => 'option',
	        'default' => $blogzilla_options['banner_image_description'],
	        'sanitize_callback' => 'esc_html',
	    )
	);
	$wp_customize->add_control('blogzilla_theme_options[banner_image_description]',
	    array(
	        'label'           => esc_html__('Description','blogzilla'),
	        'type'            => 'textarea',
	        'section'         => 'blogzilla_banner_section',
	    )
	);

	$wp_customize->add_setting('blogzilla_theme_options[upload_banner_image]',
	    array(
	        'type' => 'option',
	        'default' => $blogzilla_options['upload_banner_image'],
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'blogzilla_theme_options[upload_banner_image]',
	        array(
	            'label'           => esc_html__( 'Add Image', 'blogzilla' ),
	            'section'         => 'blogzilla_banner_section',
	            'settings'        => 'blogzilla_theme_options[upload_banner_image]',
	        ) )
	);

	$wp_customize->add_setting('blogzilla_theme_options[single_btn1]',
	    array(
	        'type' => 'option',
	        'default' => $blogzilla_options['single_btn1'],
	        'sanitize_callback' => 'esc_html',
	    )
	);
	$wp_customize->add_control('blogzilla_theme_options[single_btn1]',
	    array(
	        'label'           => esc_html__('Button Text','blogzilla'),
	        'type'            => 'text',
	        'section'         => 'blogzilla_banner_section',
	        'settings'        => 'blogzilla_theme_options[single_btn1]',
	    )
	);
	$wp_customize->add_setting('blogzilla_theme_options[single_link1]',
	    array(
	        'type' => 'option',
	        'default' => $blogzilla_options['single_link1'],
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control('blogzilla_theme_options[single_link1]',
	    array(
	        'label'           => esc_html__('Button Link','blogzilla'),
	        'type'            => 'text',
	        'section'         => 'blogzilla_banner_section',
	        'settings'        => 'blogzilla_theme_options[single_link1]',
	    )
	);
 //checkbox sanitization function
     function blogzilla_sanitize_checkbox( $input ) {
        if ( true === $input ) {
            return 1;
         } else {
            return 0;
         }
    }


    $wp_customize->add_section(
        'blogzilla_sidebar_option',
        array(
            'title' => esc_html__( 'Sidebar Option','blogzilla' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );
    $wp_customize->add_setting('blogzilla_theme_options[sidebar_show_checkbox]',
        array(
            'type' => 'option',
            'default'        => 0,
            'default' => $blogzilla_options['sidebar_show_checkbox'],
            'sanitize_callback' => 'blogzilla_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('blogzilla_theme_options[sidebar_show_checkbox]',
        array(
            'label' => esc_html__('Show Sidebar in Post Archives', 'blogzilla'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blogzilla_sidebar_option',

        )
    );

    $wp_customize->add_setting('blogzilla_theme_options[single_sidebar_show_checkbox]',
        array(
            'type' => 'option',
            'default'        => 0,
            'default' => $blogzilla_options['single_sidebar_show_checkbox'],
            'sanitize_callback' => 'blogzilla_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('blogzilla_theme_options[single_sidebar_show_checkbox]',
        array(
            'label' => esc_html__('Show Sidebar in Single Post', 'blogzilla'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blogzilla_sidebar_option',

        )
    );

    $wp_customize->add_setting('blogzilla_theme_options[single_sidebar_page_show_checkbox]',
        array(
            'type' => 'option',
            'default'        => 0,
            'default' => $blogzilla_options['single_sidebar_page_show_checkbox'],
            'sanitize_callback' => 'blogzilla_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('blogzilla_theme_options[single_sidebar_page_show_checkbox]',
        array(
            'label' => esc_html__('Show Sidebar in Single Pages', 'blogzilla'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blogzilla_sidebar_option',

        )
    );

    $wp_customize->add_section(
        'blogzilla_prefooter_section',
        array(
            'title' => esc_html__( 'Prefooter Section','blogzilla' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );
    $wp_customize->add_setting('blogzilla_theme_options[prefooter_checkbox]',
        array(
            'type' => 'option',
            'default'        => 1,
            'default' => $blogzilla_options['prefooter_checkbox'],
            'sanitize_callback' => 'blogzilla_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('blogzilla_theme_options[prefooter_checkbox]',
        array(
            'label' => esc_html__('Show Prefooter Section', 'blogzilla'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blogzilla_prefooter_section',

        )
    );
}
add_action( 'customize_register', 'blogzilla_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogzilla_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogzilla_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogzilla_customize_preview_js() {
	wp_enqueue_script( 'blogzilla-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogzilla_customize_preview_js' );
