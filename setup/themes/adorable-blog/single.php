<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 *
 */

get_header();
/**
* Hook - Saraswati_Blog.
*
* @hooked Saraswati_Blog
*/
do_action( 'saraswati_blog_breadcrumb_type' );	

?>
	<div id="masonry-loop">
	<div id="content">
            <div class="col-md-8 content-wrap single-page" id="primary">
	           
	               <?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single');

						the_post_navigation();

						 /**
                     * saraswati_blog_related_posts hook
                     * @since Newie 1.0.0
                     *
                     * @hooked saraswati_blog_related_posts
                     */
                    do_action('saraswati_blog_related_posts' ,get_the_ID() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
			</div>
			 <div class="col-md-4 sidebar-wrap" id="secondary">
			 	<?php get_sidebar(); ?>
				
				
</div><!-- main-container -->
	</div>
	</div>
<?php
get_footer();
