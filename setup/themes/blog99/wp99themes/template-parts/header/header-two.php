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
$blog99_header_social_enable    = get_theme_mod('blog99_header_social_section_disable',true);
$blog99_header_enable_cart      = get_theme_mod('blog99_header_disable_cart', false);
$blog99_header_enable_search    = get_theme_mod('blog99_header_disable_search', true);
$blog99_header_hide_description = get_theme_mod('blog99_header_hide_description', false);

$header_menu_class = 'col-xl-9 col-lg-9 col-md-9 col-12 align-self-center p-0 navwrap';

if( $blog99_header_social_enable == 1 && ($blog99_header_enable_search == true || $blog99_header_enable_cart == true) ){
    
    $header_menu_class = 'col-xl-7 col-lg-7 col-md-7 col-12 align-self-center p-0 navwrap';

}else if( $blog99_header_social_enable == false && ($blog99_header_enable_search == true || $blog99_header_enable_cart == true) ){
    
    $header_menu_class = 'col-xl-10 col-lg-10 col-md-10 col-12 align-self-center p-0 navwrap';

}else if( $blog99_header_enable_search == false && $blog99_header_enable_cart == false && $blog99_header_social_enable == false){
    
    $header_menu_class = 'col-12 align-self-center p-0 navwrap';
}

?>

<header class="blog99-header">
    <div class="container">
        <div class="header-logo-site-title">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
                
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>

                <?php
                    if( !$blog99_header_hide_description):

                    $blog99_description = get_bloginfo( 'description', 'display' );

                    if ( $blog99_description || is_customize_preview() ) :
                ?>
                    <p class="site-description"><?php echo esc_html( $blog99_description ); ?></p>
                
                <?php endif; endif; ?>
            </div><!-- .site-branding -->

            <button class="header-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button><!-- .nav-toggle -->
        </div>

        <div class="blog99-header-two-wrapper blog99-header-sticky">
            <div class="row">
                <?php if( $blog99_header_social_enable == true ): ?>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 align-self-center">
                        <?php
                            //social links section
                            $blog99_facebook_url    = get_theme_mod('blog99_facebook_url');
                            $blog99_twitter_url     = get_theme_mod('blog99_twitter_url');
                            $blog99_youtube_url     = get_theme_mod('blog99_youtube_url');
                            $blog99_pinintrest_url  = get_theme_mod('blog99_pinintrest_url');
                        ?>
                        <ul class="blog99-social-links text-left pl-2">
                            <?php if( $blog99_facebook_url ): ?><li><a href="<?php echo esc_url( $blog99_facebook_url ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php endif; ?>
                            <?php if( $blog99_youtube_url ): ?><li><a href="<?php echo esc_url( $blog99_youtube_url ); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li><?php endif; ?>
                            <?php if( $blog99_twitter_url ): ?><li><a href="<?php echo esc_url( $blog99_twitter_url ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php endif; ?>
                            <?php if( $blog99_pinintrest_url ): ?><li><a href="<?php echo esc_url( $blog99_pinintrest_url ); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><!-- End Social Section -->

                <div class="<?php echo esc_attr( $header_menu_class ); ?>">
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
                </div><!-- end header nav -->

                <?php if( $blog99_header_enable_cart == true || $blog99_header_enable_search == true ): ?>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 align-self-center">                        
                        <ul class="blog99-social-links blog99-social-right pr-2">
                            <?php 
                                //cart
                                if( get_theme_mod('blog99_header_disable_cart', false) == true ){
                                    
                                    do_action('blog99_woocommerce_header_cart_section');
                                }
                            ?><!-- end header cart buttom -->
                        
                            <?php do_action('blog99_header_search_section'); ?>
                            <!-- endif section -->
                        </ul>
                    </div><!-- end social section -->
                <?php endif; ?><!-- End Social Section -->
            </div>
        </div>
    </div>
</header>