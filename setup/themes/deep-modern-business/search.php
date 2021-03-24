<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Deep Modern Business
 */

get_header();

/**
 * The function is located in the following path
 * deep-modern-business/inc/class-deep-modern-business.php
 */
do_action( 'deep_modern_business_search' );

get_sidebar();
get_footer();