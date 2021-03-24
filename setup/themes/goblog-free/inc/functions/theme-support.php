<?php
/**
 * Goblog Free functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

if ( ! function_exists( 'goblog_free_fitur_support' ) ) {

    function goblog_free_fitur_support() {

		/*
		* Make theme available for translation.
		* If you're building a theme based on Goblog Free, use a find and replace
		* to change 'goblogfree' to the name of your theme in all the template files.
		*/
		// load_theme_textdomain( 'goblogfree' );
		
		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, and column width.
		*/
		add_editor_style( array( 'assets/css/editor-style.css' ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );
           
		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support('html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

        // Add theme support for Custom Logo.
        add_theme_support( 'custom-logo', 
        	array(
	            'height'      => 250,
	            'width'       => 250,
	            'flex-width'  => true,
        	)
		);

		/*
		* Enable support for Post Formats.
		*
		* See: https://wordpress.org/support/article/post-formats/
		*/
        add_theme_support( 'post-formats', 
        	array(
	            'gallery',
	            'audio',
	            'video',
	            'image', 
        	)
		);

		// Custome Header
		$args = array(
			'default-text-color' => '3a444d',
			'width'              => 1400,
			'height'             => 800,
			'flex-width'         => true,
			'flex-height'        => true,
		);
		add_theme_support( 'custom-header', $args );
		
		// Custome Background.
		add_theme_support( 'custom-background', array('default-color' => 'fbfeff') );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
        add_theme_support( 'post-thumbnails' );
		add_image_size( 'goblog-free-featured-image', 2000, 900, true );
		add_image_size( 'goblog-free-featured-image1', 746, 560, true );
		add_image_size( 'goblog-free-med', 313, 235, true );
		add_image_size( 'goblog-free-grids2', 373, 280, true );
		add_image_size( 'goblog-free-widget-posts', 139, 107, true );

		// Set the default content width.
		$GLOBALS['content_width'] = 525;

        // This theme uses wp_nav_menu() in two locations.
	    register_nav_menus( 
	    	array(
	            'goblog-free-primary' => __( 'Primary Menu', 'goblog-free' ),
	            'goblog-free-footer'  => __( 'Footer Menu', 'goblog-free' ),
	    	)
	    );
    } // goblog_free_fitur_support

} // End function_exists

add_action( 'after_setup_theme', 'goblog_free_fitur_support' );

// Set the default content width.
function goblog_free_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'goblog_free_content_width', 525 );
}
add_action( 'after_setup_theme', 'goblog_free_content_width', 0 );