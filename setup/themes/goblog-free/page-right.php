<?php
/**
 * Template Name: Sidebar Right
 * The template for displaying page-right
 *
 * This is the template that displays page-right by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

get_header(); ?>
<main class="main-page main-layout main-page-custome-right">
	<div class="container-page container-layout container-page-custome-right"> 
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/pages/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
    </div>
    <?php get_sidebar(); ?>
</main> 
<?php get_footer(); ?>