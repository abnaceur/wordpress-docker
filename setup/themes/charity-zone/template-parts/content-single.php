<?php
/**
 *  Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity Zone
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <?php if(has_post_thumbnail()) {?>
            <hr>
                <?php the_post_thumbnail(); ?>
            <hr>
        <?php }?>
        <?php if ('post' === get_post_type()) :?>
            <div class="entry-meta">
                <?php
                charity_zone_posted_on();
                ?>
            </div>
        <?php endif; ?>
    </header>
    <div class="entry-content">
        <?php
        the_content(sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'charity-zone'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            esc_html( get_the_title() )
        ));

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