<?php
/**
 * Smallbiz Startup functions and definitions
 *
 * @package Smallbiz Startup
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'smallbiz_startup_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function smallbiz_startup_setup() {
	global $content_width;   
	if ( ! isset( $content_width ) )
		$content_width = 680; 

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-header', array( 
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'smallbiz-startup' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // smallbiz_startup_setup
add_action( 'after_setup_theme', 'smallbiz_startup_setup' );

function smallbiz_startup_widgets_init() {
	register_sidebar( array( 
		'name'          => __( 'Blog Sidebar', 'smallbiz-startup' ),
		'description'   => __( 'Appears on blog page sidebar', 'smallbiz-startup' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'smallbiz-startup' ),
		'description'   => __( 'Appears on footer', 'smallbiz-startup' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'smallbiz-startup' ),
		'description'   => __( 'Appears on footer', 'smallbiz-startup' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'smallbiz-startup' ),
		'description'   => __( 'Appears on footer', 'smallbiz-startup' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'smallbiz-startup' ),
		'description'   => __( 'Appears on footer', 'smallbiz-startup' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'smallbiz_startup_widgets_init' );

function smallbiz_startup_add_google_fonts() {
	wp_enqueue_style( 'smallbiz-startup-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false ); 
}
add_action( 'wp_enqueue_scripts', 'smallbiz_startup_add_google_fonts' );

function smallbiz_startup_scripts() {
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'smallbiz-startup-style', get_stylesheet_uri() );
	wp_style_add_data('smallbiz-startup-style', 'rtl', 'replace');
	wp_enqueue_style( 'smallbiz-startup-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'smallbiz-startup-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'smallbiz-startup-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_script( 'jquery.superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'smallbiz-startup-style',$smallbiz_startup_color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'smallbiz_startup_scripts' );

// Footer Link
define('SMALLBIZ_STARTUP_FOOTER_LINK',__('https://theclassictemplates.com/themes/free-wordpress-startup-theme/','smallbiz-startup'));

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * PRO Button Link
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/button-link/class-button-link.php' );

if ( ! function_exists( 'smallbiz_startup_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function smallbiz_startup_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


$woocommerce_sidebar = get_theme_mod( 'smallbiz_startup_woocommerce_sidebar_product' );
	if ( 'false' == $woocommerce_sidebar ) {
$woo_product_column = 'col-lg-12 col-md-12';
	} else { 
$woo_product_column = 'col-lg-9 col-md-9';
}

$woocommerce_shop_sidebar = get_theme_mod( 'smallbiz_startup_woocommerce_sidebar_shop' );
	if ( 'false' == $woocommerce_shop_sidebar ) {
$woo_shop_column = 'col-lg-12 col-md-12';
	} else { 
$woo_shop_column = 'col-lg-9 col-md-9';
}