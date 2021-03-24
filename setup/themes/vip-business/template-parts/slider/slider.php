<?php
/**
 * Template part for displaying Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vip_Business
 */

$vip_business_enable_slider = vip_business_gtm( 'vip_business_slider_visibility' );

if ( ! vip_business_display_section( $vip_business_enable_slider ) ) {
	return;
}

$vip_business_classes[] = 'section';
$vip_business_classes[] = 'no-padding';

if ( vip_business_gtm( 'vip_business_slider_overlay' ) ) {
	$vip_business_classes[] = 'overlay-enabled';
}

$vip_business_classes[] = 'style-one';

if ( ! vip_business_gtm( 'vip_business_slider_zoom' ) ) {
	$vip_business_classes[] = 'zoom-disabled';
}
?>
<div id="slider-section" class="<?php echo esc_attr( implode( ' ', $vip_business_classes ) ) ; ?>">
	<div class="swiper-wrapper">
		<?php get_template_part( 'template-parts/slider/post', 'type' ); ?>
	</div><!-- .swiper-wrapper -->


	<div class="swiper-pagination"></div>
	<div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div><!-- .main-slider -->
