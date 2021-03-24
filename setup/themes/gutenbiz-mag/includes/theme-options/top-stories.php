<?php
if( !function_exists( 'gutenbiz_acb_top_stories' ) ):
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
	function gutenbiz_acb_top_stories( $control ){
		$value = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'top-stories-status' ) )->value();
		return $value;
	}
endif;

if( !function_exists( 'gutenbiz_acb_top_stories_type' ) ):
	/**
	* Active callback function of top stories type
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Gutenbiz Mag
	*/
	function gutenbiz_acb_top_stories_type( $control ){
		$top_story = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'top-stories-status' ) )->value();
		$type = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'top-stories-type' ) )->value();
		return $top_story && 'category' == $type;
	}
endif;

/**
* Header top stories
*
* @return void
* @since 1.0.0
*
* @package Gutenbiz Mag
*/
function gutenbiz_mag_top_stories_options(){
	Gutenbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'top-stories',
		    'title' => esc_html__( 'Top Stories', 'gutenbiz-mag' ),
		    'priority'    => 30,
		),
		'fields' => array(
			array(
				'id'	=> 'top-stories-status',
				'label' => esc_html__( 'Enable', 'gutenbiz-mag' ),
				'default' => true,
 				'type'  => 'toggle',
 				'priority'    => 0
			),
			array(
				'id'	=> 'top-stories-title',
				'label' => esc_html__( 'Title', 'gutenbiz-mag' ),
				'default' => esc_html__( 'Top Stories', 'gutenbiz-mag' ),
				'active_callback' => 'acb_top_stories',
 				'type'  => 'text',
			    'partial' =>	array(
			    	'selector'	=>	'span.top-stories'
				),
				'priority'    => 10
			),
			array(
				'id'	=> 'top-stories-no-post',
				'label' => esc_html__( 'Number Of Posts To Display', 'gutenbiz-mag' ),
				'default' => 4,
				'active_callback' => 'acb_top_stories',
 				'type'  => 'number',
 				'priority'    => 20
			),
			array(
				'id'	=> 'top-stories-type',
				'label' => esc_html__( 'Stories Type', 'gutenbiz-mag' ),
				'active_callback' => 'acb_top_stories',
				'type'    => 'buttonset',
				'default' => 'latest',
				'choices' => array(
				    'latest' 	=> esc_html__( 'Latest Post', 'gutenbiz-mag' ),
				    'category'	=> esc_html__( 'From Category', 'gutenbiz-mag' ),
				),
				'priority'    => 30
			),
			array(
				'id' => 'top-stories-cat',
				'label' => esc_html__( 'Select Category', 'gutenbiz-mag' ),
				'default' => 0,
				'active_callback' => 'acb_top_stories_type',
				'type' => 'category-dropdown',
				'priority'    => 40
			),
		)
	));
}
add_action( 'init', 'gutenbiz_mag_top_stories_options' );