<?php
/**
 * Page title for archive pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! get_theme_mod( 'everse_settings_archives_page_title_show', true ) ) {
	return;
}

$archive_title    	 = get_the_archive_title();
$archive_description = get_the_archive_description();
$projects_title			 = get_theme_mod( 'everse_settings_project_archives_title', esc_html__( 'Projects', 'everse' ) );
?>

<?php if ( $archive_title || $archive_description ) : ?>	

	<!-- Page Title -->
	<div <?php everse_page_title_atts( 'archives' ); ?>>
		<div class="container">
			<div class="page-title__outer">
				<div class="page-title__inner">
					<div class="page-title__holder">
						<?php everse_page_title_before(); ?>

							<?php if ( $archive_title ) : ?>
								
								<h1 class="page-title__title">
									<?php
										if ( is_post_type_archive( 'projects' ) ) :
											echo wp_kses_post( $projects_title );

										elseif ( is_tax( 'projects_categories' ) || is_tax( 'services_categories' ) || is_category() || is_tag() ) :
											single_cat_title();

										else :
											echo wp_kses_post( $archive_title );

										endif;
									?>
								</h1>

							<?php endif; ?>

							<?php
								if ( is_post_type_archive( 'projects' ) ) {
									printf( '<p class="page-title__subtitle">%s</p>', get_theme_mod( 'everse_settings_project_archives_subtitle', esc_html__( 'Here are the best features that makes everse the most powerful, fast and user-friendly platform.', 'everse' ) ));
								} elseif ( $archive_description ) {
									?>
									<div class="page-title__description"><?php echo wp_kses_post( wpautop( $archive_description ) ); ?></div>
									<?php
								}
							?>
					
						<?php everse_page_title_after(); ?>

					</div>
				</div>
			</div>
		</div>
	</div> <!-- .page-title -->

<?php endif; ?>