<?php
/**
 * Smallbiz Startup Theme Customizer
 *
 * @package Smallbiz Startup
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function smallbiz_startup_customize_register( $wp_customize ) {

	function smallbiz_startup_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function smallbiz_startup_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Theme Options
	$wp_customize->add_panel( 'smallbiz_startup_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'smallbiz-startup' ),
	) );
	
	//Site Layout Section
	$wp_customize->add_section('smallbiz_startup_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','smallbiz-startup'),
		'priority'	=> 1,
		'panel' => 'smallbiz_startup_panel_area',
	));		
	
	$wp_customize->add_setting('smallbiz_startup_box_layout',array(
		'sanitize_callback' => 'smallbiz_startup_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'smallbiz_startup_box_layout', array(
	   'section'   => 'smallbiz_startup_site_layoutsec',
	   'label'	=> __('Check to Box Layout','smallbiz-startup'),
	   'type'      => 'checkbox'
 	));

 	// Header Section
	$wp_customize->add_section('smallbiz_startup_header_section', array(
        'title' => __('Manage Header Section', 'smallbiz-startup'),
        'priority' => null,
		'panel' => 'smallbiz_startup_panel_area',
 	));

	$wp_customize->add_setting('smallbiz_startup_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_email_address', array(
	   'settings' => 'smallbiz_startup_email_address',
	   'section'   => 'smallbiz_startup_header_section',
	   'label' => __('Add Email Address', 'smallbiz-startup'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('smallbiz_startup_contact_us_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_contact_us_text', array(
	   'settings' => 'smallbiz_startup_contact_us_text',
	   'section'   => 'smallbiz_startup_header_section',
	   'label' => __('Add Button Text', 'smallbiz-startup'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('smallbiz_startup_contact_us_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_contact_us_url', array(
	   'settings' => 'smallbiz_startup_contact_us_url',
	   'section'   => 'smallbiz_startup_header_section',
	   'label' => __('Add Button URL', 'smallbiz-startup'),
	   'type'      => 'url'
	));

	// Social media Section
	$wp_customize->add_section('smallbiz_startup_social_media_section', array(
        'title' => __('Manage Social Media Section', 'smallbiz-startup'),
        'priority' => null,
		'panel' => 'smallbiz_startup_panel_area',
 	));

	$wp_customize->add_setting('smallbiz_startup_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_fb_link', array(
	   'settings' => 'smallbiz_startup_fb_link',
	   'section'   => 'smallbiz_startup_social_media_section',
	   'label' => __('Facebook Link', 'smallbiz-startup'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('smallbiz_startup_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_twitt_link', array(
	   'settings' => 'smallbiz_startup_twitt_link',
	   'section'   => 'smallbiz_startup_social_media_section',
	   'label' => __('Twitter Link', 'smallbiz-startup'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('smallbiz_startup_linked_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_linked_link', array(
	   'settings' => 'smallbiz_startup_linked_link',
	   'section'   => 'smallbiz_startup_social_media_section',
	   'label' => __('Linkdin Link', 'smallbiz-startup'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('smallbiz_startup_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_insta_link', array(
	   'settings' => 'smallbiz_startup_insta_link',
	   'section'   => 'smallbiz_startup_social_media_section',
	   'label' => __('Instagram Link', 'smallbiz-startup'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('smallbiz_startup_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_youtube_link', array(
	   'settings' => 'smallbiz_startup_youtube_link',
	   'section'   => 'smallbiz_startup_social_media_section',
	   'label' => __('Youtube Link', 'smallbiz-startup'),
	   'type'      => 'url'
	));

	// Home Category Dropdown Section
	$wp_customize->add_section('smallbiz_startup_one_cols_section',array(
		'title'	=> __('Manage Banner Section','smallbiz-startup'),
		'description'	=> __('Select Page from the Dropdown for banner, Also use the given image dimension (500 x 500).','smallbiz-startup'),
		'priority'	=> null,
		'panel' => 'smallbiz_startup_panel_area'
	));

	$wp_customize->add_setting('smallbiz_startup_pgboxes_title',array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control( 'smallbiz_startup_pgboxes_title', array(
	   'section'   => 'smallbiz_startup_one_cols_section',
	   'label'	=> __('Section Title','smallbiz-startup'),
	   'type'      => 'text',
	   'priority' => null,
    ));
	
	$wp_customize->add_setting('smallbiz_startup_pageboxes',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'smallbiz_startup_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'smallbiz_startup_pageboxes',array(
		'type' => 'dropdown-pages',
		'section' => 'smallbiz_startup_one_cols_section',
	));	
	
	//Hide Section
	$wp_customize->add_setting('smallbiz_startup_hide_categorysec',array(
		'default' => true,
		'sanitize_callback' => 'smallbiz_startup_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'smallbiz_startup_hide_categorysec', array(
	   'settings' => 'smallbiz_startup_hide_categorysec',
	   'section'   => 'smallbiz_startup_one_cols_section',
	   'label'     => __('Uncheck To Enable This Section','smallbiz-startup'),
	   'type'      => 'checkbox'
	));

	// Home Three Boxes Section 
	$wp_customize->add_section('smallbiz_startup_below_banner_section', array(
		'title'	=> __('Manage Services Section','smallbiz-startup'),
		'description'	=> __('Select Pages from the dropdown for Services, Also use the given image dimension (500 x 500).','smallbiz-startup'),
		'priority'	=> null,
		'panel' => 'smallbiz_startup_panel_area',
	));

	$wp_customize->add_setting('smallbiz_startup_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'smallbiz_startup_text', array(
	   'settings' => 'smallbiz_startup_text',
	   'section'   => 'smallbiz_startup_below_banner_section',
	   'label'     => __('Add Text','smallbiz-startup'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('smallbiz_startup_title',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'smallbiz_startup_title', array(
	   'section'   => 'smallbiz_startup_below_banner_section',
	   'label'	=> __('Section Title','smallbiz-startup'),
	   'type'      => 'text',
	   'priority' => null,
    ));
	
	$wp_customize->add_setting('smallbiz_startup_pageboxes1',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'smallbiz_startup_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'smallbiz_startup_pageboxes1',array(
		'type' => 'dropdown-pages',
		'section' => 'smallbiz_startup_below_banner_section',
	));	

	$wp_customize->add_setting('smallbiz_startup_pageboxes2',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'smallbiz_startup_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'smallbiz_startup_pageboxes2',array(
		'type' => 'dropdown-pages',
		'section' => 'smallbiz_startup_below_banner_section',
	));
	
	$wp_customize->add_setting('smallbiz_startup_pageboxes3',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'smallbiz_startup_sanitize_dropdown_pages'
	));

	$wp_customize->add_control(	'smallbiz_startup_pageboxes3',array(
		'type' => 'dropdown-pages',
		'section' => 'smallbiz_startup_below_banner_section',
	));
	
	$wp_customize->add_setting('smallbiz_startup_disabled_pgboxes',array(
		'default' => true,
		'sanitize_callback' => 'smallbiz_startup_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( 'smallbiz_startup_disabled_pgboxes', array(
	   'settings' => 'smallbiz_startup_disabled_pgboxes',
	   'section'   => 'smallbiz_startup_below_banner_section',
	   'label'     => __('Uncheck To Enable This Section','smallbiz-startup'),
	   'type'      => 'checkbox'
	));

	// Footer Section 
	$wp_customize->add_section('smallbiz_startup_footer', array(
		'title'	=> __('Manage Footer Section','smallbiz-startup'),
		'priority'	=> null,
		'panel' => 'smallbiz_startup_panel_area',
	));

	$wp_customize->add_setting('smallbiz_startup_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'smallbiz_startup_copyright_line', array(
	   'section' 	=> 'smallbiz_startup_footer',
	   'label'	 	=> __('Copyright Line','smallbiz-startup'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('smallbiz_startup_color_scheme_gradiant1',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));

   	$wp_customize->add_control( 
	    new WP_Customize_Color_Control( 
	    $wp_customize, 
	    'smallbiz_startup_color_scheme_gradiant1', 
	    array(
	        'label'      => __( 'Gradiant Color Scheme', 'smallbiz-startup' ),
	        'section'    => 'colors',
	        'settings'   => 'smallbiz_startup_color_scheme_gradiant1',
	    ) ) 
	);

	$wp_customize->add_setting('smallbiz_startup_color_scheme_gradiant2',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));

    $wp_customize->add_control( 
	    new WP_Customize_Color_Control( 
	    $wp_customize, 
	    'smallbiz_startup_color_scheme_gradiant2', 
	    array(
	        'label'      => __( 'Gradiant Color Scheme', 'smallbiz-startup' ),
	        'section'    => 'colors',
	        'settings'   => 'smallbiz_startup_color_scheme_gradiant2',
	    ) ) 
	);

	$wp_customize->add_setting('smallbiz_startup_woocommerce_sidebar_shop',array(
		'sanitize_callback' => 'smallbiz_startup_sanitize_checkbox',
	));
	$wp_customize->add_control( 'smallbiz_startup_woocommerce_sidebar_shop', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from shop page.','smallbiz-startup'),
	   'label'	=> __('Shop Page Sidebar layout','smallbiz-startup'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('smallbiz_startup_woocommerce_sidebar_product',array(
		'sanitize_callback' => 'smallbiz_startup_sanitize_checkbox',
	));
	$wp_customize->add_control( 'smallbiz_startup_woocommerce_sidebar_product', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from product page.','smallbiz-startup'),
	   'label'	=> __('Product Page Sidebar layout','smallbiz-startup'),
	   'type'      => 'checkbox'
 	));
}
add_action( 'customize_register', 'smallbiz_startup_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function smallbiz_startup_customize_preview_js() {
	wp_enqueue_script( 'smallbiz_startup_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'smallbiz_startup_customize_preview_js' );