<?php  
    $testimonial_title = kiducation_get_option( 'testimonial_title' );
    $number_of_testimonial_items  = kiducation_get_option( 'number_of_testimonial_items' );
    for( $i=1; $i<=$number_of_testimonial_items; $i++ ) :
        $testimonial_page_posts[] = absint(kiducation_get_option( 'testimonial_page_'.$i ) );
    endfor; 
?>             
    <?php if ( ! empty( $testimonial_title )  ) : ?>
       <div class="section-header">
         <?php if(!empty($testimonial_title)):?>
            <h2 class="section-title"><?php echo esc_html($testimonial_title); ?></h2>                                  
            <div class="separator"></div>
        <?php endif; ?>
        </div><!-- .section-header -->
    <?php endif; ?>
    <div class="section-content">
        <div class="testimonial-slider" data-slick='{"slidesToShow":2 , "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":true, "autoplay": true, "fade": false, "draggable": true }'>      

        <?php $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $testimonial_page_posts ),
            'post__in'      => $testimonial_page_posts,
            'orderby'       =>'post__in', 
        ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    <article>
                            <div class="slick-item">
                                <div class="quote">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/quote.png' ); ?>">
                                </div><!-- .quote -->
                                <div class="client-wrapper">
                                    <div class="featured-image">
                                        <img src="<?php the_post_thumbnail_url('gallery');  ?>">
                                    </div><!-- .featured-image -->
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                    </header>
                                    <div class="entry-content">
                                        <?php 
                                            $excerpt = kiducation_the_excerpt( 20 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->     
                                </div><!-- .client-wrapper -->
                            </div><!-- .slick-item -->
                        </article>
                   
                    <?php endwhile;?>
                <?php wp_reset_postdata(); 
             endif; ?>
       
    </div><!-- .testimonial-slider -->
</div><!-- .section-content -->
