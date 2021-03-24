<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogtay
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer text-center">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="social">
					<?php 
					$options = get_theme_mod( 'theme_options' ); 
					do_action('blogtay_social_action', $options ); ?>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blogtay' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'blogtay' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
					<?php echo wp_kses_post( sprintf( esc_html__( 'Theme: %1$s by %2$s.', 'blogtay' ), 'Blogtay', '<a href="' . esc_url( 'https://profoxstudio.com/' ) . '">Profoxstudio</a>' ) ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
	</div>
	
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
