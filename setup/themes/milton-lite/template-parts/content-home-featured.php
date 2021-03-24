<?php
/**
 * The template used for displaying featured pages on the Front Page
 */

$page_ids = array();
if ( absint(get_theme_mod( 'theme-milton-featured-page-1', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'theme-milton-featured-page-1', false )); }
if ( absint(get_theme_mod( 'theme-milton-featured-page-2', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'theme-milton-featured-page-2', false )); }
if ( absint(get_theme_mod( 'theme-milton-featured-page-3', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'theme-milton-featured-page-3', false )); }
if ( absint(get_theme_mod( 'theme-milton-featured-page-4', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'theme-milton-featured-page-4', false )); }
if ( absint(get_theme_mod( 'theme-milton-display-pages-excerpt', false )) != 0 ) { $display_page_excerpts = absint(get_theme_mod( 'theme-milton-display-pages-excerpt', false )); } else { $display_page_excerpts = 0; }
$page_count = 0;
$page_count = count($page_ids);

if ( $page_count > 0 ) {
	$custom_loop = new WP_Query( array( 'post_type' => 'page', 'post__in' => $page_ids, 'orderby' => 'post__in' ) );

	if ( $custom_loop->have_posts() ) : ?>
	<div class="site-home-featured-pages">
		<div class="site-section-wrapper site-section-home-featured-pages-wrapper clearfix">

			<div id="home-featured-pages">

				<ul class="academia-featured-pages-list academia-featured-pages-<?php echo esc_attr($page_count); ?> clearfix">

					<?php 
					while ( $custom_loop->have_posts() ) : $custom_loop->the_post();
					$classes = array('academia-featured-page-item'); 
					
					if ( !has_post_thumbnail() ) {
						$classes[] = 'post-nothumbnail';
					} else {
						$classes[] = 'has-post-thumbnail';
					}
					?><li <?php post_class($classes); ?>>
						<div class="site-column-widget-wrapper clearfix">
							<?php if ( has_post_thumbnail() ) { ?>
							<div class="entry-thumbnail">
								<div class="entry-thumbnail-wrapper">
									<?php 

									// CREATE A PROPER ALT ATTRIBUTE FOR THE THUMBNAIL
									$image_alt_attribute = get_post_meta(get_post_thumbnail_id( ), '_wp_attachment_image_alt', true);
									if ( empty($image_alt_attribute) ) {
										$image_alt_attribute = __('Thumbnail for the page titled: ','milton-lite') . the_title_attribute( 'echo=0' );
									}

									echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
									the_post_thumbnail('milton-lite-thumb-featured-page', array('alt' => $image_alt_attribute));
									echo '</a>'; ?>
								</div><!-- .entry-thumbnail-wrapper -->
							</div><!-- .entry-thumbnail --><?php } ?><!-- ws fix
							--><div class="entry-preview">
								<div class="entry-preview-wrapper clearfix">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'milton-lite' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
									<?php if ( $display_page_excerpts == 1 ) { echo academiathemes_helper_display_excerpt($post); } ?>
								</div><!-- .entry-preview-wrapper .clearfix -->
							</div><!-- .entry-preview -->
						</div><!-- .site-column-widget-wrapper .clearfix -->
					</li><!-- .site-archive-post --><?php endwhile; ?>

				</ul><!-- .academia-featured-pages-list .clearfix -->

			</div><!-- #home-featured-pages -->
		
		</div><!-- .site-section-wrapper .site-section-home-featured-pages-wrapper .clearfix -->
	</div><!-- .site-home-featured-pages -->
<?php endif; } ?>