<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

 ?>
<footer id="footer" itemscope itemtype="http://schema.org/WPFooter">
	<div class="container-footer">
		<a id="button-scroll"><i class="fas fa-chevron-circle-up" aria-hidden="true"></i></a>
		<div class="box-footer-widgets">
			<div class="box-widget">
				<?php if ( is_active_sidebar( 'goblog-free-footer1' )  ) : ?>
					<div class="footer-widgets">
						<?php dynamic_sidebar( 'goblog-free-footer1' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'goblog-free-footer2' )  ) : ?>
					<div class="footer-widgets">
						<?php dynamic_sidebar( 'goblog-free-footer2' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'goblog-free-footer3' )  ) : ?>
					<div class="footer-widgets">
						<?php dynamic_sidebar( 'goblog-free-footer3' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( has_nav_menu( 'goblog-free-footer' ) ) : ?>
			<nav id="navigasi">		
				<div class="container-navigasi-footer">
					<div class="box-navigasi-footer">
						<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
						<?php get_template_part( 'template-parts/footer/footer', 'sosmed' ); ?>
					</div>
				</div>
			</nav>
		<?php endif; ?>
	</div>
	<?php wp_footer(); ?>
</footer>
</body>
</html>