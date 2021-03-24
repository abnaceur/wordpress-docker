<?php

/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Set the content width based on the theme's design and stylesheet.

if ( !isset( $content_width ) ) {
    $content_width = 1120;
    /* pixels */
}

// Constants
define( 'EVERSE_VERSION', '1.1' );
define( 'EVERSE_DIR', get_template_directory() );
define( 'EVERSE_URI', get_template_directory_uri() );

if ( !function_exists( 'everse_fs' ) ) {
    // Create a helper function for easy SDK access.
    function everse_fs()
    {
        global  $everse_fs ;
        
        if ( !isset( $everse_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $everse_fs = fs_dynamic_init( array(
                'id'                             => '6674',
                'slug'                           => 'everse',
                'premium_slug'                   => 'everse-pro',
                'type'                           => 'theme',
                'public_key'                     => 'pk_9dc802da9ca38f91a40a7d75048fc',
                'is_premium'                     => false,
                'premium_suffix'                 => 'Pro',
                'bundle_id'                      => '6922',
                'bundle_public_key'              => 'pk_e5182d74589ae449896b63b934820',
                'bundle_license_auto_activation' => true,
                'navigation'                     => 'menu',
                'has_addons'                     => false,
                'has_paid_plans'                 => true,
                'menu'                           => array(
                'slug'    => 'everse-theme',
                'support' => false,
                'parent'  => array(
                'slug' => 'themes.php',
            ),
            ),
                'is_live'                        => true,
            ) );
        }
        
        return $everse_fs;
    }
    
    // Init Freemius.
    everse_fs();
    // Signal that SDK was initiated.
    do_action( 'everse_fs_loaded' );
}

/**
 * Includes
 */
require_once EVERSE_DIR . '/includes/admin/theme-admin.php';
require_once EVERSE_DIR . '/includes/theme-setup.php';
require_once EVERSE_DIR . '/includes/theme-functions.php';
require_once EVERSE_DIR . '/includes/theme-hooks.php';
require_once EVERSE_DIR . '/includes/template-tags.php';
require_once EVERSE_DIR . '/includes/template-parts.php';
require_once EVERSE_DIR . '/includes/class-breadcrumb-trail.php';
require_once EVERSE_DIR . '/includes/class-everse-query.php';
require_once EVERSE_DIR . '/includes/class-everse-walker-nav-menu.php';
require_once EVERSE_DIR . '/includes/class-everse-walker-comment.php';
require_once EVERSE_DIR . '/includes/customizer/customizer.php';
/**
 * Compatibility
 */

if ( everse_is_woocommerce_activated() ) {
    require_once EVERSE_DIR . '/includes/compatibility/woocommerce/class-everse-woocommerce.php';
    require_once EVERSE_DIR . '/includes/compatibility/woocommerce/woocommerce-theme-hooks.php';
    require_once EVERSE_DIR . '/includes/compatibility/woocommerce/woocommerce-theme-functions.php';
}

if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
    require_once EVERSE_DIR . '/includes/compatibility/class-everse-elementor.php';
}
/**
 * Theme styles.
 */
function everse_theme_styles()
{
    wp_enqueue_style(
        'everse-styles',
        EVERSE_URI . '/style.min.css',
        array(),
        EVERSE_VERSION,
        'all'
    );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // WooCommerce styles
    
    if ( everse_is_woocommerce_activated() ) {
        wp_register_style(
            'everse-woocommerce',
            EVERSE_URI . '/assets/css/compatibility/woocommerce/woocommerce.min.css',
            array(),
            EVERSE_VERSION
        );
        wp_enqueue_style( 'everse-woocommerce' );
    }
    
    // Fonts
    if ( !class_exists( 'Kirki' ) ) {
        wp_enqueue_style( 'everse-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,600,700' );
    }
}

add_action( 'wp_enqueue_scripts', 'everse_theme_styles' );
/**
 * Block editor styles.
 */
function everse_block_assets()
{
    wp_enqueue_style( 'everse-block-editor-styles', get_theme_file_uri( '/assets/css/editor.min.css' ), false );
    if ( function_exists( 'everse_get_typekit_fonts' ) ) {
        $typekit_fonts = everse_get_typekit_fonts();
    }
    
    if ( !empty($typekit_fonts) ) {
        $typekit_info = get_option( 'everse-typekit-fonts' );
        $typekit_id = $typekit_info['custom-typekit-font-id'];
        if ( !empty($typekit_id) ) {
            wp_enqueue_style( 'everse-typekit-fonts', '//use.typekit.net/' . $typekit_id . '.css' );
        }
    }
    
    if ( !class_exists( 'Kirki' ) || empty($typekit_fonts) ) {
        wp_enqueue_style( 'everse-block-editor-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,600,700' );
    }
}

add_action( 'enqueue_block_editor_assets', 'everse_block_assets' );
/**
 * Theme scripts.
 */
function everse_theme_scripts()
{
    wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script(
        'everse-vendor-scripts',
        EVERSE_URI . '/assets/js/vendors.min.js',
        array(),
        EVERSE_VERSION,
        true
    );
    wp_register_script(
        'everse-scripts',
        EVERSE_URI . '/assets/js/scripts.min.js',
        array( 'everse-vendor-scripts' ),
        EVERSE_VERSION,
        true
    );
    wp_enqueue_script( 'everse-scripts' );
    $Everse_Data = array(
        'home_url'   => esc_url( home_url( '/' ) ),
        'theme_path' => EVERSE_URI,
    );
    wp_localize_script( 'everse-scripts', 'Everse_Data', $Everse_Data );
}

add_action( 'wp_enqueue_scripts', 'everse_theme_scripts' );
/**
 * Theme admin scripts and styles.
 */
function everse_admin_scripts()
{
    wp_enqueue_style( 'everse-admin-styles', EVERSE_URI . '/assets/admin/css/everse-admin-styles.css' );
}

add_action( 'admin_enqueue_scripts', 'everse_admin_scripts' );
/**
 * Theme WP Customizer scripts and styles.
 */
function everse_customizer_scripts()
{
    wp_enqueue_style( 'everse-customizer-styles', EVERSE_URI . '/assets/css/customizer/customizer.css' );
}

add_action( 'customize_controls_enqueue_scripts', 'everse_customizer_scripts' );