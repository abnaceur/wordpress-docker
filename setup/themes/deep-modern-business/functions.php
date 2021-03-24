<?php
/**
 * Deep Modern Business functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Deep Modern Business
 */

if ( ! defined( 'DEEP_MODERN_BUSINESS' ) ) {
	define( 'DEEP_MODERN_BUSINESS', '1.0.0' );
}

if ( ! defined( 'DEEP_HANDLE' ) ) {
	define( 'DEEP_HANDLE', 'true' );
}

if ( ! defined( 'DEEP_MODERN_BUSINESS_DIR' ) ) {
	define( 'DEEP_MODERN_BUSINESS_DIR', trailingslashit( get_template_directory() ) );
}

if ( ! defined( 'DEEP_MODERN_BUSINESS_URI' ) ) {
	define( 'DEEP_MODERN_BUSINESS_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
}

if ( ! function_exists( 'deep_modern_business_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function deep_modern_business_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on deep, use a find and replace
		 * to change 'deep-modern-business' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'deep-modern-business', DEEP_MODERN_BUSINESS_DIR . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'deep-modern-business' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'deep_modern_business_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */

		if ( ! defined( 'DEEPCORE' ) ) {
			add_theme_support(
				'custom-logo',
				array(
					'height'      => 250,
					'width'       => 250,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);
		}
	}
endif;
add_action( 'after_setup_theme', 'deep_modern_business_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deep_modern_business_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'deep_modern_business_content_width', 640 );
}
add_action( 'after_setup_theme', 'deep_modern_business_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function deep_modern_business_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'deep-modern-business' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'deep-modern-business' ),
			'before_widget' => '<section id="%1$s" class="title-wrap widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'deep_modern_business_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function deep_modern_business_scripts() {
	wp_enqueue_style( 'deep-modern-business-theme-style', get_stylesheet_uri(), array(), DEEP_MODERN_BUSINESS );
	wp_style_add_data( 'deep-modern-business-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'deep-modern-business-navigation', DEEP_MODERN_BUSINESS_URI . '/js/navigation.js', array(), DEEP_MODERN_BUSINESS, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'deep_modern_business_scripts' );

/**
 * Custom template tags for this theme.
 */
require DEEP_MODERN_BUSINESS_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require DEEP_MODERN_BUSINESS_DIR . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require DEEP_MODERN_BUSINESS_DIR . '/inc/customizer.php';

/**
 * Deep Init.
 */
require DEEP_MODERN_BUSINESS_DIR . '/inc/class-deep-modern-business.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require DEEP_MODERN_BUSINESS_DIR . '/inc/jetpack.php';
}

if ( is_admin() ) {

	/**
	 * Load Plugin Activator.
	 */
	require_once DEEP_MODERN_BUSINESS_DIR . '/inc/plugin-activator/deep-modern-business-plugins.php';

	/**
	 * Deep Modern Business Admin
	 */
	require_once DEEP_MODERN_BUSINESS_DIR . '/inc/class-deep-modern-business-admin.php';	

}