<?php
/**
 *
 * @package colon
 */


if ( ! is_active_sidebar( 'page-sidebar' ) ) :
	return;
endif;

?>

<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="https://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'page-sidebar' ); ?>
</aside><!-- #secondary -->

