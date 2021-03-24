<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package colon
 */

get_header();
colon_before_title();
if(true===get_theme_mod( 'colon_enable_page_title',true)) :
	do_action('colon_get_page_title',false,false,false,true);
endif;
colon_after_title();

?>

<div id="primary" class="<?php echo esc_attr(get_theme_mod('colon_header_menu_style','style1')); ?> content-area">
	<main id="main" class="site-main colon-main" role="main">
		<div class="content-page">
			<div class="container">
				<div class="row">
					<?php
						if ( is_active_sidebar('sidebar-1')) :
							if('right'===esc_html(get_theme_mod('colon_blog_sidebar','right'))) :
								?>
									<div class="col-md-8">
										<div class="page-content-area">	
											<h1 class="page-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'colon' ); ?></h1>
											<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'colon' ); ?></p>
											<?php get_search_form(); ?>
										</div>
									</div>
									<div class="col-md-3 col-md-offset-1">
										<?php get_sidebar('sidebar-1'); ?>
									</div>
								<?php
							elseif('left'===esc_html(get_theme_mod('colon_blog_sidebar','right'))) :
								?>
									<div class="col-md-3">
										<?php get_sidebar('sidebar-1'); ?>
									</div>
									<div class="col-md-8 col-md-offset-1">
										<div class="page-content-area">	
											<h1 class="page-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'colon' ); ?></h1>
											<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'colon' ); ?></p>
											<?php get_search_form(); ?>
										</div>
									</div>
								<?php
							else :
								?>
									<div class="col-md-12">
										<div class="page-content-area">	
											<h1 class="page-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'colon' ); ?></h1>
											<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'colon' ); ?></p>
											<?php get_search_form(); ?>
										</div>
									</div>
								<?php
							endif;
						else:
							?>
								<div class="col-md-12">
									<div class="page-content-area">	
										<h1 class="page-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'colon' ); ?></h1>
										<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'colon' ); ?></p>
										<?php get_search_form(); ?>
									</div>
								</div>
							<?php
						endif;
					?>						
				</div>
			</div>
		</div>
	</main>
</div>

<?php
get_footer();