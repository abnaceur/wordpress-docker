<?php 

/**
 * Theme Options.
 *
 * @package Kiducation
 */

$default = kiducation_get_default_theme_options();
//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('General Setting', 'kiducation'),
'panel'       => 'theme_option_panel'    
));

$wp_customize->add_setting( 'theme_options[disable_homepage_content_section]',
	array(
		'default'           => $default['disable_homepage_content_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kiducation_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kiducation_Switch_Control( $wp_customize, 'theme_options[`]',
    array(
		'label' 			=> __('Enable/Disable Static Homepage Content Section', 'kiducation'),
		'description' => __('This option is only work on Static HomePage ', 'kiducation'),
		'section'    		=> 'section_general',
		 'settings'  		=> 'theme_options[disable_homepage_content_section]',
		'on_off_label' 		=> kiducation_switch_options(),
    )
) );

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'kiducation_sanitize_positive_integer',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'kiducation' ),
	'description' => esc_html__( 'in words', 'kiducation' ),
	'section'     => 'section_general',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
) );

 ?>