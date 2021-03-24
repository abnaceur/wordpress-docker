<?php
/**
 * Right Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area blog99-sidebar-sticky <?php echo esc_attr( blog99_sidebar_class() ); ?>">
	
	<?php blog99_sidebars_before(); ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php blog99_sidebars_after(); ?>
	
</aside><!-- #secondary -->