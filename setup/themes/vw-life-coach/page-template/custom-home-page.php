<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_life_coach_before_slider' ); ?>

  <?php if( get_theme_mod('vw_life_coach_slider_arrows') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <?php $vw_life_coach_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_life_coach_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_life_coach_pages[] = $mod;
            }
          }
          if( !empty($vw_life_coach_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_life_coach_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption pt-0">
                <div class="inner_carousel">
                  <h1 class="mb-0 py-0"><?php the_title(); ?></h1>
                  <p class="my-3"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_life_coach_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_life_coach_slider_excerpt_number','25')))); ?></p>
                  <div class="more-btn mt-3 mb-3 mt-lg-5 mb-lg-5 mt-md-5 mb-md-5">
                    <a class="px-3 py-2 px-lg-4 py-lg-3 px-md-4 py-md-3" href="<?php the_permalink(); ?>"><?php esc_html_e('GET STARTED','vw-life-coach');?><span class="screen-reader-text"><?php esc_html_e('GET STARTED','vw-life-coach'); ?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon px-2 py-1 px-lg-3 py-lg-2 px-md-3 py-md-2 rounded-circle" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e('Previous','vw-life-coach'); ?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon px-2 py-1 px-lg-3 py-lg-2 px-md-3 py-md-2 rounded-circle" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e('Next','vw-life-coach'); ?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'vw_life_coach_after_slider' ); ?>

  <section id="services-sec" class="py-5">
    <div class="container">
      <div class="heading-text mb-4 text-center">
        <?php if( get_theme_mod( 'vw_life_coach_section_text') != '') { ?>
          <strong><?php echo esc_html(get_theme_mod('vw_life_coach_section_text',''));?></strong>
        <?php } ?>
        <?php if( get_theme_mod( 'vw_life_coach_section_title') != '') { ?>
          <h2 ><?php echo esc_html(get_theme_mod('vw_life_coach_section_title',''));?></h2>
        <?php } ?>
      </div>
      <div class="row">
        <?php
        $vw_life_coach_catData = get_theme_mod('vw_life_coach_services_category');
        if($vw_life_coach_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $vw_life_coach_catData ,'vw-life-coach')));
          $bgcolor = 1; ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-3 col-md-4">
                <?php the_post_thumbnail(); ?>
              <div class="main-inner-box mx-3 mb-3">
                <?php if(get_theme_mod('vw_life_coach_toggle_postdate',true)==1){ ?>
                  <span class="entry-date p-1"><a href="<?php echo esc_url( get_day_link( $vw_life_coach_archive_year, $vw_life_coach_archive_month, $vw_life_coach_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                <?php } ?>
                <div class="inner-box p-2 text-center">
                  <?php if(get_theme_mod('vw_life_coach_toggle_author',true)==1){ ?>
                    <span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
                  <?php } ?>
                  <?php if(get_theme_mod('vw_life_coach_toggle_comments',true)==1){ ?>
                    <span class="entry-comments"><i class="far fa-comments mr-2"></i><?php comments_number( __('0 Comment', 'vw-life-coach'), __('0 Comments', 'vw-life-coach'), __('% Comments', 'vw-life-coach') ); ?></span>
                  <?php } ?>
                  <h4><a href="<?php the_permalink();?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_life_coach_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_life_coach_slider_excerpt_number','10')))); ?></p>
                </div>
              </div>
            </div>
          <?php if($bgcolor >= 6){ $bgcolor = 0; } $bgcolor++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_life_coach_after_service' ); ?>

  <div id="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>