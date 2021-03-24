<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

if ( ! function_exists( 'sociable_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Sociable 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function sociable_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'sociable_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'sociable_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Sociable 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function sociable_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'sociable_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if introduction section is enabled.
 *
 * @since Sociable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function sociable_is_introduction_section_enable( $control ) {
	return ( $control->manager->get_setting( 'sociable_theme_options[introduction_section_enable]' )->value() );
}

/**
 * Check if clients section is enabled.
 *
 * @since Sociable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function sociable_is_clients_section_enable( $control ) {
	return ( $control->manager->get_setting( 'sociable_theme_options[clients_section_enable]' )->value() );
}

/**
 * Check if portfolio section is enabled.
 *
 * @since Sociable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function sociable_is_portfolio_section_enable( $control ) {
	return ( $control->manager->get_setting( 'sociable_theme_options[portfolio_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Sociable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function sociable_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'sociable_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Sociable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function sociable_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'sociable_theme_options[blog_content_type]' )->value();
	return sociable_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Sociable 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function sociable_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'sociable_theme_options[blog_content_type]' )->value();
	return sociable_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

function sociable_is_instagram_design_enable( $control ) {
	$home_layout = $control->manager->get_setting( 'sociable_theme_options[home_layout]' )->value();
	return in_array($home_layout,array('default-design','second-design'));
}

/**
 * Check if instagram section is enabled.
 *
 * @since Sociable Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function sociable_is_instagram_section_enable( $control ) {
	return ( $control->manager->get_setting( 'sociable_theme_options[instagram_section_enable]' )->value() );
}
