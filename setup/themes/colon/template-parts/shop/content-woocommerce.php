<?php
/**
 * Template part for displaying woocommerce content in page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colon
 */

?>


<div class="row">
	<?php 
		if(true===get_theme_mod( 'colon_enable_shop_sidebar',true) && "right" === esc_html(get_theme_mod( 'colon_woo_sidebar_layout','right' )) && is_active_sidebar('woosidebar') ) {
			?>
				<div class="col-md-9">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="woocommerce">
								<?php
									woocommerce_content();						
								?>
							</div>					
						</div><!-- .entry-content -->				
					</article><!-- #post-## -->
				</div>
				<div class="col-md-3">
					<div class="woo-sidebar">
						<div class="entry-content">
							<div class="woocommerce">
								<?php get_sidebar('woosidebar'); ?>
							</div>
						</div>
					</div>
				</div>
			<?php
		}
		else if(true===get_theme_mod( 'colon_enable_shop_sidebar',true) && "left" === esc_html(get_theme_mod( 'colon_woo_sidebar_layout','right' )) && is_active_sidebar('woosidebar') ) {
			?>
				<div class="col-md-3">
					<div class="woo-sidebar">
						<div class="entry-content">
							<div class="woocommerce">
								<?php get_sidebar('woosidebar'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="woocommerce">
								<?php
									woocommerce_content();						
								?>
							</div>					
						</div><!-- .entry-content -->				
					</article><!-- #post-## -->
				</div>
			<?php
		}
		else{
			?>
				<div class="col-md-12">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="woocommerce">
								<?php
									woocommerce_content();						
								?>
							</div>					
						</div><!-- .entry-content -->				
					</article><!-- #post-## -->
				</div>
			<?php		
		}
	?>
</div>