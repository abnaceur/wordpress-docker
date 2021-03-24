<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Gt addons
 */

/**
 * Add social networks to user profile
 *
 * @param array $methods Currently set contact methods.
 *
 * @return array
 */
function gt_addons_user_social_networks_add( $methods ) {
	$methods['googleplus'] = esc_html__( 'Google+', 'memory' );
	$methods['twitter']    = esc_html__( 'Twitter username (without @)', 'memory' );
	$methods['facebook']   = esc_html__( 'Facebook profile URL', 'memory' );
	$methods['linkedin']   = esc_html__( 'Linkedin', 'memory' );
	$methods['instagram']  = esc_html__( 'Instagram', 'memory' );
	$methods['dribbble']   = esc_html__( 'Dribbble', 'memory' );
	$methods['youtube']    = esc_html__( 'Youtube', 'memory' );
	$methods['pinterest']  = esc_html__( 'Pinterest', 'memory' );

	return $methods;
}
add_filter( 'user_contactmethods', 'gt_addons_user_social_networks_add' );
