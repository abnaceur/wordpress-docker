<?php
/**
 * The template part for top header
 *
 * @package VW Life Coach
 * @subpackage vw-life-coach
 * @since vw-life-coach 1.0
 */
?>

<div class="middle-bar text-center text-lg-left text-md-left py-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_life_coach_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title py-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_life_coach_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title py-1 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_life_coach_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <?php if( get_theme_mod('vw_life_coach_email_text') != '' || get_theme_mod('vw_life_coach_email_address') != ''){ ?>
          <p class="py-2 py-lg-3 py-md-3 mb-0"><i class="far fa-envelope mr-2"></i><?php echo esc_html(get_theme_mod('vw_life_coach_email_text',''));?>: <?php echo esc_html(get_theme_mod('vw_life_coach_email_address',''));?></p>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-md-2">
        <?php if( get_theme_mod('vw_life_coach_phone_text') != '' || get_theme_mod('vw_life_coach_phone_number') != ''){ ?>
          <p class="py-2 py-lg-3 py-md-3 mb-0"><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('vw_life_coach_phone_text',''));?>: <?php echo esc_html(get_theme_mod('vw_life_coach_phone_number',''));?></p>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-md-2">
        <?php dynamic_sidebar('social-links'); ?>
      </div>
      <div class="col-lg-2 col-md-2">
        <?php if( get_theme_mod('vw_life_coach_cosulation_btn_text') != '' || get_theme_mod('vw_life_coach_cosulation_btn_link') != ''){ ?>
          <div class="cosulation-btn my-2 text-center text-lg-right text-md-center">
            <a class="py-2 px-3" href="<?php echo esc_url(get_theme_mod('vw_life_coach_cosulation_btn_link',''));?>"><i class="far fa-user mr-2"></i><?php echo esc_html(get_theme_mod('vw_life_coach_cosulation_btn_text',''));?></a>
          </div>
          <?php } ?>
      </div>
    </div>
  </div>
</div>