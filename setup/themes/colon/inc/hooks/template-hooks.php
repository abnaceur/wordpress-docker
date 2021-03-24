<?php
/**
 * Custom template hooks for this theme.
 *
 *
 * @package colon
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'colon_before_title' ) ) :
function colon_before_title() {
	do_action('colon_before_title');
}
endif;

/**
 * After title meta hook
 */
if ( ! function_exists( 'colon_after_title' ) ) :
function colon_after_title() {
	do_action('colon_after_title');
}
endif;

/**
 * Before title content meta hook
 */
if ( ! function_exists( 'colon_before_title_content' ) ) :
function colon_before_title_content() {
	do_action('colon_before_title_content');
}
endif;

/**
 * After title content meta hook
 */
if ( ! function_exists( 'colon_after_title_content' ) ) :
function colon_after_title_content() {
	do_action('colon_after_title_content');
}
endif;

/**
 * Before menu cart meta hook
 */
if ( ! function_exists( 'colon_before_header_menu_cart' ) ) :
function colon_before_header_menu_cart() {
	do_action('colon_before_header_menu_cart');
}
endif;


/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'colon_single_post_after_content' ) ) :
function colon_single_post_after_content($postID) {
	do_action('colon_single_post_after_content',$postID);
}
endif;