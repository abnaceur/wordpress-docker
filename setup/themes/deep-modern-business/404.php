<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Deep Modern Business.
 */

get_header();

/**
 * The function is located in the following path
 * deep-modern-business/inc/class-deep-modern-business.php
 */
do_action( 'deep_modern_business_notfound_page' );

get_footer();