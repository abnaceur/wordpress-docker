<?php
/**
 * craftyblog Theme Customizer
 *
 * @package craftyblog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function craftyblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'craftyblog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'craftyblog_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'craftyblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function craftyblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function craftyblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function craftyblog_customize_preview_js() {
	wp_enqueue_script( 'craftyblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'craftyblog_customize_preview_js' );

/**
 * craftyblog featured section settings
 */

/*
 * Theme Base Color
 */

add_action( 'customize_register', 'craftyblog_customize_register_for_color' );
/**
 *
 * craftyblog Customize register color function.
 *
 * @param args $wp_customize costomize field parameter.
 */
function craftyblog_customize_register_for_color( $wp_customize ) {

		if( ! class_exists( 'Craftyblog_Note_Control' ) ){

			class Craftyblog_Note_Control extends WP_Customize_Control {
			
				public function render_content(){ ?>
		    	    <span class="customize-control-title">
		    			<?php echo wp_kses_post( $this->label ); ?>
		    		</span>
		    
		    		<?php if( $this->description ){ ?>
		    			<span class="description customize-control-description">
		    			<?php echo wp_kses_post( $this->description ); ?>
		    			</span>
		    		<?php }
		        }
			}
		}


	$wp_customize->add_panel(
			'craftyblog',
			array(
				'priority'       => 50,
				'title'          => __( 'CraftyBlog Settings', 'craftyblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		require get_theme_file_path( 'inc/themeoptions/social-links.php' );
		require get_theme_file_path( 'inc/themeoptions/featured-sections.php' );
		require get_theme_file_path( 'inc/themeoptions/colors.php' );

}

