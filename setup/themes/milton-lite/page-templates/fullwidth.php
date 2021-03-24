<?php
/**
 * Template Name: Full Width Page
 */

get_header();
?>

<main id="site-main">

	<div class="site-section-wrapper site-section-wrapper-main">

	<?php
	while (have_posts()) : the_post();
	?>
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
	<?php
	endwhile;
	?>

	</div><!-- .site-section-wrapper .site-section-wrapper-main -->

</main><!-- #site-main -->
	
<?php get_footer(); ?>