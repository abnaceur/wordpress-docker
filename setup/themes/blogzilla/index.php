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
 * @package blogzilla
 */

get_header();
$blogzilla_options = blogzilla_theme_options();
$sidebar_show_checkbox = $blogzilla_options['sidebar_show_checkbox'];

if ($sidebar_show_checkbox== '0'){ ?>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="single-content-wrap">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">
							<div id="primary" class="content-area">
								<main id="main" class="site-main">

								<?php if ( have_posts() ) : ?>



									<?php
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										 * Include the Post-Type-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', get_post_type() );

									endwhile;

									the_posts_navigation();

								else :

									get_template_part( 'template-parts/content', 'none' );

								endif;
								?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div>
			</div>
		</div>
	</div>

<?php
}

else{ ?>

    <div class="section-content full-width">
        <div class="container">
            <div class="row">
                <div class="single-content-wrap">
                	<div class="col-md-8">
						<div id="primary" class="content-area">
							<main id="main" class="site-main">

									<?php if ( have_posts() ) : ?>



										<?php
										/* Start the Loop */
										while ( have_posts() ) :
											the_post();

											/*
											 * Include the Post-Type-specific template for the content.
											 * If you want to override this in a child theme, then include a file
											 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
											 */
											get_template_part( 'template-parts/content', get_post_type() );

										endwhile;

										the_posts_navigation();

									else :

										get_template_part( 'template-parts/content', 'none' );

									endif;
									?>
							</main><!-- #main -->
						</div><!-- #primary -->
					</div>

					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
}

get_footer();

