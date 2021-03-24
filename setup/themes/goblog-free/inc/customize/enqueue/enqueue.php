<?php 
/**
 * Enqueues scripts and styles.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

/**
 * Enqueue customize script preview.
 */
function goblog_free_customize_preview_js() {
	wp_enqueue_script( 'goblog-free-customize-preview', get_theme_file_uri( '/inc/customize/assets/js/customize-preview.js' ), array( 'customize-preview' ), '20200627', true );
}
add_action( 'customize_preview_init', 'goblog_free_customize_preview_js' );

/**
 * Enqueue customize script style.
 */
function goblog_free_customize_admin_css() {
    wp_enqueue_style( 'goblog-free-customize', get_theme_file_uri('/inc/customize/assets/css/customize.css') );
}
add_action( 'customize_controls_print_styles', 'goblog_free_customize_admin_css' );