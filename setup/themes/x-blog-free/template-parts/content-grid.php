<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package x-blog
 */
$x_blog_free_categories_list = get_the_category_list( esc_html__( ' / ', 'x-blog-free' ) );
$x_blog_free_posts_meta = get_theme_mod('x_blog_free_posts_meta','1');
$x_blog_free_posts_image = get_theme_mod('x_blog_free_posts_image','1');
$x_blog_free_posts_blank_image = get_theme_mod('x_blog_free_posts_blank_image','1');
$x_blog_free_post_btntext = get_theme_mod('x_blog_free_post_btntext',__('Continue Reading ..', 'x-blog-free'));
if($x_blog_free_posts_blank_image){
$x_blog_free_arclass = 'xgrid-item';
}else{
$x_blog_free_arclass = 'card';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr($x_blog_free_arclass) ); ?>>
	<div class="content-grid">
		<div class="grid-img">
			<?php if( $x_blog_free_posts_image == '1' ): ?>
				<?php if(has_post_thumbnail()): ?>
	        	<div class="baby-feature-image"> 
		        	<a href="<?php the_permalink(); ?>">
		            	<?php the_post_thumbnail(); ?>
		            </a>
	        	</div>
	    		<?php else: ?>
	    		<div class="<?php if($x_blog_free_posts_blank_image): ?>no-img<?php else: ?>image-hide<?php endif; ?>"></div>
	    		<?php endif; ?>
    		<?php else: ?>
    			<div class="image-hide"></div>
    		<?php endif; ?>
		</div>
		<div class="grid-content">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="top-cat post-meta grid-cat">
					<i class="fas fa-folder"></i>
					<?php echo wp_kses_post( $x_blog_free_categories_list ); ?>
				</div>
			<?php endif; ?>
			<header class="entry-header">
				<?php
				if( !is_single() ): ?>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?> " rel="bookmark"><?php the_title(); ?>
						</a>
					</h2>
					
				<?php
				else:
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() && $x_blog_free_posts_meta == 1) : ?>
				
				
				<?php
				endif; ?>
			</header><!-- .entry-header -->
				<div class="entry-content">
					<?php
			        if( !is_single() ){ 
			            the_excerpt(); ?>
			            <div class="redmore-btn"> <a href="<?php the_permalink( ); ?>" class="more-link" rel="bookmark"> <?php echo esc_html($x_blog_free_post_btntext) ?></a></div>
			           
			       <?php
			        }else{ 
			            the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'x-blog-free' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );
			        }
						

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'x-blog-free' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
		</div>
	</div>
	<div class="footer-meta entry-meta post-meta grid-meta">
		<?php x_blog_free_posted_on(); ?>
	</div><!-- .entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->
