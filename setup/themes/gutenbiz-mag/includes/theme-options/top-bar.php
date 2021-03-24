<?php
if( !function_exists( 'gutenbiz_acb_topbar' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Gutenbiz Mag
	*/
	function gutenbiz_acb_topbar( $control ){
		$value = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'mag-show-top-bar' ) )->value();
		return $value;
	}
endif;

/**
* Register Top bar Options
*
* @return void
* @since 1.0.0
*
* @package Gutenbiz Mag
*/
function gutenbiz_mag_topbar_options(){
	Gutenbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'top-bar',
		    'title' => esc_html__( 'Top Bar', 'gutenbiz-mag' ),
		    'priority'    => 0,
		),
		'fields' => array(
			array(
				'id'	=> 'mag-show-top-bar',
				'label' => esc_html__( 'Enable', 'gutenbiz-mag' ),
				'default' => true,
 				'type'    => 'toggle',
 				'priority'  => 0,
			),
			array(
				'id'	=> 'mag-topbar-bg-color',
				'label' => esc_html__( 'Background Color', 'gutenbiz-mag' ),
				'active_callback' => 'acb_topbar',
				'default' => '#141414',
 				'type'  => 'color-picker',
 				'priority'  => 90,
			),
			array(
				'id'	=> 'mag-topbar-text-color',
				'label' => esc_html__( 'Text Color', 'gutenbiz-mag' ),
				'active_callback' => 'acb_topbar',
				'default' => '#ffffff',
 				'type'  => 'color-picker',
 				'priority'  => 100,
			)
		)
	));
}
add_action( 'init', 'gutenbiz_mag_topbar_options' );