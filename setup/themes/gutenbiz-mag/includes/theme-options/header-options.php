<?php
if( !function_exists( 'gutenbiz_acb_ads_link' ) ):
	/**
	* Active callback function of top stories post
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Gutenbiz Mag
	*/
	function gutenbiz_acb_ads_link( $control ){
		$value = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'header-advertisement-image' ) )->value();
		return '' == $value ? false : true;
	}
endif;
/**
* Register Header Options
*
* @return void
* @since 1.0.0
*
* @package Gutenbiz Mag
*/
function gutenbiz_mag_header_options(){
	Gutenbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'header',
		    'title' => esc_html__( 'Header Options', 'gutenbiz-mag' ),
		    'priority'    => 10,
		),
		'fields' => array(
			array(
				'id'	=> 'header-bg-image',
				'label' => esc_html__( 'Background Image', 'gutenbiz-mag' ),
 				'type'  => 'image',
 				'priority'    => 10
			),
			array(
				'id'	=> 'header-bg-overlay',
				'label' => esc_html__( 'Background Overlay', 'gutenbiz-mag' ),
				'default' => 'rgba(0, 0, 0, 0.85)',
 				'type'  => 'color-picker',
 				'priority'    => 20
			),
			array(
				'id'	=> 'header-menu-bg-color',
				'label' => esc_html__( 'Menu Background Color', 'gutenbiz-mag' ),
				'default' => '#141414',
 				'type'  => 'color-picker',
 				'priority'    => 30
			),
			array(
				'id'	=> 'header-advertisement-image',
				'description' => esc_html__( 'Recommended image size 1400*150', 'gutenbiz-mag' ),
				'label' => esc_html__( 'Advertisement Image', 'gutenbiz-mag' ),
 				'type'  => 'image',
 				'priority'    => 80
			),
			array(
				'id' => 'header-advertisement-url',
				'label' => esc_html__( 'Advertisement Image Link', 'gutenbiz-mag' ),
				'active_callback' => 'acb_ads_link',
				'default' => '#',
				'type' => 'url',
				'priority'    => 40
			)
		)
	));
}
add_action( 'init', 'gutenbiz_mag_header_options' );