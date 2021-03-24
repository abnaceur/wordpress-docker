<?php
/**
 * WooCommerce theme hooks
 *
 * @package Everse
 */

/**
 * Layout
 */

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
add_action( 'woocommerce_before_main_content', 'everse_shop_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'everse_shop_after_content', 9 );
add_action( 'everse_shop_sidebar', 'everse_shop_get_sidebar', 10 );


/**
 * Widgets
 */
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'everse_shop_tag_cloud_widget' );


/**
 * Breadcrumbs
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'everse_shop_breadcrumbs', 'woocommerce_breadcrumb', 10 );
add_action( 'woocommerce_single_product_summary', 'everse_shop_breadcrumbs', 4 );
add_filter( 'woocommerce_breadcrumb_defaults', 'everse_shop_breadcrumb_delimiter' );


/**
 * Page Title
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );



if ( ! function_exists( 'everse_shop_before_content' ) ) {
	/**
	* Archives layout before
	*/
	function everse_shop_before_content() {
		?>
			<?php everse_shop_page_title(); ?>

			<div class="shop-section main-content-shop">
				<div class="container">

					<div class="row">
	
						<div class="shop-content content col-lg">
		<?php
	}
}


if ( ! function_exists( 'everse_shop_after_content' ) ) {
	/**
	* Archives layout after
	*/
	function everse_shop_after_content() {
		?>
						</div> <!-- .col -->
		
						<?php if ( 'fullwidth' !== everse_layout_type( 'shop', 'fullwidth' ) && ! is_product() ) {
							do_action( 'everse_shop_sidebar' );
						} ?>

					</div> <!-- .row -->
				</div> <!-- . in-content -->
		<?php
	}
}


if ( ! function_exists( 'everse_shop_page_title' ) ) {
	/**
	* Shop page title
	*/
	function everse_shop_page_title() {
		
		if ( is_woocommerce() && ! is_product() ) {
			get_template_part( 'template-parts/page-title/page-title-shop' );
		}

	}
}



if ( ! function_exists( 'everse_shop_get_sidebar' ) ) {
	/**
	 * Display shop sidebar
	 *
	 * @uses everse_sidebar()
	 * @since 1.0.0
	 */
	function everse_shop_get_sidebar() {
		if ( is_active_sidebar( 'everse-shop-sidebar' ) ) {
			everse_sidebar( 'everse-shop-sidebar' );
		}
	}
}


if ( ! function_exists( 'everse_shop_breadcrumbs' ) ) {
	/**
	* WooCommerce breadcrumbs
	*/
	function everse_shop_breadcrumbs() {
		if ( ! get_theme_mod( 'everse_settings_shop_breadcrumbs_show', true ) ) {
			return;
		}
		woocommerce_breadcrumb();
	}
}


if ( ! function_exists( 'everse_shop_breadcrumb_delimiter' ) ) {
	/**
	* Change the breadcrumb separator
	*/
	function everse_shop_breadcrumb_delimiter( $defaults ) {
		$defaults['delimiter'] = ( is_rtl() ) ? '<i class="everse-icon-chevron-left woocommerce-breadcrumb__separator"></i>' : '<i class="everse-icon-chevron-right woocommerce-breadcrumb__separator"></i>';
		return $defaults;
	}
}


if ( ! function_exists( 'everse_shop_tag_cloud_widget' ) ) {
	/**
	* Tag cloud font size
	*/
	function everse_shop_tag_cloud_widget( $args ) {
		$args = array(
			'smallest' => 10, 
			'largest' => 10,
			'taxonomy' => 'product_tag'
		);
		return $args;
	}
}