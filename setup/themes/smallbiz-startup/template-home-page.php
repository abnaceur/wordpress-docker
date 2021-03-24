<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Smallbiz Startup
 */

get_header(); ?>

<div id="content">
  <div id="head-banner">
    <div class="container-fluid">
      <?php $smallbiz_startup_querymed = new WP_query('page_id='.esc_attr(get_theme_mod('smallbiz_startup_pageboxes',true)) ); ?>
        <?php while( $smallbiz_startup_querymed->have_posts() ) : $smallbiz_startup_querymed->the_post(); ?>
          <div class="row">
            <div class="col-lg-7 col-md-7">
              <div class="content-inner-box">
                <?php if ( get_theme_mod('smallbiz_startup_pgboxes_title') != "") { ?>
                  <span><?php echo esc_html(get_theme_mod('smallbiz_startup_pgboxes_title','')); ?></span>
                <?php } ?>
                <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2> 
                <p><?php echo esc_html( wp_trim_words( get_the_content(), 40, '...' ) );  ?></p>
                <div class="pagemore">
                  <a href="<?php the_permalink(); ?>">
                    <?php esc_html_e('GO NOW','smallbiz-startup'); ?>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-5 img-box">
              <div class="img-inner-box">
                <span class="color-inner-box">
                  <?php if (has_post_thumbnail() ){ ?><?php the_post_thumbnail();?><?php } ?>
                  <span class="design-box"></span>
                </span>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <div class="clear"></div>
    </div>
  </div>

  <?php
    $smallbiz_startup_hidepageboxes = get_theme_mod('smallbiz_startup_disabled_pgboxes', '1');
    if( $smallbiz_startup_hidepageboxes == ''){
  ?>
    <div id="services_section" class="text-center">
      <div class="container">
        <?php if ( get_theme_mod('smallbiz_startup_text') != "") { ?>
          <span><?php echo esc_html(get_theme_mod('smallbiz_startup_text','')); ?></span>
        <?php } ?>
        <?php if ( get_theme_mod('smallbiz_startup_title') != "") { ?>
          <h3><?php echo esc_html(get_theme_mod('smallbiz_startup_title','')); ?></h3>
        <?php } ?>
        <div class="row">
          <?php for($p=1; $p<4; $p++) { ?>
          <?php if( get_theme_mod('smallbiz_startup_pageboxes'.$p,false)) { ?>
            <?php $smallbiz_startup_querymed = new WP_query('page_id='.esc_attr(get_theme_mod('smallbiz_startup_pageboxes'.$p,true)) ); ?>
              <?php while( $smallbiz_startup_querymed->have_posts() ) : $smallbiz_startup_querymed->the_post(); ?>
              <div class="col-lg-4 col-md-4">
                <div class="pagecontent">
                  <?php if (has_post_thumbnail() ){ ?>
                    <div class="thumbbx"><?php the_post_thumbnail();?></div>
                  <?php } ?>
                  <div class="text-inner-box">
                    <h4><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h4> 
                    <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );  ?></p>
                  </div>
                  <div class="serv-btn text-right">
                    <a href="<?php the_permalink(); ?>"><i class="fas fa-long-arrow-alt-right"></i></a>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } } ?>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  <?php }?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>