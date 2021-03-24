<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<?php blog99_content_bottom(); ?>
	</div><!-- #primary -->

	<?php if ( blog99_get_sidebar_layout() == 'blog99-right-sidebar' || blog99_get_sidebar_layout() == 'blog99-both-sidebar'  ) : ?>

	<?php get_sidebar(); ?>

	<?php endif; ?>

<?php blog99_after_mainsec(); ?>

<?php get_footer();