<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buzz_Magazine
 */

get_header();
?>
    <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php if ( have_posts() ) :?>
                        <div class="post-item-wrapper">
                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();

                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_type() );

                            endwhile;

                            if (get_theme_mod('radio_button_post_navigation_archive','older-newer') == 'older-newer'):
                                the_posts_navigation();

                            else:
                                the_posts_pagination();

                            endif;
                            ?>
                        </div>
                    <?php else :
	                         get_template_part( 'template-parts/content', 'none' );
                    ?>
                    <?php endif;?>
                </main><!-- #main -->
            </div><!-- #primary -->
        <?php get_sidebar();?>
    </div>
<?php
get_footer();
