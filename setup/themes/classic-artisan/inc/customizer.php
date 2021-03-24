<?php
/**
 * classic_artisan Theme Customizer
 *
 * @package classic_artisan
 */

/**
 * Add theme options to the customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function classic_artisan_customize_register( $wp_customize ) {

	// postMessage support for blog name and description.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Only show the header media section on the front page, where it's displayed.
	$wp_customize->get_section( 'header_image' )->active_callback = 'is_front_page';

	// Add the classic_artisan section.
	$wp_customize->add_section( 'classic_artisan' , array(
		'title'	      => __( 'Classic Artisan Options', 'classic-artisan' ),
		'description' => __( 'Settings for the Classic Artisan theme.', 'classic-artisan' ),
		'priority'    => 60,
	) );

	// Add the footer/copyright information section, settings & controls.
	$wp_customize->add_setting( 'copy_name' , array(
		'default'           => esc_html( get_bloginfo( 'name' ) ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'powered_by_wp' , array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'classic_artisan_sanitize_checkbox',
	) );

	$wp_customize->add_setting( 'theme_meta' , array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'classic_artisan_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'copy_name', array(
		'label'    => __( 'Copyright Name', 'classic-artisan' ),
		'section'  => 'classic_artisan',
		'type'     => 'text',
		'priority' => 20,
	) );

	$wp_customize->add_control( 'powered_by_wp', array(
		'label'	   => __( 'Proudly Powered By WordPress', 'classic-artisan' ),
		'section'  => 'classic_artisan',
		'type'     => 'checkbox',
		'priority' => 21,
	) );

	$wp_customize->add_control( 'theme_meta', array(
		'label'    => __( 'Theme Information', 'classic-artisan' ),
		'section'  => 'classic_artisan',
		'type'     => 'checkbox',
		'priority' => 22,
	) );

	// Add the color & background settings.
	$wp_customize->add_setting( 'cab_s' , array(
		'default'           => 20,
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_setting( 'cab_h' , array(
		'default'           => 250,
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_setting( 'cab_size' , array(
		'default'           => 18,
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_setting( 'cab_rainbow' , array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'classic_artisan_sanitize_checkbox',
	) );

	// Add the color & background controls.
	$wp_customize->add_control( 'cab_size', array(
		'label'       => __( 'Background Graphic Size', 'classic-artisan' ),
		'section'     => 'classic_artisan',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 9,
			'max' => 180,
			'step' => 9,
		),
	) );

	$wp_customize->add_control( 'cab_s', array(
		'label'       => __( 'Color Saturation', 'classic-artisan' ),
		'section'     => 'classic_artisan',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 2,
		),
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cab_h', array(
		'label'   => __( 'Color Scheme Hue', 'classic-artisan' ),
		'description' => __( 'All text and background colors will be tinted according to this selection.', 'classic-artisan' ),
		'section' => 'classic_artisan',
		'mode'    => 'hue',
		'active_callback' => 'classic_artisan_has_saturation',
	) ) );

	$wp_customize->add_control( 'cab_rainbow', array(
		'label'   => __( 'Rainbow Background', 'classic-artisan' ),
		'section' => 'classic_artisan',
		'type'    => 'checkbox',
		'active_callback' => 'classic_artisan_has_saturation',
	) );

	// Partial refresh for better user experience (faster loading of changes).
	// This is a supplement to the initial postMessage setting update that handles PHP 
	// logic more complex than basic color swaps in the CSS (such as contrast ratios).
	$wp_customize->selective_refresh->add_partial( 'classic_artisan_colors', array(
		'selector'        => '#classic-artisan-colors',
		'settings'        => array( 'cab_s', 'cab_h' ),
		'render_callback' => 'classic_artisan_custom_colors_css',
	) );

	// Add selective refresh support for the title and tagline, and the footer options.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => '.site-title a',
	    'render_callback' => 'classic_artisan_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => '.site-description',
	    'render_callback' => 'classic_artisan_customize_partial_blogdescription',
	) );
	$wp_customize->selective_refresh->add_partial( 'footer_credits', array(
	    'selector' => '.site-info',
		'settings' => array( 'copy_name', 'powered_by_wp', 'theme_meta' ),
	    'render_callback' => 'classic_artisan_site_info',
	) );
}
add_action( 'customize_register', 'classic_artisan_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Classic Artisan 1.0
 *
 * @return void
 */
function classic_artisan_customize_preview_js() {
	wp_enqueue_script( 'classic-artisan-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview', 'jquery' ), '20200804', true );
}
add_action( 'customize_preview_init', 'classic_artisan_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls pane.
 */
function classic_artisan_customize_controls_js() {
	wp_enqueue_script( 'twentyseventeen-customize-controls', get_template_directory_uri() . '/js/customize-controls.js', array( 'customize-controls', 'jquery' ), '20161231', true );
}
add_action( 'customize_controls_enqueue_scripts', 'classic_artisan_customize_controls_js' );

/**
 * Output custom colors CSS on the front end.
 *
 * @since Classic Artisan 1.0
 *
 * @return void
 */
function classic_artisan_custom_colors_head() {
	if ( is_customize_preview() ) {
		$data = ' data-cab_s="' . absint( get_theme_mod( 'cab_s', 20 ) )
		        . '" data-cab_h="' . absint( get_theme_mod( 'cab_h', 250 ) ) . '"';
	} else {
		$data = '';
	}
	echo '<style type="text/css" id="classic-artisan-colors"' . $data . '>' .
		classic_artisan_custom_colors_css() .
	'</style>';
}
add_action( 'wp_head', 'classic_artisan_custom_colors_head' );

/**
 * Sanitize a checkbox input to 1 or 0.
 *
 * @since Classic Artisan 1.0
 *
 * @return void
 */
function classic_artisan_sanitize_checkbox( $input ) {
    if ( $input ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Return whether the saturation is nonzero.
 *
 * @since Classic Artisan 1.0
 *
 * @return void
 */
function classic_artisan_has_saturation() {
	$saturation = absint( get_theme_mod( 'cab_s', 20 ) );
	return ( 0 !== $saturation ) ? true : false;
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Classic Artisan 1.0
 * @see classic_artisan_customize_register()
 *
 * @return void
 */
function classic_artisan_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Classic Artisan 1.0
 * @see classic_artisan_customize_register()
 *
 * @return void
 */
function classic_artisan_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
