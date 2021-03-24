<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogtay
 */

?>

<div class="page-header" style="background-image: url('<?php echo( get_header_image() ); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>
	</div>
	
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php blogtay_post_thumbnail(); ?>
				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogtay' ),
						'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->

				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'blogtay' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
	</div>
</div>


