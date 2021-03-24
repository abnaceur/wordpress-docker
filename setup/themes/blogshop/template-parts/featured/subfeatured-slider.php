<?php
/**
 * blogshop Popular Post Section
 *
 * @package blogshop
 */
$get_featured_categories = get_theme_mod( 'sub_featured_categories' );
$featured_categories = '';
if (!empty($get_featured_categories)) {
	$featured_categories = implode(',', $get_featured_categories);
}
$getpostcount = get_theme_mod( 'sub_featured_post_per_page', 3 );
$post_args = array(
	'posts_per_page' => $getpostcount,
	'post_type'      => 'post',
	'cat' => $featured_categories,
	'order'          => 'DESC',
	'ignore_sticky_posts' => 1,
);
$postquery = new WP_Query( $post_args );
if ($postquery->have_posts()):
?>
<div class="blogshop_popular_post_area">
	<div class="container">
		<div class="active-subfeatured-slider owl-carousel">
			<?php		
			while ( $postquery->have_posts() ) :
					$postquery->the_post();
					$no_post_thumbnail_class = (has_post_thumbnail() ? '' : ' no-post-thumbnail');
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'blogshop-standard-post subfeatured-slider-wrapper' ); ?>>
					<div class="blogshop-standard-post__entry-content text-center">
						<div class="blogshop-standard-post__post-title subfeatured-title<?php echo esc_attr( $no_post_thumbnail_class );?>">
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						</div>
						<?php
							get_template_part( 'template-parts/content/post-header/header', 'standard' );
						?>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php endif; ?>