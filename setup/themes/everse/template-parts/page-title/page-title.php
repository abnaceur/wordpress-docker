<?php
/**
 * Page title.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! get_theme_mod( 'everse_settings_regular_pages_page_title_show', true ) ) {
	return;
}

$page_subtitle = get_post_meta( get_the_ID(), '_everse_page_subtitle', true );
?>

<!-- Page Title -->
<div <?php everse_page_title_atts( 'regular_pages' ); ?>>
	<div class="container">
		<div class="page-title__outer">
			<div class="page-title__inner">
				<div class="page-title__holder">
					<?php everse_page_title_before(); ?>
					<?php if ( ! is_front_page() ) : ?>
						<h1 class="page-title__title"><?php single_post_title(); ?></h1>
					<?php else : ?>
						<h1 class="page-title__title"><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php everse_page_title_after(); ?>
					<?php if ( $page_subtitle ) : ?>
						<!-- Subtitle -->
						<p class="page-title__subtitle"><?php echo esc_html( $page_subtitle ); ?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</div> <!-- .page-title -->