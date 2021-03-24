<?php
/**
 * blog99 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * 
 */
/**
 * Define Constants
 * @since 1.0.0
 */
define( 'BLOG99_THEME_VERSION', '1.0.0' );
define( 'BLOG99_THEME_IMG', trailingslashit ( get_template_directory_uri() ). 'assets/images/' );

/**
 * require class file
 * @since 1.0.0
 */
require_once trailingslashit ( get_template_directory() ) . 'wp99themes/core/class-blog99-after-setup-theme.php';
require_once trailingslashit ( get_template_directory() ) . 'wp99themes/core/class-register-widget.php';
require_once trailingslashit ( get_template_directory() ) . 'wp99themes/core/theme-hooks.php';
require_once trailingslashit ( get_template_directory() ) . 'wp99themes/core/extras.php';
require_once trailingslashit ( get_template_directory() ) . 'wp99themes/core/class-blog99-loop.php';
require_once trailingslashit ( get_template_directory() ) . 'wp99themes/core/common-functions.php';

/**
 * Default Require File
 * @since 1.0.0
*/
require trailingslashit ( get_template_directory() ) . 'wp99themes/inc/custom-header.php';
require trailingslashit ( get_template_directory() ) . 'wp99themes/inc/template-tags.php';
require trailingslashit ( get_template_directory() ) . 'wp99themes/inc/template-functions.php';
require trailingslashit ( get_template_directory() ) . 'wp99themes/inc/customizer.php';

require_once trailingslashit ( get_template_directory() ) . 'wp99themes/core/class-blog99-enqueue-scripts.php';

if ( defined( 'JETPACK__VERSION' ) ) {

	require trailingslashit ( get_template_directory() ) . 'wp99themes/inc/jetpack.php';
}

if ( class_exists( 'WooCommerce' ) ) {

	require trailingslashit ( get_template_directory() ) . 'wp99themes/inc/woocommerce.php';
}


/**
 * Customizer Settings
 * @since 1.0.0
 */
require trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/custom-controls/custom-control.php';
require trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/customizer.php';

/**
 * Hoempage Custom Widget
 * @since 1.0.0
 */
require trailingslashit ( get_template_directory() ) . 'wp99themes/widgets/blog99-sidebar-list.php';
require trailingslashit ( get_template_directory() ) . 'wp99themes/widgets/blog99-sidebar-follow-us.php';
require trailingslashit ( get_template_directory() ) . 'wp99themes/widgets/blog99-sidebar-author.php';
require trailingslashit ( get_template_directory() ) . 'wp99themes/widgets/blog99-footer-contact-info.php';

/**
 * MetaBox Section
 * @since 1.0.0
 */
require trailingslashit ( get_template_directory() ) . 'wp99themes/meta-box/blog99-post-metabox.php';

/**
 * Getting Started Notification.
 */
// require get_template_directory() . '/wp99themes/getting-started/getting-started.php';

/**
 * Load Admin Welcome Screen
 */
if ( is_admin() ) {
	require get_template_directory() . '/wp99themes/welcome-screen/welcome.php';

	/**
	 * Demo Import.
	*/
	require get_template_directory() . '/wp99themes/welcome-screen/importer.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		
		do_action( 'wp_body_open' );
	}
}