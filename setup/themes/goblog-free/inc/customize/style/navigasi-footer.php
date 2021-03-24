<?php
/**
 * Goblog Free Add Style Navigasi Footer Customizer.
 *
 * @subpackage Goblog Free
 * @since 1.0
 */

function goblog_free_style_navigasi_footer() {

    wp_enqueue_style( 'goblog-free-style', get_stylesheet_uri(), array(), '1.0.0' );

    $backgroundColor      = sanitize_hex_color( get_theme_mod( 'bg_navigasi_footer', '#242529' ) );
    $colorLink            = sanitize_hex_color( get_theme_mod( 'color_navigasi_footer', '#b7aaaa' ) );
    $colorLinkHover       = sanitize_hex_color( get_theme_mod( 'color_link_hover_navigasi_footer', '#278cf1' ) );
    $colorIconSosmed      = sanitize_hex_color( get_theme_mod( 'color_icon_sosmed_navigasi_footer', '#b7aaaa' ) );
    $colorIconHoverSosmed = sanitize_hex_color( get_theme_mod( 'color_icon_hover_navigasi_footer', '#278cf1' ) );

    $linkFb  = sanitize_key( get_theme_mod( 'url_fb_navigasi_footer', '' ) );
    $linkTwt = sanitize_key( get_theme_mod( 'url_twt_navigasi_footer', '' ) );
    $linkYt  = sanitize_key( get_theme_mod( 'url_yt_navigasi_footer', '' ) );
    $linkIg  = sanitize_key( get_theme_mod( 'url_ig_navigasi_footer', '' ) );
    $linkLk  = sanitize_key( get_theme_mod( 'url_lk_navigasi_footer', '' ) );

    $navigasi_footer = "#footer nav#navigasi { background: $backgroundColor; } #footer nav#navigasi li a {color: $colorLink; } #footer nav#navigasi li:hover a { color: $colorLinkHover; } footer#footer .facebook i, footer#footer .twitter i, footer#footer .youtube i, footer#footer .instagram i, footer#footer .linkedin i { color: $colorIconSosmed;} footer#footer .facebook:hover i, footer#footer .twitter:hover i, footer#footer .youtube:hover i, footer#footer .instagram:hover i, footer#footer .linkedin:hover i { color: $colorIconHoverSosmed; }";

    // Check url facebook
    if( empty( $linkFb ) ) {
        $footer_fb = "footer#footer .facebook i { display: none }";
        wp_add_inline_style( 'goblog-free-style', $footer_fb );
    }

    // Check url twitter
    if( empty( $linkTwt ) ) {
        $footer_twt = "footer#footer .twitter i { display: none }";
        wp_add_inline_style( 'goblog-free-style', $footer_twt );
    }

    // Check url youtube
    if( empty( $linkYt ) ) {
        $footer_yt = "footer#footer .youtube i { display: none }";
        wp_add_inline_style( 'goblog-free-style', $footer_yt );
    }    
    
    // Check url instagram
    if( empty( $linkIg ) ) {
        $footer_ig = "footer#footer .instagram i { display: none }";
        wp_add_inline_style( 'goblog-free-style', $footer_ig );
    }

    // Check url linkedin
    if( empty( $linkLk ) ) {
        $footer_lk = "footer#footer .linkedin i { display: none }";
        wp_add_inline_style( 'goblog-free-style', $footer_lk );
    }

    wp_add_inline_style( 'goblog-free-style', $navigasi_footer );
    
}
add_action( 'wp_enqueue_scripts', 'goblog_free_style_navigasi_footer' );