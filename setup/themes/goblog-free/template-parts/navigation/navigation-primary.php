<?php
/**
 * Displays primary1 navigation.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

?>
<nav id="primary1" class="primary1" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div id="container-primary1" class="container-primary1">

		<div id="box-menu" class="box-menu"> <!-- Box Menu -->

			<!-- Logo Nav Desktop -->
			<div class="logo-nav logo-nav-desktop">
				<?php the_custom_logo(); ?>
			</div>

			<!-- Toggle Burger -->
			<button id="toggle-burger-mobile" class="toggle-burger-mobile">
				<span class="screen-reader-text"><?php esc_html_e('burger', 'goblog-free'); ?></span>
				<i id="font-nav-bar" class="fas fa-bars"></i>
			</button>

			<!-- Menus -->
			<?php if ( has_nav_menu( 'goblog-free-primary' ) ) : 
				wp_nav_menu( 
					array(
						'container' => false,
						'theme_location' => 'goblog-free-primary',
					)
				);	
			endif; ?>

			<!-- Logo Nav Mobile -->
			<div class="logo-nav logo-nav-mobile">
				<?php the_custom_logo(); ?>
			</div>

			<!-- Toggle Search -->
			<button id="box-toggle-search" class="toggle-icon-search box-toggle-search">
				<span class="screen-reader-text"><?php esc_html_e('search', 'goblog-free'); ?></span>
				<i class="fas fa-search"></i>
			</button> 

		</div> <!-- End Box Menu -->

		<!-- Search Full for Mobile -->
		<div id="box-search-full" class="box-search-full">
			<div id="search-form" class="search-form">
				<?php get_search_form(); ?>
			</div>
			<button id="search-form-close" class="search-form-close">
				<span class="screen-reader-text"><?php esc_html_e('close', 'goblog-free'); ?></span>
				<i class="fas fa-times"></i>
			</button>
		</div>

	</div> <!-- End container-primary1 -->
</nav> <!-- End primary1 -->