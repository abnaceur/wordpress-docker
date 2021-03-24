<?php 
/**
 * Add admin menu panel.
 *
 * @package Goblog Free
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

/**
 * Add theme page.
 */
function goblog_free_add_test_theme_page() {
    add_theme_page( 'goblog', 'Goblog Free', 'edit_theme_options', 'goblog', 'goblog_free_admin_menu_html' );
}
add_action( 'admin_menu', 'goblog_free_add_test_theme_page' );

/**
 * Add theme page HTML.
 */
function goblog_free_admin_menu_html() { 
	echo '<div class="wrap box">';
		get_template_part( 'template-parts/admin/header', 'top' );
		get_template_part( 'template-parts/admin/box', 'title' );
		get_template_part( 'template-parts/admin/box', 'tabs' );
	echo '</div>';
}