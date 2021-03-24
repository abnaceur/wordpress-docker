<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class AeonMag_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self();
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param object $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'aeonwp/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'AeonMag_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new AeonMag_Customize_Section_Pro(
				$manager,
				'aeonmag_plus',
				array(
					'pro_text2' => esc_html__( 'Unlock more features with Plus', 'aeonmag' ),
					'pro_url2'  => 'https://aeonwp.com/aeonmag-plus/',
					'pro_text'  => esc_html__( 'Rate this theme', 'aeonmag' ),
					'pro_url'   => 'https://wordpress.org/support/theme/aeonmag/reviews/#new-post',
					'priority' => '1',
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'aeonmag-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );
	}
}

// Doing this customizer thang!
AeonMag_Customize::get_instance();
