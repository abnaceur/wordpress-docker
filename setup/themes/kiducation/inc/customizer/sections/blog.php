<?php
/**
 * Home Page Options.
 *
 * @package Kiducation
 */

$default = kiducation_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section( 'section_home_blog',
	array(
		'title'      => __( 'Blog Section', 'kiducation' ),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_blog_section]',
	array(
		'default'           => $default['disable_blog_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kiducation_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kiducation_Switch_Control( $wp_customize, 'theme_options[disable_blog_section]',
    array(
		'label' 	=> __('Disable Blog Section', 'kiducation'),
		'section'    			=> 'section_home_blog',
		
		'on_off_label' 		=> kiducation_switch_options(),
    )
) );


// Blog title
$wp_customize->add_setting('theme_options[blog_title]', 
	array(
	'default'           => $default['blog_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_title]', 
	array(
	'label'       => __('Section Title', 'kiducation'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_title]',	
	'active_callback' => 'kiducation_blog_active',		
	'type'        => 'text'
	)
);

// Number of Services
$wp_customize->add_setting('theme_options[number_of_blog_column]', 
	array(
	'default' 			=> $default['number_of_blog_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kiducation_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_blog_column]', 
	array(
	'label'       => __('Column Per Row', 'kiducation'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3', 'kiducation'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[number_of_blog_column]',		
	'type'        => 'number',
	'active_callback' => 'kiducation_blog_active',
	'input_attrs' => array(
			'min'	=> 2,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

// Blog Number.
$wp_customize->add_setting( 'theme_options[blog_number]',
	array(
		'default'           => $default['blog_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kiducation_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[blog_number]',
	array(
		'label'       => __( 'Number of Posts', 'kiducation' ),
		'description' => __('Save & Refresh the customizer to see its effect.Maximum number of post to show is 6.(Pro MAX 12)', 'kiducation'),
		'section'     => 'section_home_blog',
		'active_callback' => 'kiducation_blog_active',		
		'type'        => 'number',
		'input_attrs' => array( 'min' => 2, 'max' => 6, 'step' => 1, 'style' => 'width: 115px;' ),
		
	)
);

// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[blog_category]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Kiducation_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[blog_category]',
		array(
		'label'    => __( 'Select Category', 'kiducation' ),
		'section'  => 'section_home_blog',
		'settings' => 'theme_options[blog_category]',	
		'active_callback' => 'kiducation_blog_active',		
		'priority' => 100,
		)
	)
);

