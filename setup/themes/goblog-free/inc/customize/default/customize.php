<?php
/**
 * Goblog Free Customizer.
 *
 * @subpackage Goblog Free
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function goblog_free_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Partial Blog Name
	$wp_customize->selective_refresh->add_partial('blogname',
		array(
			'selector'        => '.header-name h1',
			'render_callback' => 'goblog_free_customize_partial_blogname',
		)
	);

	// Partial Blog Description
	$wp_customize->selective_refresh->add_partial('blogdescription',
		array(
			'selector'        => '.header-description p',
			'render_callback' => 'goblog_free_customize_partial_blogdescription',
		)
	);	
	
}
add_action( 'customize_register', 'goblog_free_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Goblog Free 1.0
 * @see goblog_free_customize_register()
 *
 * @return void
 */
function goblog_free_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Goblog Free 1.0
 * @see goblog_free_customize_register()
 *
 * @return void
 */
function goblog_free_customize_partial_blogdescription() {
	bloginfo( 'description' );
}