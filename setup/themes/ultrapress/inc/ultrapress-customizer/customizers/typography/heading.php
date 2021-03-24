<?php
$wp_customize->add_setting( 'ultrapress_heading_font_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_heading_font_heading',
		array(
			'label' => esc_html__( 'Heading Font Style (H1-H6)', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_heading_style',
			'priority' => 1
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_heading_font_family',
	array(
		'default' => '{"font":"Lato","regularweight":"regular","italicweight":"italic","boldweight":"regular","category":"sans-serif"}',
		'sanitize_callback' => 'ultrapress_google_font_sanitization'
	)
);
$wp_customize->add_control(
	new Ultrapress_Google_Font_Select_Custom_Control( 
		$wp_customize, 'ultrapress_heading_font_family',
		array(
			'label' => esc_html__( 'Font Family' , 'ultrapress'),
			'section' => 'ultrapress_heading_style',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
			'priority' => 2
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_heading_font_color',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization'
	)
);
$wp_customize->add_control(
	new Ultrapress_Customize_Alpha_Color_Control(
		$wp_customize, 'ultrapress_heading_font_color',
		array(
			'label' => esc_html__( 'Text Color', 'ultrapress' ),
			'section' => 'ultrapress_heading_style',
			'show_opacity' => false,
			'priority' => 3
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_h1_font_size',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_h1_font_size',
		array(
			'label' => esc_html__( 'H1 Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_heading_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 4
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_h2_font_size',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_h2_font_size',
		array(
			'label' => esc_html__( 'H2 Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_heading_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 5
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_h3_font_size',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new Ultrapress_Slider_Custom_Control(
		$wp_customize, 'ultrapress_h3_font_size',
		array(
			'label' => esc_html__( 'H3 Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_heading_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 6
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_h4_font_size',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_h4_font_size',
		array(
			'label' => esc_html__( 'H4 Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_heading_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 7
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_h5_font_size',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_h5_font_size',
		array(
			'label' => esc_html__( 'H5 Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_heading_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 8
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_h6_font_size',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_h6_font_size',
		array(
			'label' => esc_html__( 'H6 Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_heading_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 9
		)
	) 
);
