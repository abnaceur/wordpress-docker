<?php
/**
 * VW Life Coach Theme Customizer
 *
 * @package VW Life Coach
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_life_coach_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_life_coach_custom_controls' );

function vw_life_coach_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_life_coach_customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_life_coach_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$vw_life_coach_parent_panel = new VW_Life_Coach_WP_Customize_Panel( $wp_customize, 'vw_life_coach_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-life-coach' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_life_coach_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vw-life-coach' ),
		'panel' => 'vw_life_coach_panel_id'
	) );

	$wp_customize->add_setting('vw_life_coach_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Life_Coach_Image_Radio_Control($wp_customize, 'vw_life_coach_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-life-coach'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-life-coach'),
        'section' => 'vw_life_coach_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_life_coach_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control('vw_life_coach_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-life-coach'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-life-coach'),
        'section' => 'vw_life_coach_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-life-coach'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-life-coach'),
            'One Column' => esc_html__('One Column','vw-life-coach'),
            'Three Columns' => esc_html__('Three Columns','vw-life-coach'),
            'Four Columns' => esc_html__('Four Columns','vw-life-coach'),
            'Grid Layout' => esc_html__('Grid Layout','vw-life-coach')
        ),
	) );

	$wp_customize->add_setting('vw_life_coach_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control('vw_life_coach_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-life-coach'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-life-coach'),
        'section' => 'vw_life_coach_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-life-coach'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-life-coach'),
            'One Column' => esc_html__('One Column','vw-life-coach')
        ),
	) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_life_coach_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-life-coach' ),
		'section' => 'vw_life_coach_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_life_coach_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-life-coach' ),
		'section' => 'vw_life_coach_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'vw_life_coach_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-life-coach' ),
        'section' => 'vw_life_coach_left_right'
    )));

	$wp_customize->add_setting('vw_life_coach_loader_icon',array(
        'default' => 'Two Way',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control('vw_life_coach_loader_icon',array(
        'type' => 'select',
        'label' => esc_html__('Pre-Loader Type','vw-life-coach'),
        'section' => 'vw_life_coach_left_right',
        'choices' => array(
            'Two Way' => esc_html__('Two Way','vw-life-coach'),
            'Dots' => esc_html__('Dots','vw-life-coach'),
            'Rotate' => esc_html__('Rotate','vw-life-coach')
        ),
	) );

	//Top Header
	$wp_customize->add_section( 'vw_life_coach_top_header' , array(
    	'title' => esc_html__( 'Top Header', 'vw-life-coach' ),
		'panel' => 'vw_life_coach_panel_id'
	) );

	$wp_customize->add_setting('vw_life_coach_top_bar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_life_coach_top_bar_text',array(
		'label'	=> esc_html__('Anouncement Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Lorem ipsum dolor sit amet ipsum dolor sit amet.', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_life_coach_email_text',array(
		'label'	=> esc_html__('Email Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Mail', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('vw_life_coach_email_address',array(
		'label'	=> esc_html__('Email Address','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'support@email.com', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_phone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_life_coach_phone_text',array(
		'label'	=> esc_html__('Phone Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Phone', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_life_coach_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_life_coach_phone_number',array(
		'label'	=> esc_html__('Phone Number','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '+00 123 456 7890', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_cosulation_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_life_coach_cosulation_btn_text',array(
		'label'	=> esc_html__('Button Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Get Free Consulation!', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_cosulation_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_life_coach_cosulation_btn_link',array(
		'label'	=> esc_html__('Button Link','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://www.example.com', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_life_coach_doc_download_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_life_coach_doc_download_text',array(
		'label'	=> esc_html__('Docs Download Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Get Free Life Coach Magazine!', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_doc_download_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_life_coach_doc_download_link',array(
		'label'	=> esc_html__('Docs Download Link','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://www.example.zip', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_top_header',
		'type'=> 'url'
	));
	    
	//Slider
	$wp_customize->add_section( 'vw_life_coach_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'vw-life-coach' ),
		'panel' => 'vw_life_coach_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_life_coach_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'vw_life_coach_customize_partial_vw_life_coach_slider_arrows',
	));

	$wp_customize->add_setting( 'vw_life_coach_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-life-coach' ),
      	'section' => 'vw_life_coach_slidersettings'
    )));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_life_coach_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'vw_life_coach_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_life_coach_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'vw-life-coach' ),
			'description' => esc_html__('Slider image size (1400 x 550)','vw-life-coach'),
			'section'  => 'vw_life_coach_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_life_coach_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Life_Coach_Image_Radio_Control($wp_customize, 'vw_life_coach_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','vw-life-coach'),
        'section' => 'vw_life_coach_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_life_coach_slider_excerpt_number', array(
		'default'              => 25,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_life_coach_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_life_coach_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-life-coach' ),
		'section'     => 'vw_life_coach_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_life_coach_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );
 
	//Services
	$wp_customize->add_section('vw_life_coach_services',array(
		'title'	=> __('Services Section','vw-life-coach'),
		'panel' => 'vw_life_coach_panel_id',
	));

	$wp_customize->add_setting('vw_life_coach_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_life_coach_section_text',array(
		'label'	=> esc_html__('Section Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Our Exclusive Blog', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_life_coach_section_title',array(
		'label'	=> esc_html__('Section Title','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Our Articles & News', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_services',
		'type'=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_life_coach_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_life_coach_sanitize_choices',
	));
	$wp_customize->add_control('vw_life_coach_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','vw-life-coach'),		
		'section' => 'vw_life_coach_services',
	));

	//Blog Post
	$wp_customize->add_panel( $vw_life_coach_parent_panel );

	$BlogPostParentPanel = new VW_Life_Coach_WP_Customize_Panel( $wp_customize, 'vw_life_coach_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-life-coach' ),
		'panel' => 'vw_life_coach_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_life_coach_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-life-coach' ),
		'panel' => 'vw_life_coach_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_life_coach_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_life_coach_customize_partial_vw_life_coach_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_life_coach_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-life-coach' ),
        'section' => 'vw_life_coach_post_settings'
    )));

    $wp_customize->add_setting( 'vw_life_coach_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_toggle_author',array(
		'label' => esc_html__( 'Author','vw-life-coach' ),
		'section' => 'vw_life_coach_post_settings'
    )));

    $wp_customize->add_setting( 'vw_life_coach_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-life-coach' ),
		'section' => 'vw_life_coach_post_settings'
    )));

    $wp_customize->add_setting( 'vw_life_coach_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-life-coach' ),
		'section' => 'vw_life_coach_post_settings'
    )));

    $wp_customize->add_setting( 'vw_life_coach_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_life_coach_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_life_coach_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-life-coach' ),
		'section'     => 'vw_life_coach_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_life_coach_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_life_coach_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Life_Coach_Image_Radio_Control($wp_customize, 'vw_life_coach_blog_layout_option', array(
        'type' => 'select',
        'label' => esc_html__('Blog Layouts','vw-life-coach'),
        'section' => 'vw_life_coach_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_life_coach_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control('vw_life_coach_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vw-life-coach'),
        'section' => 'vw_life_coach_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-life-coach'),
            'Excerpt' => esc_html__('Excerpt','vw-life-coach'),
            'No Content' => esc_html__('No Content','vw-life-coach')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'vw_life_coach_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-life-coach' ),
		'panel' => 'vw_life_coach_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_life_coach_button_border_radius', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_life_coach_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_life_coach_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-life-coach' ),
		'section'     => 'vw_life_coach_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_life_coach_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_life_coach_customize_partial_vw_life_coach_button_text', 
	));

    $wp_customize->add_setting('vw_life_coach_button_text',array(
		'default'=> esc_html__('READ MORE','vw-life-coach'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_life_coach_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_life_coach_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-life-coach' ),
		'panel' => 'vw_life_coach_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_life_coach_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_life_coach_customize_partial_vw_life_coach_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_life_coach_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_related_post',array(
		'label' => esc_html__( 'Related Post','vw-life-coach' ),
		'section' => 'vw_life_coach_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_life_coach_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_life_coach_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_life_coach_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_life_coach_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_related_posts_settings',
		'type'=> 'number'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_life_coach_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-life-coach'),
		'panel' => 'vw_life_coach_panel_id',
	));

    $wp_customize->add_setting( 'vw_life_coach_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-life-coach' ),
      	'section' => 'vw_life_coach_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_life_coach_metabox_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_metabox_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Metabox','vw-life-coach' ),
      	'section' => 'vw_life_coach_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_life_coach_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vw-life-coach' ),
      	'section' => 'vw_life_coach_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_life_coach_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-life-coach' ),
      	'section' => 'vw_life_coach_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('vw_life_coach_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-life-coach'),
		'panel' => 'vw_life_coach_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_life_coach_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_life_coach_customize_partial_vw_life_coach_footer_text', 
	));
	
	$wp_customize->add_setting('vw_life_coach_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_life_coach_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-life-coach'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'vw-life-coach' ),
        ),
		'section'=> 'vw_life_coach_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_life_coach_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Life_Coach_Image_Radio_Control($wp_customize, 'vw_life_coach_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-life-coach'),
        'section' => 'vw_life_coach_footer',
        'settings' => 'vw_life_coach_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_life_coach_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_life_coach_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Life_Coach_Toggle_Switch_Custom_Control( $wp_customize, 'vw_life_coach_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-life-coach' ),
      	'section' => 'vw_life_coach_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_life_coach_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_life_coach_customize_partial_vw_life_coach_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_life_coach_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_life_coach_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Life_Coach_Image_Radio_Control($wp_customize, 'vw_life_coach_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-life-coach'),
        'section' => 'vw_life_coach_footer',
        'settings' => 'vw_life_coach_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Life_Coach_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Life_Coach_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_life_coach_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Life_Coach_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_life_coach_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Life_Coach_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_life_coach_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_life_coach_customize_controls_scripts() {
	wp_enqueue_script( 'vw-life-coach-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_life_coach_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Life_Coach_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Life_Coach_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Life_Coach_Customize_Section_Pro( $manager,'vw_life_coach_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW LIFE COACH PRO', 'vw-life-coach' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-life-coach' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/life-coach-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-life-coach-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-life-coach-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Life_Coach_Customize::get_instance();