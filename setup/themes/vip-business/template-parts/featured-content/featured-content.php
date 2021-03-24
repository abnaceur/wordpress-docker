<?php
/**
 * Template part for displaying Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vip_Business
 */

$vip_business_enable = vip_business_gtm( 'vip_business_featured_content_visibility' );

if ( ! vip_business_display_section( $vip_business_enable ) ) {
	return;
}
?>
<div id="featured-content-section" class="section style-one">
	<div class="section-latest-posts">
		<div class="container">
			<?php vip_business_section_title( 'featured_content' ); ?>

			<?php get_template_part( 'template-parts/featured-content/post-type' ); ?>

			<?php
			$vip_business_button_text   = vip_business_gtm( 'vip_business_featured_content_button_text' );
			$vip_business_button_link   = vip_business_gtm( 'vip_business_featured_content_button_link' );
			$vip_business_button_target = vip_business_gtm( 'vip_business_featured_content_button_target' ) ? '_blank' : '_self';

			if ( $vip_business_button_text ) : ?>
				<div class="more-wrapper clear-fix">
					<a href="<?php echo esc_url($vip_business_button_link); ?>" class="ff-button" target="<?php echo esc_attr($vip_business_button_target); ?>"><?php echo esc_html($vip_business_button_text); ?></a>
				</div><!-- .more-wrapper -->
			<?php endif; ?>
			</div><!-- .container -->
		</div><!-- .latest-posts-section -->
	</div><!-- .section-latest-posts -->

