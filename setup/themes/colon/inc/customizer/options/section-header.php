<?php
/**
 * Theme Customizer Controls
 *
 * @package colon
 */


if ( ! function_exists( 'colon_customizer_header_register' ) ) :
function colon_customizer_header_register( $wp_customize ) {

	$wp_customize->add_panel(
        'colon_header_settings_panel',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'colon' ),
        )
    );

	// Section Top bar ===================================================
    $wp_customize->add_section(
        'colon_header_topbar_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Top Bar', 'colon' ),
            'panel'          => 'colon_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'colon_label_header_topbar_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_topbar_show', 
		array(
		    'label'       => esc_html__( 'Top Bar', 'colon' ),
		    'section'     => 'colon_header_topbar_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_topbar_show',
		) 
	));

	// Add an option to enable the top bar
	$wp_customize->add_setting( 
		'colon_enable_header_topbar', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_header_topbar', 
		array(
		    'label'       => esc_html__( 'Show Topbar', 'colon' ),
		    'section'     => 'colon_header_topbar_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_header_topbar',
		) 
	));


	// Info label
    $wp_customize->add_setting( 
        'colon_label_top_bar_info', 
        array(
            'sanitize_callback' => 'colon_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Info_Control( $wp_customize, 'colon_label_top_bar_info', 
        array(
            'label'       => esc_html__( 'To show content in top bar, Go to Appearance -> Widgets and add widgets inside the Top Bar Left Column and Top Bar Right Column', 'colon' ),
            'section'     => 'colon_header_topbar_settings',
            'type'        => 'colon-info',
            'settings'    => 'colon_label_top_bar_info',
            'active_callback' => '',
        ) 
    ));

	// Section Menu ===================================================
    $wp_customize->add_section(
        'colon_header_menu_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Menu', 'colon' ),
            'panel'          => 'colon_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'colon_label_header_menu_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_menu_show', 
		array(
		    'label'       => esc_html__( 'Menu', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_menu_show',
		) 
	));

	// Add an option to align the menu
	$wp_customize->add_setting( 
		'colon_enable_header_menu_align', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_header_menu_align', 
		array(
		    'label'       => esc_html__( 'Align Menu to right', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_header_menu_align',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'colon_label_header_menu_items_spacing_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_menu_items_spacing_show', 
		array(
		    'label'       => esc_html__( 'Menu Items Spacing', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_menu_items_spacing_show',
		) 
	));

    // menu items spacing
    $wp_customize->add_setting( 
        'colon_menu_items_spacing', 
        array(
            'default' => 18,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_menu_items_spacing', 
        array(
            'label' => esc_html__( 'Menu Items Spacing(px)','colon' ),
            'description' => esc_html__( 'Default is 18','colon' ),
            'section' => 'colon_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 100,
                'step' => 1,
            ),
        )
    ));


	// Title label
	$wp_customize->add_setting( 
		'colon_label_header_menu_spacing_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_menu_spacing_show', 
		array(
		    'label'       => esc_html__( 'Menu Margins', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_menu_spacing_show',
		) 
	));

    // spacing from top
    $wp_customize->add_setting( 
        'colon_menu_spacing_from_top', 
        array(
            'default' => 20,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_menu_spacing_from_top', 
        array(
            'label' => esc_html__( 'Margin from Top (px)','colon' ),
            'description' => esc_html__( 'Default is 20','colon' ),
            'section' => 'colon_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 150,
                'step' => 1,
            ),
        )
    ));


    // spacing from bottom
    $wp_customize->add_setting( 
        'colon_menu_spacing_from_bottom', 
        array(
            'default' => 0,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_menu_spacing_from_bottom', 
        array(
            'label' => esc_html__( 'Margin from Bottom (px)','colon' ),
            'description' => esc_html__( 'Default is 0','colon' ),
            'section' => 'colon_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 150,
                'step' => 1,
            ),
        )
    ));

    // Title label
	$wp_customize->add_setting( 
		'colon_label_header_menu_last_button', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_menu_last_button', 
		array(
		    'label'       => esc_html__( 'Menu Button', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_menu_last_button',
		) 
	));

	// Add an option to make last menu as button
	$wp_customize->add_setting( 
		'colon_enable_header_menu_last_button', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_header_menu_last_button', 
		array(
		    'label'       => esc_html__( 'Show last menu item as button', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_header_menu_last_button',
		) 
	));

	//choose button type
	$wp_customize->add_setting( 
        'colon_choose_style_menu_last_button', 
        array(
            'default'           => 'square',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'colon_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Text_Radio_Control( $wp_customize, 'colon_choose_style_menu_last_button', 
        array(
            'label'       => esc_html__( 'Choose Button Type', 'colon' ),
            'section'     => 'colon_header_menu_settings',
            'type'        => 'colon-text-radio',
            'settings'    => 'colon_choose_style_menu_last_button',
            'choices' => array(
            	'square' => esc_html__( 'Square','colon' ),
                'round' => esc_html__( 'Rounded','colon' ),
            ),
            'active_callback' => 'colon_header_menu_button_enable',
        )
    ));

    // Title label
	$wp_customize->add_setting( 
		'colon_label_header_menu_last_button_color', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_menu_last_button_color', 
		array(
		    'label'       => esc_html__( 'Menu Button Color', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_menu_last_button_color',
		    'active_callback' => 'colon_header_menu_button_enable',
		) 
	));

	// button bg color
    $wp_customize->add_setting(
        'colon_header_menu_last_button_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ed516c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_header_menu_last_button_bg_color',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'colon' ),
	        	'section'    => 'colon_header_menu_settings',
	        	'settings'   => 'colon_header_menu_last_button_bg_color',
	        	'active_callback' => 'colon_header_menu_button_enable',
	        )
	    )
    );

    // button border color
    $wp_customize->add_setting(
        'colon_header_menu_last_button_border_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ed516c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_header_menu_last_button_border_color',
	        array(
	        	'label'      => esc_html__( 'Border Color', 'colon' ),
	        	'section'    => 'colon_header_menu_settings',
	        	'settings'   => 'colon_header_menu_last_button_border_color',
	        	'active_callback' => 'colon_header_menu_button_enable',
	        )
	    )
    );

    // button text color
    $wp_customize->add_setting(
        'colon_header_menu_last_button_content_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_header_menu_last_button_content_color',
	        array(
	        	'label'      => esc_html__( 'Text Color', 'colon' ),
	        	'section'    => 'colon_header_menu_settings',
	        	'settings'   => 'colon_header_menu_last_button_content_color',
	        	'active_callback' => 'colon_header_menu_button_enable',
	        )
	    )
    );


    // Title label
	$wp_customize->add_setting( 
		'colon_label_header_menu_last_button_color_mobile', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_menu_last_button_color_mobile', 
		array(
		    'label'       => esc_html__( 'Menu Button Color Mobile', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_menu_last_button_color_mobile',
		    'active_callback' => 'colon_header_menu_button_enable',
		) 
	));

	// button bg color
    $wp_customize->add_setting(
        'colon_header_menu_last_button_bg_color_mobile',
        array(
            'type' => 'theme_mod',
            'default'           => '#ed516c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_header_menu_last_button_bg_color_mobile',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'colon' ),
	        	'section'    => 'colon_header_menu_settings',
	        	'settings'   => 'colon_header_menu_last_button_bg_color_mobile',
	        	'active_callback' => 'colon_header_menu_button_enable',
	        )
	    )
    );

    // button border color
    $wp_customize->add_setting(
        'colon_header_menu_last_button_border_color_mobile',
        array(
            'type' => 'theme_mod',
            'default'           => '#ed516c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_header_menu_last_button_border_color_mobile',
	        array(
	        	'label'      => esc_html__( 'Border Color', 'colon' ),
	        	'section'    => 'colon_header_menu_settings',
	        	'settings'   => 'colon_header_menu_last_button_border_color_mobile',
	        	'active_callback' => 'colon_header_menu_button_enable',
	        )
	    )
    );

    // button text color
    $wp_customize->add_setting(
        'colon_header_menu_last_button_content_color_mobile',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_header_menu_last_button_content_color_mobile',
	        array(
	        	'label'      => esc_html__( 'Text Color', 'colon' ),
	        	'section'    => 'colon_header_menu_settings',
	        	'settings'   => 'colon_header_menu_last_button_content_color_mobile',
	        	'active_callback' => 'colon_header_menu_button_enable',
	        )
	    )
    );

    // Title label
	$wp_customize->add_setting( 
		'colon_label_header_toggle_menu', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_toggle_menu', 
		array(
		    'label'       => esc_html__( 'Toggle Menu', 'colon' ),
		    'section'     => 'colon_header_menu_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_toggle_menu',
		) 
	));

	// vertical spacing
    $wp_customize->add_setting( 
        'colon_header_toggle_menu_spacing', 
        array(
            'default' => 0,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Colon_Slider_Control( $wp_customize, 'colon_header_toggle_menu_spacing', 
        array(
            'label' => esc_html__( 'Vertical Spacing(px)','colon' ),
            'description' => esc_html__( 'Default is 0','colon' ),
            'section' => 'colon_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 250,
                'step' => 1,
            ),
        )
    ));

    $wp_customize->add_setting(
        'colon_header_toggle_menu_text',
        array(            
            'default'           => esc_html__('MENU','colon'),
            'sanitize_callback' => 'colon_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'colon_header_toggle_menu_text',
        array(
            'settings'      => 'colon_header_toggle_menu_text',
            'section'       => 'colon_header_menu_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Toggle Menu Text', 'colon' ),
        )
    );


    // Section Transparent Header ===================================================
    $wp_customize->add_section(
        'colon_header_transparent_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Transparent Header', 'colon' ),
            'panel'          => 'colon_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'colon_label_header_transparent_show', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_header_transparent_show', 
		array(
		    'label'       => esc_html__( 'Transparent Header Settings', 'colon' ),
		    'section'     => 'colon_header_transparent_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_header_transparent_show',
		) 
	));

	// Add an option to enable transparency
	$wp_customize->add_setting( 
		'colon_enable_header_transparent', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'colon_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Toggle_Control( $wp_customize, 'colon_enable_header_transparent', 
		array(
		    'label'       => esc_html__( 'Enable Transparency', 'colon' ),
		    'section'     => 'colon_header_transparent_settings',
		    'type'        => 'colon-toggle',
		    'settings'    => 'colon_enable_header_transparent',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'colon_label_transparent_header_menu_color', 
		array(
		    'sanitize_callback' => 'colon_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Colon_Title_Info_Control( $wp_customize, 'colon_label_transparent_header_menu_color', 
		array(
		    'label'       => esc_html__( 'Primary Menu Color', 'colon' ),
		    'section'     => 'colon_header_transparent_settings',
		    'type'        => 'colon-title',
		    'settings'    => 'colon_label_transparent_header_menu_color',
		    'active_callback' => 'colon_header_transparent_enable',
		) 
	));

	// Menu color
    $wp_customize->add_setting(
        'colon_transparent_header_menu_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'colon_transparent_header_menu_color',
	        array(
	        	'label'      => esc_html__( 'Menu Color', 'colon' ),
	        	'section'    => 'colon_header_transparent_settings',
	        	'settings'   => 'colon_transparent_header_menu_color',
	        	'active_callback' => 'colon_header_transparent_enable',
	        )
	    )
    );

}
endif;

add_action( 'customize_register', 'colon_customizer_header_register' );