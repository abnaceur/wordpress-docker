<?php

/**
 * Customizer Colors
 *
 * @package Everse
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/
// Primary color
Kirki::add_field( 'everse_settings_config', array(
    'type'        => 'color',
    'settings'    => 'everse_settings_main_color',
    'label'       => esc_html__( 'Primary color', 'everse' ),
    'description' => esc_html__( 'Some elements should be customized with Elementor afterwards', 'everse' ),
    'section'     => 'everse_settings_general_colors',
    'default'     => $primary_color,
    'output'      => array(
    array(
    'element'  => $selectors['main_color'],
    'property' => 'color',
),
    array(
    'element'  => ( isset( $selectors['shop_main_color'] ) ? $selectors['shop_main_color'] : null ),
    'property' => 'color',
),
    array(
    'element'  => '.wp-block-pullquote::before',
    'property' => 'color',
    'context'  => array( 'editor' ),
),
    array(
    'element'  => $selectors['main_background_color'],
    'property' => 'background-color',
),
    array(
    'element'  => ( isset( $selectors['shop_main_background_color'] ) ? $selectors['shop_main_background_color'] : null ),
    'property' => 'background-color',
),
    array(
    'element'  => $selectors['main_border_color'],
    'property' => 'border-color',
),
    array(
    'element'  => $selectors['main_border_left_color'],
    'property' => 'border-color',
    'context'  => array( 'editor', 'front' ),
),
    array(
    'element'  => $selectors['main_border_top_color'],
    'property' => 'border-top-color',
),
    array(
    'element'  => ( isset( $selectors['shop_main_border_color'] ) ? $selectors['shop_main_border_color'] : null ),
    'property' => 'border-color',
)
),
    'transport'   => 'auto',
) );
// Borders color
Kirki::add_field( 'everse_settings_config', array(
    'type'        => 'color',
    'settings'    => 'everse_settings_borders_color',
    'label'       => esc_html__( 'Borders color', 'everse' ),
    'description' => esc_html__( 'Applies on all the elements with borders, form inputs, widgets dividers etc.', 'everse' ),
    'section'     => 'everse_settings_general_colors',
    'default'     => $border_color,
    'output'      => array( array(
    'element'  => $selectors['border_color'],
    'property' => 'border-color',
), array(
    'element'  => ( isset( $selectors['shop_border_color'] ) ? $selectors['shop_border_color'] : null ),
    'property' => 'border-color',
) ),
    'transport'   => 'auto',
) );
// Page background color
Kirki::add_field( 'everse_settings_config', array(
    'type'        => 'color',
    'settings'    => 'everse_settings_page_background_color',
    'label'       => esc_html__( 'Page background color', 'everse' ),
    'description' => esc_html__( 'Applies on a blog, archive and search results pages', 'everse' ),
    'section'     => 'everse_settings_general_colors',
    'default'     => '#ffffff',
    'output'      => array( array(
    'element'  => '.blog-section, .archive-section, .search-results-section',
    'property' => 'background-color',
) ),
    'transport'   => 'auto',
) );
/*-------------------------------------------------------*/
/* Header Colors
/*-------------------------------------------------------*/
/* Default Header
/*-------------------------------------------------------*/
// Header background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_default_background_color',
    'label'     => esc_html__( 'Header background color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => 'rgba(255,255,255,0)',
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => '.everse-header',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Sticky header background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_sticky_background_color',
    'label'     => esc_html__( 'Sticky header background color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => 'rgba(255,255,255,1)',
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => '.nav--sticky.sticky',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Header navbar border color (bottom navbar)
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_default_navbar_border_color',
    'label'     => esc_html__( 'Header navbar border color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => $border_color,
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => '.nav__holder',
    'property' => 'border-color',
) ),
    'transport' => 'auto',
) );
// Menu links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_default_menu_links_color',
    'label'     => esc_html__( 'Menu links color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => '.everse-header .nav__menu > li > a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Menu links hover / active color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_default_menu_links_hover_color',
    'label'     => esc_html__( 'Menu links hover / active color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => $primary_color,
    'output'    => array( array(
    'element'  => '.everse-header .nav__menu > li > a:hover,
				.everse-header .nav__menu > li > a:focus,
				.everse-header .nav__menu > li.active > a,
				.everse-header .nav__menu > .current_page_parent > a,
				.everse-header .nav__menu .current-menu-item > a,
				.everse-header .nav__dropdown-menu > li > a:hover,
				.everse-header .nav__dropdown-menu > li > a:focus',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Dropdown background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_default_dropdown_background_color',
    'label'     => esc_html__( 'Dropdown background color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'     => '.everse-header .nav__dropdown-menu, .everse-header .nav__menu > .nav__dropdown > .nav__dropdown-menu:before',
    'property'    => 'background-color',
    'media_query' => $bp_lg_up,
) ),
    'transport' => 'auto',
) );
// Dropdown menu links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_default_dropdown_menu_links_color',
    'label'     => esc_html__( 'Dropdown menu links color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => $text_color,
    'output'    => array( array(
    'element'  => '.everse-header .nav__dropdown-menu > li > a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Header icons color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_default_icons_color',
    'label'     => esc_html__( 'Header icons color', 'everse' ),
    'section'   => 'everse_settings_header_default_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => '.everse-header .everse-menu-cart__url, .everse-header .everse-menu-search__trigger',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/* Mobile Header
/*-------------------------------------------------------*/
// Mobile header background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_mobile_background_color',
    'label'     => esc_html__( 'Mobile header background color', 'everse' ),
    'section'   => 'everse_settings_header_mobile_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'     => '.nav',
    'property'    => 'background-color',
    'media_query' => $bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Mobile menu links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_mobile_menu_links_color',
    'label'     => esc_html__( 'Mobile menu links color', 'everse' ),
    'section'   => 'everse_settings_header_mobile_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'     => '.nav__menu > li > a',
    'property'    => 'color',
    'media_query' => $bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Mobile menu dividers color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_mobile_menu_dividers_color',
    'label'     => esc_html__( 'Mobile menu dividers color', 'everse' ),
    'section'   => 'everse_settings_header_mobile_colors',
    'default'   => $mobile_menu_dividers_color,
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'     => '.nav__menu li a',
    'property'    => 'border-bottom-color',
    'media_query' => $bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Mobile Header menu toggle color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_header_mobile_menu_toggle_color',
    'label'     => esc_html__( 'Mobile menu toggle color', 'everse' ),
    'section'   => 'everse_settings_header_mobile_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => '.nav__icon-toggle-bar',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Page Title Colors / Regular Pages
/*-------------------------------------------------------*/
// Page title background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_regular_pages_page_title_background_color',
    'label'     => esc_html__( 'Background color', 'everse' ),
    'section'   => 'everse_settings_regular_pages_page_title_colors',
    'default'   => $bg_light,
    'output'    => array( array(
    'element'  => '.page-title-regular_pages',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Page title overlay background color
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'color',
    'settings'        => 'everse_settings_regular_pages_page_title_overlay_background_color',
    'label'           => esc_html__( 'Overlay background color', 'everse' ),
    'section'         => 'everse_settings_regular_pages_page_title_colors',
    'default'         => '',
    'choices'         => array(
    'alpha' => true,
),
    'output'          => array( array(
    'element'  => '.page-title-regular_pages::before',
    'property' => 'background-color',
) ),
    'active_callback' => array( array(
    'setting'  => 'everse_settings_regular_pages_page_title_layout',
    'operator' => '==',
    'value'    => 'page-title-layout-2',
) ),
    'transport'       => 'auto',
) );
// Page title heading color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_regular_pages_page_title_heading_color',
    'label'     => esc_html__( 'Heading color', 'everse' ),
    'section'   => 'everse_settings_regular_pages_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-regular_pages .page-title__title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Page title subtitle color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_regular_pages_page_title_subtitle_color',
    'label'     => esc_html__( 'Subtitle color', 'everse' ),
    'section'   => 'everse_settings_regular_pages_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-regular_pages .page-title__subtitle',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Breadcrumbs Colors / Regular Pages
/*-------------------------------------------------------*/
Kirki::add_field( 'everse_settings_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $uniqid++,
    'section'  => 'everse_settings_regular_pages_page_title_colors',
    'default'  => '<h3 class="customizer-title">' . esc_html__( 'Breadcrumbs', 'everse' ) . '</h3>',
) );
// Breadcrumbs links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_regular_pages_breadcrumbs_links_color',
    'label'     => esc_html__( 'Links color', 'everse' ),
    'section'   => 'everse_settings_regular_pages_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-regular_pages .breadcrumbs a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs separator color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_regular_pages_breadcrumbs_separator_color',
    'label'     => esc_html__( 'Separator color', 'everse' ),
    'section'   => 'everse_settings_regular_pages_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-regular_pages .trail-items li::after, .page-title-regular_pages .trail-items li::before',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_regular_pages_breadcrumbs_text_color',
    'label'     => esc_html__( 'Text color', 'everse' ),
    'section'   => 'everse_settings_regular_pages_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-regular_pages .trail-item > span',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Page Title Colors / Archives
/*-------------------------------------------------------*/
// Page title background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_archives_page_title_background_color',
    'label'     => esc_html__( 'Background color', 'everse' ),
    'section'   => 'everse_settings_archives_page_title_colors',
    'default'   => $bg_light,
    'output'    => array( array(
    'element'  => '.page-title-archives',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Page title overlay background color
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'color',
    'settings'        => 'everse_settings_archives_page_title_overlay_background_color',
    'label'           => esc_html__( 'Overlay background color', 'everse' ),
    'section'         => 'everse_settings_archives_page_title_colors',
    'default'         => '',
    'choices'         => array(
    'alpha' => true,
),
    'output'          => array( array(
    'element'  => '.page-title-archives::before',
    'property' => 'background-color',
) ),
    'active_callback' => array( array(
    'setting'  => 'everse_settings_archives_page_title_layout',
    'operator' => '==',
    'value'    => 'page-title-layout-2',
) ),
    'transport'       => 'auto',
) );
// Page title heading color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_archives_page_title_heading_color',
    'label'     => esc_html__( 'Heading color', 'everse' ),
    'section'   => 'everse_settings_archives_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-archives .page-title__title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Page title subtitle color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_archives_page_title_subtitle_color',
    'label'     => esc_html__( 'Subtitle color', 'everse' ),
    'section'   => 'everse_settings_archives_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-archives .page-title__subtitle',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Breadcrumbs Colors / Archives
/*-------------------------------------------------------*/
Kirki::add_field( 'everse_settings_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $uniqid++,
    'section'  => 'everse_settings_archives_page_title_colors',
    'default'  => '<h3 class="customizer-title">' . esc_html__( 'Breadcrumbs', 'everse' ) . '</h3>',
) );
// Breadcrumbs links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_archives_breadcrumbs_links_color',
    'label'     => esc_html__( 'Links color', 'everse' ),
    'section'   => 'everse_settings_archives_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-archives .breadcrumbs a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs separator color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_archives_breadcrumbs_separator_color',
    'label'     => esc_html__( 'Separator color', 'everse' ),
    'section'   => 'everse_settings_archives_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-archives .trail-items li::after, .page-title-archives .trail-items li::before',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_archives_breadcrumbs_text_color',
    'label'     => esc_html__( 'Text color', 'everse' ),
    'section'   => 'everse_settings_archives_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-archives .trail-item > span',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Page Title Colors / Search Results
/*-------------------------------------------------------*/
// Page title background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_search_results_page_title_background_color',
    'label'     => esc_html__( 'Background color', 'everse' ),
    'section'   => 'everse_settings_search_results_page_title_colors',
    'default'   => $bg_light,
    'output'    => array( array(
    'element'  => '.page-title-search_results',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Page title overlay background color
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'color',
    'settings'        => 'everse_settings_search_results_page_title_overlay_background_color',
    'label'           => esc_html__( 'Overlay background color', 'everse' ),
    'section'         => 'everse_settings_search_results_page_title_colors',
    'default'         => '',
    'choices'         => array(
    'alpha' => true,
),
    'output'          => array( array(
    'element'  => '.page-title-search_results::before',
    'property' => 'background-color',
) ),
    'active_callback' => array( array(
    'setting'  => 'everse_settings_search_results_page_title_layout',
    'operator' => '==',
    'value'    => 'page-title-layout-2',
) ),
    'transport'       => 'auto',
) );
// Page title heading color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_search_results_page_title_heading_color',
    'label'     => esc_html__( 'Heading color', 'everse' ),
    'section'   => 'everse_settings_search_results_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-search_results .page-title__title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Page title subtitle color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_search_results_page_title_subtitle_color',
    'label'     => esc_html__( 'Subtitle color', 'everse' ),
    'section'   => 'everse_settings_search_results_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-search_results .page-title__subtitle',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Breadcrumbs Colors / Search Results
/*-------------------------------------------------------*/
Kirki::add_field( 'everse_settings_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $uniqid++,
    'section'  => 'everse_settings_search_results_page_title_colors',
    'default'  => '<h3 class="customizer-title">' . esc_html__( 'Breadcrumbs', 'everse' ) . '</h3>',
) );
// Breadcrumbs links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_search_results_breadcrumbs_links_color',
    'label'     => esc_html__( 'Links color', 'everse' ),
    'section'   => 'everse_settings_search_results_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-search_results .breadcrumbs a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs separator color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_search_results_breadcrumbs_separator_color',
    'label'     => esc_html__( 'Separator color', 'everse' ),
    'section'   => 'everse_settings_search_results_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-search_results .trail-items li::after, .page-title-search_results .trail-items li::before',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_search_results_breadcrumbs_text_color',
    'label'     => esc_html__( 'Text color', 'everse' ),
    'section'   => 'everse_settings_search_results_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-search_results .trail-item > span',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Page Title Colors / Single Post
/*-------------------------------------------------------*/
// Page title background color
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'color',
    'settings'        => 'everse_settings_single_post_page_title_background_color',
    'label'           => esc_html__( 'Background color', 'everse' ),
    'section'         => 'everse_settings_single_post_page_title_colors',
    'default'         => $bg_light,
    'output'          => array( array(
    'element'  => '.page-title-single_post',
    'property' => 'background-color',
) ),
    'active_callback' => array( array(
    'setting'  => 'everse_settings_single_post_page_title_layout',
    'operator' => '==',
    'value'    => 'page-title-layout-2',
) ),
    'transport'       => 'auto',
) );
// Page title overlay background color
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'color',
    'settings'        => 'everse_settings_single_post_page_title_overlay_background_color',
    'label'           => esc_html__( 'Overlay background color', 'everse' ),
    'section'         => 'everse_settings_single_post_page_title_colors',
    'default'         => '',
    'choices'         => array(
    'alpha' => true,
),
    'output'          => array( array(
    'element'  => '.page-title-single_post::before',
    'property' => 'background-color',
) ),
    'active_callback' => array( array(
    'setting'  => 'everse_settings_single_post_page_title_layout',
    'operator' => '==',
    'value'    => 'page-title-layout-2',
) ),
    'transport'       => 'auto',
) );
// Page title heading color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_post_page_title_heading_color',
    'label'     => esc_html__( 'Heading color', 'everse' ),
    'section'   => 'everse_settings_single_post_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.single-post__entry-title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Page title meta categories color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_post_page_title_meta_categories_color',
    'label'     => esc_html__( 'Meta categories color', 'everse' ),
    'section'   => 'everse_settings_single_post_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.single-post__entry-header .entry__meta-item .entry__category-item',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Page title meta color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_post_page_title_meta_color',
    'label'     => esc_html__( 'Meta color', 'everse' ),
    'section'   => 'everse_settings_single_post_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.single-post__entry-header .entry__meta-item, .single-post__entry-header .entry__meta li, .single-post__entry-header .entry__meta a, .page-title-single_post .comment-date',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Breadcrumbs Colors / Single Post
