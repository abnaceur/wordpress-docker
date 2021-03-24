<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Smallbiz Startup
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'smallbiz-startup' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'smallbiz_startup_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

<div class="header-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="logo text-center">
          <?php smallbiz_startup_the_custom_logo(); ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
          <?php if ( ! empty( $blog_info ) ) : ?>
            <div class="site-branding-text">
              <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <span class="site-description"><?php echo esc_html( $description ); ?></span>
              <?php endif; ?> 
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <a class="mailaddress" href="mailto:<?php echo esc_attr(get_theme_mod ('smallbiz_startup_email_address','')); ?>"><?php echo esc_html(get_theme_mod ('smallbiz_startup_email_address','')); ?></a>
      </div>
      <div class="col-lg-5 col-md-4">
        <div class="social-icons">
          <?php if ( get_theme_mod('smallbiz_startup_fb_link') != "") { ?>
            <a title="<?php esc_attr('facebook', 'smallbiz-startup'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('smallbiz_startup_fb_link')); ?>"><i class="fab fa-facebook-f"></i></a> 
          <?php } ?>
          <?php if ( get_theme_mod('smallbiz_startup_twitt_link') != "") { ?>
            <a title="<?php esc_attr('twitter', 'smallbiz-startup'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('smallbiz_startup_twitt_link')); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>
          <?php if ( get_theme_mod('smallbiz_startup_linked_link') != "") { ?> 
            <a title="<?php esc_attr('linkedin', 'smallbiz-startup'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('smallbiz_startup_linked_link')); ?>"><i class="fab fa-linkedin-in"></i></a>
          <?php } ?>
          <?php if ( get_theme_mod('smallbiz_startup_insta_link') != "") { ?> 
            <a title="<?php esc_attr('instagram', 'smallbiz-startup'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('smallbiz_startup_insta_link')); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>
          <?php if ( get_theme_mod('smallbiz_startup_youtube_link') != "") { ?> 
            <a title="<?php esc_attr('youtube', 'smallbiz-startup'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('smallbiz_startup_youtube_link')); ?>"><i class="fab fa-youtube"></i></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-9 col-4">
        <div class="toggle-nav text-md-right">
          <?php if(has_nav_menu('primary')){ ?>
            <button role="tab"><?php esc_html_e('MENU','smallbiz-startup'); ?></button>
          <?php }?>
        </div>
        <div id="mySidenav" class="nav sidenav text-left text-lg-right">
          <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','smallbiz-startup' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','smallbiz-startup'); ?></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-8">
        <?php if ( get_theme_mod('smallbiz_startup_contact_us_text') != "" || get_theme_mod('smallbiz_startup_contact_us_url') != "") { ?> 
          <div class="contact-us text-right">
            <a href="<?php echo esc_url(get_theme_mod ('smallbiz_startup_contact_us_url','')); ?>"><?php echo esc_html(get_theme_mod ('smallbiz_startup_contact_us_text','CONTACT US','smallbiz-startup')); ?></a>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>