<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Smallbiz_Startup_Customize {

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
			$instance = new self;
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
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/button-link/button-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Smallbiz_Startup_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Smallbiz_Startup_Customize_Section_Pro( $manager,'smallbiz_startup_button_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'SMALLBIZ STARTUP PRO', 'smallbiz-startup' ),
			'pro_text' => esc_html__( 'UPGRADE PLUS', 'smallbiz-startup' ),
			'pro_url'  => esc_url('https://www.theclassictemplates.com/wp-themes/wordpress-startup-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'smallbiz-startup-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/button-link/assets/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'smallbiz-startup-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/button-link/assets/customize-controls.css' );
	}
}

// Doing this customizer thang!
Smallbiz_Startup_Customize::get_instance();