<?php
/**
 * Customizer Page Title
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* Regular Pages
/*-------------------------------------------------------*/

// Show regular pages page title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_regular_pages_page_title_show',
	'label'       => esc_html__( 'Show page title', 'everse' ),
	'section'     => 'everse_settings_regular_pages_page_title',
	'default'     => true,
) );

// Show regular pages breadcrumbs
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_regular_pages_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs', 'everse' ),
	'section'     => 'everse_settings_regular_pages_page_title',
	'default'     => true,
) );

// Page title layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_regular_pages_page_title_layout',
	'label'       => esc_html__( 'Page title layout', 'everse' ),
	'section'     => 'everse_settings_regular_pages_page_title',
	'default'     => 'page-title-layout-1',
	'choices'     => array(
		'page-title-layout-1' => EVERSE_URI . '/assets/img/customizer/page-title-layout-1.png',
		'page-title-layout-2' => EVERSE_URI . '/assets/img/customizer/page-title-layout-2.png',
	),
) );

// Page title align
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'everse_settings_regular_pages_page_title_align',
	'label'       => esc_html__( 'Page title align', 'everse' ),
	'section'     => 'everse_settings_regular_pages_page_title',
	'default'     => 'center',
	'choices'     => array(
		'left'   => esc_html__( 'Left', 'everse' ),
		'center' => esc_html__( 'Center', 'everse' ),
		'right'  => esc_html__( 'Right', 'everse' ),
	),
	'transport' => 'auto',
) );

// Page title padding
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'everse_settings_regular_pages_page_title_padding',
	'label'       => esc_html__( 'Page title top/bottom padding', 'everse' ),
	'section'     => 'everse_settings_regular_pages_page_title',
	'default'     => [
		'padding-top'    => '60px',
		'padding-bottom' => '60px',
	],
	'output' => array(
		array(
			'element' => '.page-title-regular_pages',
		),
	),
	'transport' => 'auto',
) );

// Page title background image
Kirki::add_field( 'everse_settings_config', array(
	'type'      => 'image',
	'settings'  => 'everse_settings_regular_pages_page_title_image',
	'label'     => esc_html__( 'Upload background image', 'everse' ),
	'description' => esc_html__( 'Background image for blog page. Use featured image to display image on a regular pages.', 'everse' ),
	'section'   => 'everse_settings_regular_pages_page_title',
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_regular_pages_page_title_layout',
			'operator' => '==',
			'value'    => 'page-title-layout-2',
		)
	),
) );


/*-------------------------------------------------------*/
/* Archives
/*-------------------------------------------------------*/

// Show archives page title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_archives_page_title_show',
	'label'       => esc_html__( 'Show page title', 'everse' ),
	'section'     => 'everse_settings_archives_page_title',
	'default'     => true,
) );

// Show archive breadcrumbs
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_archives_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs', 'everse' ),
	'section'     => 'everse_settings_archives_page_title',
	'default'     => true,
) );

// Page title layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_archives_page_title_layout',
	'label'       => esc_html__( 'Page title layout', 'everse' ),
	'section'     => 'everse_settings_archives_page_title',
	'default'     => 'page-title-layout-1',
	'choices'     => array(
		'page-title-layout-1' => EVERSE_URI . '/assets/img/customizer/page-title-layout-1.png',
		'page-title-layout-2' => EVERSE_URI . '/assets/img/customizer/page-title-layout-2.png',
	),
) );

// Page title align
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'everse_settings_archives_page_title_align',
	'label'       => esc_html__( 'Page title align', 'everse' ),
	'section'     => 'everse_settings_archives_page_title',
	'default'     => 'center',
	'choices'     => array(
		'left'   => esc_html__( 'Left', 'everse' ),
		'center' => esc_html__( 'Center', 'everse' ),
		'right'  => esc_html__( 'Right', 'everse' ),
	),
	'transport' => 'auto',
) );

// Page title padding
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'everse_settings_archives_page_title_padding',
	'label'       => esc_html__( 'Page title top/bottom padding', 'everse' ),
	'section'     => 'everse_settings_archives_page_title',
	'default'     => [
		'padding-top'    => '60px',
		'padding-bottom' => '60px',
	],
	'output' => array(
		array(
			'element' => '.page-title-archives',
		),
	),
	'transport' => 'auto',
) );

// Page title background image
Kirki::add_field( 'everse_settings_config', array(
	'type'      => 'image',
	'settings'  => 'everse_settings_archives_page_title_image',
	'label'     => esc_html__( 'Upload background image', 'everse' ),
	'section'   => 'everse_settings_archives_page_title',
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_archives_page_title_layout',
			'operator' => '==',
			'value'    => 'page-title-layout-2',
		)
	),
) );


/*-------------------------------------------------------*/
/* Search Results
/*-------------------------------------------------------*/

// Show search results page title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_search_results_page_title_show',
	'label'       => esc_html__( 'Show page title', 'everse' ),
	'section'     => 'everse_settings_search_results_page_title',
	'default'     => true,
) );

// Show search results breadcrumbs
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_search_results_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs', 'everse' ),
	'section'     => 'everse_settings_search_results_page_title',
	'default'     => true,
) );

// Page title layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_search_results_page_title_layout',
	'label'       => esc_html__( 'Page title layout', 'everse' ),
	'section'     => 'everse_settings_search_results_page_title',
	'default'     => 'page-title-layout-1',
	'choices'     => array(
		'page-title-layout-1' => EVERSE_URI . '/assets/img/customizer/page-title-layout-1.png',
		'page-title-layout-2' => EVERSE_URI . '/assets/img/customizer/page-title-layout-2.png',
	),
) );

