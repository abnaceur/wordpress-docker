<?php 

// hero slider
$wp_customize->add_panel( 'blogtay_custom_hero_slider', array(
	'title' => __( 'Banner', 'blogtay' ),
'priority' => 20, // Mixed with top-level-section hierarchy.
) );

$wp_customize->add_section( 'blogtay_custom_hero_slider_section' , array(
	'title' => __('Custom Banner', 'blogtay'),
	'panel' => 'blogtay_custom_hero_slider'
) );

$wp_customize->add_setting( 
	'theme_options[hero_slider_number]',
	array(
		'sanitize_callback' => 'absint',
		'default' => 3
	) 
);
$wp_customize->add_control(
	'theme_options[hero_slider_number]',
	array(
		'label'           => __( 'Slider item', 'blogtay'),
		'description'     => __( 'Enter number of slider, publish and refresh', 'blogtay'),
		'section'         => 'blogtay_custom_hero_slider_section',
		'type'            => 'number'       
	)
);


$options = get_theme_mod( 'theme_options' );
$number_of_slides = isset($options['hero_slider_number']) ? $options['hero_slider_number'] : 3;

for( $i=1; $i <=$number_of_slides; $i++ ) {

// Title
	$wp_customize->add_setting( 'hero_slider_page_' .$i,
		array(
			'sanitize_callback'	=> 'absint'
		)

	);
	$wp_customize->add_control( 'hero_slider_page_' .$i,
		array(
			'label'           => __( 'Select page for slider ', 'blogtay' ) . $i,
			'section'         => 'blogtay_custom_hero_slider_section',
			'type'			  => 'dropdown-pages',   
		)
	);         
}

// button
	$wp_customize->add_setting( 'hero_slider_button',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)

	);
	$wp_customize->add_control( 'hero_slider_button',
		array(
			'label'           => __( 'Slider button text ', 'blogtay' ),
			'section'         => 'blogtay_custom_hero_slider_section',
			'type'            => 'text'       
		)
	); 


// show hide banner

$wp_customize->add_section( 'blogtay_banner_show_hide' , array(
	'title' => __('Banner Show/Hide', 'blogtay'),
	'panel' => 'blogtay_custom_hero_slider',
) );

$wp_customize->add_setting( 
	'theme_options[blogtay_banner_show_hide_option]', 
	array(
		'default' => 'show',
		'sanitize_callback' => 'blogtay_sanitize_show_hide_section',
	)
);

$blogtay_show_hide_section = blogtay_show_hide_section();
$wp_customize->add_control(
	'theme_options[blogtay_banner_show_hide_option]',
	array(
		'label'           => __( 'Banner section show/hide.','blogtay'),		
		'section'         => 'blogtay_banner_show_hide',
		'type'            => 'radio',
		'choices' => $blogtay_show_hide_section
	)
);