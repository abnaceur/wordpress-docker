<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Vip_Business
 */

if ( vip_business_gtm( 'vip_business_promotional_headline_page' ) ) {
	$vip_business_args = array(
		'page_id' => absint( vip_business_gtm( 'vip_business_promotional_headline_page' ) ),
	);
} 

// If $vip_business_args is empty return false
if ( empty( $vip_business_args ) ) {
	return;
}

$vip_business_args['posts_per_page'] = 1;

$vip_business_loop = new WP_Query( $vip_business_args );

while ( $vip_business_loop->have_posts() ) :
	$vip_business_loop->the_post();
	$overlay  = vip_business_gtm( 'vip_business_promotional_headline_overlay' ) ? ' overlay-enabled' : '';
	?>

	<div id="promotional-headline-section" class="section promotional-headline-section text-aligncenter<?php echo esc_attr( $overlay ); ?>" <?php echo has_post_thumbnail() ? 'style="background-image: url( ' .esc_url( get_the_post_thumbnail_url() ) . ' )"' : ''; ?>>
	<div class="promotion-inner-wrapper section-promotion">
		<div class="container">
			<div class="promotion-content">
				<div class="promotion-description">
					<?php the_title( '<h2>', '</h2>' ); ?>

					<?php the_excerpt(); ?>
				</div><!-- .promotion-description -->
			</div><!-- .promotion-content -->
		</div><!-- .container -->
	</div><!-- .promotion-inner-wrapper" -->
</div><!-- .section -->
<?php
endwhile;

wp_reset_postdata();
