<?php
/**
 * Header Search
 *
 * @package Vip_Business
 */

$vip_business_phone      = vip_business_gtm( 'vip_business_header_phone' );
$vip_business_email      = vip_business_gtm( 'vip_business_header_email' );
$vip_business_address    = vip_business_gtm( 'vip_business_header_address' );
$vip_business_open_hours = vip_business_gtm( 'vip_business_header_open_hours' );

if ( $vip_business_phone || $vip_business_email || $vip_business_address || $vip_business_open_hours ) : ?>
	<div class="inner-quick-contact">
		<ul>
			<?php if ( $vip_business_phone ) : ?>
				<li class="quick-call">
					<span><?php esc_html_e( 'Phone', 'vip-business' ); ?></span><a href="tel:<?php echo preg_replace( '/\s+/', '', esc_attr( $vip_business_phone ) ); ?>"><?php echo esc_html( $vip_business_phone ); ?></a> </li>
			<?php endif; ?>

			<?php if ( $vip_business_email ) : ?>
				<li class="quick-email"><span><?php esc_html_e( 'Email', 'vip-business' ); ?></span><a href="<?php echo esc_url( 'mailto:' . esc_attr( antispambot( $vip_business_email ) ) ); ?>"><?php echo esc_html( antispambot( $vip_business_email ) ); ?></a> </li>
			<?php endif; ?>

			<?php if ( $vip_business_address ) : ?>
				<li class="quick-address"><span><?php esc_html_e( 'Address', 'vip-business' ); ?></span><?php echo esc_html( $vip_business_address ); ?></li>
			<?php endif; ?>

			<?php if ( $vip_business_open_hours ) : ?>
				<li class="quick-open-hours"><span><?php esc_html_e( 'Open Hours', 'vip-business' ); ?></span><?php echo esc_html( $vip_business_open_hours ); ?></li>
			<?php endif; ?>
		</ul>
	</div><!-- .inner-quick-contact -->
<?php endif; ?>

