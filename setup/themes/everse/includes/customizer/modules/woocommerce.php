<?php
/**
 * WooCommerce
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* WooCommerce
/*-------------------------------------------------------*/

Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'woocommerce_product_catalog',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Display Product Elements', 'everse' ) . '</h3>',
) );

// Show product Sale badge
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_woocommerce_product_sale_badge_show',
	'label'       => esc_html__( 'Show sale badge', 'everse' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_woocommerce_product_title_show',
	'label'       => esc_html__( 'Show title', 'everse' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product rating
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_woocommerce_product_rating_show',
	'label'       => esc_html__( 'Show rating', 'everse' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product price
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_woocommerce_product_price_show',
	'label'       => esc_html__( 'Show price', 'everse' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Add To Cart button
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_woocommerce_product_catalog_button_show',
	'label'       => esc_html__( 'Show add to cart button', 'everse' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );