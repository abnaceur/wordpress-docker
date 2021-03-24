<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crazystore
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <div id="page" class="site">

    <?php
        /**
         * @see  sparklestore_skip_links() - 5
         */
        do_action('sparklestore_header_before');

        remove_action('sparklestore_header', 'sparklestore_main_header', 20);
        /**
         * @see  sparklestore_top_header() - 15
         * @see  sparklestore_main_header() - 20
         * @see  crazystore_main_header() - 25
        */
        do_action('sparklestore_header');

        

        do_action('sparklestore_header_after');
    ?>

    <div class="header-nav">
        <div class="container">
            <div class="header-nav-inner">
                <?php do_action( 'sparklestore_header_vertical' ); ?>
                <div class="box-header-nav main-menu-wapper">
                    <div class="main-menu sp-clearfix">
                        <div class="main-menu-links">
                            <?php
                                wp_nav_menu( array(
                                        'theme_location'  => 'sparkleprimary',
                                        'menu'            => 'primary-menu',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => 'main-menu',
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
                <?php if ( sparklestore_is_woocommerce_activated() ): ?>
                <button type="button" class="search-wrapper">
                    <i class="icofont-search"></i>
                </button>
                <?php endif; ?>
            </div>
            <div class="category-search-form searchform-wrapper">
                <?php 
                    /**
                     * Normal & Advance Search
                    */
                    if ( sparklestore_is_woocommerce_activated() ) {

                        sparklestore_advance_product_search_form();
                    }
                ?>
            </div>
        </div>
    </div>
    <div id="site-content">
    <?php 
        if( is_front_page() ){ 

            $slider_options   = get_theme_mod( 'sparklestore_slider_options', 'on' );
            $vertical_menu    = get_theme_mod( 'sparklestore_vertical_menu_options','on' );

            if(!empty( $slider_options ) && $slider_options == 'on' ){

                $slider_layout = get_theme_mod( 'sparklestore_slider_layout_options', 'fullslider'); ?>
                
                <div class="<?php if( !empty( $slider_layout ) && $slider_layout == 'fullslider' ){ echo esc_attr( 'fullwidthslider' ); }else{ echo esc_attr( 'container' );  } ?>">
                    <div class="slider-inner-wrap <?php echo esc_attr( $slider_layout ); ?> <?php echo esc_attr( $vertical_menu ); ?>">
                        <?php 
                            if( !empty( $slider_layout ) && $slider_layout == 'verticalmenu' ){

                                do_action('sparklestore-slider');

                            }elseif( !empty( $slider_layout ) && $slider_layout == 'sliderpromo' ){

                                do_action( 'sparklestore_slider_with_promo_images' );

                            }else{

                                do_action('sparklestore-slider');

                            }
                        ?>
                    </div>
                </div>
                <?php
            } 
        }   
   