<?php
/**
* Blog page Features content
*
* @return void
* @since 1.0.0
*
* @package Suit Mag WordPress Theme
*/?>
<section class="gutenbiz-featured-news-section">
	<div class="gutenbiz-feature-news-wrapper">
		<?php 
			$featured_news = Gutenbiz_Mag_Theme::get_posts_by_type( gutenbiz_get( 'featured-type' ), gutenbiz_get( 'featured-cat' ), 5 );
			if( $featured_news ){
				foreach ( $featured_news as $key => $p ) {
					if( $key == 0 ){
						$class = esc_attr( 'fetured-three-post' );
					}else{
						$class = esc_attr( 'fetured-two-post' );
					}
					echo $key == 0 || $key == 3 ? "<div class='{$class}'>" : ''; ?>
					<div class="gutenbiz-feature-news-inner">
						<article style="background-image: url( '<?php echo esc_url( get_the_post_thumbnail_url( $p ) ); ?>') , url('<?php echo esc_url( Gutenbiz_Helper::get_theme_uri( 'assets/img/default-image.jpg' ) ); ?>' )">
								<div class="post-permalink">
									<a href="<?php echo esc_url( get_the_permalink( $p ) ); ?>"></a>
								</div>
								<div class="gutenbiz-feature-news-content">
									<div class="date-n-cat-wrapper">
										<?php

										Gutenbiz_Mag_Theme::the_date( $p );			

										Gutenbiz_Mag_Theme::the_category( $p );
										?>
									</div>

									<h2 class="gutenbiz-news-title">
										<a href="<?php the_permalink( $p ); ?>"><?php echo esc_html( get_the_title( $p ) );?></a>
									</h2>
									<p class="feature-news-content"><?php echo gutenbiz_mag_excerpt( gutenbiz_get( 'featured-excerpt-length' ), false, '...', $p ); ?></p>
								</div>
						</article>
					</div>
				<?php echo $key == 2 || $key == 5 ? '</div>' : '';
				}
			}
		?>
	</div>
</section>