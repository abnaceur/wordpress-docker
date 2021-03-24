<?php
/**
 * Buzz_Magazine Theme Customizer
 *
 * @package Buzz_Magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function buzz_magazine_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->remove_control('header_image');
    $wp_customize->remove_control('header_textcolor');

    require BUZZ_MAGAZINE_SANITIZATION.'sanitize.php';
    require_once BUZZ_MAGAZINE_CUSTOMIZER_URI . 'active-callback/theme-option.php';

    /**
     * Storing Controls File Name
     * @var array $controls
     */
    $controls = [
        'custom-radio-text',
        'custom-toggle-button',
        'custom-upsell',
        'custom-select-category',
        'custom-simple-notice',
    ];

    /**
     * Looping Through Files
     */
    foreach ($controls as $control) {
        require BUZZ_MAGAZINE_CONTROL . $control.'.php';
    }

    /**
     * Storing Panels File Name
     * @var array $panels
     */
    $panels = ['theme-option'];
    foreach ($panels as $panel) {
        require BUZZ_MAGAZINE_PANELS . $panel.'.php';
    }

    require BUZZ_MAGAZINE_SECTIONS . 'upsell.php';

    if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'buzz_magazine_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'buzz_magazine_customize_partial_blogdescription',
			)
		);


	}
}
add_action( 'customize_register', 'buzz_magazine_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function buzz_magazine_customize_partial_blogname() {
    bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function buzz_magazine_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function buzz_magazine_customize_preview_js() {
	wp_enqueue_script( 'buzz_magazine-customizer', BUZZ_MAGAZINE_JS_URI.'customizer-preview.js', array( 'customize-preview' ), '1.0.0', true );


}
add_action( 'customize_preview_init', 'buzz_magazine_customize_preview_js' );

