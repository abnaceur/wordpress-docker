<?php
/**
 * Add required and recommended plugins.
 *
 * @package memory
 */

add_action( 'tgmpa_register', 'memory_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function memory_register_required_plugins() {
	$plugins = memory_required_plugins();

	$config = array(
		'id'          => 'memory',
		'has_notices' => false,
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function memory_required_plugins() {
	$url = 'http://demo.featherlayers.com/';

	return array(
		array(
			'name' => esc_html__( 'Jetpack', 'memory' ),
			'slug' => 'jetpack',
		),
		array(
			'name' => esc_html__( 'Slim SEO', 'memory' ),
			'slug' => 'slim-seo',
		),
	);
}
