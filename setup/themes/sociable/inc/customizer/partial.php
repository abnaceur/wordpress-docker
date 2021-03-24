<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Sociable
* @since Sociable 1.0.0
*/

if ( ! function_exists( 'sociable_introduction_btn_title_partial' ) ) :
    // introduction btn title
    function sociable_introduction_btn_title_partial() {
        $options = sociable_get_theme_options();
        return esc_html( $options['introduction_btn_title'] );
    }
endif;

if ( ! function_exists( 'sociable_portfolio_title_partial' ) ) :
    // portfolio title
    function sociable_portfolio_title_partial() {
        $options = sociable_get_theme_options();
        return esc_html( $options['portfolio_title'] );
    }
endif;

if ( ! function_exists( 'sociable_blog_title_partial' ) ) :
    // blog title
    function sociable_blog_title_partial() {
        $options = sociable_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'sociable_copyright_text_partial' ) ) :
    // copyright text
    function sociable_copyright_text_partial() {
        $options = sociable_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

if ( ! function_exists( 'sociable_instagram_title_partial' ) ) :
    // instagram title
    function sociable_instagram_title_partial() {
        $options = sociable_get_theme_options();
        return esc_html( $options['instagram_title'] );
    }
endif;

if ( ! function_exists( 'sociable_instagram_description_partial' ) ) :
    // instagram description
    function sociable_instagram_description_partial() {
        $options = sociable_get_theme_options();
        return wp_kses_post( $options['instagram_description'] );
    }
endif;