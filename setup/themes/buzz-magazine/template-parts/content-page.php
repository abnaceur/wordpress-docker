<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buzz_Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div <?php post_class('page-wrap contact-information');?> >
        <div class="heading">
            <header class="entry-header">
                <h3 class="entry-title">
                  <?php the_title(); ?>
                </h3>
            </header>
        </div>

         <?php if (has_post_thumbnail()): ?>
            <figure>
                <?php the_post_thumbnail('full'); ?>
            </figure>
        <?php endif; ?>

        <div class="entry-content">
            <?php
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'buzz-magazine' ),
                'after'  => '</div>',
            ));?>

            </div>

    </div><!-- #post-<?php the_ID(); ?> -->
</article>
