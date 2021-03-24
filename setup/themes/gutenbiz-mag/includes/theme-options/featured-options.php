<?php
if( !function_exists( 'gutenbiz_acb_enable_featured' ) ):
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
	function gutenbiz_acb_enable_featured( $control ){
		$value = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'enable-featured-news' ) )->value();
		return $value;
	}
endif;

if( !function_exists( 'gutenbiz_acb_enable_featured_cat' ) ):
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
	function gutenbiz_acb_enable_featured_cat( $control ){
		$top_story = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'enable-featured-news' ) )->value();
		$type = $control->manager->get_setting( Gutenbiz_Helper::with_prefix( 'featured-type' ) )->value();
		return $top_story && 'category' == $type;
	}
endif;


/**
* Blog page Features options
*
* @return void
* @since 1.0.0
*
* @package Gutenbiz Mag
*/
function gutenbiz_mag_featured_options(){
	Gutenbiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'featured-news',
		    'title' => esc_html__( 'Featured News', 'gutenbiz-mag' ),
		    'description' => esc_html__( 'This section will display five posts. First three posts are in silder.', 'gutenbiz-mag' ),
		    'priority'    => 40,
		),
		'fields' => array(
			array(
				'id'	=> 'enable-featured-news',
				'label' => esc_html__( 'Enable', 'gutenbiz-mag' ),
				'default' => true,
 				'type'  => 'toggle'
			),
			array(
			    'id'      => 'featured-excerpt-length',
			    'label'   => esc_html__( 'Excerpt Length', 'gutenbiz-mag' ),
			    'default' => 20,
			    'active_callback' => 'acb_enable_featured',
			    'type'    => 'number',
			),
			array(
				'id'	=> 'featured-type',
				'label' => esc_html__( 'Featured News Type', 'gutenbiz-mag' ),
				'active_callback' => 'acb_enable_featured',
				'type'    => 'buttonset',
				'default' => 'latest',
				'choices' => array(
				    'latest' 	=> esc_html__( 'Latest Post', 'gutenbiz-mag' ),
				    'category'	=> esc_html__( 'From Category', 'gutenbiz-mag' ),
				)
			),
			array(
				'id' => 'featured-cat',
				'label' => esc_html__( 'Select Category', 'gutenbiz-mag' ),
				'default' => 0,
				'active_callback' => 'acb_enable_featured_cat',
				'type' => 'category-dropdown'
			)
		)
	));
}
add_action( 'init', 'gutenbiz_mag_featured_options' );