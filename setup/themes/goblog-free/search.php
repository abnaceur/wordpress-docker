<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
get_header(); ?>
<main class="main-search main-layout">
	<div class="container-search container-layout"> 
		<header class="search">
			<?php if ( have_posts() ) : ?>
				<h1 class="search-title">
					<?php
					/* translators: Search query. */
					printf( __( 'Search Results for: %s', 'goblog-free' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
					?>
				</h1>
			<?php else : ?>
				<h1 class="search-title"><?php _e( 'Opps Nothing Found', 'goblog-free' ); ?></h1>
			<?php endif; ?>
		</header><!-- .search -->
		<?php get_template_part( 'template-parts/layout/blog/default', get_post_format() ); ?>
	</div>
	<?php get_sidebar(); ?>
</main> 
<?php get_footer(); ?>