<?php
/**
 * Default theme options.
 *
 * @package Kiducation
 */

if ( ! function_exists( 'kiducation_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function kiducation_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();

	$defaults['disable_homepage_content_section'] = true;

	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= false;
	$defaults['number_of_slider_items']				= 3;

	//About Section	
	$defaults['disable_about_section']	   	= false;
	$defaults['about_btn_text']	   	 		= esc_html__( 'Read More', 'kiducation' );


	// Our Service Section
	$defaults['disable_services_section']	= false;
	$defaults['service_title']	   	 		= esc_html__( 'We Offer Premium Child Care', 'kiducation' );
	$defaults['number_of_service_column']	= 3;
	$defaults['number_of_service_items']	= 3;


	// Featured Section
	$defaults['disable_course_section']	= false;
	$defaults['course_title']	   	 		= esc_html__( 'Our Course', 'kiducation' );

	// Testimonial Section
	$defaults['disable_testimonial_section']	= false;
	$defaults['testimonial_title']	   	 		= esc_html__( 'Happy Parents', 'kiducation' );
	$defaults['number_of_testimonial_items']	= 4;

	//Cta Section	
	$defaults['disable_cta_section']	   	= false;
	$defaults['background_cta_section']		= get_template_directory_uri() .'/assets/images/default-header.jpg';
	$defaults['cta_button_label']	   	 	= esc_html__( 'Purchase Now', 'kiducation' );
	$defaults['cta_button_url']	   	 		= '#';
	$defaults['cta_alt_button_label']	   	= esc_html__( 'Contact Us', 'kiducation' );
	$defaults['cta_alt_button_url']	   	 	= '#';
	$defaults['cta_content_type']			= 'cta_post';


	// Blog Section
	$defaults['disable_blog_section']		= false;
	$defaults['blog_title']	   	 			= esc_html__( 'Latest Post', 'kiducation' ); 
	$defaults['blog_number']				= 3;
	$defaults['number_of_blog_column']		= 3;


	//General Section
	$defaults['blog_readmore_text']				= esc_html__('Read More','kiducation');
	$defaults['excerpt_length']				= 40;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	


	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'kiducation' );

	// Pass through filter.
	$defaults = apply_filters( 'kiducation_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'kiducation_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function kiducation_get_option( $key ) {

		$default_options = kiducation_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;