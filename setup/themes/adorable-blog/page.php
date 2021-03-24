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

    <div class="col-md-8 content-wrap" id="primary">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
			</div>

			 <div class="col-md-4 sidebar-wrap" id="secondary">
			 	<?php get_sidebar(); ?>
			</div> 	
	</div>
	</div>



<?php
get_footer();
