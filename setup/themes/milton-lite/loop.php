<ul class="site-archive-posts">

	<?php 
	$i = 0; 
	while (have_posts()) : the_post(); 
	$i++;

	$classes = array('site-archive-post', 'site-archive-post-' . $i); 
	
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
						$image_alt_attribute = __('Thumbnail for the post titled: ','milton-lite') . the_title_attribute( 'echo=0' );
					}

					echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
					the_post_thumbnail('post-thumbnail', array('alt' => $image_alt_attribute));
					echo '</a>'; ?>
				</div><!-- .entry-thumbnail-wrapper -->
			</div><!-- .entry-thumbnail --><?php } ?><!-- ws fix
			--><div class="entry-preview">
				<div class="entry-preview-wrapper clearfix">
					<?php echo academiathemes_helper_display_datetime($post); ?>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'milton-lite' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
					<p class="entry-excerpt"><?php echo get_the_excerpt(); ?></p>
				</div><!-- .entry-preview-wrapper .clearfix -->
			</div><!-- .entry-preview -->
		</div><!-- .site-column-widget-wrapper .clearfix -->

	</li><!-- .site-archive-post --><?php if ( $i == 2) { $i = 0; } endwhile; ?>
	
</ul><!-- .site-archive-posts -->

<?php
the_posts_pagination();
?>