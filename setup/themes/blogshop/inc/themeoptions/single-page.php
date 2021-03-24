<?php
$wp_customize->add_section(
	'post_details',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Single Post', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'related_post_on_off',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'related_post_on_off',
	array(
		'label'       => __( 'Releated Post ON//OFF', 'blogshop' ),
		'section'     => 'post_details',
		'type'        => 'checkbox',
	)
);