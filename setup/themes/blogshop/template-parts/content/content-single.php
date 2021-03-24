<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogshop
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blogshop-standard-post' ); ?>>
	<div class="blogshop-standard-post__entry-content text-center">
		<div class="blogshop-standard-post__categories">
			<?php blogshop_categories(); ?>
		</div>
		<div class="blogshop-standard-post__post-title">
			<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
		</div>
		<?php get_template_part( 'template-parts/content/post-header/header', 'standard' );?>
		<div class="blogshop-standard-post__blog-meta align-center">
			<?php blogshop_posted_by(false); ?>
		</div>
		<div class="blogshop-standard-post__full-summery text-left">
			<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogshop' ),
						'after'  => '</div>',
					)
				); 
			?>
		</div>
		<?php if (has_tag()): ?>
		<div class="d-flex justify-content-between blogshop-standard-post__share-wrapper">
			<div class="blogshop-standard-post__tags align-self-center">
				<?php blogshop_post_tag(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
