<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package Everse
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'everse-blog-sidebar' ) ) {
	return;
}
?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">
	
	<?php everse_sidebar_before(); ?>

	<?php dynamic_sidebar( 'everse-blog-sidebar' ); ?>

	<?php everse_sidebar_after(); ?>

</div><!-- #secondary -->
