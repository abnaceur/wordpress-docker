<?php
/**
 * Sanitization Functions
 * 
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
 
function blog99_sanitize_checkbox( $checked ){

    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function blog99_sanitize_select( $input, $setting ){
	
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options 
	$choices = $setting->manager->get_control( $setting->id )->choices;
						
	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
		
}


function blog99_sanitize_multiple_check( $value ) {  

    $value = ( ! is_array( $value ) ) ? explode( ',', $value ) : $value;

    return ( ! empty( $value ) ) ? array_map( 'sanitize_text_field', $value ) : array();    
}

function blog99_sanitize_radio( $input, $setting ){

    $input = sanitize_key($input);

    $choices = $setting->manager->get_control( $setting->id )->choices;

    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
     
}

function get_blog99_google_font_list(){

    return array(
		'Arizonia' => 'Arizonia',
		'Dancing Script' => 'Dancing Script',
		'Satisfy' => 'Satisfy',
		'Lovers Quarrel' => 'Lovers Quarrel',
		'DevonShire' => 'DevonShire',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
}

function blog99_sanitize_fonts( $input ) {
	
	if ( array_key_exists( $input, get_blog99_google_font_list() ) ) {

		return $input;

	} else {

		return '';
	}
}

function blog99_intval( $input ) {
	
	if( intval($input)){

        return $input;

    }else{
    	
        return "";
    }
}
