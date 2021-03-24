<?php
/**
 * Template part for displaying page content in page.php
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
	    <?php the_title( '<h1 class="title-page">', '</h1>' ); ?>
	</header>
	<section class="the-content the-content-page">
	  	<?php the_content(); ?> 
		<?php goblog_free_pagination_page(); ?>			
	</section>
</article>