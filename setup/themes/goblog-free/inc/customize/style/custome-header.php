<?php
/**
 * Goblog Free Add Style Custom Header Customizer.
 *
 * @subpackage Goblog Free
 * @since 1.0
 */

function goblog_free_style_custom_header() {
    wp_enqueue_style( 'goblog-free-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    if ( get_header_textcolor() == 'blank') {
        $color_site_title = '#3a444d';
    } else {
        $color_site_title = '#'.sanitize_hex_color_no_hash( get_header_textcolor() );
    }

    $custom_header = "section.container-header-title h1 a, section.container-header-title h1, section.container-header-title p { color: $color_site_title; }";

    wp_add_inline_style( 'goblog-free-style', $custom_header);

}
add_action( 'wp_enqueue_scripts', 'goblog_free_style_custom_header' );