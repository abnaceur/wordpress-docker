<?php
/**
 * The main template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<?php if ( ! is_front_page() ) {
	get_template_part( 'template-parts/page-title/page-title' );
} ?>


<div class="blog-section pb-56">

	<?php everse_primary_content_markup_top(); ?>

		<?php everse_primary_content_top(); ?>

		<!-- blog content -->
		<div id="primary" class="content blog__content col-lg mb-32">
			<main class="site-main" role="main">

				<?php everse_primary_content_before(); ?>

				<?php everse_primary_content_query(); ?>

				<?php everse_post_pagination(); ?>

				<?php everse_primary_content_after(); ?>

			</main>
		</div> <!-- .blog__content -->

		<?php
			// Sidebar
			if ( everse_is_active_sidebar( 'blog' ) ) {
				everse_sidebar( 'everse-blog-sidebar' );
			}
		?>

		<?php everse_primary_content_bottom(); ?>

	<?php everse_primary_content_markup_bottom(); ?>

</div> <!-- .blog-section -->

<?php get_footer(); ?>