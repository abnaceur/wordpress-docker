<?php
/**
 * Header Theme options
 */
$wp_customize->add_section(
	'topbar_section',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Topbar Section', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'topbar_section_on_off',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'topbar_section_on_off',
	array(
		'label'       => __( 'Topbar Section Section On//Off', 'blogshop' ),
		'section'     => 'topbar_section',
		'type'        => 'checkbox',
	)
);
$wp_customize->add_section(
	'header_layout_section',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Header Layout', 'blogshop' ),
		'description'    => __( 'Customize Blog Page', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'header_layout',
	array(
		'default' => 'one',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_radio'
	)
);
$wp_customize->add_control(
	'header_layout',
	array(
		'label'       => __( 'Header Layout', 'blogshop' ),
		'section'     => 'header_layout_section',
		'type'        => 'radio',
		'choices'  => array(
			'one'  => __( 'Header Layout One', 'blogshop' ),
			'two' => __( 'Header Layout Two', 'blogshop' ),
			'three' => __( 'Header Layout Three', 'blogshop' ),
			'four' => __( 'Header Layout Four', 'blogshop' ),
		),
	)
);
/**
 * Sticky Header
 */
$wp_customize->add_section(
	'sticky_header_section',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Sticky Header', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'sticky_header',
	array(
		'default' => false,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_checkbox'
	)
);
$wp_customize->add_control(
	'sticky_header',
	array(
		'label'       => __( 'Sticky Header On//Off', 'blogshop' ),
		'section'     => 'sticky_header_section',
		'type'        => 'checkbox',
	)
);
$wp_customize->add_setting(
	'header_height',
	array(
		'default' => 200,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_number_absint',
	)
);
$wp_customize->add_control(
	'header_height',
	array(
		'label'       => __( 'Header Height', 'blogshop' ),
		'section'     => 'header_layout_section',
		'type'        => 'number',
	)
);
