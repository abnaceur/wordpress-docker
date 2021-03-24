<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_writer_blog_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_writer_blog_slider_hide_show') != '') { ?>

  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'vw_writer_blog_slider_speed',3000)) ?>"> 
      <?php $vw_writer_blog_slider_page = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_writer_blog_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_writer_blog_slider_page[] = $mod;
          }
        }
        if( !empty($vw_writer_blog_slider_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_writer_blog_slider_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <span class="slider-date"><?php echo esc_html( get_the_date()); ?></span>
                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_writer_blog_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_writer_blog_slider_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_writer_blog_slider_button_text','READ MORE') != ''){ ?>
                  <div class="more-btn">              
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_writer_blog_slider_button_text',__('READ MORE','vw-writer-blog')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_writer_blog_slider_button_text',__('READ MORE','vw-writer-blog')));?></span></a><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_slider_button_icon','fas fa-long-arrow-alt-right')); ?>"></i>
                  </div>
                <?php } ?>
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
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-writer-blog' );?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-writer-blog' );?></span>
      </a>
    </div>  
    <div class="clearfix"></div>
  </section>

  <?php } ?>

  <?php do_action( 'vw_writer_blog_after_slider' ); ?>

  <?php if( get_theme_mod( 'vw_writer_blog_section_title') != '' || get_theme_mod( 'vw_writer_blog_featured_articles') != '') { ?>

  <section id="articles">
    <div class="container">
      <?php if( get_theme_mod('vw_writer_blog_section_title') != ''){ ?>
        <h2><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_section_title_icon','fas fa-edit')); ?>"></i><?php echo esc_html(get_theme_mod('vw_writer_blog_section_title','')); ?></h2>
      <?php }?>
      <div class="row">
        <?php
           $vw_writer_blog_catData1=  get_theme_mod('vw_writer_blog_featured_articles');
            if($vw_writer_blog_catData1){
          $page_query = new WP_Query(array( 'category_name' => esc_html($vw_writer_blog_catData1 ,'vw-writer-blog'))); ?>      
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-3 col-md-6">
              <div class="box <?php if(has_post_thumbnail()) { } else { echo 'bg-color'; }?> ">
                <?php the_post_thumbnail(); ?>
                <div class="box-content">
                  <h3><?php the_title(); ?></h3>
                  <?php if(get_theme_mod('vw_writer_blog_toggle_postdate',true)==1){ ?>
                    <i class="fas fa-calendar-alt"></i><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
                  <?php } ?>

                  <?php if(get_theme_mod('vw_writer_blog_toggle_comments',true)==1){ ?>
                    <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-writer-blog'), __('0 Comments', 'vw-writer-blog'), __('% Comments', 'vw-writer-blog') ); ?> </span>
                  <?php } ?>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_writer_blog_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_writer_blog_article_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_writer_blog_article_button_text','READ MORE') != ''){ ?>
                    <div class=" read-more-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_writer_blog_article_button_text',__('READ MORE','vw-writer-blog')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_writer_blog_article_button_text',__('READ MORE','vw-writer-blog')));?></span></a><i class="<?php echo esc_attr(get_theme_mod('vw_writer_blog_articles_button_icon','fas fa-long-arrow-alt-right')); ?>"></i>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
        ?>
      </div>
    </div>
  </section>

  <?php } ?>

  <?php do_action( 'vw_writer_blog_after_articles' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>