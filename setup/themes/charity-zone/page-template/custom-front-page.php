<?php
/**
 * Template Name: Custom Front Page
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php $charity_zone_slide_pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'charity_zone_top_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $charity_zone_slide_pages[] = $mod;
        }
      }
      if( !empty($charity_zone_slide_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $charity_zone_slide_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="slider-inner-box">
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>

  <section id="serve-sec">
    <div class="container">
      <div class="row">
        <?php
          $charity_zone_catData = get_theme_mod('charity_zone_services','');
          if($charity_zone_catData){
            $charity_zone_page_query = new WP_Query(array( 'category_name' => esc_html($charity_zone_catData,'charity-zone')));
            while( $charity_zone_page_query->have_posts() ) : $charity_zone_page_query->the_post(); ?>
              <div class="col-lg-4 col-md-4">
                <div class="serv-box">
                  <?php the_post_thumbnail(); ?>
                  <h4><a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                  <p><?php $charity_zone_excerpt = get_the_excerpt(); echo esc_html( charity_zone_string_limit_words( $charity_zone_excerpt,8 ) ); ?></p>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
      </div>
    </div>
  </section>

  <section id="about_sec">
    <div class="container">
      <?php $charity_zone_about_pages = array();
        $mod = intval( get_theme_mod( 'charity_zone_about_page' ));
        if ( 'page-none-selected' != $mod ) {
          $charity_zone_about_pages[] = $mod;
        }
        if( !empty($charity_zone_about_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $charity_zone_about_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
      ?>
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="about-inner-box">
              <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
              <div class="donate-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Donate Now','charity-zone'); ?></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
    </div>
  </section>
</main>

<?php get_footer(); ?>