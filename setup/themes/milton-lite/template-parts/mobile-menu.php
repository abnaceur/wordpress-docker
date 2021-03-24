<span id="site-mobile-menu-toggle">
	<button class="site-toggle-anchor">
		<span class="site-toggle-icon site-toggle-icon-open is-visible dashicons dashicons-menu-alt3"></span>
		<span class="site-toggle-label site-toggle-label-open is-visible"><?php esc_html_e( 'Open Menu', 'milton-lite' ); ?></span>
		<span class="site-toggle-icon site-toggle-icon-close dashicons dashicons-menu-alt3"></span>
		<span class="site-toggle-label site-toggle-label-close"><?php esc_html_e( 'Close Menu', 'milton-lite' ); ?></span>
	</button><!-- .toggle-anchor -->
</span><!-- #site-mobile-menu-toggle -->

<div id="site-mobile-menu">

	<div class="menu-wrapper">

		<?php

		$mobile_menu_location = '';

		// If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
		if ( has_nav_menu( 'mobile' ) ) {
			$mobile_menu_location = 'mobile';
		} elseif ( has_nav_menu( 'primary' ) ) {
			$mobile_menu_location = 'primary';
		}
		?>

		<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile Menu', 'milton-lite' ); ?>" role="navigation">

			<ul class="mobile-menu-ul">

			<?php
			if ( $mobile_menu_location ) {

				wp_nav_menu(
					array(
						'container'			=> '',
						'items_wrap'		=> '%3$s',
						'show_toggles'		=> true,
						'theme_location'	=> $mobile_menu_location,
						'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>'
					)
				);

			} 
			?>

			</ul><!-- .mobile-menu-ul -->

		</nav><!-- .mobile-menu -->

	</div><!-- .menu-wrapper -->

</div><!-- #site-mobile-menu -->
