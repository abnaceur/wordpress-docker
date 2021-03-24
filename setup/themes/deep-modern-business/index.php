<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Deep Modern Business
 */

get_header();

/**
 * The function is located in the following path
 * deep-modern-business/inc/class-deep-modern-business.php
 */
do_action( 'deep_modern_business_index' );

get_footer();