<?php
/**
 * Template Name: Home
 *
 * @package Buzz_Magazine
 */
get_header();
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="section-wrap <?php echo esc_attr(get_theme_mod('buzz_magazine_global_sidebar' ,'right')); ?>-sidebar">
                        <div class="sidebar">
                           <?php dynamic_sidebar( 'sidebar-home-1' );?>
                        </div>
                    <?php if(is_active_sidebar('home-content-1')):?>
                        <div class="section-left">
                          <?php dynamic_sidebar( 'home-content-1' ); ?>
                          <?php if (is_active_sidebar('home-content-left') || is_active_sidebar('home-content-right') ):?>
                            <div class="section-wrap-other">
                              <?php dynamic_sidebar('home-content-left')?>
                              <?php dynamic_sidebar('home-content-right')?>
                            </div>
                          <?php endif;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if ( is_active_sidebar('single-feature-section')){
                    echo '<div class="single-featured-section">';
                        echo '<div class="container">';
                         dynamic_sidebar('single-feature-section');
                        echo '</div>';
                    echo '</div>';
            }?>
            <div class="container">
                    <div class="section-wrap <?php echo esc_attr(get_theme_mod('buzz_magazine_bottom_home_sidebar' ,'right')); ?>-sidebar">
                            <div class="sidebar">
                                <?php dynamic_sidebar( 'sidebar-home-2' );?>
                            </div>
                        <?php if( is_active_sidebar('home-content-2')):?>
                            <div class="section-left">
                                <?php dynamic_sidebar( 'home-content-2' ); ?>
                            </div>
                        <?php endif;?>
                    </div>
                    <?php if (is_active_sidebar('home-bottom-section-1') || is_active_sidebar('home-bottom-section-2') || is_active_sidebar('home-bottom-section-3')):?>
                         <div class="section-wrap-column">
                                <?php dynamic_sidebar('home-bottom-section-1')?>
                                <?php dynamic_sidebar('home-bottom-section-2')?>
                                <?php dynamic_sidebar('home-bottom-section-3')?>
                        </div>
                    <?php endif;?>
                </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();

