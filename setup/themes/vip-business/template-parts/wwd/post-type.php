<?php
/**
 * Template part for displaying Post Types Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vip_Business
 */

$vip_business_wwd_args = vip_business_get_section_args( 'wwd' );

$vip_business_loop = new WP_Query( $vip_business_wwd_args );

if ( $vip_business_loop->have_posts() ) :
	?>
	<div class="wwd-block-list">
		<div class="row">
		<?php

		while ( $vip_business_loop->have_posts() ) :
			$vip_business_loop->the_post();

			$count = absint( $vip_business_loop->current_post );

			$icon  = vip_business_gtm( 'vip_business_wwd_custom_icon_' . $count );
			?>
			<div class="wwd-block-item post-type ff-grid-3">
				<div class="wwd-block-inner inner-block-shadow">
					<?php if ( $icon ) : ?>
					<a class="wwd-fonts-icon" href="<?php the_permalink(); ?>" >
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
					</a>
					<?php endif; ?>

					<div class="wwd-block-inner-content">
						<?php the_title( '<h3 class="wwd-item-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>'); ?>
							<span class="title-divider clear-fix"></span>
						<div class="wwd-block-item-excerpt">
							<?php the_excerpt(); ?>
						</div><!-- .wwd-block-item-excerpt -->
					</div><!-- .wwd-block-inner-content -->
				</div><!-- .wwd-block-inner -->
			</div><!-- .wwd-block-item -->
		<?php
		endwhile;
		?>
		</div><!-- .row -->
	</div><!-- .wwd-block-list -->
<?php
endif;

wp_reset_postdata();
