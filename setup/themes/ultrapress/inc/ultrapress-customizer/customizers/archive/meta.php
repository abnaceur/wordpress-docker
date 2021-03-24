<?php
$wp_customize->add_setting( 'ultrapress_meta_setting_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_meta_setting_heading',
		array(
			'label' => esc_html__( 'Meta Settings', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_meta_setting_section',
			'priority' => 1
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_meta_switch',
	array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
$wp_customize->add_control(
	new Ultrapress_Toggle_Switch_Custom_control(
		$wp_customize, 'ultrapress_meta_switch',
		array(
			'label' => esc_html__( 'Show Meta', 'ultrapress' ),
			'section' => 'ultrapress_meta_setting_section',
			'priority' => 2
		)
	)
);
$wp_customize->add_setting( 'ultrapress_meta_reorder',
	array(
		'default' => 'author,date,category,tags,comments',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_text_sanitization'
	)
);
$wp_customize->add_control( new Ultrapress_Pill_Checkbox_Custom_Control( $wp_customize, 'ultrapress_meta_reorder',
	array(
		'label' => __( 'Meta Order', 'ultrapress' ),
		'section' => 'ultrapress_meta_setting_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => false,
		),
		'choices' => array(
			'date' => __( 'Date', 'ultrapress' ),
			'author' => __( 'Author', 'ultrapress' ),
			'category' => __( 'Categories', 'ultrapress'  ),
			'tags' => __( 'Tags', 'ultrapress'  ),
			'comments' => __( 'Comments', 'ultrapress'  ),
		),
		'priority' => 3,
		'active_callback'=>'ultrapress_meta_button_cb',
	)
) );
//styles
$wp_customize->add_setting( 'ultrapress_meta_style_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_meta_style_heading',
		array(
			'label' => esc_html__( 'Meta Styles', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_meta_setting_section',
			'priority' => 4,
			'active_callback'=>'ultrapress_meta_button_cb',
		)
	) 
);
 $wp_customize->add_setting( 'ultrapress_meta_color',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization'
	)
);
 $wp_customize->add_control( 
	new Ultrapress_Customize_Alpha_Color_Control(
		$wp_customize, 'ultrapress_meta_color',
		array(
			'label' => esc_html__( 'Meta Link Color', 'ultrapress' ),
			'section' => 'ultrapress_meta_setting_section',
			'show_opacity' => false,
			'priority' => 5,
			'active_callback'=>'ultrapress_meta_button_cb',
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_meta_hcolor',
array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'ultrapress_hex_rgba_sanitization'
)
);
$wp_customize->add_control( 
new Ultrapress_Customize_Alpha_Color_Control(
    $wp_customize, 'ultrapress_meta_hcolor',
    array(
        'label' => esc_html__( 'Meta Link Hover Color', 'ultrapress' ),
        'section' => 'ultrapress_meta_setting_section',
        'show_opacity' => false,
		'priority' => 5,
		'active_callback'=>'ultrapress_meta_button_cb',
    )
) 
);
 $wp_customize->add_setting( 'ultrapress_meta_font_size',
 	array(
 		'default' => '',
 		'transport' => 'refresh',
 		'sanitize_callback' => 'absint'
 	)
 );
 $wp_customize->add_control( 
 	new Ultrapress_Slider_Custom_Control( 
 		$wp_customize, 'ultrapress_meta_font_size',
 		array(
 			'label' => esc_html__( 'Font Size(px)', 'ultrapress' ),
 			'section' => 'ultrapress_meta_setting_section',
 			'input_attrs' => array(
 				'min' => 0,
 				'max' => 100,
 				'step' => 1,
 			),
			 'priority' => 6,
			 'active_callback'=>'ultrapress_meta_button_cb',
 		)
 	) 
 );