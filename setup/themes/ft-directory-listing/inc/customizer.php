<?php
/**
 * FT Directory Listing Theme Customizer
 *
 * @package ft_directory_listing
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ft_directory_listing_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$ft_directory_listing_options = ft_directory_listing_theme_options();

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ft_directory_listing_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ft_directory_listing_customize_partial_blogdescription',
			)
		);
	}


    $wp_customize->add_setting('ft_directory_listing_theme_options[site_title_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $ft_directory_listing_options['site_title_show'],
            'sanitize_callback' => 'ft_directory_listing_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('ft_directory_listing_theme_options[site_title_show]',
        array(
            'label' => esc_html__('Show Title & Tagline', 'ft-directory-listing'),
            'type' => 'Checkbox',
            'section' => 'title_tagline',

        )
    );


    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Theme Options', 'ft-directory-listing'),
            'priority' => 2,
        )
    );



    /* Banner Section */

    $wp_customize->add_section(
        'banner_section',
        array(
            'title' => esc_html__( 'Banner Section','ft-directory-listing' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );




	$wp_customize->add_setting('ft_directory_listing_theme_options[banner_title]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('banner_title',
	    array(
	        'label' => esc_html__('Title', 'ft-directory-listing'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'ft_directory_listing_theme_options[banner_title]',
	    )
	);


	$wp_customize->add_setting('ft_directory_listing_theme_options[banner_bg_image]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'ft_directory_listing_theme_options[banner_bg_image]',
	        array(
	            'label' => esc_html__('Add Background Image', 'ft-directory-listing'),
	            'section' => 'banner_section',
	            'settings' => 'ft_directory_listing_theme_options[banner_bg_image]',
	        ))
	);










    /* Listing Section */

    $wp_customize->add_section(
        'listing_item_section',
        array(
            'title' => esc_html__( 'Listing Section','ft-directory-listing' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );


    $wp_customize->add_setting('ft_directory_listing_theme_options[listing_item_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $ft_directory_listing_options['listing_item_show'],
            'sanitize_callback' => 'ft_directory_listing_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('ft_directory_listing_theme_options[listing_item_show]',
        array(
            'label' => esc_html__('Listings Section Options', 'ft-directory-listing'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'listing_item_section',

        )
    );

	$wp_customize->add_setting('ft_directory_listing_theme_options[listing_item_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $ft_directory_listing_options['listing_item_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('ft_directory_listing_theme_options[listing_item_title]',
	    array(
	        'label' => esc_html__('Section Title', 'ft-directory-listing'),
	        'priority' => 1,
	        'section' => 'listing_item_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('ft_directory_listing_theme_options[listing_item_desc]',
	    array(
	        'default' => $ft_directory_listing_options['listing_item_desc'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('ft_directory_listing_theme_options[listing_item_desc]',
	    array(
	        'label' => esc_html__(' Section Description', 'ft-directory-listing'),
	        'type' => 'text',
	        'section' => 'listing_item_section',
	        'settings' => 'ft_directory_listing_theme_options[listing_item_desc]',
	    )
	);




    /* CTA Section */

    $wp_customize->add_section(
        'cta_section',
        array(
            'title' => esc_html__( 'Call to Action Section','ft-directory-listing' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );


    $wp_customize->add_setting('ft_directory_listing_theme_options[cta_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $ft_directory_listing_options['cta_show'],
            'sanitize_callback' => 'ft_directory_listing_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('ft_directory_listing_theme_options[cta_show]',
        array(
            'label' => esc_html__('Show CTA Section', 'ft-directory-listing'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'cta_section',

        )
    );
	$wp_customize->add_setting('ft_directory_listing_theme_options[cta_title]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('cta_title',
	    array(
	        'label' => esc_html__('Title', 'ft-directory-listing'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'ft_directory_listing_theme_options[cta_title]',
	    )
	);


	$wp_customize->add_setting('ft_directory_listing_theme_options[cta_button_txt]',
	    array(
	        'type' => 'option',
	        'default' => $ft_directory_listing_options['cta_button_txt'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('ft_directory_listing_theme_options[cta_button_txt]',
	    array(
	        'label' => esc_html__('CTA Button Text', 'ft-directory-listing'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'ft_directory_listing_theme_options[cta_button_txt]',
	    )
	);
	$wp_customize->add_setting('ft_directory_listing_theme_options[cta_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $ft_directory_listing_options['cta_button_url'],
	        'sanitize_callback' => 'ft_directory_listing_sanitize_url',
	    )
	);
	$wp_customize->add_control('ft_directory_listing_theme_options[cta_button_url]',
	    array(
	        'label' => esc_html__('CTA Button Link', 'ft-directory-listing'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'ft_directory_listing_theme_options[cta_button_url]',
	    )
	);


	$wp_customize->add_setting('ft_directory_listing_theme_options[cta_bg_image]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'ft_directory_listing_theme_options[cta_bg_image]',
	        array(
	            'label' => esc_html__('Add Background Image', 'ft-directory-listing'),
	            'section' => 'cta_section',
	            'settings' => 'ft_directory_listing_theme_options[cta_bg_image]',
	        ))
	);






    /* Blog Section */

    $wp_customize->add_section(
        'blog_section',
        array(
            'title' => esc_html__( 'Blog Section','ft-directory-listing' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('ft_directory_listing_theme_options[blog_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $ft_directory_listing_options['blog_show'],
            'sanitize_callback' => 'ft_directory_listing_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('ft_directory_listing_theme_options[blog_show]',
        array(
            'label' => esc_html__('Show Blog Section', 'ft-directory-listing'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blog_section',

        )
    );
	$wp_customize->add_setting('ft_directory_listing_theme_options[blog_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $ft_directory_listing_options['blog_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('ft_directory_listing_theme_options[blog_title]',
	    array(
	        'label' => esc_html__('Section Title', 'ft-directory-listing'),
	        'priority' => 1,
	        'section' => 'blog_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('ft_directory_listing_theme_options[blog_desc]',
	    array(
	        'default' => $ft_directory_listing_options['blog_desc'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('ft_directory_listing_theme_options[blog_desc]',
	    array(
	        'label' => esc_html__('Blog Section Description', 'ft-directory-listing'),
	        'type' => 'text',
	        'section' => 'blog_section',
	        'settings' => 'ft_directory_listing_theme_options[blog_desc]',
	    )
	);

	$wp_customize->add_setting('ft_directory_listing_theme_options[blog_category]', array(
	    'default' => $ft_directory_listing_options['blog_category'],
	    'type' => 'option',
	    'sanitize_callback' => 'ft_directory_listing_sanitize_select',
	    'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control(new ft_directory_listing_Dropdown_Customize_Control(
	    $wp_customize, 'ft_directory_listing_theme_options[blog_category]',
	    array(
	        'label' => esc_html__('Select Blog Category', 'ft-directory-listing'),
	        'section' => 'blog_section',
	        'choices' => ft_directory_listing_get_categories_select(),
	        'settings' => 'ft_directory_listing_theme_options[blog_category]',
	    )
	));

     function ft_directory_listing_sanitize_checkbox( $input ) {
        if ( true === $input ) {
            return 1;
         } else {
            return 0;
         }
    }

    /* Blog Section */

    $wp_customize->add_section(
        'prefooter_section',
        array(
            'title' => esc_html__( 'Prefooter Section','ft-directory-listing' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('ft_directory_listing_theme_options[show_prefooter]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $ft_directory_listing_options['show_prefooter'],
            'sanitize_callback' => 'ft_directory_listing_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('ft_directory_listing_theme_options[show_prefooter]',
        array(
            'label' => esc_html__('Show Prefooter Section', 'ft-directory-listing'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'prefooter_section',

        )
    );
}
add_action( 'customize_register', 'ft_directory_listing_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ft_directory_listing_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ft_directory_listing_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ft_directory_listing_customize_preview_js() {
	wp_enqueue_script( 'ft-directory-listing-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ft_directory_listing_customize_preview_js' );
