<?php
/**
 * Slider options.
 *
 * @package Kiducation
 */

$default = kiducation_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider Section', 'kiducation' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured-slider_section]',
	array(
		'default'           => $default['disable_featured-slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kiducation_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kiducation_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable slider Section', 'kiducation'),
		'section'    			=> 'section_featured_slider',
		
		'on_off_label' 		=> kiducation_switch_options(),
    )
) );

// Number of items
$wp_customize->add_setting('theme_options[number_of_slider_items]', 
	array(
	'default' 			=> $default['number_of_slider_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kiducation_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_slider_items]', 
	array(
	'label'       => __('Number Of Slides', 'kiducation'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3(Pro upto 12).', 'kiducation'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_slider_items]',		
	'type'        => 'number',
	'active_callback' => 'kiducation_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$number_of_slider_items = kiducation_get_option( 'number_of_slider_items' );

for( $i=1; $i<=$number_of_slider_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[slider_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kiducation_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[slider_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'kiducation'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'kiducation_slider_active',
		)
	);

	// Slider Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'kiducation'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'kiducation_slider_active',	
		'type'        => 'text',
		)
	);

}

// Slider Button Text
$wp_customize->add_setting('theme_options[slider_alt_custom_btn_text]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[slider_alt_custom_btn_text]', 
	array(
	'label'       => __('Alternative Button Label', 'kiducation'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_alt_custom_btn_text]',	
	'active_callback' => 'kiducation_slider_active',	
	'type'        => 'text',
	)
);

	// Slider Button Url
$wp_customize->add_setting('theme_options[slider_alt_custom_btn_url]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('theme_options[slider_alt_custom_btn_url]', 
	array(
	'label'       => __('Alternative Button Url', 'kiducation'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_alt_custom_btn_url]',	
	'active_callback' => 'kiducation_slider_active',	
	'type'        => 'url',
	)
);

