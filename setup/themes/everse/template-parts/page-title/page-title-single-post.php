<?php
/**
 * Page title for single post.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! get_theme_mod( 'everse_settings_single_post_page_title_show', true ) ) {
	return;
}

add_action( 'everse_entry_header', 'everse_entry_header_markup' );

if ( ! function_exists( 'everse_entry_header_markup' ) ) {
	/**
	* Single entry header markup
	*
	* @since 1.0.0
	*/
	function everse_entry_header_markup() {
		$layout = get_theme_mod( 'everse_settings_single_post_page_title_layout', 'page-title-layout-1' );
		$align = get_theme_mod( 'everse_settings_single_post_page_title_align', 'left' );

		everse_entry_header_before();

		if ( 'page-title-layout-2' === $layout ) : ?>
			<div <?php everse_page_title_atts( 'single_post', 'left' ); ?>>
				<div class="container">
					<div class="page-title__outer">
						<div class="page-title__inner">
							<div class="page-title__holder">

		<?php endif; ?>

								<header class="single-post__entry-header page-title--<?php echo esc_attr( $align ); ?>">
									<?php if ( get_theme_mod( 'everse_settings_single_category_show', true ) ) : ?>
										<div class="entry__meta-categories">
											<?php everse_meta_category(); ?>
										</div>
									<?php endif; ?>

									<?php if ( get_theme_mod( 'everse_settings_single_post_title_show', true ) ) : ?>				
										<h1 class="single-post__entry-title"><?php the_title(); ?></h1>
									<?php endif; ?>

									<?php if ( ! everse_is_learndash_post() ) : ?>

										<?php if ( get_theme_mod( 'everse_settings_single_date_show', true ) || get_theme_mod( 'everse_settings_single_author_show', true ) || get_theme_mod( 'everse_settings_single_comments_show', true ) ) : ?>
											<div class="entry__meta">

												<?php if ( get_theme_mod( 'everse_settings_single_date_show', true ) ) : ?>
													<?php everse_meta_date(); ?>
												<?php endif; ?>

												<?php if ( get_theme_mod( 'everse_settings_single_author_show', true ) ) : ?>
													<?php everse_meta_author(); ?>
												<?php endif; ?>						

												<?php if ( get_theme_mod( 'everse_settings_single_comments_show', true ) ) : ?>
													<?php echo everse_meta_comments(); ?>
												<?php endif; ?>

											</div>
										<?php endif; ?>

									<?php endif; ?>

								</header>

		<?php if ( 'page-title-layout-2' === $layout ) : ?>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .page-title -->
		<?php endif;

		everse_entry_header_after();		

		if ( 'page-title-layout-1' === $layout ) {
			everse_entry_featured_image();
		}

	}
}

