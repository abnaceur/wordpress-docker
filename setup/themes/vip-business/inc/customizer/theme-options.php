<?php
/**
 * Adds the theme options sections, settings, and controls to the theme customizer
 *
 * @package Vip_Business
 */

class Vip_Business_Theme_Options {
	public function __construct() {
		// Register our Panel.
		add_action( 'customize_register', array( $this, 'add_panel' ) );

		// Register Breadcrumb Options.
		add_action( 'customize_register', array( $this, 'register_breadcrumb_options' ) );

		// Register Excerpt Options.
		add_action( 'customize_register', array( $this, 'register_excerpt_options' ) );

		// Register Homepage Options.
		add_action( 'customize_register', array( $this, 'register_homepage_options' ) );

		// Register Layout Options.
		add_action( 'customize_register', array( $this, 'register_layout_options' ) );

		// Register Search Options.
		add_action( 'customize_register', array( $this, 'register_search_options' ) );

		// Add default options.
		add_filter( 'vip_business_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			// Header Media.
			'vip_business_header_image_visibility' => 'entire-site',

			// Breadcrumb
			'vip_business_breadcrumb_show' => 1,

			// Layout Options.
			'vip_business_layout_type'             => 'fluid',
			'vip_business_default_layout'          => 'right-sidebar',
			'vip_business_homepage_archive_layout' => 'no-sidebar-full-width',
			
			// Excerpt Options
			'vip_business_excerpt_length'    => 30,
			'vip_business_excerpt_more_text' => esc_html__( 'Continue reading', 'vip-business' ),

			// Homepage/Frontpage Options.
			'vip_business_front_page_category'   => '',
			'vip_business_show_homepage_content' => 1,
			
			// Search Options.
			'vip_business_search_text'         => esc_html__( 'Search...', 'vip-business' ),
		);


		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Register the Customizer panels
	 */
	public function add_panel( $wp_customize ) {
		/**
		 * Add our Header & Navigation Panel
		 */
		 $wp_customize->add_panel( 'vip_business_theme_options',
		 	array(
				'title' => esc_html__( 'Theme Options', 'vip-business' ),
			)
		);
	}

	/**
	 * Add breadcrumb section and its controls
	 */
	public function register_breadcrumb_options( $wp_customize ) {
		// Add Excerpt Options section.
		$wp_customize->add_section( 'vip_business_breadcrumb_options',
			array(
				'title' => esc_html__( 'Breadcrumb', 'vip-business' ),
				'panel' => 'vip_business_theme_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_breadcrumb_show',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Display Breadcrumb?', 'vip-business' ),
				'section'           => 'vip_business_breadcrumb_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_breadcrumb_show_home',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Show on homepage?', 'vip-business' ),
				'section'           => 'vip_business_breadcrumb_options',
			)
		);
	}

	/**
	 * Add layouts section and its controls
	 */
	public function register_layout_options( $wp_customize ) {
		// Add layouts section.
		$wp_customize->add_section( 'vip_business_layouts',
			array(
				'title' => esc_html__( 'Layouts', 'vip-business' ),
				'panel' => 'vip_business_theme_options'
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'select',
				'settings'          => 'vip_business_layout_type',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Site Layout', 'vip-business' ),
				'section'           => 'vip_business_layouts',
				'choices'           => array(
					'fluid' => esc_html__( 'Fluid', 'vip-business' ),
					'boxed' => esc_html__( 'Boxed', 'vip-business' ),
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'select',
				'settings'          => 'vip_business_default_layout',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Default Layout', 'vip-business' ),
				'section'           => 'vip_business_layouts',
				'choices'           => array(
					'right-sidebar'         => esc_html__( 'Right Sidebar', 'vip-business' ),
					'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'vip-business' ),
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'select',
				'settings'          => 'vip_business_homepage_archive_layout',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Homepage/Archive Layout', 'vip-business' ),
				'section'           => 'vip_business_layouts',
				'choices'           => array(
					'right-sidebar'         => esc_html__( 'Right Sidebar', 'vip-business' ),
					'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'vip-business' ),
				),
			)
		);
	}

	/**
	 * Add excerpt section and its controls
	 */
	public function register_excerpt_options( $wp_customize ) {
		// Add Excerpt Options section.
		$wp_customize->add_section( 'vip_business_excerpt_options',
			array(
				'title' => esc_html__( 'Excerpt Options', 'vip-business' ),
				'panel' => 'vip_business_theme_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'number',
				'settings'          => 'vip_business_excerpt_length',
				'sanitize_callback' => 'absint',
				'label'             => esc_html__( 'Excerpt Length (Words)', 'vip-business' ),
				'section'           => 'vip_business_excerpt_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'vip_business_excerpt_more_text',
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Excerpt More Text', 'vip-business' ),
				'section'           => 'vip_business_excerpt_options',
			)
		);
	}

	/**
	 * Add Homepage/Frontpage section and its controls
	 */
	public function register_homepage_options( $wp_customize ) {
		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Dropdown_Select2_Custom_Control',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'settings'          => 'vip_business_front_page_category',
				'description'       => esc_html__( 'Filter Homepage/Blog page posts by following categories', 'vip-business' ),
				'label'             => esc_html__( 'Categories', 'vip-business' ),
				'section'           => 'static_front_page',
				'choices'           => array( esc_html__( '--Select--', 'vip-business' ) => Vip_Business_Customizer_Utilities::get_terms( 'category' ) ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_show_homepage_content',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Show Home Content/Blog', 'vip-business' ),
				'section'           => 'static_front_page',
			)
		);
	}

	/**
	 * Add Homepage/Frontpage section and its controls
	 */
	public function register_search_options( $wp_customize ) {
		// Add Homepage/Frontpage Section.
		$wp_customize->add_section( 'vip_business_search',
			array(
				'title' => esc_html__( 'Search', 'vip-business' ),
				'panel' => 'vip_business_theme_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_search_text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Search Text', 'vip-business' ),
				'section'           => 'vip_business_search',
				'type'              => 'text',
			)
		);
	}

	/**
	 * Array for fonts.
	 */
	public static function get_font_options() {
		$fonts = array(
			'vip_business_body_font' => array(
				'label'    => esc_html__( 'Body(Default)', 'vip-business' ),
				'selector' => 'body',
			),
			'vip_business_title_font' => array(
				'label'    => esc_html__( 'Site Title', 'vip-business' ),
				'selector' => '.site-title',
			),
			'vip_business_tagline_font' => array(
				'label'    => esc_html__( 'Tagline', 'vip-business' ),
				'selector' => '.site-description',
			),
			'vip_business_content_font' => array(
				'label'    => esc_html__( 'Content', 'vip-business' ),
				'selector' => '#content, #content p',
			),
			'vip_business_headings_font' => array(
				'label'    => esc_html__( 'Headings (h1 to h6)', 'vip-business' ),
				'selector' => 'h1, h2, h3, h4, h5, h6',
			),
			'vip_business_content_font' => array(
				'label'    => esc_html__( 'Section Title', 'vip-business' ),
				'selector' => '#hero-content .section-title',
			),
		);

		return $fonts;
	}
}

/**
 * Initialize class
 */
$vip_business_theme_options = new Vip_Business_Theme_Options();
