<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_page_register' ) ) :
function colon_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'colon_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Pages Settings', 'colon' )
        )
    );

    // Info label
    $wp_customize->add_setting( 
        'colon_page_settings_show_info', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Info_Control( $wp_customize, 'colon_page_settings_show_info', 
        array(
            'label'       => esc_html__( 'Note: These setting apply for all the pages except the homepage.', 'colon' ),
            'section'     => 'colon_page_settings',
            'type'        => 'colon-info',
            'settings'    => 'colon_page_settings_show_info',
        ) 
    ));

    // Title label
	$wp_customize->add_setting( 
		'colon_label_page_settings_title', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_page_settings_title', 
		array(
		    'label'       => esc_html__( 'Page Title', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_page_settings_title',
		) 
	));

	// Add an option to enable the page title
	$wp_customize->add_setting( 
		'colon_enable_page_title', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_page_title', 
		array(
		    'label'       => esc_html__( 'Show Page Title', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_page_title',
		) 
	));
	


	// Add an option to enable the page title background
	$wp_customize->add_setting( 
		'colon_enable_page_title_bg', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_page_title_bg', 
		array(
		    'label'       => esc_html__( 'Show Page Title background', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_page_title_bg',
		    'active_callback' => 'colon_page_title_enable',
		) 
	));

	// Add an option to enable the page title in left
	$wp_customize->add_setting( 
		'colon_enable_page_title_left', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_page_title_left', 
		array(
		    'label'       => esc_html__( 'Align Page Title to left', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_page_title_left',
		    'active_callback' => 'colon_page_title_enable',
		) 
	));


	//spacing options from top
    $wp_customize->add_setting( 
        'colon_page_title_spacing_top', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_page_title_spacing_top', 
        array(
            'label' => esc_html__( 'Page Title Spacing Top (px)','colon' ),
            'description' => esc_html__( 'Default is 70','colon' ),
            'section' => 'colon_page_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 500,
                'step' => 1,
            ),
            'active_callback' => 'colon_page_title_enable',
        )
    ));


    //spacing options from bottom
    $wp_customize->add_setting( 
        'colon_page_title_spacing_bottom', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_page_title_spacing_bottom', 
        array(
            'label' => esc_html__( 'Page Title Spacing Bottom (px)','colon' ),
            'description' => esc_html__( 'Default is 70','colon' ),
            'section' => 'colon_page_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 500,
                'step' => 1,
            ),
            'active_callback' => 'colon_page_title_enable',
        )
    ));


    // Title label
	$wp_customize->add_setting( 
		'colon_label_page_title_section_color', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_page_title_section_color', 
		array(
		    'label'       => esc_html__( 'Page Title Section Color', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_page_title_section_color',
		    'active_callback' => 'colon_page_title_enable',
		) 
	));

	// bg color
    $wp_customize->add_setting(
        'colon_page_title_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ed516c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_page_title_bg_color',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'colon' ),
	        	'section'    => 'colon_page_settings',
	        	'settings'   => 'colon_page_title_bg_color',
	        	'active_callback' => 'colon_page_title_and_bg_enable',
	        )
	    )
    );

	// title color
    $wp_customize->add_setting(
        'colon_page_title_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_page_title_color',
	        array(
	        	'label'      => esc_html__( 'Title Color', 'colon' ),
	        	'section'    => 'colon_page_settings',
	        	'settings'   => 'colon_page_title_color',
	        	'active_callback' => 'colon_page_title_enable',
	        )
	    )
    );


    // breadcrumbs color
    $wp_customize->add_setting(
        'colon_page_title_breadcrumbs_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_page_title_breadcrumbs_color',
	        array(
	        	'label'      => esc_html__( 'Breadcrumbs Color', 'colon' ),
	        	'section'    => 'colon_page_settings',
	        	'settings'   => 'colon_page_title_breadcrumbs_color',
	        	'active_callback' => 'colon_page_title_enable',
	        )
	    )
    );


	// Title label
	$wp_customize->add_setting( 
		'colon_label_page_content_spacing_top_title', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_page_content_spacing_top_title', 
		array(
		    'label'       => esc_html__( 'Page Content Spacing', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_page_content_spacing_top_title',
		) 
	));

	//spacing options
    $wp_customize->add_setting( 
        'colon_page_content_spacing_top_title', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_page_content_spacing_top_title', 
        array(
            'label' => esc_html__( 'Content Spacing from Title (px)','colon' ),
            'description' => esc_html__( 'Default is 70','colon' ),
            'section' => 'colon_page_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 400,
                'step' => 1,
            ),
        )
    ));


	

    // Title label
	$wp_customize->add_setting( 
		'colon_label_page_breadcrumb_settings', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_page_breadcrumb_settings', 
		array(
		    'label'       => esc_html__( 'Breadcrumbs', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_page_breadcrumb_settings',
		    'active_callback' => 'colon_page_title_enable',
		) 
	));

	// Add an option to enable the breadcrumbs
	$wp_customize->add_setting( 
		'colon_enable_page_breadcrumbs', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_page_breadcrumbs', 
		array(
		    'label'       => esc_html__( 'Show Breadcrumbs', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_page_breadcrumbs',
		    'active_callback' => 'colon_page_title_enable',
		) 
	));


	// Choose the breadcrumb type
	$wp_customize->add_setting( 
		'colon_select_breadcrumb_settings', 
		array(
		    'default'           => 'default',
		    'type'              => 'theme_mod',
		    'capability'		=> 'edit_theme_options',
		    'sanitize_callback' => 'colon_sanitize_select',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Text_Radio_Control( $wp_customize, 'colon_select_breadcrumb_settings', 
		array(
		    'label'       => esc_html__( 'Choose Breadcrumb Type', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-text-radio',
		    'settings'    => 'colon_select_breadcrumb_settings',
		    'choices' => array(
				'yoast' => esc_html__( 'Yoast','colon' ), 
				'navxt' => esc_html__( 'NavXT','colon' ),
				'default' => esc_html__( 'Default','colon' ),
				),
		    'active_callback' => 'colon_page_title_breadcrumbs_enable',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'colon_label_page_sidebar_settings', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_page_sidebar_settings', 
		array(
		    'label'       => esc_html__( 'Page Sidebar', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_page_sidebar_settings',
		) 
	));

	// Add an option to enable the page sidebar
	$wp_customize->add_setting( 
		'colon_enable_page_sidebar', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_page_sidebar', 
		array(
		    'label'       => esc_html__( 'Show Sidebar', 'colon' ),
		    'section'     => 'colon_page_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_page_sidebar',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'colon_page_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'colon_sanitize_select',
        )
    );
    $wp_customize->add_control(
        new Colon_Radio_Image_Control( $wp_customize,'colon_page_sidebar_layout',
            array(
                'settings'		=> 'colon_page_sidebar_layout',
                'section'		=> 'colon_page_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'colon' ),
                'choices'		=> array(
                    'right'	        => COLON_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => COLON_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => COLON_DIR_URI . '/inc/customizer/assets/images/cn.png',
                ),
                'active_callback' => 'colon_page_sidebar_enable',
            )
        )
    );

}
endif;

add_action( 'customize_register', 'colon_customizer_page_register' );