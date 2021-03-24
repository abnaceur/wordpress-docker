<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Deep Modern Business
 */

get_header();

/**
 * The function is located in the following path
 * deep-modern-business/inc/class-deep-modern-business.php
 */
do_action( 'deep_modern_business_single' );

get_footer();