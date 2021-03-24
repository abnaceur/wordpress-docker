<?php
/**
 * Header One Style Template
 *
 * @package Vip_Business
 */
$vip_business_phone      = vip_business_gtm( 'vip_business_header_phone' );
$vip_business_email      = vip_business_gtm( 'vip_business_header_email' );
$vip_business_address    = vip_business_gtm( 'vip_business_header_address' );
$vip_business_open_hours = vip_business_gtm( 'vip_business_header_open_hours' );
?>

<div class="header-wrapper">
	<?php if ( $vip_business_phone || $vip_business_email || $vip_business_address || $vip_business_open_hours || has_nav_menu( 'social' ) ) : ?>
	<div id="top-header" class="main-top-header-two dark-top-header <?php echo esc_attr( vip_business_gtm( 'vip_business_header_top_color_scheme' ) ); ?>">
		<div class="site-top-header-mobile">
			<div class="container">
				<button id="header-top-toggle" class="header-top-toggle" aria-controls="header-top" aria-expanded="false">
					<i class="fas fa-bars"></i><span class="menu-label"> <?php esc_html_e( 'Top Bar', 'vip-business' ); ?></span>
				</button><!-- #header-top-toggle -->
				<div id="site-top-header-mobile-container">
					<?php if ( $vip_business_phone || $vip_business_email || $vip_business_address || $vip_business_open_hours || has_nav_menu( 'social' ) ) : ?>
						<div id="quick-contact">
							<?php get_template_part( 'template-parts/header/quick-contact' ); ?>
						</div>
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ): ?>
						<div id="top-social">
							<div class="social-nav no-border circle-icon">
								<nav id="social-primary-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'vip-business' ); ?>">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_class'     => 'social-links-menu',
											'depth'          => 1,
											'link_before'    => '<span class="screen-reader-text">',
										) );
									?>
								</nav><!-- .social-navigation -->
							</div>
						</div><!-- #top-social -->
					<?php endif; ?>
					<?php
						$vip_business_button_text   = vip_business_gtm( 'vip_business_header_button_text' );
						$vip_business_button_link   = vip_business_gtm( 'vip_business_header_button_link' );
						$vip_business_button_target = vip_business_gtm( 'vip_business_header_button_target' ) ? '_blank' : '_self';

						if ( $vip_business_button_text ) :
						?>
						<a target="<?php echo esc_attr( $vip_business_button_target );?>" href="<?php echo esc_url( $vip_business_button_link );?>" class="ff-button header-button"><?php echo esc_html( $vip_business_button_text );?></a>
					<?php endif; ?>
				</div><!-- #site-top-header-mobile-container-->
			</div><!-- .container -->
		</div><!-- .site-top-header-mobile -->
		<div class="site-top-header">
			<div class="container">

				<?php if ( $vip_business_phone || $vip_business_email || $vip_business_address || $vip_business_open_hours ) : ?>
				<div id="quick-contact" class="pull-left">
					<?php get_template_part( 'template-parts/header/quick-contact' ); ?>
				</div>
				<div class="top-head-right pull-right">
				<?php if ( has_nav_menu( 'social' ) ): ?>
				<div id="top-social" class="pull-left">
					<div class="social-nav no-border circle-icon">
						<nav id="social-primary-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'vip-business' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
								) );
							?>
						</nav><!-- .social-navigation -->
					</div>
				</div><!-- #top-social -->
				<?php endif; ?>
					<div class="head-search-cart-wrap pull-left">
						<?php if ( function_exists( 'vip_business_woocommerce_header_cart' ) ) : ?>
						<div class="cart-contents pull-left">
							<?php vip_business_woocommerce_header_cart(); ?>
						</div>
						<?php endif; ?>
						<div class="header-search pull-right">
							<?php get_template_part( 'template-parts/header/header-search' ); ?>
						</div><!-- .header-search -->
					</div><!-- .head-search-cart-wrap -->

					<?php endif; ?>
				</div>
			</div><!-- .container -->
		</div><!-- .site-top-header -->
	</div><!-- #top-header -->
	<?php endif; ?>

	<header id="masthead" class="site-header main-header-two clear-fix<?php echo vip_business_gtm( 'vip_business_header_sticky' ) ? ' sticky-enabled' : ''; ?>">
		<div class="container">
			<div class="site-header-main">
				<div class="site-branding">
					<?php get_template_part( 'template-parts/header/site-branding' ); ?>
				</div><!-- .site-branding -->

				<div class="right-head pull-right">
					<div id="main-nav" class="pull-left">
						<?php get_template_part( 'template-parts/navigation/navigation-primary' ); ?>
					</div><!-- .main-nav -->
		                <div class="right-head-info pull-right">
							<?php
								$vip_business_button_text   = vip_business_gtm( 'vip_business_header_button_text' );
								$vip_business_button_link   = vip_business_gtm( 'vip_business_header_button_link' );
								$vip_business_button_target = vip_business_gtm( 'vip_business_header_button_target' ) ? '_blank' : '_self';

								if ( $vip_business_button_text ) :
								?>
								<a target="<?php echo esc_attr( $vip_business_button_target );?>" href="<?php echo esc_url( $vip_business_button_link );?>" class="ff-button header-button  mobile-off pull-left"><?php echo esc_html( $vip_business_button_text );?></a>
								<?php endif; ?>
								<?php if ( $vip_business_phone ) : ?>
								<div class="mobile-off no-margin pull-left">
									<div class="contact-wrapper">
										<div class="contact-icon pull-left"><i class="fas fa-phone-alt"></i></div><!-- .contact-icon -->
										<div class="header-info">
											<span><?php esc_html_e( 'Call Us', 'vip-business' ); ?></span>
											<h5><a href="tel:<?php echo preg_replace( '/\s+/', '', esc_attr( $vip_business_phone ) ); ?>"><?php echo esc_html( $vip_business_phone ); ?></a></h5>
				                    	</div><!-- .header-info -->
					                </div><!-- .contact-wrapper -->
								</div><!-- .ff-grid-2 no-margin -->
								<?php endif; ?>
						</div><!-- .right-head -->
				</div>
			</div><!-- .site-header-main -->
		</div><!-- .container -->
	</header><!-- #masthead -->
</div><!-- .header-wrapper -->
