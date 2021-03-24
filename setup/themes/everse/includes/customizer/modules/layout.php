<?php
/**
 * Customizer Layout
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Content layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'number',
	'settings'    => 'everse_settings_content_layout_container_width',
	'label'       => esc_html__( 'Container Width (px)', 'everse' ),
	'section'     => 'everse_settings_content_layout',
	'default'     => 1120,
	'choices'     => array(
		'min'  => '400',
		'max'  => '1920',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.container',
			'property'    => 'max-width',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
) );


// Blog layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_blog_layout_type',
	'label'       => esc_html__( 'Layout type', 'everse' ),
	'section'     => 'everse_settings_blog_layout',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Blog columns
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'select',
	'settings'    => 'everse_settings_blog_columns',
	'label'       => esc_html__( 'Columns', 'everse' ),
	'description' => esc_html__( 'Use this option for regular blog pages, such as homepage', 'everse' ),
	'section'     => 'everse_settings_blog_layout',
	'default'     => 'col-lg-12',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'everse' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'everse' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'everse' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'everse' ),
	),
) );


if ( class_exists( 'Everse_Core' ) && everse_fs()->can_use_premium_code__premium_only() ) {

	// Projects columns
	Kirki::add_field( 'everse_settings_config', array(
		'type'        => 'select',
		'settings'    => 'everse_settings_projects_columns',
		'label'       => esc_html__( 'Columns', 'everse' ),
		'description' => esc_html__( 'Use this option for projects archive pages', 'everse' ),
		'section'     => 'everse_settings_projects_layout',
		'default'     => 'col-lg-4',
		'choices'     => array(
			'col-lg-12' => esc_attr__( '1 Column', 'everse' ),
			'col-lg-6'  => esc_attr__( '2 Columns', 'everse' ),
			'col-lg-4'  => esc_attr__( '3 Columns', 'everse' ),
			'col-lg-3'  => esc_attr__( '4 Columns', 'everse' ),
		),
	) );

	// Services columns
	Kirki::add_field( 'everse_settings_config', array(
		'type'        => 'select',
		'settings'    => 'everse_settings_services_columns',
		'label'       => esc_html__( 'Columns', 'everse' ),
		'description' => esc_html__( 'Use this option for services archive pages', 'everse' ),
		'section'     => 'everse_settings_services_layout',
		'default'     => 'col-lg-4',
		'choices'     => array(
			'col-lg-12' => esc_attr__( '1 Column', 'everse' ),
			'col-lg-6'  => esc_attr__( '2 Columns', 'everse' ),
			'col-lg-4'  => esc_attr__( '3 Columns', 'everse' ),
			'col-lg-3'  => esc_attr__( '4 Columns', 'everse' ),
		),
	) );

}

// Page Layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_page_layout_type',
	'label'       => esc_html__( 'Layout type', 'everse' ),
	'section'     => 'everse_settings_page_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives Layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_archive_layout_type',
	'label'       => esc_html__( 'Layout type', 'everse' ),
	'section'     => 'everse_settings_archive_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives columns
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'select',
	'settings'    => 'everse_settings_archive_columns',
	'label'       => esc_html__( 'Columns', 'everse' ),
	'section'     => 'everse_settings_archive_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'everse' ),
		'col-lg-6'  => esc_attr__( '2 Columns', 'everse' ),
		'col-lg-4'  => esc_attr__( '3 Columns', 'everse' ),
		'col-lg-3'  => esc_attr__( '4 Columns', 'everse' ),
	),
) );


if ( everse_is_woocommerce_activated() ) {

	// Shop layout
	Kirki::add_field( 'everse_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'everse_settings_shop_layout_type',
		'label'       => esc_html__( 'Shop layout type', 'everse' ),
		'description'	=> esc_html__( 'Make sure that your Shop sidebar has widgets.', 'everse' ),
		'section'     => 'everse_settings_shop_layout',
		'default'     => 'fullwidth',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

	// Shop pages layout
	Kirki::add_field( 'everse_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'everse_settings_shop_pages_layout_type',
		'label'       => esc_html__( 'Shop pages layout type', 'everse' ),
		'description'	=> esc_html__( 'Applies on Cart, Checkout and My Account pages. This setting will not have any effect if you are using custom metaboxes in Pro version.', 'everse' ),
		'section'     => 'everse_settings_shop_layout',
		'default'     => 'fullwidth',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

}

if ( class_exists( 'SFWD_LMS' ) && everse_fs()->can_use_premium_code__premium_only() ) {
	
	// LearnDash layout 
	Kirki::add_field( 'everse_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'everse_settings_learndash_layout_type',
		'label'       => esc_html__( 'LearnDash layout type', 'everse' ),
		'section'     => 'everse_settings_learndash_layout',
		'default'     => 'fullwidth',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );
}

// Search Layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_search_results_layout_type',
	'label'       => esc_html__( 'Layout type', 'everse' ),
	'section'     => 'everse_settings_search_results_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Search columns
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'select',
	'settings'    => 'everse_settings_search_results_columns',
	'label'       => esc_html__( 'Columns', 'everse' ),
	'section'     => 'everse_settings_search_results_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'everse' ),
		'col-lg-6'  => esc_attr__( '2 Columns', 'everse' ),
		'col-lg-4'  => esc_attr__( '3 Columns', 'everse' ),
		'col-lg-3'  => esc_attr__( '4 Columns', 'everse' ),
	),
) );