/*-------------------------------------------------------*/
Kirki::add_field( 'everse_settings_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $uniqid++,
    'section'  => 'everse_settings_single_post_page_title_colors',
    'default'  => '<h3 class="customizer-title">' . esc_html__( 'Breadcrumbs', 'everse' ) . '</h3>',
) );
// Breadcrumbs background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_post_breadcrumbs_background_color',
    'label'     => esc_html__( 'Background color', 'everse' ),
    'section'   => 'everse_settings_single_post_page_title_colors',
    'default'   => $bg_light,
    'output'    => array( array(
    'element'  => '.single-post .breadcrumbs-wrap',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_post_breadcrumbs_links_color',
    'label'     => esc_html__( 'Links color', 'everse' ),
    'section'   => 'everse_settings_single_post_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.single-post .breadcrumbs a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs separator color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_post_breadcrumbs_separator_color',
    'label'     => esc_html__( 'Separator color', 'everse' ),
    'section'   => 'everse_settings_single_post_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.single-post .trail-items li::after, .single-post .trail-items li::before',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_post_breadcrumbs_text_color',
    'label'     => esc_html__( 'Text color', 'everse' ),
    'section'   => 'everse_settings_single_post_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.single-post .trail-item > span',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Page Title Colors / Shop
/*-------------------------------------------------------*/
// Page title background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_shop_page_title_background_color',
    'label'     => esc_html__( 'Background color', 'everse' ),
    'section'   => 'everse_settings_shop_page_title_colors',
    'default'   => $bg_light,
    'output'    => array( array(
    'element'  => '.page-title-shop',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Page title overlay background color
Kirki::add_field( 'everse_settings_config', array(
    'type'            => 'color',
    'settings'        => 'everse_settings_shop_page_title_overlay_background_color',
    'label'           => esc_html__( 'Overlay background color', 'everse' ),
    'section'         => 'everse_settings_shop_page_title_colors',
    'default'         => '',
    'choices'         => array(
    'alpha' => true,
),
    'output'          => array( array(
    'element'  => '.page-title-shop::before',
    'property' => 'background-color',
) ),
    'active_callback' => array( array(
    'setting'  => 'everse_settings_shop_page_title_layout',
    'operator' => '==',
    'value'    => 'page-title-layout-2',
) ),
    'transport'       => 'auto',
) );
// Page title heading color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_shop_page_title_heading_color',
    'label'     => esc_html__( 'Heading color', 'everse' ),
    'section'   => 'everse_settings_shop_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-shop .page-title__title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Breadcrumbs Colors / Shop
/*-------------------------------------------------------*/
Kirki::add_field( 'everse_settings_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $uniqid++,
    'section'  => 'everse_settings_shop_page_title_colors',
    'default'  => '<h3 class="customizer-title">' . esc_html__( 'Breadcrumbs', 'everse' ) . '</h3>',
) );
// Breadcrumbs links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_shop_breadcrumbs_links_color',
    'label'     => esc_html__( 'Links color', 'everse' ),
    'section'   => 'everse_settings_shop_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-shop .breadcrumbs a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs separator color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_shop_breadcrumbs_separator_color',
    'label'     => esc_html__( 'Separator color', 'everse' ),
    'section'   => 'everse_settings_shop_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-shop .trail-items li::after, .page-title-shop .trail-items li::before',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_shop_breadcrumbs_text_color',
    'label'     => esc_html__( 'Text color', 'everse' ),
    'section'   => 'everse_settings_shop_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.page-title-shop .trail-item > span',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Page Title Colors / Single Product
/*-------------------------------------------------------*/
// Page title heading color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_product_page_title_heading_color',
    'label'     => esc_html__( 'Heading color', 'everse' ),
    'section'   => 'everse_settings_single_product_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.woocommerce .product .product_title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Breadcrumbs Colors / Single Product
/*-------------------------------------------------------*/
Kirki::add_field( 'everse_settings_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $uniqid++,
    'section'  => 'everse_settings_single_product_page_title_colors',
    'default'  => '<h3 class="customizer-title">' . esc_html__( 'Breadcrumbs', 'everse' ) . '</h3>',
) );
// Breadcrumbs links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_product_breadcrumbs_links_color',
    'label'     => esc_html__( 'Links color', 'everse' ),
    'section'   => 'everse_settings_single_product_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.woocommerce .woocommerce-breadcrumb a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs separator color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_product_breadcrumbs_separator_color',
    'label'     => esc_html__( 'Separator color', 'everse' ),
    'section'   => 'everse_settings_single_product_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.woocommerce-breadcrumb__separator',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Breadcrumbs text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_single_product_breadcrumbs_text_color',
    'label'     => esc_html__( 'Text color', 'everse' ),
    'section'   => 'everse_settings_single_product_page_title_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.woocommerce .woocommerce-breadcrumb',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Blog Colors
/*-------------------------------------------------------*/
// Post links color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_post_links_color',
    'label'     => esc_html__( 'Post links color', 'everse' ),
    'section'   => 'everse_settings_blog_colors',
    'output'    => array( array(
    'element'  => $selectors['post_links_color'],
    'property' => 'color',
), array(
    'element'  => '.edit-post-visual-editor a, .editor-rich-text__tinymce a',
    'property' => 'color',
    'context'  => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Post meta color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_post_meta_color',
    'label'     => esc_html__( 'Post meta color', 'everse' ),
    'section'   => 'everse_settings_blog_colors',
    'default'   => $meta_color,
    'output'    => array( array(
    'element'  => $selectors['post_meta_color'],
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Text Colors
/*-------------------------------------------------------*/
// Headings colors
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_headings_color',
    'label'     => esc_html__( 'Headings color', 'everse' ),
    'section'   => 'everse_settings_text_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => $selectors['headings_color'],
    'property' => 'color',
), array(
    'element'  => ( isset( $selectors['learndash_heading_color'] ) ? $selectors['learndash_heading_color'] : null ),
    'property' => 'color',
), array(
    'element'  => '.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h2.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h3.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h4.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h5.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
    'property' => 'color',
    'context'  => array( 'editor' ),
) ),
    'transport' => 'auto',
) );
// Text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_text_color',
    'label'     => esc_html__( 'Text color', 'everse' ),
    'section'   => 'everse_settings_text_colors',
    'default'   => $text_color,
    'output'    => array(
    array(
    'element'  => $selectors['text_color'],
    'property' => 'color',
),
    array(
    'element'  => ( isset( $selectors['shop_text_color'] ) ? $selectors['shop_text_color'] : null ),
    'property' => 'color',
),
    array(
    'element'  => 'input::-webkit-input-placeholder',
    'property' => 'color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => 'input:-moz-placeholder, input::-moz-placeholder',
    'property' => 'color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => 'input:-ms-input-placeholder',
    'property' => 'color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => '.edit-post-visual-editor .block-editor-block-list__block,
			.edit-post-visual-editor .block-editor-block-list__block-edit,
			.edit-post-visual-editor',
    'property' => 'color',
    'context'  => array( 'editor' ),
)
),
    'transport' => 'auto',
) );
// Widgets Text Color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_widget_text_color',
    'label'     => esc_html__( 'Widgets text color', 'everse' ),
    'section'   => 'everse_settings_text_colors',
    'default'   => $text_color,
    'output'    => array( array(
    'element'  => $selectors['widgets_text_color'],
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Links hover color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_links_hover_color',
    'label'     => esc_html__( 'Links hover color', 'everse' ),
    'section'   => 'everse_settings_text_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => 'a:hover, a:focus, .entry__category-item:hover,	.entry__category-item:focus',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Form Elements Colors
/*-------------------------------------------------------*/
// Buttons background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_buttons_background_color',
    'label'     => esc_html__( 'Buttons background color', 'everse' ),
    'section'   => 'everse_settings_form_elements_colors',
    'default'   => $primary_color,
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array(
    array(
    'element'  => $selectors['buttons_color'],
    'property' => 'background-color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => '.btn--stroke',
    'property' => 'border-color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => $selectors['buttons_color_editor'],
    'property' => 'background-color',
    'context'  => array( 'editor' ),
),
    array(
    'element'  => ( isset( $selectors['shop_buttons_color'] ) ? $selectors['shop_buttons_color'] : null ),
    'property' => 'background-color',
),
    array(
    'element'  => ( isset( $selectors['learndash_main_background_color'] ) ? $selectors['learndash_main_background_color'] : null ),
    'property' => 'background-color',
)
),
    'transport' => 'auto',
) );
// Buttons text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_buttons_text_color',
    'label'     => esc_html__( 'Buttons text color', 'everse' ),
    'section'   => 'everse_settings_form_elements_colors',
    'output'    => array( array(
    'element'  => $selectors['buttons_color'],
    'property' => 'color',
    'context'  => array( 'editor', 'front' ),
), array(
    'element'  => ( isset( $selectors['shop_buttons_color'] ) ? $selectors['shop_buttons_color'] : null ),
    'property' => 'color',
    'context'  => array( 'editor', 'front' ),
) ),
    'transport' => 'auto',
) );
// Buttons background color hover
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_buttons_background_color_hover',
    'label'     => esc_html__( 'Buttons hover background color', 'everse' ),
    'section'   => 'everse_settings_form_elements_colors',
    'default'   => '',
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => $selectors['buttons_background_color_hover'],
    'property' => 'background-color',
), array(
    'element'  => ( isset( $selectors['shop_buttons_color_hover'] ) ? $selectors['shop_buttons_color_hover'] : null ),
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Buttons text color hover
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_buttons_text_color_hover',
    'label'     => esc_html__( 'Buttons hover text color', 'everse' ),
    'section'   => 'everse_settings_form_elements_colors',
    'default'   => '',
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => $selectors['buttons_background_color_hover'],
    'property' => 'color',
), array(
    'element'  => ( isset( $selectors['shop_buttons_color_hover'] ) ? $selectors['shop_buttons_color_hover'] : null ),
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Light Buttons background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_light_buttons_background_color',
    'label'     => esc_html__( 'Light buttons background color', 'everse' ),
    'section'   => 'everse_settings_form_elements_colors',
    'default'   => '#eaf5ff',
    'choices'   => array(
    'alpha' => true,
),
    'output'    => array( array(
    'element'  => '.btn--light',
    'property' => 'background-color',
), array(
    'element'  => ( isset( $selectors['shop_light_buttons_background_color'] ) ? $selectors['shop_light_buttons_background_color'] : null ),
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Labels text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_labels_text_color',
    'label'     => esc_html__( 'Labels text color', 'everse' ),
    'section'   => 'everse_settings_form_elements_colors',
    'output'    => array( array(
    'element'  => 'label',
    'property' => 'color',
    'context'  => array( 'editor', 'front' ),
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Footer Colors
/*-------------------------------------------------------*/
// Footer background color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_footer_background_color',
    'label'     => esc_html__( 'Footer background color', 'everse' ),
    'section'   => 'everse_settings_footer_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'  => '.footer',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Footer border color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_footer_border_color',
    'label'     => esc_html__( 'Footer border color', 'everse' ),
    'section'   => 'everse_settings_footer_colors',
    'default'   => $border_color,
    'output'    => array( array(
    'element'  => '.footer__bottom, .footer',
    'property' => 'border-color',
) ),
    'transport' => 'auto',
) );
// Footer widget title color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_footer_widgets_title_color',
    'label'     => esc_html__( 'Footer widgets title color', 'everse' ),
    'section'   => 'everse_settings_footer_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.footer .widget-title',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Footer widget text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_footer_widgets_text_color',
    'label'     => esc_html__( 'Footer widgets text color', 'everse' ),
    'section'   => 'everse_settings_footer_colors',
    'default'   => $text_color,
    'output'    => array( array(
    'element'  => $selectors['footer_widgets_text_color'],
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Footer bottom text color
Kirki::add_field( 'everse_settings_config', array(
    'type'      => 'color',
    'settings'  => 'everse_settings_footer_bottom_text_color',
    'label'     => esc_html__( 'Footer bottom text color', 'everse' ),
    'section'   => 'everse_settings_footer_colors',
    'default'   => $text_color,
    'output'    => array( array(
    'element'  => '.copyright, .footer__bottom a',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
/*-------------------------------------------------------*/
/* Shop Colors
/*-------------------------------------------------------*/

if ( everse_is_woocommerce_activated() ) {
    // Sale badge background color
    Kirki::add_field( 'everse_settings_config', array(
        'type'      => 'color',
        'settings'  => 'everse_settings_shop_product_sale_badge_background_color',
        'label'     => esc_html__( 'Sale badge background color', 'everse' ),
        'section'   => 'everse_settings_shop_colors',
        'default'   => '',
        'output'    => array( array(
        'element'  => ( isset( $selectors['shop_sale_badge_background_color'] ) ? $selectors['shop_sale_badge_background_color'] : null ),
        'property' => 'background-color',
    ) ),
        'transport' => 'auto',
    ) );
    // Sale badge text color
    Kirki::add_field( 'everse_settings_config', array(
        'type'      => 'color',
        'settings'  => 'everse_settings_shop_product_sale_badge_text_color',
        'label'     => esc_html__( 'Sale badge text color', 'everse' ),
        'section'   => 'everse_settings_shop_colors',
        'default'   => '',
        'output'    => array( array(
        'element'  => ( isset( $selectors['shop_sale_badge_text_color'] ) ? $selectors['shop_sale_badge_text_color'] : null ),
        'property' => 'color',
    ) ),
        'transport' => 'auto',
    ) );
    // Single product price color
    Kirki::add_field( 'everse_settings_config', array(
        'type'      => 'color',
        'settings'  => 'everse_settings_single_product_price_color',
        'label'     => esc_html__( 'Single product price color', 'everse' ),
        'section'   => 'everse_settings_shop_colors',
        'default'   => '',
        'output'    => array( array(
        'element'  => ( isset( $selectors['shop_single_product_price_color'] ) ? $selectors['shop_single_product_price_color'] : null ),
        'property' => 'color',
    ) ),
        'transport' => 'auto',
    ) );
    everse_pro_customizer_options( 'everse_settings_shop_colors', $uniqid );
}
