<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package AeonMag
 */
global $aeonmag_theme_options;
$social_share = absint($aeonmag_theme_options['aeonmag-single-social-share']);
$image = absint($aeonmag_theme_options['aeonmag-single-page-featured-image']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap card__post__content pt-0 single-post-wrap">
            <div class="card__post__category">
                <?php echo aeonmag_get_category(get_the_ID()); ?>
            </div>
            <?php
            if (is_singular()) :
                the_title('<h1 class="post-title entry-title">', '</h1>');
            else :
                the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                ?>
            <?php endif; ?>
            <div class="post-date mb-4">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        aeonmag_posted_by();
                        aeonmag_posted_on();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </div>
        <?php if($image == 1 ){ ?>
            <div class="post-media">
                <?php aeonmag_post_thumbnail(); ?>
            </div>
        <?php } ?>
        <div class="post-content ">
            

            <div class="content post-excerpt entry-content clearfix">
                <?php
                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'aeonmag'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                
                ));
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'aeonmag'),
                    'after' => '</div>',
                
                ));
                ?>
            </div><!-- .entry-content -->
            <footer class="post-footer entry-footer">
                <?php 
                if( 1 == $social_share ){
                    do_action( 'aeonmag_social_sharing' ,get_the_ID() );
                }
                ?>
            </footer><!-- .entry-footer -->
            <?php the_post_navigation(); ?>
            <div class="clearfix">
                <?php 
                /**
                 * aeonmag_related_posts hook
                 * @since AeonMag 1.0.0
                 *
                 * @hooked aeonmag_related_posts -  10
                 */
                do_action( 'aeonmag_related_posts' ,get_the_ID() );
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->