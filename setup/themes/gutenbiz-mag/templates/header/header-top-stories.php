<?php
/**
 * Content for header top stories
 *
 * @since 1.0.0
 *
 * @package Gutenbiz Mag
 */ 
?>
<div class="gutenbiz-trending-news">
	<div class="container marquee-wrapper">
		<span class="top-stories">
			<div><i class="fa fa-bullhorn"></i></div>
			<?php echo esc_html( gutenbiz_get( 'top-stories-title' ) ); ?>				
		</span>
		<?php $top_stories_posts = Gutenbiz_Mag_Theme::get_posts_by_type( gutenbiz_get( 'top-stories-type' ), gutenbiz_get( 'top-stories-cat' ), gutenbiz_get( 'top-stories-no-post' ) ); 
		if( $top_stories_posts ) : ?>
			<ul>
				<?php foreach ( $top_stories_posts as $tsp ) : ?>
					<li><a href="<?php echo esc_url( get_the_permalink( $tsp ) ); ?>">
						<?php if( has_post_thumbnail( $tsp ) ){ ?>
							<img src=" <?php echo esc_url( get_the_post_thumbnail_url( $tsp, 'thumbnail' ) ); ?> ">
						<?php }else{ ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/default-image.jpg' ); ?>">
						<?php }
						echo esc_html( get_the_title( $tsp ) ); ?>
					</a></li>	
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>		
	</div>​
</div>