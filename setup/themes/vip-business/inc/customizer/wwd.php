<?php
/**
 * WWD Options
 *
 * @package Vip_Business
 */

class Vip_Business_WWD_Options {
	public function __construct() {
		// Register WWD Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 99 );

		// Add default options.
		add_filter( 'vip_business_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'vip_business_wwd_visibility' => 'disabled',
			'vip_business_wwd_number'     => 6,
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
				'settings'          => 'vip_business_wwd_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'vip-business' ),
				'section'           => 'vip_business_ss_wwd',
				'choices'           => Vip_Business_Customizer_Utilities::section_visibility(),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'settings'          => 'vip_business_wwd_section_top_subtitle',
				'label'             => esc_html__( 'Section Top Sub-title', 'vip-business' ),
				'section'           => 'vip_business_ss_wwd',
				'active_callback'   => array( $this, 'is_wwd_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_wwd_section_title',
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Section Title', 'vip-business' ),
				'section'           => 'vip_business_ss_wwd',
				'active_callback'   => array( $this, 'is_wwd_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_wwd_section_subtitle',
				'type'              => 'text',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Section Subtitle', 'vip-business' ),
				'section'           => 'vip_business_ss_wwd',
				'active_callback'   => array( $this, 'is_wwd_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_wwd_number',
				'type'              => 'number',
				'label'             => esc_html__( 'Number', 'vip-business' ),
				'description'       => esc_html__( 'Please refresh the customizer page once the number is changed.', 'vip-business' ),
				'section'           => 'vip_business_ss_wwd',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_wwd_visible' ),
			)
		);

		$numbers = vip_business_gtm( 'vip_business_wwd_number' );

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_wwd_category',
				'custom_control'    => 'Vip_Business_Dropdown_Select2_Custom_Control',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Pick Categories', 'vip-business' ),
				'section'           => 'vip_business_ss_wwd',
				'choices'           => array( esc_html__( '--Select--', 'vip-business' ) => Vip_Business_Customizer_Utilities::get_terms( 'category' ) ),
				'active_callback'   => array( $this, 'is_wwd_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Simple_Notice_Custom_Control',
				'sanitize_callback' => 'sanitize_text_field',
				'settings'          => 'vip_business_wwd_icon_note',
				'label'             =>  esc_html__( 'Info', 'vip-business' ),
				'description'       =>  sprintf( esc_html__( 'If you want camera icon, save "fas fa-camera". For more classes, check %1$sthis%2$s', 'vip-business' ), '<a href="' . esc_url( 'https://fontawesome.com/icons?d=gallery&m=free' ) . '" target="_blank">', '</a>' ),
				'section'           => 'vip_business_ss_wwd',
				'active_callback'   => array( $this, 'is_wwd_visible' ),
			)
		);

		for( $i = 0; $i < $numbers; $i++ ) {
			Vip_Business_Customizer_Utilities::register_option(
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'settings'          => 'vip_business_wwd_custom_icon_' . $i,
					'label'             => esc_html__( 'Icon Class', 'vip-business' ),
					'section'           => 'vip_business_ss_wwd',
					'active_callback'   => array( $this, 'is_wwd_visible' ),
				)
			);
		}
	}

	/**
	 * WWD visibility active callback.
	 */
	public function is_wwd_visible( $control ) {
		return ( vip_business_display_section( $control->manager->get_setting( 'vip_business_wwd_visibility' )->value() ) );
	}
}

/**
 * Initialize class
 */
$vip_business_ss_wwd = new Vip_Business_WWD_Options();
