<?php
/**
 * Core file.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

/**
 * Include options function.
 */
require get_template_directory() . '/inc/options.php';


// Load customizer defaults values
require get_template_directory() . '/inc/customizer/defaults.php';


/**
 * Merge values from default options array and values from customizer
 *
 * @return array Values returned from customizer
 * @since Sociable 1.0.0
 */
function sociable_get_theme_options() {
  $sociable_default_options = sociable_get_default_theme_options();

  return array_merge( $sociable_default_options , get_theme_mod( 'sociable_theme_options', $sociable_default_options ) ) ;
}

/**
 * Load admin custom styles
 * 
 */
function sociable_load_admin_style() {
    wp_register_style( 'sociable_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'sociable_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'sociable_load_admin_style' );

/**
 * Add breadcrumb functions.
 */
require get_template_directory() . '/inc/breadcrumb-class.php';

/**
 * Add helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Add structural hooks.
 */
require get_template_directory() . '/inc/structure.php';

/**
 * Add metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/sections/sections.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

if ( class_exists( 'OCDI_Plugin' ) ) {
    /**
    * OCDI plugin demo importer compatibility.
    */
    require get_template_directory() . '/inc/demo-import.php';
}