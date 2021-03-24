<?php
/**
 * Customizer Header
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Show default header
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_header_show',
	'label'       => esc_html__( 'Show default header', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => true,
) );

// Sticky header
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_sticky_header_show',
	'label'       => esc_html__( 'Sticky header', 'everse' ),
	'description' => esc_html__( 'Will apply only on big screens', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Onepage header
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_onepage_header',
	'label'       => esc_html__( 'Onepage header', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => false,
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Header Layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_header_layout',
	'label'       => esc_html__( 'Header layout', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => 'header-layout-1',
	'choices'     => array(
		'header-layout-1' => EVERSE_URI . '/assets/img/customizer/header-layout-1.png',
		'header-layout-2' => EVERSE_URI . '/assets/img/customizer/header-layout-2.png',
		'header-layout-3' => EVERSE_URI . '/assets/img/customizer/header-layout-3.png',
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Header container width
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_container_width',
	'label'       => esc_attr__( 'Header container width', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => 1120,
	'choices'     => array(
		'min'  => '400',
		'max'  => '1920',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__container.container',
			'property'    => 'max-width',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header height
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_height',
	'label'       => esc_attr__( 'Header height', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => 72,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.everse-header-layout-1 .nav__flex-parent, .everse-header-layout-2 .nav__header, .everse-header-layout-3 .nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.everse-header-layout-1, .everse-header-layout-3',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.everse-header-layout-1 .nav__menu > li > a, .everse-header-layout-3 .nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header sticky height
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_sticky_height',
	'label'       => esc_attr__( 'Header sticky height', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.everse-header-layout-1 .nav--sticky.sticky .nav__flex-parent, .everse-header-layout-2 .nav--sticky.sticky .nav__header, .everse-header-layout-3 .nav--sticky.sticky .nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.everse-header-layout-1 .nav--sticky.sticky .nav__menu > li > a, .everse-header-layout-3 .nav--sticky.sticky .nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header mobile height
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_mobile_height',
	'label'       => esc_attr__( 'Header mobile height', 'everse' ),
	'section'     => 'everse_settings_mobile_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header navbar height (bottom navbar layout 3)
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_navbar_height',
	'label'       => esc_attr__( 'Header navbar height', 'everse' ),
	'section'     => 'everse_settings_default_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '20',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.everse-header-layout-2 .nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),

	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_layout',
			'operator' => '==',
			'value'    => 'header-layout-2',
		)
	),
	'transport' => 'auto',
) );		


// Logo height
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_logo_height',
	'label'       => esc_attr__( 'Header logo height', 'everse' ),
	'section'     => 'everse_settings_logo',
	'default'     => 48,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header .logo',
			'property'    => 'max-height',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Logo sticky height
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_logo_sticky_height',
	'label'       => esc_attr__( 'Header logo sticky height', 'everse' ),
	'section'     => 'everse_settings_logo',
	'default'     => 48,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__header .logo',
			'property'    => 'max-height',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Menu items horizontal spacing
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'everse_settings_header_text_links_horizontal_spacing',
	'label'       => esc_attr__( 'Menu text links horizontal spacing', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => 17,
	'choices'     => array(
		'min'  => '0',
		'max'  => '60',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-left',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-right',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );


// Last Menu Item Title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'everse_settings_primary_menu',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Last menu item', 'everse' ) . '</h3>',
) );

// Last Item: Search
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_header_last_menu_item_search',
	'label'       => esc_html__( 'Search', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => false,
) );

if ( everse_is_woocommerce_activated() ) {
	// Last Item: Shopping cart
	Kirki::add_field( 'everse_settings_config', array(
		'type'        => 'checkbox',
		'settings'    => 'everse_settings_header_last_menu_item_shopping_cart',
		'label'       => esc_html__( 'Shopping Cart', 'everse' ),
		'section'     => 'everse_settings_primary_menu',
		'default'     => false,
	) );
}

// Last Item: Button
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_header_last_menu_item_button',
	'label'       => esc_html__( 'Button', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => false,
) );

// Last Item: HTML
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_header_last_menu_item_html',
	'label'       => esc_html__( 'HTML', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => false,
) );


// Last Item: Button text
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'text',
	'settings'    => 'everse_settings_header_last_menu_item_button_text',
	'label'       => esc_html__( 'Button Text', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => esc_html__( 'Buy Now', 'everse' ),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_last_menu_item_button',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

// Last Item: Button URL
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'url',
	'settings'    => 'everse_settings_header_last_menu_item_button_url',
	'label'       => esc_html__( 'Button URL', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => '#',
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_last_menu_item_button',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

// Last Item: Button New Tab
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_header_last_menu_item_button_new_tab',
	'label'       => esc_attr__( 'Open in a New Tab', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => false,
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_last_menu_item_button',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

// Last Item: Button Link Rel
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'text',
	'settings'    => 'everse_settings_header_last_menu_item_button_link_rel',
	'label'       => esc_html__( 'Button Link Rel', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_last_menu_item_button',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

// Last Item: Text / HTML 
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'code',
	'settings'    => 'everse_settings_header_last_menu_item_text_html',
	'label'       => esc_html__( 'Text / HTML / Shortcode', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'choices'     => array(
		'language' => 'html',
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_last_menu_item_html',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

// Hide last menu item on mobile
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_header_last_menu_item_hide',
	'label'       => esc_attr__( 'Hide last menu item on mobile', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => false,
) );

// Take button outside menu
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_header_last_menu_item_button_outside_menu',
	'label'       => esc_attr__( 'Take button outside menu', 'everse' ),
	'section'     => 'everse_settings_primary_menu',
	'default'     => false,
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_header_last_menu_item_hide',
			'operator' => '!==',
			'value'    => true,
		),
	),
) );


// Vertical Header
if ( class_exists( 'Everse_Core_Theme_Templates' ) ) {
	$custom_headers = \Everse_Core_Theme_Templates::get_theme_headers();
	$header_vertical = false;

	foreach( $custom_headers as $key => $value ) {
		$location = get_post_meta( $key, '_everse_template_location', true );

		if ( 'header-vertical' === $location ) {
			$header_vertical = true;
		}
	}

	if ( $header_vertical ) {

		// Header width
		Kirki::add_field( 'everse_settings_config', array(
			'type'        => 'slider',
			'settings'    => 'everse_settings_vertical_header_width',
			'label'       => esc_html__( 'Vertical header width', 'everse' ),
			'description' => esc_html__( 'Applies above 1200px breakpoint.', 'everse' ),
			'section'     => 'everse_settings_vertical_header',
			'default'     => 300,
			'choices'     => array(
				'min'  => '100',
				'max'  => '800',
				'step' => '1',
			),
			'output'       => array(
				array(
					'element'     => '.eversor-header-vertical--left',
					'property'    => 'margin-left',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
				array(
					'element'     => '.eversor-header-vertical--right',
					'property'    => 'margin-right',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
				array(
					'element'     => '.eversor-header--vertical',
					'property'    => 'width',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
			),
			'transport' => 'auto',
		) );
		
		// Header position
		Kirki::add_field( 'everse_settings_config', array(
			'type'        => 'select',
			'settings'    => 'everse_settings_vertical_header_position',
			'label'       => esc_html__( 'Vertical header position', 'everse' ),
			'section'     => 'everse_settings_vertical_header',
			'default'     => 'left',
			'choices'     => array(
				'left'  => esc_attr__( 'Left', 'everse' ),
				'right' => esc_attr__( 'Right', 'everse' ),
			),
		) );

	}	

}