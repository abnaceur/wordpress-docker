<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

$options = sociable_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="blog-post-item">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ) ?>');">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
            </div><!-- .featured-image -->
        <?php endif; ?>

        <div class="entry-container">
            <?php if ( ! $options['hide_date'] ) : ?>
                <div class="entry-meta">
                    <?php sociable_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>  

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <?php echo sociable_article_footer_meta(); ?>
        </div><!-- .entry-container -->
    </div><!-- .blog-post-item -->

</article><!-- #post-## -->
