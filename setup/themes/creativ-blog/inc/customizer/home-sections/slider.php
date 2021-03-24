<?php
/**
 * Slider options.
 *
 * @package Creativ Blog
 */

$default = creativ_blog_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider', 'creativ-blog' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Disable Slider Section
$wp_customize->add_setting('theme_options[disable_featured_slider]', 
	array(
	'default' 			=> $default['disable_featured_slider'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_blog_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_featured_slider]', 
	array(		
	'label' 	=> __('Disable Slider Section', 'creativ-blog'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[disable_featured_slider]',
	'type' 		=> 'checkbox',	
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_sr_items]', 
	array(
	'default' 			=> $default['number_of_sr_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_blog_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_sr_items]', 
	array(
	'label'       => __('Number Of Slides', 'creativ-blog'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'creativ-blog'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_sr_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_blog_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

// Slider Speed
$wp_customize->add_setting('theme_options[featured_slider_speed]', 
	array(
	'default' 			=> $default['featured_slider_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_blog_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[featured_slider_speed]', 
	array(
	'label'       => __('Slider Speed', 'creativ-blog'),
	'description' => esc_html__( 'Select Value Between 0 to 8000. Default is 1500.', 'creativ-blog' ),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[featured_slider_speed]',		
	'type'        => 'number',
	'active_callback' => 'creativ_blog_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 8000,
			'style' => 'width: 100px;',
		),
	)
);

$wp_customize->add_setting('theme_options[sr_content_type]', 
	array(
	'default' 			=> $default['sr_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_blog_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[sr_content_type]', 
	array(
	'label'       => __('Content Type', 'creativ-blog'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[sr_content_type]',		
	'type'        => 'select',
	'active_callback' => 'creativ_blog_slider_active',
	'choices'	  => array(
			'sr_page'	  => __('Page','creativ-blog'),
			'sr_post'	  => __('Post','creativ-blog'),
		),
	)
);

$number_of_sr_items = creativ_blog_get_option( 'number_of_sr_items' );

for( $i=1; $i<=$number_of_sr_items; $i++ ){

	// Page
	$wp_customize->add_setting('theme_options[slider_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_blog_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[slider_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'creativ-blog'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'creativ_blog_slider_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[slider_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_blog_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[slider_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'creativ-blog'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => creativ_blog_dropdown_posts(),
		'active_callback' => 'creativ_blog_slider_post',
		)
	);
}
