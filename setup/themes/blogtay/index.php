<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogtay
 */

get_header();

$main_content_class = 'col-sm-12 col-lg-8';
$article_class = 'col-sm-12 col-md-6 mb-4';
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	$main_content_class = 'col-sm-12 col-lg-12';
	$article_class = 'col-sm-12 col-md-4 mb-4';

}
?>
<div id="primary" class="content-area container home-content">
	<div class="row">
		<main id="main" class="site-main <?php echo esc_attr( $main_content_class ); ?>">
			<div class="row row-eq-height">
				<?php
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) :
						?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				?>
				
				<div class="<?php echo esc_attr( $article_class ); ?>">
					<?php 
					get_template_part( 'template-parts/content', get_post_type() );
					?>
				</div>	
				<?php
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>
</main><!-- #main -->
<div class="col-sm-12 col-lg-4">
	<?php get_sidebar(); ?>
</div>
</div>
</div><!-- #primary -->

<?php
get_footer();
