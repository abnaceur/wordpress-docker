<?php
/**
 * The template for displaying all single posts.
 *
 * @package Everse
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( 'projects' == get_post_type() || 'services' == get_post_type() ) : ?>

		<?php the_content(); ?>

	<?php else : ?>

		<?php everse_entry_section_before(); ?>

		<?php if ( 'page-title-layout-2' === get_theme_mod( 'everse_settings_single_post_page_title_layout', 'page-title-layout-1' ) ) {
			get_template_part( 'template-parts/page-title/page-title-single-post' );
			everse_entry_header();
		} ?>

		<div class="section-wrap pt-72 pb-40">
			<div class="container">
				<div class="row <?php if ( 'fullwidth' == everse_layout_type( 'blog' ) || ! is_active_sidebar( 'everse-blog-sidebar' ) ) { echo esc_attr( 'justify-content-center' ); } ?>">

					<!-- blog content -->
					<div class="content blog__content col-lg mb-40">
						<main class="site-main" role="main">
					
							<?php
								if ( function_exists( 'everse_save_post_views' ) ) {
									everse_save_post_views( get_the_ID() );
								}

								if ( 'page-title-layout-1' === get_theme_mod( 'everse_settings_single_post_page_title_layout', 'page-title-layout-1' ) ) {
									get_template_part( 'template-parts/page-title/page-title-single-post' );
									everse_entry_header();
								}

								get_template_part( 'template-parts/content-single', get_post_format() );
							?>
							
						</main>
					</div> <!-- .blog__content -->

					<?php
						if ( everse_is_learndash_post() ) {
							if ( everse_is_active_sidebar( 'learndash', 'fullwidth' ) ) {
								everse_sidebar( 'everse-learndash-sidebar' );
							}							
						} else {
							if ( everse_is_active_sidebar( 'blog' ) ) {
								everse_sidebar( 'everse-blog-sidebar' );
							}
						}
					?>

				</div>
			</div>
		</div> <!-- .main-content -->

		<?php
			if ( ! everse_is_learndash_post() ) {
				everse_post_nav();
			}
		?>

	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>