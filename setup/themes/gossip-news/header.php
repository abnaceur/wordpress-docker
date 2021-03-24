<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ample_magazine
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('at-sticky-sidebar'); ?>itemscope itemtype="http://schema.org/WebPage" >
    <?php
    $ample_magazine_site_layout = ample_magazine_get_option('ample_magazine_site_layout_options');
    if($ample_magazine_site_layout=='Boxed'){
    ?>
<div class="box">
    <div class="wraper">

<?php
}

if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
else { do_action( 'wp_body_open' ); }
?>
<div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gossip-news' ); ?></a>
    <a href="#" class="scrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
<div class="wraper">

    <?php

global $ample_magazine_header_image,$ample_magazine_header_style;
$ample_magazine_header_image = get_header_image();

if( $ample_magazine_header_image ){
    $ample_magazine_header_style = $ample_magazine_header_image;

} else{

    $ample_magazine_header_style = '';
}
    do_action('ample_magazine_trending_news');

     ?>


<div class="header-background">

    <div id="header-bar" class="header-bar">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="current-date">
                        <i class="fa fa-calendar-check-o"></i><?php echo esc_html( date_i18n( 'l, F j, Y' ) ); ?>
                    </div>

	                    <?php
                        if ( has_nav_menu( 'top-menu' ) ) {

                            wp_nav_menu(array(
                                'theme_location' => 'top-menu',
                                'menu_class' => 'menu-design top-menu',
                                'container' => 'ul',
                            ));
                        }
	                    ?>

                </div><!--/ Top bar left end -->
<?php
$ample_magazine_show_hide = ample_magazine_get_option('ample_magazine_header_social_option');
$ample_magazine_facebook = ample_magazine_get_option('ample_magazine_facebook_url');
$ample_magazine_twitter = ample_magazine_get_option('ample_magazine_twitter_url');
$ample_magazine_instagram = ample_magazine_get_option('ample_magazine_Google+_url');
$ample_magazine_linkedin = ample_magazine_get_option('ample_magazine_linkedin_url');
 ?>
<div class="col-md-4 col-sm-4 col-xs-12 top-social text-right">
    <?php if($ample_magazine_show_hide=='show'){?>
        <ul class="menu-design">
            <li>
                <?php if(!empty($ample_magazine_facebook)){?>
                    <a  aria-label="<?php  esc_attr_e('Facebook','gossip-news');?>" class='fb'title="<?php esc_attr_e('Facebook','gossip-news');?>" href="<?php echo esc_url($ample_magazine_facebook); ?>">
                        <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                    </a>
                <?php } if(!empty($ample_magazine_twitter)){?>
                    <a  aria-label="<?php  esc_attr_e('Twitter','gossip-news');?>" class='tw' title="<?php esc_attr_e('Twitter','gossip-news');?>" href="<?php echo esc_url($ample_magazine_twitter); ?>">
                        <span class="social-icon"><i class="fab fa-twitter"></i></span>
                    </a>
                <?php } if(!empty($ample_magazine_instagram)){?>
                    <a  aria-label="<?php  esc_attr_e('Instagram','gossip-news');?>" class="goggle" title="<?php esc_attr_e('Instagram','gossip-news');?>" href="<?php echo esc_url($ample_magazine_instagram ); ?>">
                        <span class="social-icon"><i class="fab fa-instagram"></i></span>
                    </a>
                <?php } if(!empty($ample_magazine_linkedin)){?>
                    <a  aria-label="<?php  esc_attr_e('Linkdin','gossip-news');?>" class='linkdin' title="<?php esc_attr_e('Linkdin','gossip-news');?>" href="<?php echo esc_url($ample_magazine_linkedin); ?>">
                        <span class="social-icon"><i class="fab fa-linkedin-in"></i></span>
                    </a>

                <?php } ?>

            </li>
        </ul><!-- Ul end -->
    <?php } ?>


</div><!--/ Top social col end -->
            </div><!--/ Content row end -->
        </div><!--/ Container end -->
    </div><!--/ Topbar end -->
<?php
$ample_magazine_header_option = ample_magazine_get_option('ample_magazine_header_layout_option');
if($ample_magazine_header_option=='layout2'){
?>
    <header id="header" class="header layout-header1" itemtype="https://schema.org/WPHeader" itemscope="itemscope" style="background-image: url(<?php echo esc_url($ample_magazine_header_style); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="site-branding" itemtype="https://schema.org/Organization" itemscope="itemscope">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                         }
                        if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                        <?php else : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                            <?php
                        endif;

                        $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                                <?php
                            endif;
                        ?>
                    </div><!-- .site-branding -->

                </div><!-- logo col end -->


            </div><!-- Row end -->
        </div><!-- Logo and banner area end -->
    </header><!--/ Header end -->


<?php }else{?>

    <!-- Header start -->
    <header id="header" class="header"  style="background-image: url(<?php echo esc_url($ample_magazine_header_style); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">

                    <div class="site-branding">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                         }if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                        <?php else : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                            <?php
                        endif;
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) : ?>
                            <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                            <?php
                        endif; ?>
                    </div><!-- .site-branding -->

                </div><!-- logo col end -->

                <div class="col-xs-12 col-sm-9 col-md-9 header-right">
                    <div class="ad-banner pull-right">
                        <?php dynamic_sidebar('advertisement'); ?>
                    </div>
                </div><!-- header right end -->
            </div><!-- Row end -->
        </div><!-- Logo and banner area end -->
    </header><!--/ Header end -->
<?php }
if (  is_admin() ) {?>
    <div class="admin-bar">
      <?php }  ?>
    <div id="menu-primary" class="main-menu clearfix">
        <div class="container">
            <div class="row">
                <nav class="site-navigation navigation">
                    <div class="site-nav-inner pull-left">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only"><?php esc_html_e('Toggle navigation','gossip-news') ?></span>
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse navbar-responsive-collapse" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope">
                            <li class="home-buttom navbar-nav"><a aria-label="<?php  esc_attr_e('Home Page','gossip-news');?> href="<?php echo esc_url(home_url('/')); ?>">
                                    <i class="fa fa-home"></i> </a></li>
	                        <?php
                            if ( has_nav_menu( 'primary' ) ) {

                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'nav navbar-nav',
                                    'container' => 'ul',

                                ));
                            }
	                        ?>

                        </div><!--/ Collapse end -->

                    </div><!-- Site Navbar inner end -->
                </nav><!--/ Navigation end -->

                <div class="nav-search">
                    <button id="search"> <i class="fa fa-search"></i> </button>
                </div><!-- Search end -->

                <div class="search-block" style="display: none;">
                    <?php get_search_form();?>
                </div><!-- Site search end -->

            </div><!--/ Row end -->
        </div><!--/ Container end -->

    </div><!-- Menu wrapper end -->

       <?php if ( ! is_admin() ) {?>
        </div>
            <?php }


    ?>




