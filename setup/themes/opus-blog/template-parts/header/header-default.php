<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Opus_Blog
 */
$GLOBALS['opus_blog_theme_options'] = opus_blog_get_options_value();
global $opus_blog_theme_options;
$enable_header = absint($opus_blog_theme_options['opus_blog_enable_top_header']);
$enable_menu = absint($opus_blog_theme_options['opus_blog_enable_top_header_menu']);
$enable_social = absint($opus_blog_theme_options['opus_blog_enable_top_header_social']);
$enable_search = absint($opus_blog_theme_options['opus_blog_enable_top_header_search']);
$enable_cart = absint($opus_blog_theme_options['opus_blog_enable_top_header_woo']);

?>
<header class="default-header">
    <?php if ($enable_header == 1) { ?>
        <section class="top-bar-area">
            <div class="container">
                <?php if ($enable_menu == 1) { ?>
                    <nav id="top-nav" class="left-side">
                        <div class="top-menu">
                            <?php
                            if (has_nav_menu('top')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'top',
                                    'menu_id' => '',
                                    'container' => 'ul',
                                    'menu_class' => ''
                                ));
                            } ?>
                        </div>
                    </nav><!-- .top-nav -->
                <?php } ?>
                
                <?php if ($enable_social == 1) { ?>
                    <div class="right-side">
                        <div class="social-links">
                            <?php
                            if (has_nav_menu('social')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'social',
                                    'menu_id' => 'social-menu',
                                    'menu_class' => 'opus-blog-social-menu',
                                ));
                            }?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
    <?php $header_image = esc_url(get_header_image());
    $header_class = esc_attr(($header_image == "") ? '' : 'header-image');
    ?>
    <section class="main-header <?php echo $header_class; ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="logo">
                <?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>"rel="home"><?php bloginfo('name'); ?></a>
                    </h1>
                    <?php
                else :
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </h1>
                    <?php
                endif;
                $opus_blog_description = get_bloginfo('description', 'display');
                if ($opus_blog_description || is_customize_preview()) :
                    ?>
                    <p class="site-description"><?php echo $opus_blog_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- .site-logo -->
            <div class="menu-area">
                <div class="right-box">
                    <ul>

                    <?php if( $enable_cart == 1 ){ ?>
                        <li>
                            <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                            <ul>
                                <li class="header-cart">
                                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                                        <div class="cart-wrap">
                                            <span>
                                                <i class="fa fa-shopping-bag"></i>
                                            </span>
                                            <span class="cart-inner">
                                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                                            </span>
                                        </div>
                                        <div class="headr_btom_cart">
                                            <ul>
                                                <?php if( !is_cart () ) { ?>
                                                <li class="single-cart">
                                                    <?php the_widget( 'WC_Widget_Cart', '' ); ?>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?> 
                    </li>
                    <?php } ?>
                    <?php if ($enable_search == 1) { ?>
                        <li>
                        <div class="search-wrapper">
                            <div class="search-box">
                                <button class="fa fa-search first_click" aria-hidden="true" style="display: block;"></button>
                                <button class="fa fa-times second_click" aria-hidden="true" style="display: none;"></button>
                            </div>
                            <div class="search-box-text">
                                <?php echo get_search_form(); ?>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                    </ul>
                </div>
                <!-- hamburger -->
                <button class="menu-button">
                    <div class="hum-line line-1"></div>
                    <div class="hum-line line-2"></div>
                    <div class="hum-line line-3"></div>
                </button><!-- end of menu-box -->
                <nav class="main-navigation">
                    <button class="btnc"><span class="fa fa-close"></span></button>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'container' => 'ul',
                        'menu_class'      => '',
                    ));
                    ?>
                </nav>

            </div>
        </div>
        </setion><!-- #masthead -->
</header>