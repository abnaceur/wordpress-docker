<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
?>
<?php if ( is_active_sidebar( 'goblog-free-sidebar1' )  ) : ?>
	<aside class="sidebar-default" itemscope itemtype="http://schema.org/WPSideBar">
		<div class="container-widgets">
			<?php dynamic_sidebar( 'goblog-free-sidebar1' ); ?>
		</div>
	</aside>
<?php endif; ?>  