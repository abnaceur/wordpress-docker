<?php
/**
 *
 * @package colon
 */


if ( ! is_active_sidebar( 'woosidebar' ) ) :
	return;
endif;

?>

<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="https://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'woosidebar' ); ?>
</aside><!-- #secondary -->

