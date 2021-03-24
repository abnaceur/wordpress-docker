<?php
/**
 * WooCommerce Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 * WooCommerce cart
 */
if ( ! function_exists( 'everse_woo_cart_icon' ) ) {
	function everse_woo_cart_icon() {

		if ( ! everse_is_woocommerce_activated() ) {
			return;
		}

		$count = WC()->cart->get_cart_contents_count();
		?>

		<div class="everse-menu-cart woocommerce">
			<a class="everse-menu-cart__url cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr__( 'View my shopping cart', 'everse' ); ?>">
				<span class="everse-menu-cart__icon-holder">
					<i class="everse-icon-cart everse-menu-cart__icon"></i>
					<?php if ( 0 < $count ) : ?>
						<span class="everse-menu-cart__count"><?php echo esc_html( $count ); ?></span>
					<?php endif; ?>
				</span>
			</a>

			<?php if ( 0 < $count ) {
				echo '<div class="everse-menu-cart__dropdown">';
					woocommerce_mini_cart();
				echo '</div>';
			} ?>
		</div>
		<?php

	}
}

/**
 * WooCommerce Ajax cart contents update
 */
function everse_woo_cart_ajax_count( $fragments ) {
	if ( ! everse_is_woocommerce_activated() ) {
		return;
	}

	ob_start();
	everse_woo_cart_icon();
	$fragments['.everse-menu-cart'] = ob_get_clean();
	return $fragments;

}
add_filter( 'woocommerce_add_to_cart_fragments', 'everse_woo_cart_ajax_count' );
