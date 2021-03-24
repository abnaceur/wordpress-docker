<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */


get_header(); ?>
<?php blog99_before_mainsec(); ?>

<?php if ( blog99_get_sidebar_layout() == 'blog99-left-sidebar' || blog99_get_sidebar_layout() == 'blog99-both-sidebar' ) : ?>

<?php get_sidebar('left'); ?>

<?php endif ?>

	<div id="primary" class="content-area <?php echo esc_attr( blog99_container_class() ); ?>">

		<?php blog99_content_top(); ?>

		<?php blog99_content_loop(); ?>

		<?php 
			the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"></path></g></svg>',
				'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"></path></g></svg>',
			) );
		?>

		<?php blog99_content_bottom(); ?>

	</div><!-- #primary -->

	<?php if ( blog99_get_sidebar_layout() == 'blog99-right-sidebar' || blog99_get_sidebar_layout() == 'blog99-both-sidebar'  ) : ?>

	<?php get_sidebar(); ?>

	<?php endif; ?>
	
<?php blog99_after_mainsec(); ?>

<?php get_footer(); ?>