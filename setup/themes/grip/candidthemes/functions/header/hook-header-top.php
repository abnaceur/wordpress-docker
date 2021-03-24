<?php
/**
 * Header Hook Element.
 *
 * @package grip
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('grip_before_top_bar')) {
    /**
     * Add divs to wrap top bar
     *
     * @since 1.0.0
     */
    function grip_before_top_bar()
    {
        ?>
        <div class="top-bar">
        <div class="container-inner clearfix">

        <?php
    }
}
add_action('grip_top_bar', 'grip_before_top_bar', 5);


if (!function_exists('grip_top_social_menu')) {
    /**
     * Add social menu on top bar
     *
     * @since 1.0.0
     */
    function grip_top_social_menu()
    {
        global $grip_theme_options;

        //Check if social menu is enabled from customizer
        if (has_nav_menu('social-menu') && ($grip_theme_options['grip-enable-top-header-social'] == 1)) :
            ?>
            <div class="grip-social-top">
                <div class="menu-social-container">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'social-menu',
                        'menu_id' => 'menu-social-1',
                        'container' => 'ul',
                        'menu_class' => 'grip-menu-social'
                    ));
                    ?>
                </div>
            </div> <!-- .grip-social-top -->

        <?php
        endif; //$grip_theme_options['grip-enable-top-header-social']
    }
}
add_action('grip_top_bar', 'grip_top_social_menu', 20);


if (!function_exists('grip_top_menu')) {
    /**
     * Add secondary menu on top bar
     *
     * @since 1.0.0
     */
    function grip_top_menu()
    {
        global $grip_theme_options;

        //Check if secondary menu is enabled from customizer and has menu
        if (has_nav_menu('top-menu') && ($grip_theme_options['grip-enable-top-header-menu'] == 1)) :

            ?>
            <a class="top-menu-icon" href="#">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>


            <div class="offcanvas-menu">

                <nav>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'menu_id' => 'secondary-menu',
                        'container' => 'ul',
                        'menu_class' => 'top-menu'
                    ));
                    ?>
                </nav>
                <a href="#" class="close"></a>

            </div>

        <?php
        endif; // has_nav_menu && $grip_theme_options['grip-enable-top-header-menu']
    }
}
add_action('grip_top_bar', 'grip_top_menu', 25);


if (!function_exists('grip_top_search')) {
    /**
     * Add search form on top bar
     *
     * @since 1.0.0
     */
    function grip_top_search()
    {
        global $grip_theme_options;

        //Check if search is enabled from customizer
        if ($grip_theme_options['grip-enable-top-header-search'] == 1):
            ?>
            <a class="search-icon-box" href="#"><i class="fa fa-search"></i></a>
            <div class="top-bar-search">
                <?php get_search_form(); ?>
                <button type="button" class="close"></button>
            </div>

        <?php
        endif; // $grip_theme_options['grip-enable-top-header-search']
    }
}
add_action('grip_top_bar', 'grip_top_search', 30);


if (!function_exists('grip_after_top_bar')) {
    /**
     * Add ending divs on top bar
     *
     * @since 1.0.0
     */
    function grip_after_top_bar()
    {
        ?>
        </div> <!-- .container-inner -->
        </div> <!-- .top-bar -->

        <?php
    }
}
add_action('grip_top_bar', 'grip_after_top_bar', 40);

if (!function_exists('grip_top_header_right_start')) {
    /**
     * Add container start for top bar right section
     *
     * @since 1.0.0
     */
    function grip_top_header_right_start()
    {
        ?>
        <div class="top-right-col clearfix">
        <?php
    }
}
add_action('grip_top_bar', 'grip_top_header_right_start', 15);

if (!function_exists('grip_top_header_right_end')) {
    /**
     * Add container end for top bar right section
     *
     * @since 1.0.0
     */
    function grip_top_header_right_end()
    {
        ?>
        </div> <!-- .top-right-col -->
        <?php
    }
}
add_action('grip_top_bar', 'grip_top_header_right_end', 35);

if (!function_exists('grip_trending_news')) {
    /**
     * Add trending news section
     *
     * @since 1.0.0
     */
    function grip_trending_news()
    {
        global $grip_theme_options;
        //Check if search is enabled from customizer
        if ($grip_theme_options['grip-enable-trending-news'] == 1):
            $trending_cat = absint($grip_theme_options['grip-trending-news-category']);
            $trending_title = esc_attr($grip_theme_options['grip-enable-trending-news-text']);
            if(is_rtl()){
                $marquee_class = 'trending-right';
            }else{
                $marquee_class = 'trending-left';
            }
            ?>
            <div class="top-left-col trending-wrapper">
                <?php
                $query_args = array(
                    'post_type' => 'post',
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 5,
                    'cat' => $trending_cat
                );

                $query = new WP_Query($query_args);
                if ($query->have_posts()) :
                    if ($trending_title):
                        ?>
                        <strong class="trending-title">
                            <?php echo $trending_title; ?>
                        </strong>
                    <?php
                    endif;
                    ?>
                    <div class="trending-content <?php echo $marquee_class; ?>">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>"
                               title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>

                    </div>
                <?php
                endif;
                ?>
            </div> <!-- .top-right-col -->
        <?php
        endif;
    }
}
add_action('grip_top_bar', 'grip_trending_news', 10);