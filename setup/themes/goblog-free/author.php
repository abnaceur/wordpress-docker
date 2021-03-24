<?php
/**
 * The template for displaying author pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
get_header(); ?>
<main class="main-author main-layout">
	<div class="container-author container-layout">  
		<header class="author">
			<h1 class="screen-reader-text"><?php the_author(); ?></h1>
			<?php echo esc_html( goblog_free_breadcrumb() ); ?>
    		<?php get_template_part( 'inc/parts/author', 'info' ); ?>
		</header>
		<?php get_template_part( 'template-parts/layout/blog/default', get_post_format() ); ?>
	</div>
	<?php get_sidebar(); ?>
</main> 
<?php get_footer(); ?>