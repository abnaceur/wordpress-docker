<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ft_directory_listing
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				ft_directory_listing_posted_on();
				ft_directory_listing_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php ft_directory_listing_post_thumbnail(); ?>

	<div class="entry-content">
            <?php
                    echo wp_kses_post(ft_directory_listing_get_excerpt($post->ID, 450));

            ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a href="<?php echo esc_url(get_the_permalink()); ?>" class="btn btn-default"><?php esc_html_e("Read More", "ft-directory-listing") ?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
