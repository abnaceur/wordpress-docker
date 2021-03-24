<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sociable_body_classes( $classes ) {
	$options = sociable_get_theme_options();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Introduciton section enabled
	if ( $options['introduction_section_enable'] ) {
		$classes[] = 'introduction-section-enabled';
	}

	// Add a class for layout
	$classes[] = esc_attr( $options['site_layout'] );

	// Add a class for sidebar
	$sidebar_position = sociable_layout();
	$sidebar = 'sidebar-1';
	if ( is_singular() || is_home() ) {
		$id = ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : get_the_id();
	  	$sidebar = get_post_meta( $id, 'sociable-selected-sidebar', true );
	  	$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
	}
	
	if ( is_active_sidebar( $sidebar ) ) {
		if ( sociable_is_frontpage() ) :
			$classes[] = 'no-sidebar';
		else :
			$classes[] = esc_attr( $sidebar_position );
		endif;
	} else {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sociable_body_classes' );
