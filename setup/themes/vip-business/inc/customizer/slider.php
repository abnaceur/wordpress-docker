<?php
/**
 * Slider Options
 *
 * @package Vip_Business
 */

class Vip_Business_Slider_Options {
	public function __construct() {
		// Register Slider Options.
		add_action( 'customize_register', array( $this, 'register_options' ), 98 );

		// Register Slider Advance Options.
		add_action( 'customize_register', array( $this, 'register_advanced_options' ), 99 );

		// Add default options.
		add_filter( 'vip_business_customizer_defaults', array( $this, 'add_defaults' ) );
	}

	/**
	 * Add options to defaults
	 */
	public function add_defaults( $default_options ) {
		$defaults = array(
			'vip_business_slider_visibility'        => 'disabled',
			'vip_business_slider_transition_speed'  => 300,
			'vip_business_slider_transition_effect' => 'slide',
			'vip_business_slider_loop'              => 1,
			'vip_business_slider_autoplay_delay'    => 5000,
			'vip_business_slider_pause_on_hover'    => 1,
			'vip_business_slider_overlay'           => 1,
			'vip_business_slider_number'            => 2,
		);

		$updated_defaults = wp_parse_args( $defaults, $default_options );

		return $updated_defaults;
	}

	/**
	 * Add slider section and its controls
	 */
	public function register_options( $wp_customize ) {
		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_slider_visibility',
				'type'              => 'select',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Visible On', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'choices'           => Vip_Business_Customizer_Utilities::section_visibility(),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'type'              => 'number',
				'settings'          => 'vip_business_slider_number',
				'label'             => esc_html__( 'Number', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'sanitize_callback' => 'absint',
				'input_attrs'       => array(
					'min'   => 1,
					'max'   => 80,
					'step'  => 1,
					'style' => 'width:100px;',
				),
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_slider_category',
				'custom_control'    => 'Vip_Business_Dropdown_Select2_Custom_Control',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Pick Categories', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'choices'           => array( esc_html__( '--Select--', 'vip-business' ) => Vip_Business_Customizer_Utilities::get_terms( 'category' ) ),
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);
	}

	/**
	 * Add slider advance options
	 */
	public function register_advanced_options( $wp_customize ) {
		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Note_Control',
				'settings'          => 'vip_business_slider_advance_options_notice',
				'sanitize_callback' => 'vip_business_text_sanitization',
				'label'             => esc_html__( 'Slider Advance Options', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
				'transport'         => 'postMessage',
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_slider_transition_speed',
				'type'              => 'number',
				'sanitize_callback' => 'absint',
				'label'             => esc_html__( 'Transition Speed', 'vip-business' ),
				'description'       => esc_html__( 'Duration of transition between slides (in ms)', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'input_attrs'           => array(
					'width' => '10px',
				),
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_slider_transition_effect',
				'type'              => 'select',
				'sanitize_callback' => 'vip_business_sanitize_select',
				'label'             => esc_html__( 'Transition Effect', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'choices'           => array(
					'slide'     => esc_html__( 'Slide', 'vip-business' ),
					'fade'      => esc_html__( 'Fade', 'vip-business' ),
					'cube'      => esc_html__( 'Cube', 'vip-business' ),
					'coverflow' => esc_html__( 'Coverflow', 'vip-business' ),
					'flip'      => esc_html__( 'Flip', 'vip-business' ),
				),
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_slider_loop',
				'description'       => esc_html__( 'Enable continuous loop mode', 'vip-business' ),
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Loop', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_slider_zoom',
				'description'       => esc_html__( 'Enable zoom effect on images', 'vip-business' ),
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Zoom Effect', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_slider_autoplay',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Autoplay', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'settings'          => 'vip_business_slider_autoplay_delay',
				'type'              => 'number',
				'sanitize_callback' => 'absint',
				'label'             => esc_html__( 'Autoplay Delay', 'vip-business' ),
				'description'       => esc_html__( '(in ms)', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'input_attrs'           => array(
					'width' => '10px',
				),
				'active_callback'   => array( $this, 'is_slider_autoplay_on' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_slider_pause_on_hover',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Pause On Hover', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'active_callback'   => array( $this, 'is_slider_autoplay_on' ),
			)
		);

		Vip_Business_Customizer_Utilities::register_option(
			array(
				'custom_control'    => 'Vip_Business_Toggle_Switch_Custom_control',
				'settings'          => 'vip_business_slider_overlay',
				'sanitize_callback' => 'vip_business_switch_sanitization',
				'label'             => esc_html__( 'Image Overlay', 'vip-business' ),
				'section'           => 'vip_business_ss_slider',
				'active_callback'   => array( $this, 'is_slider_visible' ),
			)
		);
	}

	/**
	 * Slider visibility active callback.
	 */
	public function is_slider_visible( $control ) {
		return ( vip_business_display_section( $control->manager->get_setting( 'vip_business_slider_visibility' )->value() ) );
	}

	/**
	 * Slider autoplay check.
	 */
	public function is_slider_autoplay_on( $control ) {
		return ( $this->is_slider_visible( $control ) && $control->manager->get_setting( 'vip_business_slider_autoplay' )->value() );
	}
}

/**
 * Initialize class
 */
$vip_business_ss_slider = new Vip_Business_Slider_Options();
