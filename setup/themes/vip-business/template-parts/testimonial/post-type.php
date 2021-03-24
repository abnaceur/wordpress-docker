<?php
/**
 * Template part for displaying Post Types Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vip_Business
 */

$vip_business_args = vip_business_get_section_args( 'testimonial' );
$vip_business_loop = new WP_Query( $vip_business_args );

if ( $vip_business_loop->have_posts() ) :

	?>
	<div class="testimonial-content-wrapper swiper-carousel-enabled">
		<div class="swiper-wrapper">
		<?php

		while ( $vip_business_loop->have_posts() ) :
			$vip_business_loop->the_post();
			?>
			<div class="testimonial-item swiper-slide">
				<div class="testimonial-wrapper clear-fix">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="testimonial-thumb">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'pull-left' ) ); ?>
						</a>
					</div>
					<?php endif; ?>
					<div class="testimonial-summary">
						<div class="clinet-info">
							<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>'); ?>
						</div>
						<!-- .clinet-info -->
						<?php the_excerpt(); ?>
					</div>
				</div><!-- .testimonial-wrapper -->
			</div><!-- .testimonial-item -->
		<?php
		endwhile;
		?>
		</div><!-- .swiper-wrapper -->

		<div class="swiper-pagination"></div>
		
		<div class="swiper-button-prev"></div>
	    <div class="swiper-button-next"></div>
	</div><!-- .testimonial-content-wrapper -->
<?php
endif;

wp_reset_postdata();
