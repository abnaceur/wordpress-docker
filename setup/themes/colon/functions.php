<?php
/**
 * Colon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package colon
 */

/**
 *  Defining Constants
 */

// Core Constants
define('COLON_REQUIRED_PHP_VERSION', '5.6' );
define('COLON_DIR_PATH', get_template_directory());
define('COLON_THEME_AUTH','https://www.spiraclethemes.com/');
define('COLON_DIR_URI', get_template_directory_uri());
define('COLON_MINIFY', get_theme_mod('colon_enable_minify_styles_scripts',true));

//Register Required plugin
require_once(get_template_directory() .'/inc/class-tgm-plugin-activation.php');

/**
* Check for minimum PHP version requirement 
*
*/
function colon_check_theme_setup( $oldtheme_name, $oldtheme ) {
	// Compare versions.
	if ( version_compare(phpversion(), COLON_REQUIRED_PHP_VERSION, '<') ) :
	// Theme not activated info message.
	add_action( 'admin_notices', 'colon_php_admin_notice' );
	function colon_php_admin_notice() {
		?>
			<div class="update-nag">
		  		<?php esc_html_e( 'You need to update your PHP version to a minimum of 5.6 to run Colon Theme.', 'colon' ); ?> <br />
		  		<?php esc_html_e( 'Actual version is:', 'colon' ) ?> <strong><?php echo phpversion(); ?></strong>, <?php esc_html_e( 'required is', 'colon' ) ?> <strong><?php echo COLON_REQUIRED_PHP_VERSION; ?></strong>
			</div>
		<?php
	}
	// Switch back to previous theme.
	switch_theme( $oldtheme->stylesheet );
		return false;
	endif;
}
add_action( 'after_switch_theme', 'colon_check_theme_setup', 10, 2  );


if ( ! function_exists( 'colon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function colon_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Colon, use a find and replace
	 * to change 'colon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'colon', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'colon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(		
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	if(get_theme_mod( 'colon_enable_block_styles',false)) :
		// Load default block styles.
		add_theme_support( 'wp-block-styles' );
	endif;
	
	if(get_theme_mod( 'colon_enable_block_wide_alignment',false)) :
		// Support for align full and align wide option.
		add_theme_support( 'align-wide' );
	endif;

	// Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Add support for automatic feed links.
    add_theme_support( 'automatic-feed-links' );

	/**
	 * Colon custom posts image size
	 */
	add_image_size( 'colon-posts', 765, 500, true );

	/**
	 * Colon custom posts thumbs size
	 */
	add_image_size( 'colon-posts-thumb', 150, 100, true );

	/*
	* About page instance
	*/
	if(is_admin()) {
		require get_template_directory() . '/inc/theme-info.php';
		$config = array();
		Colon_About_Page::colon_init( $config );
	}

}
endif;
add_action( 'after_setup_theme', 'colon_setup' );


/**
* Custom Logo 
*
*/
function colon_logo_setup() {
    add_theme_support( 'custom-logo', array(
	   'height'      => 65,
	   'width'       => 350,
	   'flex-height' => true,
	   'flex-width' => true,	   
	) );
}
add_action( 'after_setup_theme', 'colon_logo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function colon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'colon_content_width', 640 );
}
add_action( 'after_setup_theme', 'colon_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function colon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'colon' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'colon' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title" itemprop="name">',
		'after_title'   => '</h3>',
	) );

	if ( true === get_theme_mod( 'colon_enable_page_sidebar', false )) :
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'colon' ),
			'id'            => 'page-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'colon' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title" itemprop="name">',
			'after_title'   => '</h3>',
		) );
	endif;

	//Footer widget columns
    $widget_num = absint(get_theme_mod( 'colon_footer_widgets', '4' ));
    for ( $i=1; $i <= $widget_num; $i++ ) :
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column', 'colon' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title" itemprop="name">',
            'after_title'   => '</h4>',
        ) );
    endfor;

    if(get_theme_mod( 'colon_enable_header_topbar',true)):
    	register_sidebar( array(
			'name'          => esc_html__( 'Top Bar Left Column', 'colon' ),
			'id'            => 'topbar-left',
			'description'   => esc_html__( 'Add widgets here.', 'colon' ),
			'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar Right Column', 'colon' ),
			'id'            => 'topbar-right',
			'description'   => esc_html__( 'Add widgets here.', 'colon' ),
			'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
		) );
    endif;

}
add_action( 'widgets_init', 'colon_widgets_init' );