// Page title align
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'everse_settings_search_results_page_title_align',
	'label'       => esc_html__( 'Page title align', 'everse' ),
	'section'     => 'everse_settings_search_results_page_title',
	'default'     => 'center',
	'choices'     => array(
		'left'   => esc_html__( 'Left', 'everse' ),
		'center' => esc_html__( 'Center', 'everse' ),
		'right'  => esc_html__( 'Right', 'everse' ),
	),
	'transport' => 'auto',
) );

// Page title padding
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'everse_settings_search_results_page_title_padding',
	'label'       => esc_html__( 'Page title top/bottom padding', 'everse' ),
	'section'     => 'everse_settings_search_results_page_title',
	'default'     => [
		'padding-top'    => '60px',
		'padding-bottom' => '60px',
	],
	'output' => array(
		array(
			'element' => '.page-title-search_results',
		),
	),
	'transport' => 'auto',
) );

// Page title background image
Kirki::add_field( 'everse_settings_config', array(
	'type'      => 'image',
	'settings'  => 'everse_settings_search_results_page_title_image',
	'label'     => esc_html__( 'Upload background image', 'everse' ),
	'section'   => 'everse_settings_search_results_page_title',
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_search_results_page_title_layout',
			'operator' => '==',
			'value'    => 'page-title-layout-2',
		)
	),
) );


/*-------------------------------------------------------*/
/* Single Post
/*-------------------------------------------------------*/

// Show single post page title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_post_page_title_show',
	'label'       => esc_html__( 'Show page title', 'everse' ),
	'section'     => 'everse_settings_single_post_page_title',
	'default'     => true,
) );

// Show single post breadcrumbs
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_post_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs', 'everse' ),
	'section'     => 'everse_settings_single_post_page_title',
	'default'     => true,
) );

// Page title layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_single_post_page_title_layout',
	'label'       => esc_html__( 'Page title layout', 'everse' ),
	'section'     => 'everse_settings_single_post_page_title',
	'default'     => 'page-title-layout-1',
	'choices'     => array(
		'page-title-layout-1' => EVERSE_URI . '/assets/img/customizer/page-title-layout-1.png',
		'page-title-layout-2' => EVERSE_URI . '/assets/img/customizer/page-title-layout-2.png',
	),
) );

// Page title align
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'everse_settings_single_post_page_title_align',
	'label'       => esc_html__( 'Page title align', 'everse' ),
	'section'     => 'everse_settings_single_post_page_title',
	'default'     => 'left',
	'choices'     => array(
		'left'   => esc_html__( 'Left', 'everse' ),
		'center' => esc_html__( 'Center', 'everse' ),
		'right'  => esc_html__( 'Right', 'everse' ),
	),
	'transport' => 'auto',
) );

// Page title padding
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'everse_settings_single_post_page_title_padding',
	'label'       => esc_html__( 'Page title top/bottom padding', 'everse' ),
	'section'     => 'everse_settings_single_post_page_title',
	'default'     => [
		'padding-top'    => '60px',
		'padding-bottom' => '60px',
	],
	'output' => array(
		array(
			'element' => '.page-title-single_post',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_single_post_page_title_layout',
			'operator' => '==',
			'value'    => 'page-title-layout-2',
		)
	),
	'transport' => 'auto',
) );


/*-------------------------------------------------------*/
/* Shop
/*-------------------------------------------------------*/

// Show shop page title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_shop_page_title_show',
	'label'       => esc_html__( 'Show page title', 'everse' ),
	'section'     => 'everse_settings_shop_page_title',
	'default'     => true,
) );

// Show shop breadcrumbs
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_shop_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs', 'everse' ),
	'section'     => 'everse_settings_shop_page_title',
	'default'     => true,
) );

// Page title layout
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'everse_settings_shop_page_title_layout',
	'label'       => esc_html__( 'Page title layout', 'everse' ),
	'section'     => 'everse_settings_shop_page_title',
	'default'     => 'page-title-layout-1',
	'choices'     => array(
		'page-title-layout-1' => EVERSE_URI . '/assets/img/customizer/page-title-layout-1.png',
		'page-title-layout-2' => EVERSE_URI . '/assets/img/customizer/page-title-layout-2.png',
	),
) );

// Page title align
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'everse_settings_shop_page_title_align',
	'label'       => esc_html__( 'Page title align', 'everse' ),
	'section'     => 'everse_settings_shop_page_title',
	'default'     => 'center',
	'choices'     => array(
		'left'   => esc_html__( 'Left', 'everse' ),
		'center' => esc_html__( 'Center', 'everse' ),
		'right'  => esc_html__( 'Right', 'everse' ),
	),
	'transport' => 'auto',
) );

// Page title padding
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'everse_settings_shop_page_title_padding',
	'label'       => esc_html__( 'Page title top/bottom padding', 'everse' ),
	'section'     => 'everse_settings_shop_page_title',
	'default'     => [
		'padding-top'    => '60px',
		'padding-bottom' => '60px',
	],
	'output' => array(
		array(
			'element' => '.page-title-shop',
		),
	),
	'transport' => 'auto',
) );

// Page title background image
Kirki::add_field( 'everse_settings_config', array(
	'type'      => 'image',
	'settings'  => 'everse_settings_shop_page_title_image',
	'label'     => esc_html__( 'Upload background image', 'everse' ),
	'section'   => 'everse_settings_shop_page_title',
	'active_callback' => array(
		array(
			'setting'  => 'everse_settings_shop_page_title_layout',
			'operator' => '==',
			'value'    => 'page-title-layout-2',
		)
	),
) );
