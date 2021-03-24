<?php
/**
 * Colon Theme Customizer Helper Functions
 *
 * @package colon
 */


/**
* Render callback for site title
* 
* @return void
*/
function colon_site_title_callback() {
    bloginfo( 'name' );
}

/**
* Render callback for site description
* 
* @return void
*/
function colon_site_description_callback() {
    bloginfo( 'description' );
}

/**
 * Check if the page title enable or not
 */
function colon_page_title_enable( $control ) {
	if ( $control->manager->get_setting( 'colon_enable_page_title' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}

/**
 * Check if the page sidebar enable or not
 */
function colon_page_sidebar_enable( $control ) {
	if ( $control->manager->get_setting( 'colon_enable_page_sidebar' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}

/**
 * Check if the page title enable & breadcrumbs enable or not
 */
function colon_page_title_breadcrumbs_enable( $control ) {
	if ( $control->manager->get_setting( 'colon_enable_page_title' )->value() == true && $control->manager->get_setting( 'colon_enable_page_breadcrumbs' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}

/**
 * Check if the page title enable & bg enable or not
 */
function colon_page_title_and_bg_enable( $control ) {
	if ( $control->manager->get_setting( 'colon_enable_page_title' )->value() == true && $control->manager->get_setting( 'colon_enable_page_title_bg' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}

/**
 * Check if the menu button enable or not
 */
function colon_header_menu_button_enable( $control ) {
	if ( $control->manager->get_setting( 'colon_enable_header_menu_last_button' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}


/**
 * Check if the header transparent enable or not
 */
function colon_header_transparent_enable( $control ) {
	if ( $control->manager->get_setting( 'colon_enable_header_transparent' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}


/**
 * Check if the header transparent enable & page title disable
 */
function colon_header_transparent_enable_page_title_disable( $control ) {
	if ( $control->manager->get_setting( 'colon_enable_header_transparent' )->value() == true && $control->manager->get_setting( 'colon_enable_page_title' )->value() == false  ) :
		return true;
	else :
		return false;
	endif;
}
