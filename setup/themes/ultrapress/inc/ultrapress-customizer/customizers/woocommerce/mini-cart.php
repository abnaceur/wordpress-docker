<?php
$wp_customize->add_setting( 'ultrapress_mini_cart_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_mini_cart_heading',
		array(
			'label' => esc_html__( 'Mini Cart Settings', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_mini_cart_section',
			'priority' => 1
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_mini_cart_switch',
	array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Toggle_Switch_Custom_control( 
		$wp_customize, 'ultrapress_mini_cart_switch',
		array(
			'label' => esc_html__( 'Show Mini Cart', 'ultrapress' ),
			'section' => 'ultrapress_mini_cart_section',
			'priority' => 1
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_mc_button_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize, 'ultrapress_mc_button_text_color',
		array(
			'label' => esc_html__( 'Button Text Color', 'ultrapress' ),
			'section' => 'ultrapress_mini_cart_section',
			'active_callback'=>'ultrapress_mini_cart_switch_cb',
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_mc_button_bg_color',
	array(
		'default' => '',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize, 'ultrapress_mc_button_bg_color',
		array(
			'label' => esc_html__( 'Button Background', 'ultrapress' ),
			'section' => 'ultrapress_mini_cart_section',
			'show_opacity' => true,
			'active_callback'=>'ultrapress_mini_cart_switch_cb',
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_mc_button_text_hcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize, 'ultrapress_mc_button_text_hcolor',
		array(
			'label' => esc_html__( 'Button Hover Text ', 'ultrapress' ),
			'section' => 'ultrapress_mini_cart_section',
			'active_callback'=>'ultrapress_mini_cart_switch_cb',
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_mc_button_bg_hcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize, 'ultrapress_mc_button_bg_hcolor',
		array(
			'label' => esc_html__( 'Button Hover Background', 'ultrapress' ),
			'section' => 'ultrapress_mini_cart_section',
			'show_opacity' => true,
			'active_callback'=>'ultrapress_mini_cart_switch_cb',
		)
	) 
);

