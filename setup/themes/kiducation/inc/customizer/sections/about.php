<?php
/**
 * About options.
 *
 * @package Kiducation
 */

$default = kiducation_get_default_theme_options();

// About Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'About Section', 'kiducation' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kiducation_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kiducation_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable About Section', 'kiducation'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> kiducation_switch_options(),
    )
) );

// Additional Information First Page
	$wp_customize->add_setting('theme_options[about_page]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kiducation_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_page]', 
		array(
		'label'       => __('Select Page kiducation', 'kiducation'),
		'section'     => 'section_home_about',   
		'settings'    => 'theme_options[about_page]',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'kiducation_about_active',
		)
	);

// About Button Text
$wp_customize->add_setting('theme_options[about_btn_text]', 
	array(
	'default'           => $default['about_btn_text'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[about_btn_text]', 
	array(
	'label'       => __('Button Label', 'kiducation'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_btn_text]',	
	'active_callback' => 'kiducation_about_active',	
	'type'        => 'text'
	)
);
