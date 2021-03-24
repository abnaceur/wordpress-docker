<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Vip_Business
 */

if ( vip_business_gtm( 'vip_business_hero_content_page' ) ) {
	$vip_business_args = array(
		'page_id' => absint( vip_business_gtm( 'vip_business_hero_content_page' ) ),
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

	$subtitle      = vip_business_gtm( 'vip_business_hero_content_custom_subtitle' );
	?>

	<div id="hero-content-section" class="hero-content-section section content-position-right default">
		<div class="section-featured-page">
			<div class="container">
				<div class="row">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="ff-grid-6 featured-page-thumb">
						<?php the_post_thumbnail( 'vip-business-hero', array( 'class' => 'alignnone' ) );?>
					</div>
					<?php endif; ?>

					<!-- .ff-grid-6 -->
					<div class="ff-grid-6 featured-page-content">
						<div class="featured-page-section">
							<div class="section-title-wrap">
								<?php if ( $subtitle ) : ?>
								<p class="section-top-subtitle"><?php echo esc_html( $subtitle ); ?></p>
								<?php endif; ?>

								<?php the_title( '<h2 class="section-title">', '</h2>' ); ?>

								<span class="divider"></span>
							</div>

							<div class="featured-info">
								<?php the_excerpt(); ?>
							</div><!-- .featured-info -->
						</div><!-- .featured-page-section -->
					</div><!-- .ff-grid-6 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .section-featured-page -->
	</div><!-- .section -->
<?php
endwhile;

wp_reset_postdata();
