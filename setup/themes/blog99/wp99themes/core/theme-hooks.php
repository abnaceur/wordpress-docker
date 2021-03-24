<?php
/**
 * Theme Hook Alliance hook stub list.
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */


/**
 * Define the version of THA support, in case that becomes useful down the road.
 */
define( 'BLOG99_HOOKS_VERSION', '1.0.0' );

/**
 * Themes and Plugins can check for blog99_hooks using current_theme_supports( 'blog99_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 * 		// Declare support for all hook types
 * 		add_theme_support( 'blog99_hooks', array( 'all' ) );
 *
 * 		// Declare support for certain hook types only
 * 		add_theme_support( 'blog99_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support( 'blog99_hooks', array(

	/**
	 * As a Theme developer, use the 'all' parameter, to declare support for all
	 * hook types.
	 * Please make sure you then actually reference all the hooks in this file,
	 * Plugin developers depend on it!
	 */
	'all',

	/**
	 * Themes can also choose to only support certain hook types.
	 * Please make sure you then actually reference all the hooks in this type
	 * family.
	 *
	 * When the 'all' parameter was set, specific hook types do not need to be
	 * added explicitly.
	 */
	'html',
	'body',
	'head',
	'header',
	'content',
	'entry',
	'comments',
	'sidebars',
	'sidebar',
	'footer',

	/**
	 * If/when WordPress Core implements similar methodology, Themes and Plugins
	 * will be able to check whether the version of THA supplied by the theme
	 * supports Core hooks.
	 */
	//'core',
) );

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 * 		if ( current_theme_supports( 'blog99_hooks', 'header' ) )
 * 	  		add_action( 'blog99_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool $bool true
 * @param array $args The hook type being checked
 * @param array $registered All registered hook types
 *
 * @return bool
 */
function blog99_current_theme_supports( $bool, $args, $registered ) {

	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}
add_filter( 'current_theme_supports-blog99_hooks', 'blog99_current_theme_supports', 10, 3 );


function blog99_header() {

	do_action( 'blog99_header' );
}

function blog99_site_branding() {
	do_action( 'blog99_site_branding' );
}

function blog99_menu() {
	do_action( 'blog99_menu' );
}

/**
 * Semantic <content> hooks
 *
 * $blog99_supports[] = 'content';
 */
function blog99_content_before() {
	do_action( 'blog99_content_before' );
}

function blog99_content_after() {
	do_action( 'blog99_content_after' );
}

function blog99_content_top() {
	do_action( 'blog99_content_top' );
}

function blog99_content_bottom() {
	do_action( 'blog99_content_bottom' );
}

function blog99_content_while_before() {
	do_action( 'blog99_content_while_before' );
}

function blog99_content_while_after() {
	do_action( 'blog99_content_while_after' );
}

function blog99_content_loop(){
	do_action('blog99_content_loop');
}

/**
 * Semantic <entry> hooks
 *
 * $blog99_supports[] = 'entry';
 */
function blog99_entry_before() {
	do_action( 'blog99_entry_before' );
}

function blog99_entry_after() {
	do_action( 'blog99_entry_after' );
}

function blog99_entry_content_before() {
	do_action( 'blog99_entry_content_before' );
}

function blog99_entry_content_after() {
	do_action( 'blog99_entry_content_after' );
}

function blog99_entry_top() {
	do_action( 'blog99_entry_top' );
}

function blog99_entry_bottom() {
	do_action( 'blog99_entry_bottom' );
}

/**
 * Comments block hooks
 *
 * $blog99_supports[] = 'comments';
 */
function blog99_comments_before() {
	do_action( 'blog99_comments_before' );
}

function blog99_comments_after() {
	do_action( 'blog99_comments_after' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $blog99_supports[] = 'sidebar';
 */
function blog99_sidebars_before() {
	do_action( 'blog99_sidebars_before' );
}

function blog99_sidebars_after() {
	do_action( 'blog99_sidebars_after' );
}



/**
 * Semantic <footer> hooks
 *
 * $blog99_supports[] = 'footer';
 */
function blog99_footer_before() {
	do_action( 'blog99_footer_before' );
}

function blog99_footer() {
	do_action( 'blog99_footer' );
}

function blog99_footer_widgets() {
	do_action( 'blog99_footer_widgets' );
}

function blog99_footer_copyright() {
	do_action( 'blog99_footer_copyright' );
}

function blog99_footer_after() {
	do_action( 'blog99_footer_after' );
}

/**
 * Archive header
 */
function blog99_archive_header() {

	do_action( 'blog99_archive_header' );

}

/**
 * 404 Page content template action.
 */
function blog99_404_content_template() {

	do_action( 'blog99_404_content_template' );
	
}

/**
 * Conten Page Loop.
 *
 * Called from page.php
 */
function blog99_content_page_loop() {
	do_action( 'blog99_content_page_loop' );
}

/**
 * Homepage Blog Before main
 */
function blog99_before_mainsec() {
	do_action( 'blog99_before_mainsec' );
}

/**
 * Homepage Blog After main
 */
function blog99_after_mainsec() {
	do_action( 'blog99_after_mainsec' );
}

/**
 * Homepage Slider
 */
function blog99_main_slider() {
	do_action( 'blog99_main_slider' );
}

/**
 * Homepage blog99_homepage_featured
 */
function blog99_homepage_featured() {
	do_action( 'blog99_homepage_featured' );
}


/**
 * Homepage 
 */
function blog99_post_format_icon() {
	do_action( 'blog99_post_format_icon' );
}

/**
 * Homepage category postlist
 */
function blog99_home_category_postlist(){
	do_action('blog99_home_category_postlist');
}

/**
 * Homepage category postlist
 */
function blog99_breadcrumb_trail(){
	do_action('blog99_breadcrumb_trail');
}
