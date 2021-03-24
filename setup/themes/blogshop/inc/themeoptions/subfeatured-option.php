<?php
$wp_customize->add_section(
	'sub_featured_section',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Sub Featured Section', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'sub_featured_gallery',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'sub_featured_gallery',
	array(
		'label'       => __( 'Sub Featured Section On//Off', 'blogshop' ),
		'section'     => 'sub_featured_section',
		'type'        => 'checkbox',
	)
);
$wp_customize->add_setting(
	'sub_featured_categories',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_category_sanitize',
	)
);
$wp_customize->add_control(
	new blogshop_Customize_Control_Multiple_Select (
	$wp_customize, 
	'sub_featured_categories',
	array(
		'label'       => __( 'Featured Category', 'blogshop' ),
		'section'     => 'sub_featured_section',
		'type'        => 'multiple-select',
		'choices' => blogshop_get_categories()
	)
));
