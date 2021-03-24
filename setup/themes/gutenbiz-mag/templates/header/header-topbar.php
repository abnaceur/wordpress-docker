<?php
/**
 * Top bar for header
 *
 * @since 1.0.0
 *
 * @package Gutenbiz Mag
 */ ?>

 <div class="gutenbiz-topbar-wrapper">
 	<div class="container">
 		<div class="row">
	 		<div class="col-12 col-sm-6 time-wrapper">
			 	<time datetime="<?php echo esc_attr( date( DATE_W3C ) ); ?>"> <i class="fa fa-calendar"></i> <?php echo esc_html( date( get_option( 'date_format' ) ) ); ?></time>
			 	<div class="gutenbiz-digital-clock-wrapper"><i class="fa fa-clock-o"></i><div id="gutenbiz-digital-clock"></div></div>
			</div>
			<?php if( has_nav_menu( 'social-menu-topbar' ) ): ?>
				<div class="col-12 col-sm-6 gutenbiz-social-menu gutenbiz-topbar-socialmenu">
				 	<?php wp_nav_menu( array(
		 	        	'menu_id'		 => 'social-menu-topbar',
		 	            'theme_location' => 'social-menu-topbar',
		 	            'fallback_cb'    => false,
		 	            'echo'           => true,
		 	            'container'      => false,
		 	            'menu_class'	 => 'menu',
		 	            'depth'			 => 1,
		 	            'link_before'	 => '<span>',
		 	            'link_after'	 => '</span>',
		 	        ) ); ?>
				</div>
			<?php endif; ?>
		</div>
	 </div>
 </div>