<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
get_header(); ?>
<main class="main-single main-single-one">
	<div class="container-single container-single-one"> 
		<?php
	  	if ( have_posts() ):
		  	while( have_posts() ): the_post();
		      	get_template_part( 'template-parts/single/single', 'one' );
		      	// get comments
				if( comments_open() || get_comments_number() ):
					comments_template();
				endif;
			endwhile;
	  	endif;
		?>
	</div>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>