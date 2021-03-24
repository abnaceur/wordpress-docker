<?php
/**
 * Display all Freesia Business functions and definitions
 *
 * @package Theme Freesia
 * @subpackage Freesia Business
 * @since Freesia Business 1.0
 */

add_action( 'wp_enqueue_scripts', 'freesia_business_enqueue_styles' );

function freesia_business_enqueue_styles() {

	wp_enqueue_style( 'freesia-business-parent-style', trailingslashit(get_template_directory_uri() ) . '/style.css' );

}

require get_stylesheet_directory() . '/inc/welcome-notice.php';

function freesia_business_customize_register( $wp_customize ) {
	if(!class_exists('Freesia_Empire_Plus_Features')){
		class Freesia_Business_Customize_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
				<a title="<?php esc_attr_e( 'Review Freesia Business', 'freesia-business' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/freesia-business/' ); ?>" target="_blank" id="about-freesia-business">
				<?php esc_html_e( 'Review Freesia Business', 'freesia-business' ); ?>
				</a><br/>
				<a href="<?php echo esc_url( 'https://themefreesia.com/theme-instruction/freesia-business/' ); ?>" title="<?php esc_attr_e( 'Theme Instructions', 'freesia-business' ); ?>" target="_blank" id="about-freesia-business">
				<?php esc_html_e( 'Theme Instructions', 'freesia-business' ); ?>
				</a><br/>
				<a href="<?php echo esc_url( 'https://tickets.themefreesia.com' ); ?>" title="<?php esc_attr_e( 'Support Ticket', 'freesia-business' ); ?>" target="_blank" id="about-freesia-business">
				<?php esc_html_e( 'Tickets', 'freesia-business' ); ?>
				</a><br/>
			<?php
			}
		}

		$wp_customize->add_section('freesia_business_upgrade_links', array(
			'title'					=> __('About Freesia Business', 'freesia-business'),
			'priority'				=> 1000,
		));
		$wp_customize->add_setting( 'freesia_business_upgrade_links', array(
			'default'				=> false,
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Freesia_Business_Customize_upgrade(
			$wp_customize,
			'freesia_business_upgrade_links',
				array(
					'section'				=> 'freesia_business_upgrade_links',
					'settings'				=> 'freesia_business_upgrade_links',
				)
			)
		);
	}
}
	add_action( 'customize_register', 'freesia_business_customize_register' );

	/************ Renaming Panel and Section Customizer name  to Freesia Business *******************/
	add_action( 'customize_register', 'freesia_business_customize_register_wordpress_default' );
	function freesia_business_customize_register_wordpress_default( $wp_customize ) {
		$wp_customize->add_panel( 'freesiaempire_wordpress_default_panel', array(
			'priority' => 5,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Freesia Business WordPress Settings', 'freesia-business' ),
			'description' => '',
		) );
	}
	add_action( 'customize_register', 'freesia_business_customize_register_options', 20 );
	function freesia_business_customize_register_options( $wp_customize ) {
		$wp_customize->add_panel( 'freesiaempire_options_panel', array(
			'priority' => 6,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Freesia Business Theme Options', 'freesia-business' ),
			'description' => '',
		) );
	}
	add_action( 'customize_register', 'freesia_business_customize_register_featuredcontent' );
	function freesia_business_customize_register_featuredcontent( $wp_customize ) {
		$wp_customize->add_panel( 'freesiaempire_featuredcontent_panel', array(
			'priority' => 7,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Freesia Business Slider Options', 'freesia-business' ),
			'description' => '',
		) );
	}
	add_action( 'customize_register', 'freesia_business_customize_register_widgets' );
	function freesia_business_customize_register_widgets( $wp_customize ) {
		$wp_customize->add_panel( 'widgets', array(
			'priority' => 8,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Freesia Business Widgets', 'freesia-business' ),
			'description' => '',
		) );
	}

if(!class_exists('Freesia_Empire_Plus_Features')){
	// Add Upgrade to Plus Button.
	require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/upgrade-plus/class-customize.php' );
}
