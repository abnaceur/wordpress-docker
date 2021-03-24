<?php
/**
 * blogtay functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blogtay
 */

if ( ! function_exists( 'blogtay_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blogtay_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on blogtay, use a find and replace
		 * to change 'blogtay' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'blogtay', get_template_directory() . '/languages' );

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
		add_theme_support('responsive-embeds');
		add_theme_support('wp-block-styles');
		add_theme_support('align-wide');
		add_theme_support( 'editor-styles' );

		// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );

 	  	add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'blogtay' ),
					'shortName' => __( 'S', 'blogtay' ),
					'size'      => 12,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'blogtay' ),
					'shortName' => __( 'M', 'blogtay' ),
					'size'      => 14,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'blogtay' ),
					'shortName' => __( 'L', 'blogtay' ),
					'size'      => 26,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'blogtay' ),
					'shortName' => __( 'XL', 'blogtay' ),
					'size'      => 30,
					'slug'      => 'huge',
				),
			)
		);



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'blogtay' ),
			'top-nav-info' => esc_html__( 'Top header left info', 'blogtay' ),
			'social-links' => esc_html__( 'Social Links', 'blogtay' )
		) );	

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blogtay_custom_background_args', array(
			'default-color' => 'eeeeee',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 190,
			'flex-width'  => true,
			'flex-height' => true,
		) );	
	}
endif;
add_action( 'after_setup_theme', 'blogtay_setup' );

function blogtay_excerpt_length( $length ) {
	return 20;
}

function blogtay_read_more_filters() {
	if ( is_home() || is_front_page() || is_category() || is_tag() || is_author() || is_date() ) {
		add_filter( 'excerpt_length', 'blogtay_excerpt_length', 999 );
	}
}
add_action( 'wp', 'blogtay_read_more_filters' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blogtay_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'blogtay_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogtay_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogtay_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blogtay' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blogtay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'blogtay_widgets_init' );

/**
 * Enqueue scripts and styles.
 */



function blogtay_scripts() {
	wp_enqueue_style( 'blogtay-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900|Poppins:400,400i,500,500i,600,600i,700,700i|Roboto:400,400i,500,500i,700,700i' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');	
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/css/fontawesome.min.css');
	wp_enqueue_style( 'animate.-css', get_template_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css');
	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.css');
	wp_enqueue_style( 'slick-nav-css', get_template_directory_uri() . '/assets/css/slicknav.min.css');
	wp_enqueue_style( 'blogtay-main-css', get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1', true );
	wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), '1', true );	
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'matchHeight-js', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'slicknav-js', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'blogtay-custom-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1', true );

	wp_enqueue_script( 'blogtay-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'blogtay-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogtay_scripts' );


function blogtay_block_editor_google_fonts(){
    wp_enqueue_style( 'blogtay_block_editor_google_fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900|Poppins:400,400i,500,500i,600,600i,700,700i|Roboto:400,400i,500,500i,700,700i' );
}
add_action( 'enqueue_block_editor_assets', 'blogtay_block_editor_google_fonts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom hook.
 */
require get_template_directory() . '/inc/hooks/hooks.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

