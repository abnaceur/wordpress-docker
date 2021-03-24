<?php
/**
 * Featured Content Options
 *
 * @package Vip_Business
 */

class Vip_Business_Featured_Content_Options {
	public function __construct() {
		// Register Featured Content Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 99 );

		// Add default options.
		add_filter( 'vip_business_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'vip_business_featured_content_visibility'   => 'disabled',
			'vip_business_featured_content_number'       => 3,
			'vip_business_featured_content_button_link'  => '#',
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add layouts section and its controls
	 */
	public function register_options( $wp_customize ) {
		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_featured_content_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'vip-business' ),
				'section'           => 'vip_business_ss_featured_content',
				'choices'           => Vip_Business_Customizer_Utilities::section_visibility(),
				'partial_refresh'   => array(
					'selector'            => '#featured-content-section',
					'render_callback'     => 'featured-content'
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'settings'          => 'vip_business_featured_content_section_top_subtitle',
				'label'             => esc_html__( 'Section Top Sub-title', 'vip-business' ),
				'section'           => 'vip_business_ss_featured_content',
				'active_callback'   => array( $this, 'is_featured_content_visible' ),
				'partial_refresh'   => array(
					'selector'            => '#featured-content-section',
					'render_callback'     => 'featured-content'
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_featured_content_section_title',
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Section Title', 'vip-business' ),
				'section'           => 'vip_business_ss_featured_content',
				'active_callback'   => array( $this, 'is_featured_content_visible' ),
				'partial_refresh'   => array(
					'selector'            => '#featured-content-section',
					'render_callback'     => 'featured-content'
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_featured_content_section_subtitle',
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Section Subtitle', 'vip-business' ),
				'section'           => 'vip_business_ss_featured_content',
				'active_callback'   => array( $this, 'is_featured_content_visible' ),
				'partial_refresh'   => array(
					'selector'            => '#featured-content-section',
					'render_callback'     => 'featured-content'
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_featured_content_number',
				'type'              => 'number',
				'label'             => esc_html__( 'Number', 'vip-business' ),
				'section'           => 'vip_business_ss_featured_content',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_featured_content_visible' ),
				'partial_refresh'   => array(
					'selector'            => '#featured-content-section',
					'render_callback'     => 'featured-content'
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_featured_content_category',
				'custom_control'    => 'Vip_Business_Dropdown_Select2_Custom_Control',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Pick Categories', 'vip-business' ),
				'section'           => 'vip_business_ss_featured_content',
				'choices'           => array( esc_html__( '--Select--', 'vip-business' ) => Vip_Business_Customizer_Utilities::get_terms( 'category' ) ),
				'active_callback'   => array( $this, 'is_featured_content_visible' ),
			)
		);
	}

	/**
	 * Featured Content visibility active callback.
	 */
	public function is_featured_content_visible( $control ) {
		return ( vip_business_display_section( $control->manager->get_setting( 'vip_business_featured_content_visibility' )->value() ) );
	}
}

/**
 * Initialize class
 */
$vip_business_ss_featured_content = new Vip_Business_Featured_Content_Options();
