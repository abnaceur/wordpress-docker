<?php
/**
 * Theme functions and definitions
 *
 * @package Busiq
 */

if ( ! function_exists( 'busiq_enqueue_styles' ) ) :

	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function busiq_enqueue_styles() {

		wp_enqueue_style( 'agencyup-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'busiq-style', get_stylesheet_directory_uri() . '/style.css', array( 'agencyup-style-parent' ), '1.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'busiq-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		wp_dequeue_style( 'default',get_template_directory_uri() .'/css/colors/default.css');
	}

endif;

add_action( 'wp_enqueue_scripts', 'busiq_enqueue_styles', 99 );