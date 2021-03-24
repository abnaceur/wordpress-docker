<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package x-blog-free
 */

?>

	</div><!-- #content -->
    <?php if(is_active_sidebar('footer-widget')): ?>
    <div class="footer-widget-area"> 
        <div class="baby-container widget-footer"> 
	        <div class="widget-items"> 
	            <?php dynamic_sidebar('footer-widget'); ?>
	        </div>
        </div>
    </div>
    <?php endif; ?>
	<footer id="colophon" class="site-footer footer-display">
		<div class="baby-container site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'x-blog-free' ) ); ?>">
				<?php esc_html_e( 'Powered by WordPress', 'x-blog-free' ); ?>
			</a>
			
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'x-blog-free' ), 'X Blog Free', '<a href="https://wpthemespace.com/">WP Theme Space</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
