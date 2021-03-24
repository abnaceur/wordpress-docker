<?php
/**
 * Deep Modern Business.
 * 
 * @since   1.0.0
 * @author  Webnus
 */

if ( defined( 'DEEPCORE' ) ) {
	get_header();
	do_action( 'buddypress_content' );
	get_footer();
}