<?php
/**
 * blogshop Featured Layout One
 *
 * @package blogshop
 */

$get_featured_categories = get_theme_mod( 'featured_categories' );
$featured_categories = '';
if (!empty($get_featured_categories)) {
	$featured_categories = implode(',', $get_featured_categories);
}
$get_read_more_text = get_theme_mod( 'featured_read_more_text', __( 'Read More', 'blogshop' ) );
?>
<div class="featured-area">
	<div class="container">
		<div class="featured-main-slider owl-carousel">
			<?php
				$featuredblocks = new WP_Query(
					array(
						'post_type' => array( 'post' ),
						'posts_per_page'    => 4,
						'cat' => $featured_categories,
						'ignore_sticky_posts' => 1
					)
				);
				while ( $featuredblocks->have_posts() ) :
					$featuredblocks->the_post();
					$getalignment = get_theme_mod( 'featured_align', 'center' );
					?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'blogshop-featured-slider' ); ?>>
					<?php if (has_post_thumbnail()) :?>
					<div class="blogshop-featured-slider__thumnail">
						<?php the_post_thumbnail('blogshop-thumbnail-large');?>
					</div>
					<?php endif;
					$no_post_thumbnail_class = (has_post_thumbnail() ? '' : ' no-post-thumbnail');
					?>
					<div class="blogshop-featured-slider__entry-content-wrapper container<?php echo esc_attr( $no_post_thumbnail_class );?>">
						<div class="blogshop-featured-slider__entry-content text-<?php echo esc_attr( $getalignment );?>">
							<div class="blogshop-featured-slider__categories">
								<?php blogshop_categories(); ?>
							</div>
							<div class="blogshop-featured-slider__post-title">
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							</div>
							<div class="blogshop-featured-slider__blog-meta align-<?php echo esc_attr( $getalignment );?>">
								<?php blogshop_posted_by();?>
								<div><span class="fa fa-clock-o"></span><?php blogshop_posted_on(); ?></div>
							</div>
							<div class="blogshop-featured-slider__readmore">
								<a href="<?php the_permalink(); ?>"><?php echo esc_html($get_read_more_text); ?></a>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
