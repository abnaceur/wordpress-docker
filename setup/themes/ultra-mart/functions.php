<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if ( !function_exists( 'ultra_mart_enqueue_scripts' ) ):
    function ultra_mart_enqueue_scripts() {
        wp_enqueue_style( 'ultra-mart-parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'linearicons','font-awesome','bootstrap' ) );
        wp_enqueue_script( 'ultra-mart-custom', get_stylesheet_directory_uri().'/assets/js/ultra-mart-custom.js', array('jquery'), '1.0.0', false );
    }
endif;
add_action( 'wp_enqueue_scripts', 'ultra_mart_enqueue_scripts', 10 );

/* Include Files */
require get_stylesheet_directory().'/inc/ultra-mart-functions.php';
require get_stylesheet_directory().'/inc/ultra-mart-customizer.php';


