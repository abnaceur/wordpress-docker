<?php
/**
 * Adds the header options sections, settings, and controls to the theme customizer
 *
 * @package Vip_Business
 */

class Vip_Business_Header_Options {
	public function __construct() {
		// Register Header Options.
		add_action( 'customize_register', array( $this, 'register_header_options' ) );

		// Add default options.
		add_filter( 'vip_business_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'vip_business_header_style' => 'header-one',
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add header options section and its controls
	 */
	public function register_header_options( $wp_customize ) {
		// Add header options section.
		$wp_customize->add_section( 'vip_business_header_options',
			array(
				'title' => esc_html__( 'Header Options', 'vip-business' ),
				'panel' => 'vip_business_theme_options'
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Image_Radio_Button_Custom_Control',
				'settings'          => 'vip_business_header_style',
				'sanitize_callback' => 'vip_business_radio_sanitization',
				'label'             => esc_html__( 'Header Style', 'vip-business' ),
				'section'           => 'vip_business_header_options',
				'choices'           => array(
					'header-one'   => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'images/header-1.png',
						'name'  => esc_html__( 'Header Style One', 'vip-business' ),
					),
					'header-two'   => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'images/header-2.png',
						'name'  => esc_html__( 'Header Style Two', 'vip-business' ),
					),
				),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'vip_business_header_email',
				'sanitize_callback' => 'sanitize_email',
				'label'             => esc_html__( 'Email', 'vip-business' ),
				'section'           => 'vip_business_header_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'vip_business_header_phone',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Phone', 'vip-business' ),
				'section'           => 'vip_business_header_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'vip_business_header_address',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Address', 'vip-business' ),
				'section'           => 'vip_business_header_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'vip_business_header_open_hours',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Open Hours', 'vip-business' ),
				'section'           => 'vip_business_header_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'settings'          => 'vip_business_header_button_text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Button Text', 'vip-business' ),
				'section'           => 'vip_business_header_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'url',
				'settings'          => 'vip_business_header_button_link',
				'sanitize_callback' => 'esc_url_raw',
				'label'             => esc_html__( 'Button Link', 'vip-business' ),
				'section'           => 'vip_business_header_options',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_header_button_target',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Open link in new tab?', 'vip-business' ),
				'section'           => 'vip_business_header_options',
			)
		);
	}
}

/**
 * Initialize class
 */
$vip_business_theme_options = new Vip_Business_Header_Options();
