<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package blogtay
 */

get_header();
?>
<header class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blogtay' ); ?></h1>
			</div>
		</div>
	</div>

</header><!-- .page-header -->


<div id="primary" class="content-area container">
	<div class="row justify-content-center">
		<main id="main" class="site-main col-sm-12 col-lg-7">

			<section class="error-404 not-found text-center">


				<div class="page-content">
					<h3><?php esc_html_e( '404', 'blogtay' ); ?></h3>
					<span class="oops"><?php esc_html_e('Oops! Page not found' , 'blogtay'); ?></span>

					<p><?php esc_html_e( 'Sorry! The page you are looking for does not exist.', 'blogtay' ); ?></p>

					<?php
					get_search_form();

				
					?>


			

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div>
</div><!-- #primary -->

<?php
get_footer();
