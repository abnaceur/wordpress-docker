<?php
/**
 * Page title for search pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! get_theme_mod( 'everse_settings_search_results_page_title_show', true ) ) {
	return;
}
?>

<!-- Page Title -->
<div <?php everse_page_title_atts( 'search_results' ); ?>>
	<div class="container">
		<div class="page-title__outer">
			<div class="page-title__inner">
				<div class="page-title__holder">
					<?php everse_page_title_before(); ?>						
						<h1 class="page-title__title">
							<?php printf( esc_html__( 'Search Results for: %s', 'everse' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h1>				
					<?php everse_page_title_after(); ?>
				</div>
			</div>
		</div>
	</div>
</div> <!-- .page-title -->