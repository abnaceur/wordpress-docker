<?php
/**
 * The template part for header
 *
 * @package VW Life Coach 
 * @subpackage vw-life-coach
 * @since vw-life-coach 1.0
 */
?>

<div id="header" class="p-2 p-lg-0 p-md-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-7 col-3">
        <?php if(has_nav_menu('primary')){ ?>
          <div class="toggle-nav mobile-menu text-md-left my-md-2">
            <button role="tab" onclick="vw_life_coach_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars p-3"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-life-coach'); ?></span></button>
          </div>
        <?php } ?>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-life-coach' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu my-3 clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_life_coach_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-life-coach'); ?></span></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-3 col-md-5 col-9">
        <?php if( get_theme_mod('vw_life_coach_doc_download_link') != '' || get_theme_mod('vw_life_coach_doc_download_text') != ''){ ?>
          <a class="my-3 doc_btn" href="<?php echo esc_url(get_theme_mod('vw_life_coach_doc_download_link',''));?>"><i class="fas fa-download mr-2"></i><?php echo esc_html(get_theme_mod('vw_life_coach_doc_download_text',''));?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>