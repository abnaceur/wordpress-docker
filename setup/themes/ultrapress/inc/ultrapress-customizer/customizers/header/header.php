<?php 
//Header Layouts
$wp_customize->add_setting( 'ultrapress_header_layout_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_header_layout_heading',
		array(
			'label' => esc_html__( 'Header Layouts', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'header_customizer_setting',
			'priority' => 1
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_header_layouts',
	array(
		'default' => 'default',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_text_sanitization'
	)
);
$wp_customize->add_control( new Ultrapress_Text_Radio_Button_Custom_Control( $wp_customize, 'ultrapress_header_layouts',
	array(
		'label' => esc_html__( 'Choose Header Layouts', 'ultrapress' ),
		'section' => 'header_customizer_setting',
		'choices' => array(
			'default' => esc_html__('Default','ultrapress'),
			'custom' => esc_html__('Custom','ultrapress'),
		),
		'priority' => 1
	)
) );


if (defined('ELEMENTOR_VERSION')):
//Custom header
$wp_customize->add_setting('ultrapress_custom_header',
	array(
    	'capability' => 'edit_theme_options',
    	'sanitize_callback' => 'absint',
    	'transport' => 'refresh',
    )
);
$wp_customize->add_control( 'ultrapress_custom_header',
	array(
		'label'  => esc_html__( 'Choose Header Template', 'ultrapress' ),
		'section' => 'header_customizer_setting',
		'type' => 'select',
		'choices' => ultrapress_get_elementor_templates(),
		'active_callback' => 'ultrapress_header_layouts_cb' 
	)
); 
else:
//Notice
$wp_customize->add_setting( 'ultrapress_custom_header_notfound_notice',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
 $wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_custom_header_notfound_notice',
		array(
			'label' => esc_html__( 'Note:', 'ultrapress' ),
			'description' => esc_html__( 'Elementor is not installed.Please install and activate elementor first.', 'ultrapress' ),
			'type' => 'error',
			'section' => 'header_customizer_setting',
			'active_callback' => 'ultrapress_header_layouts_cb'
		)
	) 
);
endif;

//Notice
$wp_customize->add_setting( 'ultrapress_custom_header_notice',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
 $wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_custom_header_notice',
		array(
			'label' => esc_html__( 'Note:', 'ultrapress' ),
			'description' => esc_html__( 'Header built from elementor will be applied.', 'ultrapress' ),
			'type' => 'notice',
			'section' => 'header_customizer_setting',
			'active_callback' => 'ultrapress_header_layouts_cb'
		)
	) 
); 

