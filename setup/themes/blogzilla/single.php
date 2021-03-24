<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blogzilla
 */

get_header();
$blogzilla_options = blogzilla_theme_options();
$single_sidebar_show_checkbox = $blogzilla_options['single_sidebar_show_checkbox'];

if ($single_sidebar_show_checkbox== '0'){
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), "full" );
	?>

    <div class="section-content no-sidebar">
        <div class="container">
            <div class="row">
                <div class="single-content-wrap">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

						<?php

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
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

<div class="section-content full-width with-sidebar">
    <div class="container">
        <div class="row">
            <div class="single-content-wrap">
            	<div class="col-md-8">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

						<?php
						while ( have_posts() ) :
						blogzilla_post_thumbnail(); ?>

				    	<?php
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
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
