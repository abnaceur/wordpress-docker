<?php

/**
 * Theme setup.
 *
 * @package Everse
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
if ( !function_exists( 'everse_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function everse_setup()
    {
        load_theme_textdomain( 'everse', EVERSE_DIR . '/languages' );
        // Enable theme support
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'html5', array(
            'navigation-widgets',
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background', apply_filters( 'everse_custom_background_args', array(
            'default-color' => '#ffffff',
            'default-image' => '',
        ) ) );
        
        if ( everse_is_woocommerce_activated() ) {
            add_theme_support( 'woocommerce', array(
                'thumbnail_image_width'         => 345,
                'gallery_thumbnail_image_width' => 145,
                'single_image_width'            => 640,
            ) );
            add_theme_support( 'wc-product-gallery-zoom' );
            add_theme_support( 'wc-product-gallery-lightbox' );
            add_theme_support( 'wc-product-gallery-slider' );
        }
        
        // Gutenberg
        add_theme_support( 'align-wide' );
        add_editor_style();
        add_theme_support( 'editor-color-palette', array(
            array(
            'name'  => esc_html__( 'blue', 'everse' ),
            'slug'  => 'red',
            'color' => '#0074e0',
        ),
            array(
            'name'  => esc_html__( 'dark', 'everse' ),
            'slug'  => 'dark',
            'color' => '#0c0c0c',
        ),
            array(
            'name'  => esc_html__( 'silver', 'everse' ),
            'slug'  => 'silver',
            'color' => '#F7F7F7',
        ),
            array(
            'name'  => esc_html__( 'white', 'everse' ),
            'slug'  => 'white',
            'color' => '#ffffff',
        ),
            array(
            'name'  => esc_html__( 'black', 'everse' ),
            'slug'  => 'black',
            'color' => '#000000',
        )
        ) );
        // Thumbnails
        add_image_size(
            'everse_featured_medium',
            734,
            0,
            false
        );
        add_image_size(
            'everse_featured_large',
            1120,
            0,
            false
        );
        // Nav menus
        register_nav_menus( array(
            'primary-menu'       => esc_html__( 'Primary Menu', 'everse' ),
            'footer-bottom-menu' => esc_html__( 'Footer Bottom Menu', 'everse' ),
        ) );
        // Disable WooCommerce wizard redirect
        add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
        add_filter( 'woocommerce_show_admin_notice', '__return_false' );
        add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_false' );
        // Disable Kirki telemetry
        add_filter( 'kirki_telemetry', '__return_false' );
        // Remove admin notices for Instagram Feed
        update_option( 'sbi_rating_notice', 'dismissed' );
        remove_action( 'admin_notices', 'sbi_usage_tracking' );
        remove_action( 'admin_notices', 'sbi_usage_opt_in' );
        remove_action( 'admin_notices', 'sbi_notices_html' );
    }

}
// theme_setup
add_action( 'after_setup_theme', 'everse_setup' );
// Update Elementor Defaults
if ( 1 != get_option( 'everse_elementor_defaults', 0 ) ) {
    add_option( 'everse_elementor_defaults', 0 );
}
/**
* Update Elementor defaults.
*/
function everse_update_elementor_defaults()
{
    
    if ( 1 != get_option( 'everse_elementor_defaults' ) ) {
        update_option( 'elementor_cpt_support', array(
            'post',
            'page',
            'projects',
            'services',
            'theme_template'
        ) );
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'everse_elementor_defaults', 1 );
    }

}

add_action( 'init', 'everse_update_elementor_defaults' );
/**
* Disable Elementor redirect.
*/
add_action( 'admin_init', function () {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
}, 1 );
/**
* Register widget areas.
*/
function everse_widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'everse' ),
        'id'            => 'everse-blog-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'everse' ),
        'id'            => 'everse-page-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    if ( everse_is_woocommerce_activated() ) {
        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', 'everse' ),
            'id'            => 'everse-shop-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
    if ( class_exists( 'SFWD_LMS' ) ) {
        register_sidebar( array(
            'name'          => esc_html__( 'LearDash Sidebar', 'everse' ),
            'id'            => 'everse-learndash-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 1', 'everse' ),
        'id'            => 'everse-footer-col-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 2', 'everse' ),
        'id'            => 'everse-footer-col-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 3', 'everse' ),
        'id'            => 'everse-footer-col-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 4', 'everse' ),
        'id'            => 'everse-footer-col-4',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'everse_widgets_init' );
/**
* TGMPA plugins activation.
*/

if ( is_admin() ) {
    require_once EVERSE_DIR . '/includes/class-tgm-plugin-activation.php';
    add_action( 'tgmpa_register', 'everse_tgmpa_register_required_plugins' );
}

function everse_tgmpa_register_required_plugins()
{
    $plugins = array( array(
        'name'     => 'Kirki',
        'slug'     => 'kirki',
        'required' => false,
    ), array(
        'name'     => 'Elementor',
        'slug'     => 'elementor',
        'required' => false,
    ) );
    $plugins[] = array(
        'name'     => 'Everse Starter Sites',
        'slug'     => 'everse-starter-sites',
        'required' => false,
    );
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',
        'strings'      => array(
        'page_title'                     => esc_html__( 'Install Required Plugins', 'everse' ),
        'menu_title'                     => esc_html__( 'Install Plugins', 'everse' ),
        'installing'                     => esc_html__( 'Installing Plugin: %s', 'everse' ),
        'updating'                       => esc_html__( 'Updating Plugin: %s', 'everse' ),
        'oops'                           => esc_html__( 'Something went wrong with the plugin API.', 'everse' ),
        'return'                         => esc_html__( 'Return to Required Plugins Installer', 'everse' ),
        'plugin_activated'               => esc_html__( 'Plugin activated successfully.', 'everse' ),
        'activated_successfully'         => esc_html__( 'The following plugin was activated successfully:', 'everse' ),
        'plugin_already_active'          => esc_html__( 'No action taken. Plugin %1$s was already active.', 'everse' ),
        'plugin_needs_higher_version'    => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'everse' ),
        'complete'                       => esc_html__( 'All plugins installed and activated successfully. %1$s', 'everse' ),
        'dismiss'                        => esc_html__( 'Dismiss this notice', 'everse' ),
        'notice_cannot_install_activate' => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'everse' ),
        'contact_admin'                  => esc_html__( 'Please contact the administrator of this site for help.', 'everse' ),
        'nag_type'                       => 'updated',
    ),
    );
    tgmpa( $plugins, $config );
}
