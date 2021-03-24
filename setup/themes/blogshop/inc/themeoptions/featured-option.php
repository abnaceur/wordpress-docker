<?php
$wp_customize->add_section(
	'featured_section',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Featured Section', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'featured_section_on_off',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'featured_section_on_off',
	array(
		'label'       => __( 'Featured Section On//Off', 'blogshop' ),
		'section'     => 'featured_section',
		'type'        => 'checkbox',
	)
);

$wp_customize->add_setting(
	'featured_categories',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_category_sanitize',
	)
);
$wp_customize->add_control(
	new blogshop_Customize_Control_Multiple_Select (
	$wp_customize, 
	'featured_categories',
	array(
		'label'       => __( 'Featured Category', 'blogshop' ),
		'section'     => 'featured_section',
		'type'        => 'multiple-select',
		'choices' => blogshop_get_categories()
	)
));

$wp_customize->add_setting(
	'featured_align',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_filter_nohtml_kses',
		'default'     => 'center',
	)
);
$wp_customize->add_control(
	'featured_align',
	array(
		'label'       => __( 'Text Align', 'blogshop' ),
		'section'     => 'featured_section',
		'type'        => 'select',
		'choices' => array(
			'left' => __( 'Left', 'blogshop' ),
			'center' => __( 'Center', 'blogshop' ),
			'right' => __( 'Right', 'blogshop' ),
		),
	)
);

$wp_customize->add_setting(
	'featured_read_more_text',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_kses_post',
		'default'     => __( 'Read More', 'blogshop' ),
	)
);

$wp_customize->add_control(
	'featured_read_more_text',
	array(
		'label'       => __( 'Read More Text', 'blogshop' ),
		'section'     => 'featured_section',
		'type'        => 'text',
	)
);
