<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

get_header(); ?>

<main class="main-front-page main-layout">
	<div class="container-front-page container-layout">  
		<?php get_template_part( 'template-parts/front-page/post', get_post_format() ); ?>
	</div>
	<?php get_sidebar(); ?>
</main> 
<?php get_footer(); ?>