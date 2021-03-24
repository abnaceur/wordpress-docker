<?php
/**
 * 
 * @package colon
 */


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extra classes for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Upgrade Pro
 */
require get_template_directory() . '/colon-pro/class-customize.php';


/**
 * Load Hooks
 */
require get_template_directory() . '/inc/hooks/template-hooks.php';
require get_template_directory() . '/inc/hooks/breadcrumb.php';
require get_template_directory() . '/inc/hooks/header.php';
require get_template_directory() . '/inc/hooks/footer.php';
require get_template_directory() . '/inc/hooks/page.php';