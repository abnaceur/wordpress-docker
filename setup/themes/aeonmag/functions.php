<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * AeonMag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AeonMag
 */

if ( ! function_exists( 'aeonmag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aeonmag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AeonMag, use a find and replace
		 * to change 'aeonmag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aeonmag' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'aeonmag' ),
			'footer' => esc_html__( 'Footer Menu', 'aeonmag' ),
			'social' => esc_html__( 'Social Icons', 'aeonmag' ),
		) );

		/*
		 * AeonMag default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('refined_magazine_custom_background_args', array(
            'default-color' => 'fafafa ',
            'default-image' => '',
        )));


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for Yoast SEO Breadcrumbs.
        add_theme_support( 'yoast-seo-breadcrumbs' );

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'aeonmag' ),
					'shortName' => __( 'S', 'aeonmag' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'aeonmag' ),
					'shortName' => __( 'M', 'aeonmag' ),
					'size'      => 20,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'aeonmag' ),
					'shortName' => __( 'L', 'aeonmag' ),
					'size'      => 25,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'aeonmag' ),
					'shortName' => __( 'XL', 'aeonmag' ),
					'size'      => 35,
					'slug'      => 'larger',
				),
			)
		);

		/**
         * Add theme support for New Image
         *
         * @link https://developer.wordpress.org/reference/functions/add_image_size/
         */
        
        add_image_size('aeonmag-thumbnail-size', 800, 800, true); 
        add_image_size('aeonmag-related-size', 600, 400, true); 
        add_image_size('aeonmag-promo-post', 800, 500, true); 
        add_image_size('aeonmag-related-post-thumbnails', 850, 550, true ); 
	}
endif;
add_action( 'after_setup_theme', 'aeonmag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aeonmag_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aeonmag_content_width', 1200 );
}
add_action( 'after_setup_theme', 'aeonmag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aeonmag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aeonmag' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widget Area', 'aeonmag' ),
		'id'            => 'aeonmag-home-widget-area',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area Below Slider', 'aeonmag' ),
		'id'            => 'below-slider-area',
		'description'   => esc_html__( 'You can add Mailchimp widget or other widgets here.', 'aeonmag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area Before Footer', 'aeonmag' ),
		'id'            => 'before-footer-area',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'aeonmag' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'aeonmag' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'aeonmag' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'aeonmag' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offcanvas', 'aeonmag' ),
		'id'            => 'offcanvas',
		'description'   => esc_html__( 'Add widgets here.', 'aeonmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget__title__wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );
}
add_action( 'widgets_init', 'aeonmag_widgets_init' );

/**
 * Enqueue CSS and JS
 */
require get_template_directory() . '/aeonwp/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/aeonwp/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/aeonwp/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/aeonwp/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/aeonwp/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/aeonwp/jetpack.php';
}

/**
 * Load sanitize functions file
 */
require get_template_directory() . '/aeonwp/sanitize-functions.php';

/**
 * Load custom functions file
 */
require get_template_directory() . '/aeonwp/custom-functions.php';


/**
 * Load category dropdown functions
 */
require get_template_directory() . '/aeonwp/customizer-category-control.php';

/**
 * Load category dropdown functions
 */
require get_template_directory() . '/aeonwp/customizer-radio-image-control.php';

/**
 * Dynamic CSS file load
 */
require get_template_directory() . '/aeonwp/dynamic-css.php';

/**
 * load custom widgets
 */
require get_template_directory() . '/aeonwp/widgets/widget-init.php';
require get_template_directory() . '/aeonwp/widgets/author-widget.php';
require get_template_directory() . '/aeonwp/widgets/recent-posts-widget.php';
require get_template_directory() . '/aeonwp/widgets/social-widget.php';
require get_template_directory() . '/aeonwp/widgets/tabbed-widget.php';
require get_template_directory() . '/aeonwp/widgets/post-grid-widget.php';
require get_template_directory() . '/aeonwp/widgets/featured-post-widget.php';
require get_template_directory() . '/aeonwp/widgets/post-column-widget.php';
require get_template_directory() . '/aeonwp/widgets/latest-post-widget.php';

/**
 * Load Hooks
*/
require get_template_directory() . '/aeonwp/hooks/related-posts.php';
require get_template_directory() . '/aeonwp/hooks/posts-navigation.php';
require get_template_directory() . '/aeonwp/hooks/social-sharing.php';
require get_template_directory() . '/aeonwp/hooks/sections.php';
require get_template_directory() . '/aeonwp/hooks/footer.php';
require get_template_directory() . '/aeonwp/hooks/front-page.php';

/**
 * Load Filters
*/
require get_template_directory() . '/aeonwp/filters/excerpt.php';
require get_template_directory() . '/aeonwp/filters/jetpack-widget.php';
require get_template_directory() . '/aeonwp/filters/body-class.php';
/**
 * Load about
*/
require get_template_directory() . '/aeonwp/admin.php';

require get_template_directory() . '/aeonwp/class-customize.php';

/**
 * Add upgrade notice.
 */
require get_template_directory() . '/aeonwp/upgrade-pro.php';

