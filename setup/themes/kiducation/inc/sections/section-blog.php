<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Kiducation
 */
?>
<?php 
	 $blog_post_title    = kiducation_get_option( 'blog_title' );
	 $blog_category = kiducation_get_option( 'blog_category' );
	 $blog_number	= kiducation_get_option( 'blog_number' );
	 $number_of_blog_column = kiducation_get_option( 'number_of_blog_column' );	 
	 
?> 
    <?php if( !empty($blog_post_title) ):?>
        <div class="section-header">
        <?php if( !empty($blog_post_title)):?>
            <h2 class="section-title"><?php echo esc_html($blog_post_title);?></h2>
        <?php endif;?>
        </div>
    
    <?php endif;?>
  <div class="section-content clear col-<?php echo esc_attr( $number_of_blog_column ); ?>">
    <?php $args = array (

        'posts_per_page' =>absint( $blog_number ),              
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => 1,
        );
        if ( absint( $blog_category ) > 0 ) {
            $args['cat'] = absint( $blog_category );
        }
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
				    <article>
				    	<div class="blog-item-wrapper ?>">
					      	<?php if(has_post_thumbnail()):?>
						        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
						        	<a href="<?php the_permalink();?>"></a>  
						        </div>
					    	<?php endif;?>

					    	<div class="entry-container">

						        <header class="entry-header">
									<h2 class="entry-title">
										<a href="<?php the_permalink();?>"><?php the_title();?></a>
									</h2>
						        </header>
						        <div class="entry-content">
				 				    <?php
										$excerpt = kiducation_the_excerpt( 20 );
										echo wp_kses_post( wpautop( $excerpt ) );
									?>
						        </div><!-- .entry-content -->
                                <div class="entry-meta">                 
                                    <?php kiducation_entry_meta();?>
                                </div><!-- .entry-meta -->

						        <?php $readmore_text = kiducation_get_option( 'readmore_text' );
                                if (!empty ($readmore_text)) { ?>

						          <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                                <?php } ?>
					        </div><!-- .entry-container -->
					    </div><!-- .post-item -->
				    </article>
	    <?php endwhile; endif;?>
	    <?php wp_reset_postdata(); ?>
  </div>