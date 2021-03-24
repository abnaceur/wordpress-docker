<?php
$params = array('posts_per_page' => -1, 'post_type' => 'product');
$wc_query = new WP_Query($params);
if ($wc_query->have_posts()) : ?>
<section class="dishes-area">
     <div class="container">
          <div class="row">
               <ul class="dishes-list">
                    <?php while ($wc_query->have_posts()) :
                        $wc_query->the_post(); 
                        $product = get_product(get_the_ID()); ?>
                    <li>
                        <?php the_post_thumbnail(); ?>
                        <?php if($product->is_on_sale()) : ?>
                        <p class="sale">
                        <?php _e('Sale!', 'foodiz'); ?>
                        </p>
                        <?php endif; ?>
                        <h3 class="dish-title">
                            <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                            </a>
                        </h3>

                        <h5 class="prize"> <?php echo $product->get_price_html(); ?> </h5> 
                         
                    </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <li>
                         <?php _e( 'No Products','foodiz' ); ?>
                    </li>
               </ul>
               <?php endif; ?>
          </div>
     </div>
</section>
