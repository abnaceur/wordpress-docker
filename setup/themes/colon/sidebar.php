<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package colon
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) :
	return;
endif;

?>

<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="https://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
