<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Everse
 */

get_header();

$title = get_theme_mod( 'everse_settings_page_404_title', __( 'Page Not Found', 'everse' ) );
$description = get_theme_mod( 'everse_settings_page_404_description', __( 'Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'everse' ) );
$button_text = get_theme_mod( 'everse_settings_page_404_button_text', __( 'Back to Home', 'everse' ) );

?>

<div class="page-404-section bg-light">

	<div class="container text-center">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<main class="site-main" role="main">

					<!-- Page Title -->
					<h1 class="page-404__title mt-48 mb-16"><?php echo esc_html( $title ); ?></h1>
					<p class="page-404__text mb-32"><?php echo esc_html( $description ); ?></p>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--lg btn--color">
						<span><?php echo esc_html( $button_text ); ?></span>
					</a>

				</main>
			</div>
		</div>				
	</div>

</div>
<?php get_footer(); ?>