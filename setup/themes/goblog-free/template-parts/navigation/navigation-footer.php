<?php
/**
 * Displays footer navigation.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

?>
<div class="footer-menu">
	<?php 
	wp_nav_menu( 
		array(
			'container' => false,
			'depth'			 => 1,
			'theme_location' => 'goblog-free-footer',
		)
	);
	?> 
</div>