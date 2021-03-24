<?php

function craftyblog_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function craftyblog_featured_sm_slider_on_off() {
	if ( true == get_theme_mod( 'featured_slider_on_off' ) ) {
		return true;
	}
	return false;
}

function craftyblog_featured_lg_slider_on_off() {
	if ( true == get_theme_mod( 'large_post_on_off' ) ) {
		return true;
	}
	return false;
}

function craftyblog_sanitize_number_absint( $number, $setting ) {
	$number = absint( $number );
	return ( $number ? $number : $setting->default );
}
function craftyblog_is_blog() {
	return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() ) && 'post' == get_post_type();
}
