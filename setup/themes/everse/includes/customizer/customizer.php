<?php

/**
 * Theme Customizer
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
function everse_customize_register( $wp_customize )
{
    // Customize Background Settings
    $wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background Styles', 'everse' );
    $wp_customize->get_control( 'background_color' )->section = 'background_image';
    // Remove colors section
    $wp_customize->remove_section( 'colors' );
}

add_action( 'customize_register', 'everse_customize_register' );
// Check if Kirki is installed

if ( class_exists( 'Kirki' ) ) {
    function everse_customizer_options()
    {
        // Selector Vars
        $selectors = array(
            'main_color'                     => 'a,
				.breadcrumbs a:hover,
				.breadcrumbs a:focus,
				.loader,
				.comment-edit-link,
				.entry__title a:focus,
				.entry__title a:hover,
				.entry__meta-item .entry__category-item,
				.entry__meta a:focus,
				.entry__meta a:hover,
				.entry-navigation__title a:focus,
				.entry-navigation__title a:hover,
				.footer .widget.widget_calendar a,
				.widget_rss .rsswidget:hover,
				.widget_recent_entries a:hover,
				.widget_recent_comments a:hover,
				.widget_nav_menu a:hover,
				.widget_archive a:hover,
				.widget_pages a:hover,
				.widget_categories a:hover,
				.widget_meta a:hover,
				.widget-popular-posts__entry-title a:hover,
				.footer__widgets .widget a:hover,
				.copyright a:hover,
				.copyright a:focus,
				.link-underline:hover,
				.link-underline:focus,
				.related-posts__entry-title:hover a,
				.wp-block-pullquote:before,
				.project .project__category:hover,
				.project .project__category:focus',
            'main_background_color'          => '.nav__icon-toggle:focus .nav__icon-toggle-bar,
				.nav__icon-toggle:hover .nav__icon-toggle-bar,
				#back-to-top:hover,
				.widget_tag_cloud a:hover,
				.entry__tags a:hover,
				.widget_product_tag_cloud a:hover,
				.pagination a.current,
				.pagination span.current,
				.pagination a:not(span):hover,
				.pagination span:not(span):hover,
				.post-page-numbers.current,
				.post-page-numbers:not(span):hover,
				.link-underline:after,
				.comment-author__post-author-label,
				.recentcomments::before,
				.widget_categories li::before,
				.widget_recent_entries li::before',
            'main_border_color'              => 'input:focus,
				textarea:focus',
            'main_border_top_color'          => '.elementor-widget-tabs .elementor-tab-title.elementor-active',
            'main_border_left_color'         => 'blockquote, .edit-post-visual-editor .wp-block-quote',
            'border_color'                   => '.select2-container--default .select2-selection--single,
				input,
				select,
				textarea,
				.pagination a,
				.pagination span,
				.elementor-widget-sidebar .widget,
				.sidebar .widget,
				.entry,
				.elementor-widget-wp-widget-categories li,
				.elementor-widget-wp-widget-meta li,
				.elementor-widget-wp-widget-nav_menu li,
				.elementor-widget-wp-widget-pages li,
				.elementor-widget-wp-widget-pages-archives li,
				.elementor-widget-wp-widget-recent-comments li,
				.elementor-widget-wp-widget-recent-posts li,
				.widget_archive li,
				.widget_categories li,
				.widget_meta li,
				.widget_nav_menu li,
				.widget_pages li,
				.widget_recent_comments li,
				.widget_recent_entries li',
            'headings_color'                 => 'h1,h2,h3,h4,h5,h6,
				.comment-author__name,
				.project .project__category',
            'text_color'                     => 'body,
				input,
				figcaption,
				.comment-form-cookies-consent label,
				.pagination span,
				.pagination a,
				.search-button,
				.search-form__button,
				.widget-search-button',
            'widgets_text_color'             => '.elementor-widget-wp-widget-recent-posts a,
				.widget_recent_entries a,
				.elementor-widget-wp-widget-nav_menu a,
				.widget_nav_menu a,
				.elementor-widget-wp-widget-categories a,
				.widget_categories a,
				.elementor-widget-wp-widget-pages a,
				.widget_pages a,
				.elementor-widget-wp-widget-pages-archives a,
				.widget_archive a,
				.elementor-widget-wp-widget-meta a,
				.widget_meta a,
				.elementor-widget-wp-widget-recent-comments a,
				.widget_recent_comments a',
            'footer_widgets_text_color'      => '.footer,
				.footer .widget_recent_entries a,
				.footer .widget_recent_comments a,
				.footer .widget_nav_menu a,
				.footer .widget_categories a,
				.footer .widget_pages a,
				.footer .widget_archive a,
				.footer .widget_meta a,
				.footer address',
            'post_links_color'               => '.single-post__entry-article p a, .single-post__entry-article li:not(.wp-social-link) a',
            'post_meta_color'                => '.entry__meta-item, .entry__meta li, .entry__meta a, .comment-date',
            'headings'                       => 'h1,h2,h3,h4,h5,h6',
            'h1'                             => 'h1, .h1',
            'h2'                             => 'h2, .h2',
            'h3'                             => 'h3, .h3',
            'h4'                             => 'h4, .h4',
            'h5'                             => 'h5, .h5',
            'h6'                             => 'h6, .h6',
            'text'                           => 'body',
            'buttons'                        => 'input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button,
				.btn,
				.button,
				.elementor-button,
				.elementor-button.elementor-size-md,
				.elementor-button.elementor-size-lg,
				.elementor-button.elementor-size-xl,
				.wp-block-button .wp-block-button__link',
            'buttons_color'                  => 'input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button:focus,
				input[type="button"]:focus,
				input[type="reset"]:focus,
				input[type="submit"]:focus,
				.elementor-widget-button .elementor-button,
				.mc4wp-form-fields input[type=submit]:focus,
				.btn:hover,
				.btn:focus,
				.btn--color,
				.button,
				.button:hover,
				.button:focus
				',
            'buttons_color_editor'           => '.wp-block-button__link:not(.has-background),
				.wp-block-button__link:not(.has-background):active,
				.wp-block-button__link:not(.has-background):focus,
				.wp-block-button__link:not(.has-background):hover,
				.wp-block-button__link:not(.has-background):visited
				',
            'buttons_background_color_hover' => 'input[type="button"]:hover,
				input[type="reset"]:hover,
				input[type="submit"]:hover,
				button:hover,
				.btn:hover,
				.button:hover,
				.elementor-button:hover,
				.elementor-button.elementor-size-md:hover,
				.elementor-button.elementor-size-lg:hover,
				.elementor-button.elementor-size-xl:hover,
				.wp-block-button .wp-block-button__link:hover',
        );
        
        if ( everse_is_woocommerce_activated() ) {
            $selectors['shop_main_color'] = '.woocommerce ul.products li.product a:hover .woocommerce-loop-product__title,
				.woocommerce ul.products li.product a:focus .woocommerce-loop-product__title,
				.widget_product_categories li a:hover,
				.widget_rating_filter li a:hover,
				.woocommerce-widget-layered-nav-list li a:hover,
				.widget_products .product_list_widget a:hover,
				.widget_top_rated_products .product_list_widget a:hover,
				.widget_recent_reviews .product_list_widget a:hover,
				.widget_shopping_cart .product_list_widget a:hover,
				.widget_recently_viewed_products .product_list_widget a:hover,
				.woocommerce-product-rating a:hover,
				.woocommerce .woocommerce-breadcrumb a:hover,
				.woocommerce .woocommerce-breadcrumb a:focus,
				.woocommerce-page .woocommerce-breadcrumb a:hover,
				.woocommerce-page .woocommerce-breadcrumb a:focus,
				.woocommerce table.shop_table .product-name a:hover,
				.woocommerce-MyAccount-navigation-link.is-active a,
				.woocommerce-MyAccount-navigation li a:hover';
            $selectors['shop_main_background_color'] = '.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
				.woocommerce nav.woocommerce-pagination ul li a.current,
				.woocommerce nav.woocommerce-pagination ul li span.current,
				.woocommerce nav.woocommerce-pagination ul li a:not(span):hover,
				.woocommerce nav.woocommerce-pagination ul li span:not(span):hover,
				.woocommerce span.onsale,
				.everse-menu-cart__count';
            $selectors['shop_buttons_color'] = '.woocommerce #respond input#submit,
				.woocommerce #respond input#submit.alt,
				.woocommerce a.button,
				.woocommerce a.button.alt,
				.woocommerce button.button,
				.woocommerce button.button.alt,
				.woocommerce input.button,
				.woocommerce input.button.alt,
				.woocommerce button.button.alt.disabled';
            $selectors['shop_buttons_color_hover'] = '.woocommerce #respond input#submit:hover,
				.woocommerce #respond input#submit.alt:hover,
				.woocommerce a.button:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce button.button:hover,
				.woocommerce button.button.alt:hover,
				.woocommerce input.button:hover,
				.woocommerce input.button.alt:hover,
				.woocommerce button.button.alt.disabled:hover,
				.woocommerce .coupon button.button:hover';
            $selectors['shop_light_buttons_background_color'] = '.woocommerce .coupon button.button,
				.woocommerce .woocommerce-mini-cart__buttons>a:first-child,
				.woocommerce table.shop_table .actions>button.button:disabled';
            $selectors['shop_border_color'] = '.woocommerce nav.woocommerce-pagination ul li a,
				.woocommerce nav.woocommerce-pagination ul li span,
				.woocommerce div.product .woocommerce-tabs ul.tabs li,
				.woocommerce div.product .woocommerce-tabs .panel,
				.woocommerce div.product .woocommerce-tabs ul.tabs::before';
            $selectors['shop_main_border_color'] = '#add_payment_method table.cart td.actions .coupon .input-text:focus,
				.woocommerce-cart #content table.cart td.actions .coupon .input-text:focus,
				.woocommerce-checkout table.cart td.actions .coupon .input-text:focus';
            $selectors['shop_text_color'] = '.woocommerce-product-search button[type=submit],
				.woocommerce ul.products li.product .price';
            $selectors['shop_sale_badge_background_color'] = '.woocommerce span.onsale';
            $selectors['shop_sale_badge_text_color'] = '.woocommerce span.onsale';
            $selectors['shop_single_product_price_color'] = '.woocommerce div.product p.price, .woocommerce div.product span.price';
        }
        
        
        if ( class_exists( 'SFWD_LMS' ) ) {
            $selectors['learndash_buttons'] = '.ld-course-list-items .ld_course_grid .btn';
            $selectors['learndash_heading_color'] = '.ld-course-list-items .ld_course_grid .thumbnail.course .ld_course_grid_price';
            $selectors['learndash_main_background_color'] = '.ld-course-list-items .ld_course_grid .btn-primary';
        }
        
        if ( function_exists( 'everse_get_typekit_fonts' ) ) {
            $typekit_fonts = everse_get_typekit_fonts();
        }
        $heading_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[0] )) ? $typekit_fonts[0] : 'Roboto' );
        $body_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[1] )) ? $typekit_fonts[1] : 'Roboto' );
        $heading_color = '#0C0C0C';
        $text_color = '#666666';
        $meta_color = '#666666';
        $primary_color = '#0074e0';
        $border_color = '#ebebeb';
        $mobile_menu_dividers_color = '#eaeaea';
        $bg_light = '#F7F7F7';
        $bg_dark = '#242424';
        $bp_xl_up = '@media (min-width: 1200px)';
        $bp_xl_down = '@media (min-width: 1199px)';
        $bp_lg_up = '@media (min-width: 1025px)';
        $bp_lg_down = '@media (max-width: 1024px)';
        // Kirki
        Kirki::add_config( 'everse_settings_config', array(
            'capability'  => 'edit_theme_options',
            'option_type' => 'theme_mod',
            'option_name' => 'everse_settings_config',
        ) );
        /**
         * SECTIONS / PANELS
         **/
        $priority = 20;
        $uniqid = 1;
        // 1. GENERAL PANEL
        Kirki::add_panel( 'everse_settings_general', array(
            'title'    => esc_attr__( 'General', 'everse' ),
            'priority' => $priority++,
        ) );
        // Form Elements
        Kirki::add_section( 'everse_settings_general_form_elements', array(
            'title' => esc_html__( 'Form Elements', 'everse' ),
            'panel' => 'everse_settings_general',
        ) );
        // Preloader
        Kirki::add_section( 'everse_settings_preloader', array(
            'title' => esc_html__( 'Preloader', 'everse' ),
            'panel' => 'everse_settings_general',
        ) );
        // Page content
        Kirki::add_section( 'everse_settings_page_content', array(
            'title' => esc_html__( 'Page content', 'everse' ),
            'panel' => 'everse_settings_general',
        ) );
        // Back to Top
        Kirki::add_section( 'everse_settings_back_to_top', array(
            'title' => esc_html__( 'Back to Top', 'everse' ),
            'panel' => 'everse_settings_general',
        ) );
        // 2. HEADER PANEL
        Kirki::add_panel( 'everse_settings_header', array(
            'title'    => esc_html__( 'Header', 'everse' ),
            'priority' => $priority++,
        ) );
        // Default Header
        Kirki::add_section( 'everse_settings_default_header', array(
            'title' => esc_html__( 'Default Header', 'everse' ),
            'panel' => 'everse_settings_header',
        ) );
        // Mobile Header
        Kirki::add_section( 'everse_settings_mobile_header', array(
            'title' => esc_html__( 'Mobile Header', 'everse' ),
            'panel' => 'everse_settings_header',
        ) );
        // Logo
        Kirki::add_section( 'everse_settings_logo', array(
            'title' => esc_html__( 'Logo', 'everse' ),
            'panel' => 'everse_settings_header',
        ) );
        // Primary Menu
        Kirki::add_section( 'everse_settings_primary_menu', array(
            'title' => esc_html__( 'Primary Menu', 'everse' ),
            'panel' => 'everse_settings_header',
        ) );
        // Aside Header
        Kirki::add_section( 'everse_settings_aside_header', array(
            'title' => esc_html__( 'Aside Header', 'everse' ),
            'panel' => 'everse_settings_header',
        ) );
        // 3. Footer
        Kirki::add_section( 'everse_settings_footer', array(
            'title'    => esc_html__( 'Footer', 'everse' ),
            'priority' => $priority++,
        ) );
        // 4. LAYOUT PANEL
        Kirki::add_panel( 'everse_settings_layout', array(
            'title'    => esc_html__( 'Layout', 'everse' ),
            'priority' => $priority++,
        ) );
        // Content
        Kirki::add_section( 'everse_settings_content_layout', array(
            'title' => esc_html__( 'Content', 'everse' ),
            'panel' => 'everse_settings_layout',
        ) );
        // Blog Layout
        Kirki::add_section( 'everse_settings_blog_layout', array(
            'title'       => esc_html__( 'Blog', 'everse' ),
            'description' => esc_html__( 'Layout options for the blog pages', 'everse' ),
            'panel'       => 'everse_settings_layout',
        ) );
        // Page Layout
        Kirki::add_section( 'everse_settings_page_layout', array(
            'title'       => esc_html__( 'Page', 'everse' ),
            'description' => esc_html__( 'Layout options for the regular pages', 'everse' ),
            'panel'       => 'everse_settings_layout',
        ) );
        // Archive Layout
        Kirki::add_section( 'everse_settings_archive_layout', array(
            'title'       => esc_html__( 'Archive', 'everse' ),
            'description' => esc_html__( 'Layout options for archive and categories pages', 'everse' ),
            'panel'       => 'everse_settings_layout',
        ) );
        if ( everse_is_woocommerce_activated() ) {
            // Shop Layout
            Kirki::add_section( 'everse_settings_shop_layout', array(
                'title'       => esc_html__( 'Shop', 'everse' ),
                'description' => esc_html__( 'Layout options for shop catalog pages', 'everse' ),
                'panel'       => 'everse_settings_layout',
            ) );
        }
        if ( class_exists( 'SFWD_LMS' ) && everse_fs()->can_use_premium_code__premium_only() ) {
            // LearnDash Layout
            Kirki::add_section( 'everse_settings_learndash_layout', array(
                'title'       => esc_html__( 'LearnDash', 'everse' ),
                'description' => esc_html__( 'Layout options for LearnDash posts and pages', 'everse' ),
                'panel'       => 'everse_settings_layout',
            ) );
        }
        // Search Results Layout
        Kirki::add_section( 'everse_settings_search_results_layout', array(
            'title'       => esc_html__( 'Search Results', 'everse' ),
            'description' => esc_html__( 'Layout options for search result page', 'everse' ),
            'panel'       => 'everse_settings_layout',
        ) );
        // 5. COLORS PANEL
        Kirki::add_panel( 'everse_settings_colors', array(
            'title'    => esc_html__( 'Colors', 'everse' ),
            'priority' => $priority++,
        ) );
        // General Colors
        Kirki::add_section( 'everse_settings_general_colors', array(
            'title' => esc_html__( 'General', 'everse' ),
            'panel' => 'everse_settings_colors',
        ) );
        // HEADER COLORS PANEL
        Kirki::add_panel( 'everse_settings_header_colors', array(
            'title' => esc_html__( 'Header', 'everse' ),
            'panel' => 'everse_settings_colors',
        ) );
        // Header Default
        Kirki::add_section( 'everse_settings_header_default_colors', array(
            'title' => esc_html__( 'Default Header', 'everse' ),
            'panel' => 'everse_settings_header_colors',
        ) );
        // Header Mobile
        Kirki::add_section( 'everse_settings_header_mobile_colors', array(
            'title' => esc_html__( 'Mobile Header', 'everse' ),
            'panel' => 'everse_settings_header_colors',
        ) );
        // Footer Colors
        Kirki::add_section( 'everse_settings_footer_colors', array(
            'title' => esc_html__( 'Footer', 'everse' ),
            'panel' => 'everse_settings_colors',
        ) );
        // Text Colors
        Kirki::add_section( 'everse_settings_text_colors', array(
            'title' => esc_html__( 'Text', 'everse' ),
            'panel' => 'everse_settings_colors',
        ) );
        // Form Elements Colors
        Kirki::add_section( 'everse_settings_form_elements_colors', array(
            'title' => esc_html__( 'Form Elements', 'everse' ),
            'panel' => 'everse_settings_colors',
        ) );
        // Blog Colors
        Kirki::add_section( 'everse_settings_blog_colors', array(
            'title' => esc_html__( 'Blog', 'everse' ),
            'panel' => 'everse_settings_colors',
        ) );
        // PAGE TITLE COLORS PANEL
        Kirki::add_panel( 'everse_settings_page_title_colors', array(
            'title' => esc_html__( 'Page Title / Breadcrumbs', 'everse' ),
            'panel' => 'everse_settings_colors',
        ) );
        // Regular Pages
        Kirki::add_section( 'everse_settings_regular_pages_page_title_colors', array(
            'title' => esc_html__( 'Regular Pages', 'everse' ),
            'panel' => 'everse_settings_page_title_colors',
        ) );
        // Archives
        Kirki::add_section( 'everse_settings_archives_page_title_colors', array(
            'title' => esc_html__( 'Archives', 'everse' ),
            'panel' => 'everse_settings_page_title_colors',
        ) );
        // Search Results
        Kirki::add_section( 'everse_settings_search_results_page_title_colors', array(
            'title' => esc_html__( 'Search Results', 'everse' ),
            'panel' => 'everse_settings_page_title_colors',
        ) );
        // Single Post
        Kirki::add_section( 'everse_settings_single_post_page_title_colors', array(
            'title' => esc_html__( 'Single Post', 'everse' ),
            'panel' => 'everse_settings_page_title_colors',
        ) );
        
        if ( everse_is_woocommerce_activated() ) {
            // Shop
            Kirki::add_section( 'everse_settings_shop_page_title_colors', array(
                'title' => esc_html__( 'Shop', 'everse' ),
                'panel' => 'everse_settings_page_title_colors',
            ) );
            // Single Product
            Kirki::add_section( 'everse_settings_single_product_page_title_colors', array(
                'title' => esc_html__( 'Single Product', 'everse' ),
                'panel' => 'everse_settings_page_title_colors',
            ) );
        }
        
        if ( everse_is_woocommerce_activated() ) {
            // Shop Colors
            Kirki::add_section( 'everse_settings_shop_colors', array(
                'title' => esc_html__( 'Shop', 'everse' ),
                'panel' => 'everse_settings_colors',
            ) );
        }
        // 6. TYPOGRAPHY PANEL
        Kirki::add_panel( 'everse_settings_typography', array(
            'title'    => esc_html__( 'Typography', 'everse' ),
            'priority' => $priority++,
        ) );
        // Headings
        Kirki::add_section( 'everse_settings_typography_headings', array(
            'title' => esc_html__( 'Headings', 'everse' ),
            'panel' => 'everse_settings_typography',
        ) );
        // Body Text
        Kirki::add_section( 'everse_settings_typography_body_text', array(
            'title' => esc_html__( 'Body Text', 'everse' ),
            'panel' => 'everse_settings_typography',
        ) );
        // Blog
        Kirki::add_section( 'everse_settings_typography_blog_text', array(
            'title' => esc_html__( 'Blog', 'everse' ),
            'panel' => 'everse_settings_typography',
        ) );
        // Form Elements
        Kirki::add_section( 'everse_settings_typography_forms_text', array(
            'title' => esc_html__( 'Form Elements', 'everse' ),
            'panel' => 'everse_settings_typography',
        ) );
        if ( everse_is_woocommerce_activated() ) {
            // Shop
            Kirki::add_section( 'everse_settings_shop_text', array(
                'title' => esc_html__( 'Shop', 'everse' ),
                'panel' => 'everse_settings_typography',
            ) );
        }
        // Header
        Kirki::add_section( 'everse_settings_typography_header', array(
            'title' => esc_html__( 'Header', 'everse' ),
            'panel' => 'everse_settings_typography',
        ) );
        // 7. BLOG PANEL
        Kirki::add_panel( 'everse_settings_blog', array(
            'title'    => esc_html__( 'Blog', 'everse' ),
            'priority' => $priority++,
        ) );
        // Post Meta
        Kirki::add_section( 'everse_settings_post_meta', array(
            'title'       => esc_html__( 'Post Meta', 'everse' ),
            'description' => esc_html__( 'These options will apply to the default WordPress posts. Customize Elementor widgets post meta via Elementor.', 'everse' ),
            'panel'       => 'everse_settings_blog',
        ) );
        // Single Post
        Kirki::add_section( 'everse_settings_single_post', array(
            'title' => esc_html__( 'Single Post', 'everse' ),
            'panel' => 'everse_settings_blog',
        ) );
        // Read More
        Kirki::add_section( 'everse_settings_read_more', array(
            'title' => esc_html__( 'Read More', 'everse' ),
            'panel' => 'everse_settings_blog',
        ) );
        // 8. PAGE TITLE PANEL
        Kirki::add_panel( 'everse_settings_page_title', array(
            'title'    => esc_html__( 'Page Title', 'everse' ),
            'priority' => $priority++,
        ) );
        // Regular Pages
        Kirki::add_section( 'everse_settings_regular_pages_page_title', array(
            'title' => esc_html__( 'Regular Pages', 'everse' ),
            'panel' => 'everse_settings_page_title',
        ) );
        // Archives
        Kirki::add_section( 'everse_settings_archives_page_title', array(
            'title' => esc_html__( 'Archives', 'everse' ),
            'panel' => 'everse_settings_page_title',
        ) );
        // Search Results
        Kirki::add_section( 'everse_settings_search_results_page_title', array(
            'title' => esc_html__( 'Search Results', 'everse' ),
            'panel' => 'everse_settings_page_title',
        ) );
        // Single Post
        Kirki::add_section( 'everse_settings_single_post_page_title', array(
            'title' => esc_html__( 'Single Post', 'everse' ),
            'panel' => 'everse_settings_page_title',
        ) );
        if ( everse_is_woocommerce_activated() ) {
            // Shop
            Kirki::add_section( 'everse_settings_shop_page_title', array(
                'title' => esc_html__( 'Shop', 'everse' ),
                'panel' => 'everse_settings_page_title',
            ) );
        }
        // 10. Page 404
        Kirki::add_section( 'everse_settings_page_404', array(
            'title'       => esc_html__( 'Page 404', 'everse' ),
            'description' => esc_html__( 'Settings for page 404', 'everse' ),
            'priority'    => $priority++,
        ) );
        /**
         * Pro Customizer Options
         */
        function everse_pro_customizer_options( $section, $uniqid )
        {
            if ( everse_fs()->is_not_paying() ) {
                Kirki::add_field( 'everse_settings_config', array(
                    'type'     => 'custom',
                    'settings' => 'everse-pro-options-' . $uniqid++,
                    'section'  => $section,
                    'default'  => '<hr><h4>' . esc_attr__( 'More Options Available in Everse Pro', 'everse' ) . '</h4>' . '<a href="' . everse_fs()->get_upgrade_url() . '" class="button button-primary">' . esc_html__( 'Upgrade Now!', 'everse' ) . '</a>',
                ) );
            }
        }
        
        // Load modules
        require_once EVERSE_DIR . '/includes/customizer/modules/site-identity.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/general.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/header.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/footer.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/layout.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/page-title.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/blog.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/colors.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/typography.php';
        require_once EVERSE_DIR . '/includes/customizer/modules/page-404.php';
        if ( everse_is_woocommerce_activated() ) {
            require_once EVERSE_DIR . '/includes/customizer/modules/woocommerce.php';
        }
    }
    
    everse_customizer_options();
}

// endif Kirki check