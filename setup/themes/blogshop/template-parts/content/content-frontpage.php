<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogshop
 */
$get_blog_layout = get_theme_mod('front_post_layout');
$getalignment = get_theme_mod( 'front_article_alignment', 'center' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blogshop-standard-post' ); ?>>
	<div class="blogshop-standard-post__entry-content text-<?php echo esc_attr( $getalignment );?>">
		<div class="blogshop-standard-post__categories">
			<?php blogshop_categories(); ?>
		</div>
		<?php if (! is_single()) : ?>
		<div class="blogshop-standard-post__post-title">
			<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		</div>
		<?php
		endif;
	if (function_exists('get_field')) :
		if (get_post_format() === 'gallery') {
			get_template_part( 'template-parts/content/post-header/header', 'gallery' );
		}elseif(get_post_format() === 'audio'){
			get_template_part( 'template-parts/content/post-header/header', 'audio' );
		}elseif (get_post_format() === 'video') {
			get_template_part( 'template-parts/content/post-header/header', 'video' );
		}else{
			get_template_part( 'template-parts/content/post-header/header', 'standard' );
		}
	else:
		get_template_part( 'template-parts/content/post-header/header', 'standard' );
	endif;
		?>
		<div class="blogshop-standard-post__blog-meta align-<?php echo esc_attr( $getalignment );?>">
			<?php blogshop_posted_by(false);?>
		</div>
		<?php 
		if (is_single()) {
			?>
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
			<?php
		}else{
			?>
			<div class="blogshop-standard-post__excerpt">
				<?php
				$getexerpt = get_theme_mod( 'front_excerpt_length', 200 );
				echo esc_html(blogshop_get_excerpt($getexerpt));
				?>
			</div>
			<div class="blogshop-standard-post__readmore">
				<?php
				$get_read_more_text = get_theme_mod( 'front_readmore_text', __( 'Read More', 'blogshop' ) );
				 ?>
				<a href="<?php the_permalink(); ?>"><?php echo esc_html($get_read_more_text); ?></a>
			</div>
			<?php
		}
		if (is_single()) {
			?>
			<div class="d-flex justify-content-between blogshop-standard-post__share-wrapper">
				<div class="blogshop-standard-post__tags align-self-center">
					<?php blogshop_post_tag(); ?>
				</div>
			</div>
			<?php
		}
		?>
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
