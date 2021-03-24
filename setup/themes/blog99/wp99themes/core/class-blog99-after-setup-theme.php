<?php
/**
 * Blog99 functions and definitions.
 * Text Domain: blog99
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 *
 * @package     Blog99
 * @author     wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */


/**
 * Blog99_After_Setup_Theme initial setup
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Blog99_After_Setup_Theme' ) ) {

	/**
	 * Blog99_After_Setup_Theme initial setup
	 */
	class Blog99_After_Setup_Theme {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup_theme' ), 999 );
            add_filter( 'excerpt_length',array($this,'blog99_excerpt_length') , 999 );
            add_filter( 'excerpt_more',array($this,'blog99_excerpt_more') , 999 );
            add_action( 'admin_init',array($this,'blog99_add_editor_styles')  );
            add_action( 'after_setup_theme',array($this,'blog99_content_width') , 0 );
        }

		/**
		 * Setup theme
		 *
		 * @since 1.0.0
		 */
		function setup_theme() {

			/*
            * Make theme available for translation.
            * Translations can be filed in the /languages/ directory.
            * If you're building a theme based on blog99, use a find and replace
            * to change 'blog99' to the name of your theme in all the template files.
            */
            load_theme_textdomain( 'blog99', get_template_directory() . '/languages' );


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

            
            /**
             * Note that you can add default arguments using:
             */
            $defaults = array(
                'default-color'          => '',
                'default-image'          => '',
                'default-repeat'         => 'repeat',
                    'default-position-x'     => 'left',
                    'default-position-y'     => 'top',
                'default-size'           => 'auto',
                'default-attachment'     => 'scroll',
                'wp-head-callback'       => '_custom_background_cb',
                'admin-head-callback'    => '',
                'admin-preview-callback' => ''
            );
            add_theme_support( 'custom-background', $defaults );


            /**
             * This theme uses wp_nav_menu() in one location.
             */
            register_nav_menus( array(
                'menu-1'        => esc_html__( 'Primary', 'blog99' ),
                'top-header'   => esc_html__( 'Top Header', 'blog99' )
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

            /**
             * Add theme support for selective refresh for widgets.
             */
            add_theme_support( 'customize-selective-refresh-widgets' );


            /**
             * Add support for core custom logo.
             */
            add_theme_support( 'custom-logo', array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            ) );

            
            /**
             * Post formats.
             */
			add_theme_support('post-formats',array('video', 'gallery', 'audio', 'quote', 'link'));


            //Set a default header image 980px width and 60px height:
            $args = array(
                'width'         => 1000,
                'height'        => 250,
            );
            add_theme_support( 'custom-header', $args );

        }


        /**
         * Limite the excerpt
         * 
         * @since 1.0.4
         */
        function blog99_excerpt_length( $length ) {

            $blog99_blog_style = get_theme_mod('blog99_blog_style','list');

            if(is_admin() && !defined('DOING_AJAX') ){

                return $length;
            }

            //condtion
            if( $blog99_blog_style == 'grid' || $blog99_blog_style == 'masonry' ){

                return 15;

            }else{

                return get_theme_mod('blog99_the_excerpt_word_limit',45);
            }
        }
        /**
         * Filter the excerpt "read more" string.
         *
         * @param string $text "Read more" excerpt string.
         * @return string (Maybe) modified "read more" excerpt string.
         */
        function blog99_excerpt_more($text){

            if( is_admin() ){

                return $text;
            }

            return '&hellip;';
        }


        /**
		 * Registers an editor stylesheet for the theme.
         * 
         * @since 1.0.0
		 */
		function blog99_add_editor_styles() {
            
			add_editor_style( 'blog99-custom' );
        }


        /**
         * Set the content width in pixels, based on the theme's design and stylesheet.
         *
         * Priority 0 to make it available to lower priority callbacks.
         *
         * @global int $content_width
         */
        function blog99_content_width() {

            $GLOBALS['content_width'] = apply_filters( 'blog99_content_width', 640 );
        }
        
    }


}

/**
 * cicking this off by calling 'get_instance()' method
 */
Blog99_After_Setup_Theme::get_instance();
