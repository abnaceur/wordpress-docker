<?php get_header(); ?>

<main id="site-main">

	<div class="site-section-wrapper site-section-wrapper-main">

	<?php
	// Function to display Breadcrumbs
	academiathemes_helper_display_breadcrumbs($post);

	?>
		<div id="site-page-columns" class="clearfix">

			<div id="site-column-main" class="site-column site-column-main">
				
				<div class="site-column-main-wrapper clearfix">

					<?php // Function to display the START of the content column markup
					// academiathemes_helper_display_page_slideshow();

					academiathemes_helper_display_page_content_wrapper_start(); ?>

					<h1 class="page-title"><?php _e('Page not found', 'milton-lite'); ?></h1>

					<div class="archives-content clearfix"><p><?php _e( 'Apologies, but the requested page cannot be found. Perhaps searching will help find a related page.', 'milton-lite' ); ?></p></div>
					<hr />
					<?php get_search_form(); ?>

					<hr />
					<div class="entry-content clearfix">
					
						<h3><?php _e( 'Browse Categories', 'milton-lite' ); ?></h3>
						<ul>
							<?php wp_list_categories('title_li=&hierarchical=0&show_count=1'); ?>	
						</ul>

						<hr>

						<h3><?php _e( 'Monthly Archives', 'milton-lite' ); ?></h3>
						<ul>
							<?php wp_get_archives('type=monthly&show_post_count=1'); ?>	
						</ul>
					
					</div><!-- .entry-content .clearfix --><?php

					// Function to display the END of the content column markup
					academiathemes_helper_display_page_content_wrapper_end(); ?>

				</div><!-- .site-column-wrapper .site-content-wrapper .clearfix -->
			</div><!-- #site-column-main .site-column .site-column-main --><!-- ws fix
			--><?php 
			// Function to display the SIDEBAR (if not hidden)
			academiathemes_helper_display_page_sidebar_column(); ?>

		</div><!-- #site-page-columns -->

	</div><!-- .site-section-wrapper .site-section-wrapper-main -->

</main><!-- #site-main -->
	
<?php get_footer(); ?>