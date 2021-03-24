<?php get_header(); ?>

<main id="site-main">

	<?php if ( ( is_front_page() || is_home() ) && !is_paged() ) {

		if ( is_active_sidebar('homepage-welcome') ) { ?>
		
		<div class="site-home-welcome">
			<div class="site-section-wrapper site-section-home-welcome-wrapper clearfix">
				<?php dynamic_sidebar( 'homepage-welcome' ); ?>
			</div><!-- .site-section-wrapper .site-section-home-welcome-wrapper .clearfix -->
		</div><!-- .site-home-welcome -->
		
		<?php }

		if ( 1 == get_theme_mod( 'theme-milton-display-pages', 1 ) ) {
			get_template_part( 'template-parts/content', 'home-featured' );
		} // if featured pages are activated

	} ?>

	<div class="site-section-wrapper site-section-wrapper-main">

	<?php
	while (have_posts()) : the_post();
	?>
		<div id="site-page-columns" class="clearfix">

			<div id="site-column-main" class="site-column site-column-main">
				
				<div class="site-column-main-wrapper clearfix">

					<?php // Function to display the START of the content column markup
					academiathemes_helper_display_page_content_wrapper_start();

						// Function to display Breadcrumbs
						academiathemes_helper_display_breadcrumbs($post);
						academiathemes_helper_display_title($post);
						academiathemes_helper_display_content($post);
						academiathemes_helper_display_comments($post);

					// Function to display the END of the content column markup
					academiathemes_helper_display_page_content_wrapper_end(); ?>

				</div><!-- .site-column-wrapper .site-content-wrapper .clearfix -->
			</div><!-- #site-column-main .site-column .site-column-main --><!-- ws fix
			--><?php 
			// Function to display the SIDEBAR (if not hidden)
			academiathemes_helper_display_page_sidebar_column(); ?>

		</div><!-- #site-page-columns -->
	<?php
	endwhile;
	?>

	</div><!-- .site-section-wrapper .site-section-wrapper-main -->

</main><!-- #site-main -->
	
<?php get_footer(); ?>