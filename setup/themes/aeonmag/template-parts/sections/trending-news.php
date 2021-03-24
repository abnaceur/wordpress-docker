<?php 
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * AeonMag Trending Slide Function
 * @since AeonMag 1.0.0
 *
 * @param null
 * @return void
 *
 */
?>	
    <!-- Tranding news  carousel-->
<section class="trending-news-two">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 align-self-center">
        <div class="trending-news">
          <div class="trending-news-inner">
                    <div class="title d-flex align-items-center">
                        <div class="indicator mr-3">
                            <div class="circle"></div>
                        </div>
                        <strong><?php echo esc_html('Trending', 'aeonmag'); ?></strong>
                    </div>
                    <div class="trending-news-slider">
                    <?php 
                        $args = array(
                  'post_type' => 'post',
                  'orderby' => 'comment_count',
                  'post_per_page'=> 10,
              
              );
              // the query
              $the_query = new WP_Query( $args ); 
              if ( $the_query->have_posts()):
              while($the_query->have_posts())
                : $the_query->the_post(); ?>

                        <div class="item-single">
                            <a href="javascript:void(0)">
                              <?php the_title(); ?>
                            </a>
                        </div>
                        <?php endwhile; wp_reset_postdata(); endif; ?>
                      </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
<!-- End Tranding news carousel -->