<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
get_header(); ?>
<main class="main-404 main-layout">
	<header>
		<h1><?php esc_html_e( '404', 'goblog-free' ); ?></h1>
	</header>
	<div class="container-404 container-layout">
		<p><?php echo __( 'It looks like nothing was found at this location !!!', 'goblog-free' ); ?></p>
		<button><a id="back" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo __('Back to Home', 'goblog-free'); ?></a></button>
	</div>
</main>
<?php get_footer(); ?>