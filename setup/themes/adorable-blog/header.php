<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * 
 */
global $saraswati_blog_theme_options;

$saraswati_blog_theme_options          = saraswati_blog_get_theme_options();

$saraswati_blog_header_top_enable      = $saraswati_blog_theme_options['saraswati-blog-theme-header-top-enable'];

$saraswati_blog_top_heder_menu_enable  = $saraswati_blog_theme_options['saraswati-blog-top-header-menu'];

$saraswati_blog_header_top_social_link = $saraswati_blog_theme_options['saraswati-blog-header-social'];

$category_id                           = $saraswati_blog_theme_options['saraswati-blog-feature-cat'];

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
wp_body_open();
}
else { do_action( 'wp_body_open' ); }
?>
<div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adorable-blog' ); ?></a>

    <header <?php if( $saraswati_blog_header_top_enable !=1 ) { echo esc_attr("class='hide-top-header'") ; } ?>>
        <?php
        if( $saraswati_blog_header_top_enable ==1 )
        {
            ?>
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <?php
                        if( $saraswati_blog_top_heder_menu_enable == 1 )
                        {  ?>
                            <div class="col-md-7 social-icons">

                                <?php   if (has_nav_menu('top_header'))

                                {

                                    wp_nav_menu( array(

                                        'theme_location' => 'top_header',
                                        'menu_class'     => 'list-inline text-left',

                                    ) );
                                }
                                ?>
                            </div>
                        <?php }

                        if( $saraswati_blog_header_top_social_link ==1 )
                        { ?>

                            <div class="col-md-4 social-links ">
                                <?php
                                if (has_nav_menu('social-link') )
                                {
                                    wp_nav_menu( array(

                                        'theme_location' => 'social-link',
                                        'menu_class'     => 'text-right',

                                    ) );
                                }
                                ?>
                            </div>
                        <?php } ?>


                    </div> <!-- #social-navbar-collapse -->
                   

                </div><!-- .container -->
            </div><!-- .topbar -->



        <?php }
?>
        <nav class="header-nav primary_menu">
            <div class="container">
                <div class="nav-menu cssmenu menu-line-off" id="header-menu-wrap">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_class'     => 'menu list-inline',
                        'menu_id'        => 'primary-menu',
                        'container' => 'ul',

                    ) );
                    ?>


                </div><!-- #header-menu-wrap -->
            </div><!-- .container -->
        </nav><!-- .header-nav -->
        <?php
        if (has_custom_logo())

        { ?>
            <div class="logo-area text-center"><?php 	the_custom_logo(); ?></div>
            <?php
        }
        else
        {

            if (is_front_page() && is_home()) : ?>
                <h1 class="text-center site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                      rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <p class="text-center site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                     rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
            endif;

            ?>

            <?php
            $saraswati_blog_description = get_bloginfo( 'description', 'display' );
            if ( $saraswati_blog_description || is_customize_preview() ) :
                ?>
                <p class="site-description text-center"><?php echo esc_html($saraswati_blog_description) ; /* WPCS: xss ok. */ ?></p>
            <?php endif;  } ?>





        <?php if($category_id > 0 && is_home() ){ ?>

            <div class="header-slider header-slider-style2">

                <?php

                saraswati_blog_slider_images_selection(); ?>

            </div><!-- .slider -->

        <?php } ?>
    </header>
   
    <!-- header end -->
    <div class="main-container">
        <div class="container">
            <div class="row">