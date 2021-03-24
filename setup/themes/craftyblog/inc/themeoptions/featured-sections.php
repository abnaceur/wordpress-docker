<?php

$wp_customize->add_section(
	'featured_section',
	array(
		'priority'       => 1,
		'panel'          => 'craftyblog',
		'title'          => __( 'Featured Section', 'craftyblog' ),
		'capability'     => 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'big_post_show',
	array(
		'default'			=> false,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'craftyblog_sanitize_checkbox',
	)
);

// Control: Name.
$wp_customize->add_control(
	'big_post_show',
	array(
		'label'       => __( 'Big Post Show', 'craftyblog' ),
		'section'     => 'featured_section',
		'type'        => 'checkbox',
	)
);

$wp_customize->add_setting(
	'sub_featured_slider',
	array(
		'default'			=>	false,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'craftyblog_sanitize_checkbox',
	)
);
// Control: Name.
$wp_customize->add_control(
	'sub_featured_slider',
	array(
		'label'       => __( 'Featured Slider Show', 'craftyblog' ),
		'section'     => 'featured_section',
		'type'        => 'checkbox',
	)
);