/**
* Admin Scripts
*/
if ( ! function_exists( 'colon_admin_scripts' ) ) :
function colon_admin_scripts($hook) {
  	wp_enqueue_style( 'colon-info-css', get_template_directory_uri() . '/css/colon-theme-info' . ( ( COLON_MINIFY ) ? '.min' : '' ) . '.css', false );
}
endif;
add_action( 'admin_enqueue_scripts', 'colon_admin_scripts' );


/**
 * Display Dynamic CSS.
 */
function colon_dynamic_css_wrap() {
	require_once( get_parent_theme_file_path( '/css/dynamic.css.php' ) );  
	?>
  		<style type="text/css" id="colon-dynamic-style">
    		<?php echo colon_dynamic_css_stylesheet(); ?>
  		</style>
	<?php 
}
add_action( 'wp_head', 'colon_dynamic_css_wrap' );


/** 
* Excerpt More
*/
function colon_excerpt_more( $more ) {
	if ( is_admin() ) :
		return $more;
	endif;
    return '&hellip;';
}
add_filter('excerpt_more', 'colon_excerpt_more');


/**
* Custom excerpt length.
*/
function colon_my_excerpt_length($length) {
	if ( is_admin() ) {
		return $length;
	}
  	return 25;
}
add_filter('excerpt_length', 'colon_my_excerpt_length');


/**
 * Enqueue Styles and Scripts
 */
function colon_scripts() {
	wp_register_style( 'colon-main', get_template_directory_uri() . '/style' . ( ( COLON_MINIFY ) ? '.min' : '' ) . '.css', array(), wp_get_theme()->get('Version'));
	wp_style_add_data( 'colon-main', 'rtl', 'replace' );
	wp_style_add_data( 'colon-main', 'suffix', ( ( COLON_MINIFY ) ? '.min' : '' ) );
	wp_enqueue_style( 'colon-main' );
	if(get_theme_mod( 'colon_enable_poppings_font',false)) :
		wp_enqueue_style( 'poppins-google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap', array(), '1.0'); 
	endif;
	wp_enqueue_script( 'colon-script', get_template_directory_uri() . '/js/main' . ( ( COLON_MINIFY ) ? '.min' : '' ) . '.js',array(), wp_get_theme()->get('Version'), true );
	if(get_theme_mod( 'colon_enable_preloader',false)) :
		wp_enqueue_script( 'colon-preloader-script', get_template_directory_uri() . '/js/preloader' . ( ( COLON_MINIFY ) ? '.min' : '' ) . '.js',array(), 	wp_get_theme()->get('Version'), true );
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'colon_scripts' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function colon_pingback_header() {
 	if ( is_singular() && pings_open() ) :
    	printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
  	endif;
}
add_action( 'wp_head', 'colon_pingback_header' );


/**
* Custom search form
*/
function colon_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search here','colon' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="la la-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','colon' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'colon_search_form', 100 );



/** 
*  Plugins Required
*/
function colon_register_required_plugins() {
    $plugins = array(      
      	array(
          'name'               => 'Advanced Import',
          'slug'               => 'advanced-import',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      	),  
      	array(
          'name'               => 'Spiraclethemes Site Library',
          'slug'               => 'spiraclethemes-site-library',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      	),    
    );

    $config = array(
            'id'           => 'colon',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
            'strings'      => array()
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'colon_register_required_plugins' );

/**
 * Load core files
 */
require get_template_directory() . '/inc/load-core-files.php';