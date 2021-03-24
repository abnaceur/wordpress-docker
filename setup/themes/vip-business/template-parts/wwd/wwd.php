<?php
/**
 * Template part for displaying Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vip_Business
 */

$vip_business_enable_wwd = vip_business_gtm( 'vip_business_wwd_visibility' );

if ( ! vip_business_display_section( $vip_business_enable_wwd ) ) {
	return;
}
?>
<div id="wwd-section" class="section style-one">
	<div class="section-wwd">
		<div class="container">
			<?php vip_business_section_title( 'wwd' ); ?>

			<?php get_template_part( 'template-parts/wwd/post-type' ); ?>
		</div><!-- .container -->
	</div><!-- .section-wwd  -->
</div><!-- .section -->
