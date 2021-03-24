<?php
/**
 * grip functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grip
 */

if (!function_exists('grip_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function grip_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on grip, use a find and replace
         * to change 'grip' to the name of your theme in all the template files.
         */
        load_theme_textdomain('grip');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('grip-carousel-img', 783, 450, true);
        add_image_size('grip-carousel-large-img', 1000, 574, true);
        add_image_size( 'grip-large-thumb', 1170, 9999 );
        add_image_size('grip-small-thumb', 350, 220, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'grip'),
            'top-menu' => esc_html__('Top Menu', 'grip'),
            'social-menu' => esc_html__('Social Menu', 'grip'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('grip_custom_background_args', array(
            'default-color' => 'cccccc',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 400,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

        //woocommerce support
        add_theme_support( 'woocommerce', array(
            'product_grid'          => array(
                'default_columns' => 4,
                'min_columns'     => 2,
                'max_columns'     => 5,
            ),
        ) );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        // Add support for default block styles.
        add_theme_support( 'wp-block-styles' );

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
                    'name'      => __( 'Small', 'grip' ),
                    'shortName' => __( 'S', 'grip' ),
                    'size'      => 16,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => __( 'Medium', 'grip' ),
                    'shortName' => __( 'M', 'grip' ),
                    'size'      => 20,
                    'slug'      => 'medium',
                ),
                array(
                    'name'      => __( 'Large', 'grip' ),
                    'shortName' => __( 'L', 'grip' ),
                    'size'      => 25,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => __( 'Larger', 'grip' ),
                    'shortName' => __( 'XL', 'grip' ),
                    'size'      => 35,
                    'slug'      => 'larger',
                ),
            )
        );
    }
endif;
add_action('after_setup_theme', 'grip_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grip_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('grip_content_width', 640);
}

add_action('after_setup_theme', 'grip_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grip_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'grip'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'grip'),
        'before_widget' => '<div class="sidebar-widget-container"><section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section></div> ',
        'before_title' => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Home Page Widget Area', 'grip' ),
        'id'            => 'grip-home-widget-area',
        'description'   => esc_html__( 'Add widgets here for home page.', 'grip' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title'   => '</span></h2>',
    ) );

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 1', 'grip'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'grip'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 2', 'grip'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'grip'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 3', 'grip'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'grip'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Above Footer(Full Width)', 'grip'),
        'id' => 'above-footer',
        'description' => esc_html__('Add widgets here.', 'grip'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Single Page Above Title', 'grip'),
        'id' => 'single-above-title',
        'description' => esc_html__('Add widgets here.', 'grip'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Single Page Below Content', 'grip'),
        'id' => 'single-below-content',
        'description' => esc_html__('Add widgets here.', 'grip'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title"><span class="ct-title-head ct-rotate">',
        'after_title' => '</span></h2>',
    ));
}

add_action('widgets_init', 'grip_widgets_init');

if ( ! function_exists( 'grip_fonts_url' ) ) {
    /**
     * Register custom fonts.
     * Credits:
     * Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org
     * Twenty Seventeen is distributed under the terms of the GNU GPL
     */
    function grip_fonts_url() {
        $fonts_url = '';
        
        $font_families   = array();
        
        global $grip_theme_options;
        
        $font_families[] = $grip_theme_options['grip-font-family-url'];
        $font_families[] = 'Source+Sans+Pro:400,600,600i,700,700i,900,900i';
        
        $font_families = array_unique( $font_families );
        
        $query_args = array(
            'family' => rawurlencode( implode( '|', $font_families ) ),
            'subset' => rawurlencode( 'latin,latin-ext' ),
        );
        
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        
        return esc_url_raw( $fonts_url );
    }
}

/**
 * Enqueue scripts and styles.
 */
function grip_scripts()
{
    
    /*google font  */
    global $grip_theme_options;
    $grip_body_fonts = esc_attr( $grip_theme_options['grip-font-family-url'] );;
    $grip_heading_fonts = esc_attr($grip_theme_options['grip-font-heading-family-url']);
    $grip_google_fonts_enqueue = array(
        $grip_body_fonts, $grip_heading_fonts  );
    $grip_google_fonts_enqueue_uniques = array_unique($grip_google_fonts_enqueue);
    foreach( $grip_google_fonts_enqueue_uniques as $grip_google_fonts_enqueue_unique ){
        wp_enqueue_style( $grip_google_fonts_enqueue_unique, '//fonts.googleapis.com/css?family='.$grip_google_fonts_enqueue_unique.'', array(), '' );
    }

    /*Font-Awesome-master*/
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/candidthemes/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0');

    wp_enqueue_style('slick-css', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick.css');
    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick-theme.css');
    wp_enqueue_script('slick', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick.min.js', array('jquery'), '20151217', true);

    wp_enqueue_style('grip-style', get_stylesheet_uri());

    wp_style_add_data( 'grip-style', 'rtl', 'replace' );

    wp_enqueue_script('jquery-ui-tabs');

    wp_enqueue_script('grip-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('marquee', get_template_directory_uri() . '/candidthemes/assets/framework/marquee/jquery.marquee.js', array(), '20151215', true);

    wp_enqueue_script('grip-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    /*Sticky Sidebar*/
    if(absint($grip_theme_options['grip-enable-sticky-sidebar']) == 1) {
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/candidthemes/assets/js/theia-sticky-sidebar.js', array(), '20151215', true );
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('grip-custom', get_template_directory_uri() . '/candidthemes/assets/js/grip-custom.js', array('jquery'), '20151215', true);
}

add_action('wp_enqueue_scripts', 'grip_scripts');

/**
 * Enqueue fonts for the editor style
 */
function grip_block_styles() {

    wp_enqueue_style( 'grip-editor-styles', get_theme_file_uri( 'candidthemes/assets/css/editor-styles.css' ) );

    /*body  */
    wp_enqueue_style('grip-editor-heading-font', '//fonts.googleapis.com/css?family=Muli:400,300italic,300');

    /*heading  */
    wp_enqueue_style('grip-editor-heading-font', '//fonts.googleapis.com/css?family=Domine');

    $grip_custom_css = '
    .edit-post-visual-editor.editor-styles-wrapper{ 
        font-family: Muli;
    }

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{
        font-family:Domine;
    } 
    ';

    wp_add_inline_style( 'grip-editor-styles', $grip_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'grip_block_styles' );

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
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Core File
 */
require get_template_directory() . '/candidthemes/core.php';

/**
 * Load welcome section to admin.
 */
if ( is_admin() ) {
    require get_template_directory().'/candidthemes/about/welcome-config.php';
}