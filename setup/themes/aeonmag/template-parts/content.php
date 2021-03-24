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
 *
 * @package AeonMag
 */
global $aeonmag_theme_options;
$show_content_from = esc_attr($aeonmag_theme_options['aeonmag-content-show-from']);
$read_more = esc_html($aeonmag_theme_options['aeonmag-read-more-text']);
$social_share = absint($aeonmag_theme_options['aeonmag-show-hide-share']);
$date = absint($aeonmag_theme_options['aeonmag-show-hide-date']);
$category = absint($aeonmag_theme_options['aeonmag-show-hide-category']);
$author = absint($aeonmag_theme_options['aeonmag-show-hide-author']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <?php aeonmag_post_thumbnail('full'); ?>
                <?php 
                if( 1 == $social_share ){
                    do_action( 'aeonmag_social_sharing' ,get_the_ID() );
                }
                ?>
            </div>
        <?php } ?>
        <div class="post-content card__post__content">
            <?php if($category == 1 ){ ?>
                <div class="card__post__category ">
                   <?php
                   echo aeonmag_get_category(get_the_ID());
                    ?>
                </div>
            <?php } ?>
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                    the_title('<h3 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                    ?>
                <?php endif; ?>
            </div>
            <div class="post-meta">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="post-date">
                        <div class="entry-meta">
                            <?php
                            if($author == 1 ){
                                aeonmag_posted_by();
                            }
                            if($date == 1 ){
                                aeonmag_posted_on();
                            }
                            ?>
                        </div><!-- .entry-meta -->
                    </div>
                <?php endif; ?>
            </div>
            <div class="post-excerpt entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'aeonmag'),
                    'after' => '</div>',
                ));
                ?>
                <!-- read more -->
                <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                    <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i
                                class="fa fa-long-arrow-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article><!-- #post- -->