<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package deep
 */

get_header();

/**
 * The function is located in the following path
 * deep/inc/class-deep-theme-init.php
 */
do_action( 'deep_theme_single' );

get_footer();
