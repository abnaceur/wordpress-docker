<?php
/**
 * Services options.
 *
 * @package Kiducation
 */

$default = kiducation_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_home_service',
	array(
		'title'      => __( 'Services Section', 'kiducation' ),
		'priority'   => 15,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_services_section]',
	array(
		'default'           => $default['disable_services_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kiducation_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kiducation_Switch_Control( $wp_customize, 'theme_options[disable_services_section]',
    array(
		'label' 			=> __('Enable/Disable Service Section', 'kiducation'),
		'section'    		=> 'section_home_service',
		 'settings'  		=> 'theme_options[disable_services_section]',
		'on_off_label' 		=> kiducation_switch_options(),
    )
) );

//Services Section title
$wp_customize->add_setting('theme_options[service_title]', 
	array(
	'default'           => $default['service_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_title]', 
	array(
	'label'       => __('Section Title', 'kiducation'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_title]',
	'active_callback' => 'kiducation_services_active',		
	'type'        => 'text'
	)
);

// Number of Column
$wp_customize->add_setting('theme_options[number_of_service_column]', 
	array(
	'default' 			=> $default['number_of_service_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kiducation_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_service_column]', 
	array(
	'label'       => __('Column Per Row', 'kiducation'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3', 'kiducation'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[number_of_service_column]',		
	'type'        => 'number',
	'active_callback' => 'kiducation_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_service_items]', 
	array(
	'default' 			=> $default['number_of_service_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kiducation_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_service_items]', 
	array(
	'label'       => __('Number Of Services', 'kiducation'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 6. (Pro Max 12)', 'kiducation'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[number_of_service_items]',		
	'type'        => 'number',
	'active_callback' => 'kiducation_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

$number_of_service_items = kiducation_get_option( 'number_of_service_items' );

for( $i=1; $i<=$number_of_service_items; $i++ ){

		//Services Section icon
	$wp_customize->add_setting('theme_options[service_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[service_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Icon #%1$s', 'kiducation'), $i),
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'kiducation'), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[service_icon_'.$i.']',
		'active_callback' => 'kiducation_services_active',		
		'type'        => 'text'
		)
	);

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kiducation_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'kiducation'), $i),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'kiducation_services_active',
		)
	);

	// service hr setting and control
	$wp_customize->add_setting( 'theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Kiducation_Customize_Horizontal_Line( $wp_customize, 'theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'section_home_service',
			'active_callback' => 'kiducation_services_active',
			'type'			  => 'hr',
	) ) );
}