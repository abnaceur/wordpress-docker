<?php
/**
 * The template for displaying all pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php
		// Check if the page built with Elementor
		if ( everse_is_elementor_page() ) : ?>

			<?php everse_primary_content_top(); ?>

			<main class="elementor-main-content site-main" role="main">

				<?php everse_primary_content_before(); ?>

				<?php the_content(); ?>

				<?php everse_primary_content_after(); ?>

			</main>

			<?php everse_comments(); ?>

			<?php everse_primary_content_bottom(); ?>

		<?php else : ?>			

			<?php
				// Page Title
				get_template_part( 'template-parts/page-title/page-title' );
			?>

			<div class="page-section pb-56">
				<div class="container">
					<div class="row">

						<?php everse_primary_content_top(); ?>

						<div id="primary" class="content page-content col-lg mb-32">
							<main class="site-main" role="main">

								<?php everse_primary_content_before(); ?>

								<div class="entry__article clearfix">
									<?php the_content(); ?>
								</div>

								<?php everse_multi_page_pagination(); ?>
								
								<?php everse_comments(); ?>

								<?php everse_primary_content_after(); ?>

							</main>
						</div> <!-- .page-content -->

						<?php everse_primary_content_bottom(); ?>

						<?php
							// Sidebar
							if ( everse_is_woocommerce_activated() ) {
								if ( is_cart() || is_checkout() || is_account_page() ) {
									if ( 'fullwidth' !== everse_layout_type( 'shop_pages', 'fullwidth' ) && is_active_sidebar( 'everse-shop-sidebar' ) ) {
										everse_sidebar( 'everse-shop-sidebar' );
									}
								}
							} else {
								if ( everse_is_active_sidebar( 'page', 'fullwidth' ) ) {
									everse_sidebar( 'everse-page-sidebar' );
								}
							}							
						?>					

					</div> <!-- .row -->
				</div> <!-- .container -->			
			</div> <!-- .page-section -->

	<?php endif; ?> <!-- elementor check -->	
<?php endwhile; endif; ?>

<?php get_footer(); ?>