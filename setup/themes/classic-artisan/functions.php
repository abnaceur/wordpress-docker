<?php
/**
 * classic_artisan functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package classic_artisan
 */

if ( ! function_exists( 'classic_artisan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function classic_artisan_setup() {
	/*
	 * Make theme available for translation.
	 * If you're building a theme based on classic_artisan, use a find and replace
	 * to change 'classic_artisan' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'classic-artisan' );

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
	set_post_thumbnail_size( 996, 560, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'classic-artisan' ),
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
        'style',
        'script',
        'navigation-widgets',
	) );

	/*
	 * Allow widgets to be previewed faster in the customizer with selective refresh.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Add support for custom logos.
	 */
	add_theme_support( 'custom-logo', array(
		'height' => 115,
		'width' => 230,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * Add support for custom header with video.
	 */
	add_theme_support( 'custom-header', array(
		'height'      => 560,
		'width'       => 996,
		'header-text' => false,
		'video'       => true,
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	// Load classic editor styles into the block editor.
	add_theme_support( 'editor-styles' );

	// Bug in core or with google fonts where only one weight can be requested in a given url (commas are stripped).
	add_editor_style( array( 'editor-style.css', 'https://fonts.googleapis.com/css?family=Assistant:600', 'https://fonts.googleapis.com/css?family=Assistant:800' ) );

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Disable user-defined font size selection to encourage consistency.
	add_theme_support( 'disable-custom-font-sizes' );

	// Add support for wide alignments in the block editor.
	add_theme_support( 'align-wide' );

	// Disable color pickers in the editor in favor of colors defined in the customizer.
	add_theme_support( 'disable-custom-colors' );

	// Add support for custom color scheme.
	$h = absint( get_theme_mod( 'cab_h', 250 ) );
	$s = absint( get_theme_mod( 'cab_s', 20 ) );
	$s_heavy = 5 * $s;
	if ( $s_heavy > 100 ) {
		$s_heavy = 100;
	}
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Figure/Ground Dark', 'classic-artisan' ),
				'slug'  => 'fg-dark',
				'color' => 'hsl(' . $h . ', ' . $s . '%, 13%)'
			),
			array(
				'name'  => __( 'Figure/Ground Light', 'classic-artisan' ),
				'slug'  => 'fg-light',
				'color' => 'hsl(' . $h . ', ' . $s . '%, 98%)'
			),
			array(
				'name'  => __( 'Accent Light', 'classic-artisan' ),
				'slug'  => 'accent-light',
				'color' => 'hsl(' . $h . ', ' . $s_heavy . '%, 85%)'
			),
			array(
				'name'  => __( 'Accent Dark', 'classic-artisan' ),
				'slug'  => 'accent-dark',
				'color' => 'hsl(' . $h . ', ' . $s_heavy . '%, 33%)'
			),
		)
	);

	/*
	 * Define and register starter content to showcase the theme on new sites.
 	 */
	$starter_content = array(
		'widgets' => array(
			'footer' => array( // Place three core-defined widgets in the sidebar area.
				'search',
				'text_business_info',
				'text_about',
			),
		),

		// Specify the core-defined pages to create.
		'posts' => array(
			'home',
			'about',
			'contact',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up a nav menu for the primary location.
		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Menu', 'classic-artisan' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filter Classic Artisan starter content array.
	 *
	 * @since Classic Artisan 1.0
	 *
	 * @param $starter_content array
	 */
	add_theme_support( 'starter-content', apply_filters( 'classic_artisan_starter_content', $starter_content ) );
}
endif;
add_action( 'after_setup_theme', 'classic_artisan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function classic_artisan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'classic_artisan_content_width', 960 );
}
add_action( 'after_setup_theme', 'classic_artisan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function classic_artisan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'classic-artisan' ),
		'id'            => 'footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'classic_artisan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function classic_artisan_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'classic-artisan-fonts', 'https://fonts.googleapis.com/css?family=Assistant:600,800', array(), null );

	wp_enqueue_style( 'classic-artisan-style', get_stylesheet_uri() );

	wp_enqueue_script( 'classic-artisan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'classic-artisan', get_template_directory_uri() . '/js/classic-artisan.js', array( 'jquery' ), '20200804', true );

	$size = absint( get_theme_mod( 'cab_size', 18 ) );
	$s = absint( get_theme_mod( 'cab_s', 20 ) );
	$h = absint( get_theme_mod( 'cab_h', 250 ) );
	$mode = get_theme_mod( 'cab_rainbow', '' );
	if ( $mode ) {
		$mode = 'rainbow';
	} else {
		$mode = 'monochrome';
	}

	// Pass data to JS.
	$settings = array(
		'size' => $size,
		's'   => $s,
		'h'   => $h,
		'mode'   => $mode,
	);

	wp_localize_script( 'classic-artisan', 'classicArtisanSettings', $settings );

	// Misc. theme scripts.
	wp_enqueue_script( 'classic-artisan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array( 'jquery' ), '20160704', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'classic_artisan_scripts' );

/**
* Enqueue styles for the block-based editor.
*
* @since Classic Artisan 1.1
*/
function classic_artisan_block_editor_styles() {
	// Add custom fonts. These do not work with `add_editor_style` in the block editor.
	wp_enqueue_style( 'classic-artisan-fonts', 'https://fonts.googleapis.com/css?family=Assistant:600,800', array(), null );
}
add_action( 'enqueue_block_editor_assets', 'classic_artisan_block_editor_styles' );
	
/**
 * Customize the excerpt display.
 */
function classic_artisan_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	global $post;
	
	/* translators: %s is thie post title */
	$title = sprintf ( __( 'Read more %s', 'classic-artisan' ),
		'<span class="screen-reader-text">' . esc_html( get_the_title() ) .
		' </span><span class="meta-nav" aria-hidden="true"> &rarr;</span>' );

	return '&hellip;<div><a class="excerpt-more button" href="' . esc_url( get_permalink( $post->ID ) ) . '">' . $title . '</a></div>';
}
add_filter( 'excerpt_more', 'classic_artisan_excerpt_more' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Contains functions that generate CSS for all color modification patterns.
 */
require_once get_template_directory() . '/inc/color-patterns.php';

