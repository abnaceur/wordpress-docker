<?php
/**
 * Buzz_Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Buzz_Magazine
 */

$buzz_magazine_theme_root = get_template_directory();

/**
 *  Loading defined constant file
 */
require_once trailingslashit(wp_normalize_path($buzz_magazine_theme_root)) . '/inc/helpers/constants.php';

if ( ! defined( 'BUZZ_MAGAZINE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BUZZ_MAGAZINE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'buzz_magazine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function buzz_magazine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on buzz_magazine, use a find and replace
		 * to change 'buzz_magazine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'buzz_magazine', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
        add_theme_support( 'custom-header' );


        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
		add_theme_support( 'post-thumbnails' );
		add_image_size('buzz-magazine-header-advertisement',150 ,750,true);
        add_image_size('buzz-magazine-featured-posts',460,210,true);
        add_image_size('buzz-magazine-featured-posts-layout-2',460,210,true);
        add_image_size('buzz-magazine-slider-posts',655,450,true);
        add_image_size('buzz-magazine-thumbnail',165,165,true);
		add_image_size('buzz-magazine-feature-grid',360,560,true);
        add_image_size('buzz-magazine-mixed-style',360,230,true);
        add_image_size('buzz-magazine-grid-style',360,200,true);
        add_image_size('buzz-magazine-feature-list',360,290,true);
        add_image_size('buzz-magazine-list-feature',360,200,true);
        add_image_size('buzz-magazine-entertainment',750,450,true);
        add_image_size('buzz-magazine-mixed-list-style',750,370,true);
        add_image_size('buzz-magazine-video',360,340,true);
        add_image_size('buzz-magazine-archive',750,290,true);

        // This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
                'top-header'   => esc_html__( 'Top Header', 'buzz-magazine' ),
                'primary-menu' => esc_html__( 'Primary', 'buzz-magazine' ),
                'footer-menu'  => esc_html__( 'Footer', 'buzz-magazine' ),
                'social-icon'  => esc_html__( 'Social Icon', 'buzz-magazine' ),
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
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'buzz_magazine_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 36,
				'width'       => 245,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'buzz_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function buzz_magazine_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'buzz_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'buzz_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function buzz_magazine_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'buzz-magazine' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Sidebar 1', 'buzz-magazine' ),
        'id'            => 'sidebar-home-1',
        'description'   => esc_html__( 'Add widgets here.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Sidebar 2', 'buzz-magazine' ),
        'id'            => 'sidebar-home-2',
        'description'   => esc_html__( 'Add widgets here.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Header Advertisement', 'buzz-magazine' ),
        'id'            => 'header-advertisement',
        'description'   => esc_html__( 'Add widgets here.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="%2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Content 1', 'buzz-magazine' ),
        'id'            => 'home-content-1',
        'description'   => esc_html__( 'Add widgets here.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="default-margin %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="entry-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Content 2', 'buzz-magazine' ),
        'id'            => 'home-content-2',
        'description'   => esc_html__( 'Add widgets here.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="default-margin %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="entry-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Content Right', 'buzz-magazine' ),
        'id'            => 'home-content-right',
        'description'   => esc_html__( 'Add widgets here which appears in home content right.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="default-margin %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="entry-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Content Left', 'buzz-magazine' ),
        'id'            => 'home-content-left',
        'description'   => esc_html__( 'Add widgets here which appears in home content left.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="default-margin %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="entry-title">',
        'after_title'   => '</h3>',
    ) );
    for ( $i= 1; $i <= 3; $i++ ) {

        register_sidebar(array(
            'name' => sprintf(esc_html__('Home Bottom Section %d', 'buzz-magazine'),absint($i)),
            'id' => 'home-bottom-section-'. absint( $i ),
            'description' => esc_html__('Add widgets here which appears in homepage bottom section.', 'buzz-magazine'),
            'before_widget' => '<div class="section-wrap-inner"><section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section></div>',
            'before_title' => '<h4 class="widget-title"><span>',
            'after_title' => '</span></h4>',
        ));
    }
    register_sidebar( array(
        'name'          => esc_html__( 'Single Post Section', 'buzz-magazine' ),
        'id'            => 'single-feature-section',
        'description'   => esc_html__( 'Add widgets here which appears single post section.', 'buzz-magazine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="entry-title">',
        'after_title'   => '</h3>',
    ) );
    for ( $i= 1; $i < 5; $i++ ) {
        register_sidebar( array(
            'name'          => sprintf(esc_html__('Footer %d', 'buzz-magazine'),absint($i)),
            'id'            => 'footer-' . absint( $i ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title"><span>',
            'after_title'   => '</h3></span>',
        ) );
    }
}
add_action( 'widgets_init', 'buzz_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function buzz_magazine_scripts() {
    wp_enqueue_style('font-google'                ,'https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900');
    wp_enqueue_style( 'font-awesome-min'          , BUZZ_MAGAZINE_CSS_URI . 'font-awesome.min.css');
    wp_enqueue_style( 'slick-css'                 , BUZZ_MAGAZINE_CSS_URI . 'slick.css');
    wp_enqueue_style( 'slick-theme-css'           , BUZZ_MAGAZINE_CSS_URI . 'slick-theme.css');
    wp_enqueue_style( 'jquery-ui-custom-sidebar'  , BUZZ_MAGAZINE_CSS_URI . 'jquery.mCustomScrollbar.min.css');
    wp_enqueue_style( 'meanmenu-css'              , BUZZ_MAGAZINE_CSS_URI . 'meanmenu.css');
    wp_enqueue_style( 'animate-min'               , BUZZ_MAGAZINE_CSS_URI . 'animate.min.css');
    wp_enqueue_style( 'buzz-magazine-style'       , get_stylesheet_uri(), array(), BUZZ_MAGAZINE_VERSION );
    wp_enqueue_style( 'buzz-magazine-responsive'  , BUZZ_MAGAZINE_CSS_URI . 'responsive.css');

    wp_enqueue_script('jquery-slick'             ,BUZZ_MAGAZINE_JS_URI  . 'slick.min.js',array('jquery'),'1.8.1',true);
    wp_enqueue_script('jquery-ui'                ,BUZZ_MAGAZINE_JS_URI  . 'jquery-ui.js',array(),'1.12.1',true);
    wp_enqueue_script('jquery-meanmenu'          ,BUZZ_MAGAZINE_JS_URI  . 'jquery.meanmenu.js',array(),'2.0.8',true);
    wp_enqueue_script('jquery-masonry');
    wp_enqueue_script('isotope-min'              ,BUZZ_MAGAZINE_JS_URI  . 'isotope.min.js',array(),'3.0.6',true);
    wp_enqueue_script('wow-min'                  ,BUZZ_MAGAZINE_JS_URI  . 'wow.min.js',array(),'1.3.0',true);
    wp_enqueue_script('jquery-marquee'           ,BUZZ_MAGAZINE_JS_URI  . 'jquery.marquee.min.js',array(),false,true);
	wp_enqueue_script('jquery-ticker'            ,BUZZ_MAGAZINE_JS_URI  . 'jquery.ticker.min.js',array(),'0.1.0',true);
	wp_enqueue_script('jquery-mCustomScrollbar'  ,BUZZ_MAGAZINE_JS_URI  . 'jquery.mCustomScrollbar.concat.min.js',array(),'3.1.13',true);
    wp_enqueue_script('ResizeSensor'             ,BUZZ_MAGAZINE_JS_URI  . 'ResizeSensor.js',array(),false,true);
    wp_enqueue_script('theia-sticky-sidebar'     ,BUZZ_MAGAZINE_JS_URI  . 'theia-sticky-sidebar.js',array(),'1.7.0',true);
    wp_enqueue_script('buzz-magazine-custom'     ,BUZZ_MAGAZINE_JS_URI  . 'custom.js',array(),BUZZ_MAGAZINE_VERSION,true);
    wp_enqueue_script('buzz-magazine-navigation' ,BUZZ_MAGAZINE_JS_URI  . 'navigation.js', array(), BUZZ_MAGAZINE_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'buzz_magazine_scripts' );

function buzz_magazine_admin_styles_scripts(){
    wp_enqueue_style( 'buzz-magazine-admin-style'      , BUZZ_MAGAZINE_CSS_URI . 'admin/admin-style.css');
	wp_enqueue_style( 'font-awesome-min'               , BUZZ_MAGAZINE_CSS_URI . 'font-awesome.min.css');
	wp_enqueue_script('buzz-magazine-custom-admin'     ,BUZZ_MAGAZINE_JS_URI  . 'custom-admin.js',array(),false,true);
	
}
add_action( 'admin_enqueue_scripts', 'buzz_magazine_admin_styles_scripts');


/**
 * Plugin Activation Section
 */
require BUZZ_MAGAZINE_INC.'class-tgm-plugin-activation.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BUZZ_MAGAZINE_LIBRARY . 'font-awesome.php';

/**
 * Loads Inline Styles
 */
require BUZZ_MAGAZINE_INC .'typography-inline-style.php';

/**
 * Custom template tags for this theme.
 */
require BUZZ_MAGAZINE_INC . 'template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BUZZ_MAGAZINE_INC . 'template-functions.php';



/**
 * Customizer additions.
 */
require BUZZ_MAGAZINE_INC . 'customizer.php';


/**
 * Storing Controls File Name
 * @var array $buzz_magazine_widgets
 */
$buzz_magazine_widgets = [
	'widget-mixed-list-style',
	'widget-mixed-style',
	'widget-grid-style',
	'widget-feature-list-style',
	'widget-list-feature-style',
	'widget-single-feature-style',
	'widget-feature-grid-style',
	'widget-trend-popular',
	'widget-recent-posts',
	'widget-popular-post',
	'widget-recent-comment',
];

/**
 * Looping Through Files
 */
foreach ($buzz_magazine_widgets as $widget){
	require BUZZ_MAGAZINE_WIDGETS . $widget .'.php';
}

/**
 * @param $classes
 * @param $item
 * @param $args
 *
 * Adding Icons in Homepage Menu
 * @return mixed
 */
function buzz_magazine_menu_li_classes($classes, $item, $args) {
    $home_url =  esc_url(home_url());
    if($args->theme_location == 'primary-menu' && $item->url === $home_url.'/') {
        $classes[] = 'home';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'buzz_magazine_menu_li_classes', 1, 3);

/**
 * Registering All The Custom Widget
 */

function buzz_magazine_register_custom_widget() {

	register_widget( 'Buzz_Magazine_Widget_Feature_Grid_Style' );
	register_widget( 'Buzz_Magazine_Widget_Feature_List_Style' );
	register_widget( 'Buzz_Magazine_Widget_Grid_Style' );
	register_widget( 'Buzz_Magazine_List_Widget_Feature_Style' );
	register_widget( 'Buzz_Magazine_Mixed_List' );
	register_widget( 'Buzz_Magazine_Mixed_Style' );
	register_widget( 'Buzz_magazine_Popular_Posts' );
	register_widget( 'Buzz_Magazine_Recent_Comment' );
	register_widget( 'Buzz_Magazine_Recent_Posts' );
	register_widget( 'Buzz_Magazine_Single_Feature' );
	register_widget( 'Buzz_Magazine_Latest_Trend' );


}
add_action( 'widgets_init', 'buzz_magazine_register_custom_widget' );
