<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buzz_Magazine
 */
?>
<!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}else { do_action( 'wp_body_open' ); }?>

<div id="page" class="hfeed-site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'buzz-magazine' ); ?></a>
    <header id="masthead" class="site-header">
        <!--.header-info-bar-->
        <div class="hgroup-wrap">
            <?php if (get_theme_mod('top_header_toggle_button' , true)): ?>
                 <div class="top-header">
                    <div class="container">
                        <div class="top-header-wrap">
                                <?php if (get_theme_mod('top_header_section_left_element' ,'social-icon') != 'none'): ?>
                                    <div class="top-header-left">
                                        <?php if (get_theme_mod('top_header_section_left_element' ,'social-icon') == 'address-email'){
                                            buzz_magazine_get_top_header_select_email_number();
                                        }elseif (get_theme_mod('top_header_section_left_element' ,'social-icon') == 'date'){
                                            buzz_magazine_get_top_header_date();
                                        }elseif (get_theme_mod('top_header_section_left_element' ,'social-icon') == 'menu'){
                                            buzz_magazine_get_top_header_menu();
                                        }elseif (get_theme_mod('top_header_section_left_element' ,'social-icon') == 'social-icon'){
                                            buzz_magazine_get_social_icon();
                                        }?>
                                     </div><!-- .top-header-left ends here -->
                                <?php endif;?>
	
	                        <?php if (get_theme_mod('top_header_section_right_element' ,'menu') != 'none'): ?>
                                <div class="top-header-right">
                                        <?php if (get_theme_mod('top_header_section_right_element' ,'menu') == 'address-email'){
                                            buzz_magazine_get_top_header_select_email_number();
                                        }elseif (get_theme_mod('top_header_section_right_element' ,'menu') == 'date'){
                                            buzz_magazine_get_top_header_date();
                                        }elseif (get_theme_mod('top_header_section_right_element' ,'menu') == 'menu'){
                                            buzz_magazine_get_top_header_menu();
                                        }elseif (get_theme_mod('top_header_section_left_element' ,'social-icon') == 'social-icon'){
                                            buzz_magazine_get_social_icon();
                                        }?>
                                </div><!-- .top-header-right ends here -->
                            <?php endif;?>
                        </div>
                    </div><!-- .container ends here -->
                </div>
            <?php endif; ?>
            <!--.header-info-bar-->
            <?php if (get_theme_mod('flash_news_toggle_button' , true)):?>
                <div class="header-info-bar">
                    <div class="container">
                        <div class="header-ifo-bar-wrap">
                            <div class="header-info-bar-left">
                                <span class="notice-info-title">
                                    <?php echo esc_html(get_theme_mod('flash_news_title',''))?>
                                </span>
                                <div class="notification-bar">
                                    <ul class="notification-slider">
                                        <?php
                                        $buzz_magazine_args = array(
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'post__not_in' => get_option( 'sticky_posts' ),
                                        );
                                        $buzz_magazine_category = get_theme_mod('flash_news_filter_category',0);
                                        if ( absint( $buzz_magazine_category ) > 0 ) {
                                            $buzz_magazine_args['cat'] = absint( $buzz_magazine_category );
                                        }
                                        $buzz_magazine_query_for_flash_news_posts = new WP_Query($buzz_magazine_args);
                                        if($buzz_magazine_query_for_flash_news_posts->have_posts()):?>
                                            <?php while ($buzz_magazine_query_for_flash_news_posts->have_posts()):$buzz_magazine_query_for_flash_news_posts->the_post();?>
                                                <?php the_title('<li>','</li>')?>
                                            <?php endwhile;
                                        endif;
                                        wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>

                            <?php
                            if (get_theme_mod('flash_news_social_button',true)): ?>
                                <!--header-info-bar-left-->
                                <div class="follow-us-wrap">
                                    <div class="social-link">
                                        <a  href="javascript:void(0)" class="follow-us"><?php esc_html_e('follow us','buzz-magazine'); ?></a>
                                        <?php
                                        buzz_magazine_get_social_icon()
                                        ?>
                                    </div>
                                </div>
                                <!--.social-links-->
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <!--.header-info-bar-->
            <div class="site-header-middle logo-align-<?php echo esc_attr(get_theme_mod('main_header_logo_layout' ,'left'))?>" >
                <div class="container">
                    <section class="site-branding">
                        <!-- site branding starting from here -->
                        <?php if (has_custom_logo()):?>
                            <h1 class="logo-site-title">
                                <?php the_custom_logo(); ?>
                            </h1>
                        <?php endif;?>
                        <?php if (display_header_text()):?>
                            <div class="site-identity-wrap">
                                <?php
                                $buzz_magazine_description = get_bloginfo('description', 'display'); ?>
                                <?php if (get_bloginfo('name')):?>
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                                <?php endif;?>
                            </div>
                            <p class="site-description"><?php echo esc_html($buzz_magazine_description) ?></p>
                        <?php endif;?>
                    </section>
                    <?php if (get_theme_mod('main_header_advertisement_image','')):?>
                        <!--.site-branding-->
                        <div class="header-advertisement">
                            <figure>
                                <?php $buzz_magazine_advertisement_url = wp_get_attachment_image_url(get_theme_mod('main_header_advertisement_image',''),'full');?>
                                <img src="<?php echo esc_url($buzz_magazine_advertisement_url);?>" />
                            </figure>
                        </div>
                        <!--.header-advertisement-->
                    <?php endif;?>
                </div>
            </div>
            <!--.site-header-middle-->
            <div id="navbar" class="navbar">
                <div class="container">
                    <div class="navbar-wrap">
                        <nav id="site-navigation" class="navigation main-navigation">
                            <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'primary-menu',
                            ));
                            ?>
                        </nav>
                        <!-- main-navigation ends here -->
                        <div class="search-section">
                            <a href="javascript:void(0)" class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i><?php esc_html_e('Search','buzz-magazine');?></a>
                            <?php get_search_form(); ?>
                        </div>
                        <!-- .search-section -->
                    </div>
                </div>
            </div>
        </div>
        <?php buzz_magazine_slider();?>
        <?php buzz_magazine_header_breadcrumb()?>
    </header><!-- header ends here -->
    <div id="content" class="site-content">
