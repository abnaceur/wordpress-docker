<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogzilla
 */

get_header();
$blogzilla_options = blogzilla_theme_options();
$single_sidebar_page_show_checkbox = $blogzilla_options['single_sidebar_page_show_checkbox'];

if ($single_sidebar_page_show_checkbox== '0'){
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), "full" );
	?>
<div class="banner-wrap">
	<div class="banner-wrapper-fixed" style="background-image: url(<?php echo esc_url($thumbnail[0]); ?>);">
	  <div class="foreground">
	    <div class="banner-text">
		    <div class="banner-text-wrap">
		    	<header class="entry-header">
		    		<?php
		    		if ( is_singular() ) :
		    			the_title( '<h1 class="entry-title">', '</h1>' );
		    		else :
		    			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		    		endif; ?>
		    	</header><!-- .entry-header -->
		    </div>
	    </div>
	  </div>
	</div>
</div>
    <div class="section-content no-title">
        <div class="container">
            <div class="row">
                <div class="single-content-wrap">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );


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

    <div class="section-content full-width">
        <div class="container">
            <div class="row">
                <div class="single-content-wrap">
                	<div class="col-md-8">
						<div id="primary" class="content-area">
							<main id="main" class="site-main">

							<?php
							while ( have_posts() ) :

								the_post();

								get_template_part( 'template-parts/content', get_post_type() );


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
