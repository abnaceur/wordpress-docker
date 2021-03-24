<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Smallbiz Startup
 */

if ( ! function_exists( 'smallbiz_startup_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function smallbiz_startup_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'smallbiz_startup_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function smallbiz_startup_categorized_blog() {
	if ( false === ( $smallbiz_startup_all_the_cool_cats = get_transient( 'smallbiz_startup_all_the_cool_cats' ) ) ) {
		$smallbiz_startup_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		$smallbiz_startup_all_the_cool_cats = count( $smallbiz_startup_all_the_cool_cats );

		set_transient( 'smallbiz_startup_all_the_cool_cats', $smallbiz_startup_all_the_cool_cats );
	}

	if ( '1' != $smallbiz_startup_all_the_cool_cats ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Flush out the transients used in smallbiz_startup_categorized_blog
 */
function smallbiz_startup_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'smallbiz_startup_all_the_cool_cats' );
}
add_action( 'edit_category', 'smallbiz_startup_category_transient_flusher' );
add_action( 'save_post',     'smallbiz_startup_category_transient_flusher' );