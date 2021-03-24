<?php 
if ( is_single() || is_page() || is_page_template() ) {

	$meta_target_id = $post->ID;

	if ( $post->ID == 0 ) {
		global $wp_query;
		if ( isset( $wp_query->queried_object->ID ) ) { $meta_target_id = $wp_query->queried_object->ID; }
	}

	if ( has_post_thumbnail( $meta_target_id ) ) {
		$featured_image_id = get_post_thumbnail_id($meta_target_id);
		?>
		<div class="entry-thumbnail site-section-wrapper-slideshow">
			<div id="site-section-slideshow" class="site-section-slideshow">
				<?php the_post_thumbnail('milton-lite-thumb-slideshow'); ?>
			</div><!-- #site-section-slideshow .site-section .site-section-slideshow -->
		</div><!-- .site-section-wrapper .site-section-wrapper-slideshow --><?php		

	}

} 