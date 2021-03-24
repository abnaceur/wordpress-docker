<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package classic_artisan
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<aside id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer' ); ?>
			</aside><!-- #secondary -->
		<?php endif; ?>
		<div class="site-info" role="contentinfo">
			<?php classic_artisan_site_info(); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