$wp_customize->add_setting( 'ultrapress_sticky_header_switch',
	array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
 $wp_customize->add_control( 
	new Ultrapress_Toggle_Switch_Custom_control( 
		$wp_customize, 'ultrapress_sticky_header_switch',
		array(
			'label' => esc_html__( 'Sticky Header', 'ultrapress' ),
			'section' => 'header_customizer_setting',
			'priority' => 1
		)
	) 
);   

/* Header Button */
$wp_customize->add_setting( 'ultrapress_header_button_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_header_button_heading',
		array(
			'label' => esc_html__( 'Header Button', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'header_customizer_setting',
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_show_search_switch',
	array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
 $wp_customize->add_control( 
	new Ultrapress_Toggle_Switch_Custom_control( 
		$wp_customize, 'ultrapress_show_search_switch',
		array(
			'label' => esc_html__( 'Show Search', 'ultrapress' ),
			'section' => 'header_customizer_setting'
		)
	) 
);  
$wp_customize->add_setting( 'ultrapress_show_purchase_btn_switch',
	array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_switch_sanitization'
	)
);
 $wp_customize->add_control( 
	new Ultrapress_Toggle_Switch_Custom_control( 
		$wp_customize, 'ultrapress_show_purchase_btn_switch',
		array(
			'label' => esc_html__( 'Show Button', 'ultrapress' ),
			'section' => 'header_customizer_setting'
		)
	) 
);     
$wp_customize->add_setting( 'ultrapress_purchase_btn_text', 
	array(
		'default' => __('Purchase','ultrapress'),
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control( 'ultrapress_purchase_btn_text', 
	array(
		'label' => esc_html__( 'Button Text', 'ultrapress' ),
		'section' => 'header_customizer_setting',
		'type' => 'text',
		'active_callback' => 'ultrapress_header_button_cb'
	)
); 
$wp_customize->add_setting( 'ultrapress_purchase_btn_link', 
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'ultrapress_purchase_btn_link', 
	array(
		'label' => esc_html__( 'Button link', 'ultrapress' ),
		'section' => 'header_customizer_setting',
		'type' => 'url',
		'active_callback' => 'ultrapress_header_button_cb'
	)
); 
$wp_customize->add_setting( 'ultrapress_purchase_btn_link_open',
array(
	'default' => true,
	'sanitize_callback' => 'ultrapress_switch_sanitization'
)
);
$wp_customize->add_control(
new Ultrapress_Toggle_Switch_Custom_control(
	$wp_customize, 'ultrapress_purchase_btn_link_open',
	array(
		'label' => esc_html__( 'Open link in a new tab', 'ultrapress' ),
		'section' => 'header_customizer_setting',
		'active_callback' => 'ultrapress_header_button_cb'
		
	)
)
);

/* Retina Logo */
$wp_customize->add_setting( 
	'ultrapress_header_retina_logo', 
	array(
		'sanitize_callback' => 'esc_url_raw'
	)
);
$wp_customize->add_control( 
	new WP_Customize_Upload_Control( 
		$wp_customize, 
		'ultrapress_header_retina_logo', 
		array(
			'label'      => esc_html__( 'Retina Logo', 'ultrapress' ),
			'priority'   => 9,
			'section'    => 'title_tagline'                   
		)
	) 
);

/* Sticky Logo */
$wp_customize->add_setting( 
	'ultrapress_header_sticky_logo', 
	array(
		'sanitize_callback' => 'esc_url_raw'
	)
);
$wp_customize->add_control( 
	new WP_Customize_Upload_Control( 
		$wp_customize, 
		'ultrapress_header_sticky_logo', 
		array(
			'label'      => __( 'Sticky Logo', 'ultrapress' ),
			'priority'   => 9,
			'section'    => 'title_tagline'                   
		)
	) 
);

// Main Menu
$wp_customize->add_setting( 'ultrapress_nav_font_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_nav_font_heading',
		array(
			'label' => esc_html__( 'Primary Menu', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_primary_menu_style',
			'priority' => 1
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_nav_font_family',
	array(
		'default' => '{"font":"Lato","regularweight":"regular","italicweight":"italic","boldweight":"regular","category":"sans-serif"}',
		'sanitize_callback' => 'ultrapress_google_font_sanitization',
		'transport' => 'refresh',
	)
);
$wp_customize->add_control( 
	new Ultrapress_Google_Font_Select_Custom_Control( 
		$wp_customize, 'ultrapress_nav_font_family',
		array(
			'label' => esc_html__( 'Font Family' , 'ultrapress'),
			'section' => 'ultrapress_primary_menu_style',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
			'priority' => 2
		)
	) 
);

$wp_customize->add_setting( 'ultrapress_nav_font_size',
	array(
		'default' => '15',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_nav_font_size',
		array(
			'label' => esc_html__( 'Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_primary_menu_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 4
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_nav_line_height',
	array(
		'default' => '1.7',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_floatval'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_nav_line_height',
		array(
			'label' => esc_html__( 'Line Height(em)', 'ultrapress' ),
			'section' => 'ultrapress_primary_menu_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
			),
			'priority' => 5
		)
	) 
);

$wp_customize->add_setting( 'ultrapress_header_nav_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize, 'ultrapress_header_nav_text_color',
		array(
			'label' => esc_html__( 'Nav Text Color', 'ultrapress' ),
			'section' => 'ultrapress_primary_menu_style',
			'priority' => 5
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_header_nav_text_hcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'ultrapress_hex_rgba_sanitization',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control( 
		$wp_customize, 'ultrapress_header_nav_text_hcolor',
		array(
			'label' => esc_html__( 'Nav Hover Color', 'ultrapress' ),
			'section' => 'ultrapress_primary_menu_style',
			'priority' => 5
		)
	) 
);

/* dropdown menu */
$wp_customize->add_setting( 'ultrapress_nav_drop_font_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Simple_Notice_Custom_Control( 
		$wp_customize, 'ultrapress_nav_drop_font_heading',
		array(
			'label' => esc_html__( 'Dropdown', 'ultrapress' ),
			'type' => 'heading',
			'section' => 'ultrapress_primary_menu_style',
			'priority' => 6
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_nav_drop_font_family',
	array(
		'default' => '{"font":"Lato","regularweight":"regular","italicweight":"italic","boldweight":"regular","category":"sans-serif"}',
		'sanitize_callback' => 'ultrapress_google_font_sanitization',
		'transport' => 'refresh',
	)
);
$wp_customize->add_control( 
	new Ultrapress_Google_Font_Select_Custom_Control( 
		$wp_customize, 'ultrapress_nav_drop_font_family',
		array(
			'label' => esc_html__( 'Font Family' , 'ultrapress'),
			'section' => 'ultrapress_primary_menu_style',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
			'priority' => 7
		)
	) 
);

$wp_customize->add_setting( 'ultrapress_nav_drop_font_size',
	array(
		'default' => '15',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_nav_drop_font_size',
		array(
			'label' => esc_html__( 'Font Size(px)', 'ultrapress' ),
			'section' => 'ultrapress_primary_menu_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'priority' => 8
		)
	) 
);
$wp_customize->add_setting( 'ultrapress_nav_drop_line_height',
	array(
		'default' => '1.7',
		'transport' => 'refresh',
		'sanitize_callback' => 'ultrapress_floatval'
	)
);
$wp_customize->add_control( 
	new Ultrapress_Slider_Custom_Control( 
		$wp_customize, 'ultrapress_nav_drop_line_height',
		array(
			'label' => esc_html__( 'Line Height(em)', 'ultrapress' ),
			'section' => 'ultrapress_primary_menu_style',
			'input_attrs' => array(
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
			),
			'priority' => 9
		)
	) 
);