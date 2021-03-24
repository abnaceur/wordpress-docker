<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
	    <?php echo esc_html( goblog_free_breadcrumb() ); ?>
	    <?php the_title( '<h1 class="single">', '</h1>' ); ?>
	    <div class="single-info">
			<?php goblog_free_content_info_single(); ?>
	    </div> 
	</header>
	<section class="container-content">
        <div class="thumbnail-single">
			<?php goblog_free_featured_image1(); ?>
		</div>
		<?php get_template_part( 'inc/parts/social', 'share' ); ?>
	    <div class="the-content">
	        <?php the_content(); ?>	
			<span class="tags"><?php the_tags('Tags: ','',''); ?></span>
	    </div>    	      
	    <?php goblog_free_pagination_single(); ?>
	</section>
	<footer class="single">
	    <?php get_template_part( 'inc/parts/author', 'info' ); ?>
	</footer>
</article>