<?php
/**
 * Testimonial options.
 *
 * @package Kiducation
 */

$default = kiducation_get_default_theme_options();

// Testimonial Section
$wp_customize->add_section( 'section_home_testimonial',
	array(
		'title'      => __( 'Testimonial Section', 'kiducation' ),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_testimonial_section]',
	array(
		'default'           => $default['disable_testimonial_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kiducation_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kiducation_Switch_Control( $wp_customize, 'theme_options[disable_testimonial_section]',
    array(
		'label' 			=> __('Enable/Disable Testimonial Section', 'kiducation'),
		'section'    		=> 'section_home_testimonial',
		'settings'  		=> 'theme_options[disable_testimonial_section]',
		'on_off_label' 		=> kiducation_switch_options(),
    )
) );

//Testimonial Section title
$wp_customize->add_setting('theme_options[testimonial_title]', 
	array(
	'default'           => $default['testimonial_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[testimonial_title]', 
	array(
	'label'       => __('Section Title', 'kiducation'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_title]',
	'active_callback' => 'kiducation_testimonial_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_testimonial_items]', 
	array(
	'default' 			=> $default['number_of_testimonial_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kiducation_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_testimonial_items]', 
	array(
	'label'       => __('Number Of Testimonial', 'kiducation'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4.', 'kiducation'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[number_of_testimonial_items]',		
	'type'        => 'number',
	'active_callback' => 'kiducation_testimonial_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

$number_of_testimonial_items = kiducation_get_option( 'number_of_testimonial_items' );

for( $i=1; $i<=$number_of_testimonial_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[testimonial_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kiducation_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[testimonial_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'kiducation'), $i),
		'section'     => 'section_home_testimonial',   
		'settings'    => 'theme_options[testimonial_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'kiducation_testimonial_active',
		)
	);
}


