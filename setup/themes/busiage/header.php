<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Agencyup
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'agencyup' ); ?></a>
<div class="wrapper">
 <header class="bs-headwidget">
      <div class="clearfix"></div>
      <div class="header_widgets d-none d-md-block">
        <div class="container">
          <div class="row align-items-center px-3">
            <div class="navbar-header"> 
             <?php the_custom_logo(); 
              if (display_header_text()) : ?>
                <div class="site-branding-text navbar-brand">
                  <h1 class="site-title"> 
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                  <?php echo esc_html(get_bloginfo('name')); ?>
                  </a>
                  </h1>
                  <p class="site-description"><?php bloginfo('description'); ?></p>
                </div>
              <?php endif; ?>
            </div>
            <!-- /navbar-toggle -->
            <?php do_action('icycp_busiage_top_header'); ?>
          </div>
        </div>
      </div>
      <div class="container mobi-menu"> 
          <div class="navbar-header"> 
            <?php the_custom_logo(); 
                       if (display_header_text()) : ?>
                          <div class="site-branding-text navbar-brand">
                            <h1 class="site-title"> 
                              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                              <?php 
                              echo esc_html(get_bloginfo('name'));
                              ?>
                              </a>
                            </h1>
                                <p class="site-description"><?php bloginfo('description'); ?></p>
                            </div>
                        <?php endif; ?><!-- /Logo --> 
            <!-- navbar-toggle -->
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="my-1 mx-2 close fa fa-times"></span>
              <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
          </div>
        </div> 
      <div class="container desk-menu">
          <div class="bs-main-nav">
        <nav class="navbar navbar-expand-lg navbar-wp">  
          
          <!-- Navigation -->
          <div class="collapse navbar-collapse">
            <?php wp_nav_menu( array(
              'theme_location' => 'primary',
              'container'  => 'collapse navbar-collapse',
              'menu_class' => 'nav navbar-nav mr-auto',
              'fallback_cb' => 'agencyup_fallback_page_menu',
              'walker' => new agencyup_nav_walker()
                ) ); ?>
          </div>
          
          <div class="desk-header pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
            <?php $hide_show_nav_menu_btn = get_theme_mod('hide_show_nav_menu_btn','1'); 
                  $menu_btn_label = get_theme_mod('menu_btn_label');
                  $menu_btn_link = get_theme_mod('menu_btn_link');
                  $menu_btn_target = get_theme_mod('menu_btn_target','1');
          if($hide_show_nav_menu_btn == '1') { if($menu_btn_label) { ?>
                  <a <?php if($menu_btn_target == '1') { ?> target ="_blank" <?php } ?> href="<?php echo esc_url($menu_btn_link); ?>" class="btn btn-theme ml-2 mr-1 d-none d-md-block"><?php echo esc_html($menu_btn_label); ?></a>
                <?php } } ?>
          </div>
                  
        
        </nav>
      </div>
    </div>
    </header>