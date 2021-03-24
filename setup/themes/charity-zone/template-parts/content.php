<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity Zone
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
    <header class="entry-header">
        <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');?>
        <hr>
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php
                charity_zone_posted_on();
                ?>
            </div>
        <?php endif; ?>
    </header>
    <?php charity_zone_post_thumbnail(); ?>
    <div class="entry-summary">
        <?php
            the_excerpt();

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'charity-zone'),
                'after' => '</div>',
            ));
        ?>
    </div>
    <footer class="entry-footer">
        <?php charity_zone_entry_footer(); ?>
    </footer>
</article>