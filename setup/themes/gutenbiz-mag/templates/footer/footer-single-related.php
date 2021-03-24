<?php
/**
 * Templates to add related posts on single page
 *
 * @since 1.0.0
 *
 * @package Gutenbiz Mag
 */
$related = get_query_var('single_related_posts');
if( $related ): ?>
	<div class="gutenbiz-related-post">
		<div class="container">
			<h2><?php esc_html_e( 'You may also like', 'gutenbiz-mag' );?></h2>
			<div class="row">
				<?php foreach ( $related as $r ):?>
					<div class="col-12 col-md-3">
						<div class="gutenbiz-related-post-content">
							<a href="<?php echo esc_url( get_permalink( $r->ID ) ); ?>">
								<?php if( has_post_thumbnail( $r->ID ) ): ?>
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( $r->ID, 'full' ) ); ?>">
								<?php else: ?>
									<img src="<?php 
									echo esc_url( Gutenbiz_Helper::get_theme_uri( 'assets/img/default-image.jpg' ) ); ?>">
								<?php endif; ?>			
								<div class="gutenbiz-related-post-text">
									<h3><?php echo esc_html( $r->post_title ); ?></h3>
									<p><?php echo gutenbiz_mag_excerpt( gutenbiz_get( 'excerpt_length' ), false, '...', $r->ID ); ?></p>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>