<?php
/**
 * Testimonial Options
 *
 * @package Vip_Business
 */

class Vip_Business_Testimonial_Options {
	public function __construct() {
		// Register Testimonial Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 99 );

		// Add default options.
		add_filter( 'vip_business_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'vip_business_testimonial_visibility' => 'disabled',
			'vip_business_testimonial_number'     => 4,
			'vip_business_testimonial_overlay'    => 1,

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
				'settings'          => 'vip_business_testimonial_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'choices'           => Vip_Business_Customizer_Utilities::section_visibility(),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'WP_Customize_Image_Control',
				'sanitize_callback' => 'esc_url_raw',
				'settings'          => 'vip_business_testimonial_bg_image',
				'label'             => esc_html__( 'Background Image', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_testimonial_overlay',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Overlay on image?', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'settings'          => 'vip_business_testimonial_section_top_subtitle',
				'label'             => esc_html__( 'Section Top Sub-title', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_testimonial_section_title',
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Section Title', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_testimonial_section_subtitle',
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Section Subtitle', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_testimonial_number',
				'type'              => 'number',
				'label'             => esc_html__( 'Number', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_testimonial_category',
				'custom_control'    => 'Vip_Business_Dropdown_Select2_Custom_Control',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Pick Categories', 'vip-business' ),
				'section'           => 'vip_business_ss_testimonial',
				'choices'           => array( esc_html__( '--Select--', 'vip-business' ) => Vip_Business_Customizer_Utilities::get_terms( 'category' ) ),
				'active_callback'   => array( $this, 'is_testimonial_visible' ),
			)
		);
	}

	/**
	 * Testimonial visibility active callback.
	 */
	public function is_testimonial_visible( $control ) {
		return ( vip_business_display_section( $control->manager->get_setting( 'vip_business_testimonial_visibility' )->value() ) );
	}
}

/**
 * Initialize class
 */
$vip_business_ss_testimonial = new Vip_Business_Testimonial_Options();
