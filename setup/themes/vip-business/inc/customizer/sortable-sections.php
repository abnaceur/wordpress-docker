<?php
/**
 * VIP Business Theme Customizer
 *
 * @package Vip_Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vip_business_sections( $wp_customize ) {
	$wp_customize->add_panel( 'vip_business_sections', array(
		'title'       => esc_html__( 'Sections', 'vip-business' ),
		'priority'    => 150,
	) );

	$sections = array (
		'slider'               => esc_html__( 'Slider', 'vip-business' ),
		'wwd'                  => esc_html__( 'What We Do', 'vip-business' ),
		'hero_content'         => esc_html__( 'Hero Content', 'vip-business' ),
		'featured_content'     => esc_html__( 'Featured Content', 'vip-business' ),
		'promotional_headline' => esc_html__( 'Promotion Headline', 'vip-business' ),
		'portfolio'            => esc_html__( 'Portfolio', 'vip-business' ),
		'team'                 => esc_html__( 'Team', 'vip-business' ),
		'testimonial'          => esc_html__( 'Testimonials', 'vip-business' ),
		'associate_logo'       => esc_html__( 'Associate Logo', 'vip-business' ),
	);

	foreach( $sections as $key => $value ){
		// Add sections.
		$wp_customize->add_section( 'vip_business_ss_' . $key,
			array(
				'title' => $value,
				'panel' => 'vip_business_sections'
			)
		);
	}
}
add_action( 'customize_register', 'vip_business_sections', 1 );
