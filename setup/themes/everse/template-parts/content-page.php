<?php
/**
 * Page content.
 * 
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
		
	<?php
		// Check if the page built with Elementor
		if ( everse_is_elementor_page() ) : ?>

			<?php everse_primary_content_top(); ?>

			<div class="elementor-main-content">

				<?php everse_primary_content_before(); ?>

				<?php the_content(); ?>

				<?php everse_primary_content_after(); ?>

			</div>

			<?php everse_comments(); ?>

			<?php everse_primary_content_bottom(); ?>

		<?php else : ?>			

			<?php
				// Page Title
				get_template_part( 'template-parts/page-title/page-title' );
			?>

			<section class="page-section">
				<div class="container">
					<div class="row">

						<?php everse_primary_content_top(); ?>

						<div id="primary" class="page-content mb-32 <?php if ( everse_is_active_sidebar( 'page' ) ) { echo esc_attr( 'col-lg-8' ); } else { echo esc_attr( 'col-lg-12' ); } ?>">

							<?php everse_primary_content_before(); ?>

							<div class="entry__article clearfix">
								<?php the_content(); ?>
							</div>

							<?php everse_multi_page_pagination(); ?>
							
							<?php everse_comments(); ?>

							<?php everse_primary_content_after(); ?>

						</div> <!-- .page-content -->

						<?php everse_primary_content_bottom(); ?>

						<?php
							// Sidebar
							if ( everse_is_active_sidebar( 'page' ) ) {
								everse_sidebar();
							}
						?>						

					</div> <!-- .row -->
				</div> <!-- .container -->			
			</section> <!-- .page-section -->

	<?php endif; ?> <!-- elementor check -->	
<?php endwhile; endif; ?>