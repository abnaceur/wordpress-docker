<?php 
$options =  get_theme_mod('theme_options');
$wp_customize->add_panel( 'blogtay_header', array(
	'title' => __( 'Header', 'blogtay' ),
     'priority' => 10, // Mixed with top-level-section hierarchy.
 ) );

 

 //************************ Show/hide **********************


if (!function_exists('blogtay_show_hide_section')) :
	function blogtay_show_hide_section()
	{
		$blogtay_show_hide_section = array(
			'show' => esc_html__('Show', 'blogtay'),
			'hide' => esc_html__('Hide', 'blogtay')
		);
		return apply_filters('blogtay_show_hide_section', $blogtay_show_hide_section);
	}
endif;

if (!function_exists('blogtay_sanitize_show_hide_section')) :
	function blogtay_sanitize_show_hide_section( $input, $setting ){ 
		$input = sanitize_key($input);        
		$choices = $setting->manager->get_control( $setting->id )->choices; 
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );     
	}
endif;



$wp_customize->add_section( 'blogtay_top_header' , array(
	'title' => __('Top header Show/Hide', 'blogtay'),
	'panel' => 'blogtay_header',
) );

$wp_customize->add_setting( 
	'theme_options[blogtay_show_hide_option]', 
	array(
		'default' => 'hide',
		'sanitize_callback' => 'blogtay_sanitize_show_hide_section',
	)
);

$blogtay_show_hide_section = blogtay_show_hide_section();
$wp_customize->add_control(
	'theme_options[blogtay_show_hide_option]',
	array(
		'label'           => __( 'Top header section show/hide.','blogtay'),		
		'section'         => 'blogtay_top_header',
		'type'            => 'radio',
		'choices' => $blogtay_show_hide_section
	)
);























