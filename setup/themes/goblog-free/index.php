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
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
get_header(); ?>
<main class="main-index main-layout">
	<div class="container-index container-layout">  
		<?php get_template_part( 'template-parts/layout/blog/default', get_post_format() ); ?>
	</div>
	<?php get_sidebar(); ?>
</main> 
<?php get_footer(); ?>