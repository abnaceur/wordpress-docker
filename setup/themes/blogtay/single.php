<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blogtay
 */

get_header();
?>

	<?php
			if ( is_singular() ) :
				?>

				<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>
	</div>
	
</div>
<?php 
endif;
?>


	<div id="primary" class="content-area container">
		<div class="row">
		<main id="main" class="site-main col-sm-12 col-lg-8">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<div class="col-sm-12 col-lg-4">
			<?php get_sidebar(); ?>			
		</div> 

			</div>
	</div><!-- #primary -->

<?php
get_footer();
