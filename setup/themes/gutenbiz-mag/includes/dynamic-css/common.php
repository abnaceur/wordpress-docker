<?php
  /**
  * Register dynamic css
  *
  * @since 1.0.0
  *
  * @package Gutenbiz Mag

  */
function gutenbiz_mag_common_css(){
 	$style = array(
 		array(
 			'selector' => '.site-branding .site-title a, .site-branding .site-description',
 			'props' => array(
 				'color' => array(
 					'customizer' => false,
 					'value'		=> '#' . get_theme_mod( 'header_textcolor' ,'ffffff' ),
 					'unit' => ''
 				)
 			)
 		),
 		array(
 			'selector' => Gutenbiz_Helper::with_prefix_selector( '%s-bottom-header-wrapper:after'),
 			'props' => array(
 				'background-color' => 'header-bg-overlay'
 			)
 		),
 		array(
 			'selector' => Gutenbiz_Helper::with_prefix_selector( '%s-topbar-wrapper' ),
 			'props' => array(
 				'background-color' => 'mag-topbar-bg-color',
 				'color' => 'mag-topbar-text-color',
 			)
 		),
 		array(
 			'selector' => Gutenbiz_Helper::with_prefix_selector( '%s-main-menu-wrapper'),
 			'props' => array(
 				'background' => 'header-menu-bg-color'
 			)
 		),
 	);

 	Gutenbiz_Css::add_styles( $style, 'md' );
 }
 add_action( 'init', 'gutenbiz_mag_common_css' );