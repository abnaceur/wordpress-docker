<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
get_header(); ?>
<main class="main-archive main-layout">
	<div class="container-archive container-layout"> 
		<?php if ( have_posts() ) : ?>
		    <header class="archive">
		    	<?php 
			    	echo esc_html( goblog_free_breadcrumb() );
			        the_archive_title( '<h1 class="archive-title">', '</h1>' ); 
			        the_archive_description( '<div class="archive-description"><p>', '</p></div>' ); 
		        ?>
		    </header>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/layout/blog/default', get_post_format() ); ?>
	</div>
	<?php get_sidebar(); ?>
</main> 
<?php get_footer(); ?>