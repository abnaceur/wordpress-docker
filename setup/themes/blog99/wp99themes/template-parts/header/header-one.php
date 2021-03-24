<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
$blog99_header_social_enable    = get_theme_mod('blog99_header_social_section_disable', true);
$blog99_header_hide_description = get_theme_mod('blog99_header_hide_description', false);

$header_menu_class = 'col-xl-9 col-lg-9 col-md-9 col-sm-12  col-xs-12 align-self-center navwrap';

if( $blog99_header_social_enable == 1 || get_theme_mod('blog99_header_disable_search', true) || get_theme_mod('blog99_header_disable_cart', false) ){
    
    $header_menu_class = 'col-xl-6 col-lg-6 col-md-6 col-sm-12  col-xs-12 align-self-center navwrap';

} ?>

<header class="blog99-header blog99-header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 align-self-center">
                <div class="site-branding">

                    <?php the_custom_logo(); ?>
                    
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    
                    <?php
                        if( !$blog99_header_hide_description):

                        $blog99_description = get_bloginfo( 'description', 'display' );

                        if ( $blog99_description || is_customize_preview() ) :
                    ?>
                        <p class="site-description"><?php echo esc_html( $blog99_description ); ?></p>
                    
                    <?php endif; endif; ?>

                </div><!-- .site-branding -->

               
            </div><!-- end header logo -->

            <div class="<?php echo esc_attr( $header_menu_class ); ?>">
                <button class="header-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button><!-- .nav-toggle -->
                <div class="blog99-navmenu">
                    <nav id="site-navigation" class="box-header-nav main-menu-wapper main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'blog99' ); ?>">
                        <?php
                            wp_nav_menu( array(
                                    'theme_location'  => 'menu-1',
                                    'menu'            => 'primary-menu',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'main-menu',
                                )
                            );
                        ?>
                    </nav>
                </div>
            </div><!-- end header nav -->

            <?php if( $blog99_header_social_enable == true || get_theme_mod('blog99_header_disable_cart', true) || get_theme_mod('blog99_header_disable_search', true) ): ?>
                
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 align-self-center pl-0">
                    <?php
                        $blog99_facebook_url    = get_theme_mod('blog99_facebook_url');
                        $blog99_twitter_url     = get_theme_mod('blog99_twitter_url');
                        $blog99_youtube_url     = get_theme_mod('blog99_youtube_url');
                        $blog99_pinintrest_url  = get_theme_mod('blog99_pinintrest_url');
                    ?>
                    <ul class="blog99-social-links blog99-social-right">
                        <?php if( $blog99_header_social_enable == true) : ?>
                            <?php if( $blog99_facebook_url ): ?><li><a href="<?php echo esc_url( $blog99_facebook_url ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php endif; ?>
                            <?php if( $blog99_youtube_url ): ?><li><a href="<?php echo esc_url( $blog99_youtube_url ); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li><?php endif; ?>
                            <?php if( $blog99_twitter_url ): ?><li><a href="<?php echo esc_url( $blog99_twitter_url ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php endif; ?>
                            <?php if( $blog99_pinintrest_url ): ?><li><a href="<?php echo esc_url( $blog99_pinintrest_url ); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li><?php endif; ?>
                        <?php endif; ?>
                        <?php 
                            if( get_theme_mod('blog99_header_disable_cart', false) == true ){
                               
                                do_action('blog99_woocommerce_header_cart_section');
                            }
                         ?>

                        <?php do_action('blog99_header_search_section'); ?>

                    </ul>

                </div><!-- end social section -->

            <?php endif; ?>

        </div>
    </div>
</header>