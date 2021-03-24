<?php
/**
 * Template part for displaying layout posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0 
 */

if ( is_active_sidebar( 'goblog-free-front' ) ) {
    dynamic_sidebar( 'goblog-free-front' ); 
} else { 
    get_template_part( 'template-parts/layout/blog/default', get_post_format() ); 
}