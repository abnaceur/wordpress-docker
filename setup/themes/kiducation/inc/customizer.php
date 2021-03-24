<?php
/**
 * Kiducation Theme Customizer
 *
 * @package Kiducation
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function kiducation_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Register custom section types.
	$wp_customize->register_section_type( 'Kiducation_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Kiducation_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Kiducation Pro', 'kiducation' ),
				'pro_text' => esc_html__( 'Buy Pro', 'kiducation' ),
				'pro_url'  => 'http://www.sensationaltheme.com/downloads/kiducation-pro/',
				'priority'  => 10,
			)
		)
	);

	$default = kiducation_get_default_theme_options();

	// Add Panel.
	$wp_customize->add_panel( 'theme_option_panel',
		array(
		'title'      => __( 'Theme Options', 'kiducation' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		)
	);

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize options.
	include get_template_directory() . '/inc/customizer/options.php';

	// Load customize control.
	include get_template_directory() . '/inc/customizer/control.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load footer sections option.
	include get_template_directory() . '/inc/customizer/theme-option/footer.php';

	// Load general sections option.
	include get_template_directory() . '/inc/customizer/theme-option/general.php';

	// Load layout sections option.
	include get_template_directory() . '/inc/customizer/theme-option/layout.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/header-image.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';


	
}
add_action( 'customize_register', 'kiducation_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kiducation_customize_preview_js() {
	wp_enqueue_script( 'kiducation_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kiducation_customize_preview_js' );
/**
 *
 */
function kiducation_customize_backend_scripts() {


		wp_enqueue_style( 'kiducation-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
		wp_enqueue_script( 'kiducation-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scipt.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'kiducation_customize_backend_scripts', 10 );
