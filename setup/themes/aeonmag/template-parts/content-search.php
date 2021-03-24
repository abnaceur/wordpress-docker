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
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AeonMag
 */
global $aeonmag_theme_options;
$category = absint($aeonmag_theme_options['aeonmag-show-hide-category']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <?php aeonmag_post_thumbnail('full'); ?>
            </div>
        <?php } ?>
        <div class="post-content card__post__content">
            <?php if($category == 1 ){ ?>
                <div class="card__post__category">
                  <?php echo aeonmag_get_category(get_the_ID()); ?>
              </div>
            <?php } ?>

            <div class="date_title">
                
                <?php the_title(sprintf('<h3 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
            </div>
            <div class="post-date">
                    <?php if ('post' === get_post_type()) : ?>
                        <div class="entry-meta">
                            <?php
                            aeonmag_posted_on();
                            aeonmag_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </div>
            <div class="post-excerpt entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->

            <footer class="post-footer entry-footer">
                <?php do_action( 'aeonmag_social_sharing' ,get_the_ID() );?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-->

