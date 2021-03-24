<?php
/**
 * Template part for displaying Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vip_Business
 */

$vip_business_enable_testimonial = vip_business_gtm( 'vip_business_testimonial_visibility' );

if ( ! vip_business_display_section( $vip_business_enable_testimonial ) ) {
	return;
}

$image   = vip_business_gtm( 'vip_business_testimonial_bg_image' );
$overlay = vip_business_gtm( 'vip_business_testimonial_overlay' ) ? ' overlay-enabled' : '';
?>
<div id="testimonial-section" class="section testimonial-section dark-background <?php echo esc_attr( $overlay ); ?>" <?php echo $image ? 'style="background-image: url( ' .esc_url( $image ) . ' )"' : ''; ?>>
	<div class="section-testimonial testimonial-layout-1">
		<div class="container">
			<?php vip_business_section_title( 'testimonial' ); ?>

			<?php get_template_part( 'template-parts/testimonial/post-type' ); ?>
		</div><!-- .container -->
	</div><!-- .section-testimonial  -->
</div><!-- .section -->
