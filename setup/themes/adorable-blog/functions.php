<?php
/*This file is part of Blog Mag, saraswati blog child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/



function adorable_blog_widgets_init()
{
    register_sidebar(array(
        'name'         => esc_html__('Feature Widget', 'adorable-blog'),
        'id'           => 'feature-widget',
        'description'  => esc_html__('Add widgets Below Slider.', 'adorable-blog'),
        'before_title' => '<h2 class="widget-title">',
        'after_title'  => '</h2>',
    ));


}
add_action('widgets_init', 'adorable_blog_widgets_init');


function  adorable_blog_remove_post_formats() {

    add_theme_support( 'post-formats', array( 'image','aside') );

}

add_action( 'after_setup_theme', 'adorable_blog_remove_post_formats', 11 );

function adorable_blog_about_section( $wp_customize ) {
    global $wp_customize;
    $wp_customize->remove_section('theme_detail');
}

add_action( 'customize_register', 'adorable_blog_about_section' );

function adorable_blog_slider_section( $wp_customize ) {
    global $wp_customize;
    $wp_customize->remove_section('saraswati-blog-feature-category');
}

add_action( 'customize_register', 'adorable_blog_slider_section' );


if ( ! function_exists( 'adorable_blog_scripts' ) ) :
    /**
     * Enqueue scripts and styles.
     */
    function adorable_blog_scripts() {
        $adorable_blog_theme_version = wp_get_theme()->get( 'Version' );
        $adorable_blog_parent_theme_version = wp_get_theme(get_template())->get( 'Version' );

        /* If using a child theme, auto-load the parent theme style. */
        if ( is_child_theme() ) {
            wp_enqueue_style( 'adorable-blog-style', get_template_directory_uri() . '/style.css', array(), $adorable_blog_parent_theme_version );
        }
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script('adorable-blog-custom-masonary', get_stylesheet_directory_uri() . '/assets/js/custom-masonary.js', array('jquery'), '201765', true);

    }
endif;
add_action( 'wp_enqueue_scripts', 'adorable_blog_scripts' );




/**
 * enqueue Admins style for admin dashboard.
 */



if ( !function_exists( 'adorable_blog_admin_css_enqueue' ) ) :

    function adorable_blog_admin_css_enqueue($hook)

    {
        if ($hook === 'widgets.php') {
            wp_register_script('adorable-blog-page-widget-js', get_stylesheet_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
            wp_enqueue_media();
            wp_enqueue_script('adorable-blog-page-widget-js');

        }
         }
    add_action('admin_enqueue_scripts', 'adorable_blog_admin_css_enqueue');
endif;











if ( !function_exists('saraswati_blog_default_theme_options') ) :
    function saraswati_blog_default_theme_options()
    {

        $default_theme_options = array(
            /*feature section options*/
            'saraswati-blog-feature-cat'             => 0,
            'saraswati-blog-theme-header-top-enable' => 0,
            'saraswati-blog-sticky-sidbar-enable'    => 1,
            'saraswati-blog-top-header-menu'         => 0,
            'saraswati-blog-header-social'           => 0,
            'saraswati-blog-post-meta'               => 0,
            'saraswati-blog-excerpt-lenght'          => 25,
            'saraswati-blog-footer-copyright'        => '',
            'saraswati-blog-layout'                  => 'right-sidebar',
            'saraswati-blog-featured-image'          => 'default',
            'saraswati-blog-meta-options'            => 1,
            'breadcrumb_option'                      => 'simple',
            'saraswati-blog-realted-post'            => 0,
            'saraswati-blog-continue-reading-options'=> esc_html__( 'Continue Reading', 'adorable-blog' ),
            'saraswati-blog-realted-post-title'      => esc_html__( 'Related Posts', 'adorable-blog' ),
            'saraswati-blog-single-featured-image'   => 1,
            'hide-breadcrumb-at-home'                => 1 ,
            'saraswati-blog-breadcrumb-text-option'  => esc_html__( 'You Are Here', 'adorable-blog' ),
            'primary_color'                          => '#a20303;',
            'slider_caption_bg_color'                => 'rgba(255,255,255,.9)',
            'hide-slider-post-at-category'           => 1,




        );

        return apply_filters( 'saraswati_blog_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Saraswati Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Saraswati_Blog
 */

if ( ! function_exists( 'saraswati_blog_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function saraswati_blog_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Saraswati Blog, use a find and replace
         * to change 'saraswati-blog' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'saraswati-blog' );

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

        add_image_size( 'homepage-slider', 1349, 605, true ); //(cropped)

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'adorable-blog' ),
        ) );

        register_nav_menus( array(
            'top_header' => esc_html__( 'Top Header', 'adorable-blog' ),
        ) );

        register_nav_menus( array(
            'social-link' => esc_html__( 'Social Link', 'adorable-blog' ),
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




        /*gutrnberg*/

        add_theme_support( 'align-wide' );

        /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );


        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'saraswati_blog_custom_background_args', array(
            'default-color' => '#fff',
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
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'saraswati_blog_setup' );
