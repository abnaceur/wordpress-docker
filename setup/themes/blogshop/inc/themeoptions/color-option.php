<?php
$wp_customize->add_setting(
	'base_color',
	array(
		'default'   => '#ff0000',
		'transport' => 'refresh',
		'sanitize_callback'       => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'base_color',
		array(
			'section' => 'colors',
			'label'   => __( 'Primary Color', 'blogshop' ),
		)
	)
);
$wp_customize->add_setting(
	'menu_color_main',
	array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback'       => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'menu_color_main',
		array(
			'section' => 'colors',
			'label'   => __( 'Menu Color', 'blogshop' ),
		)
	)
);
$wp_customize->add_setting(
	'menu_color_hover',
	array(
		'default'   => '#ff0000',
		'transport' => 'refresh',
		'sanitize_callback'       => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'menu_color_hover',
		array(
			'section' => 'colors',
			'label'   => __( 'Menu Hover Color', 'blogshop' ),
		)
	)
);