<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buzz_Magazine
 */

?>

<article <?php post_class('featured-post');?>>
    <figure>
        <?php  the_post_thumbnail('full'); ?>
    </figure>
    <div class="post-content archive-align-wrap">
        <?php buzz_magazine_category() ?>

        <header class="entry-header">
            <h4 class="entry-title">
                <a href="<?php the_permalink();?>"><?php the_title()?></a>
            </h4>
        </header>

        <div class="entry-content">
            <?php buzz_magazine_content_type();?>
        </div>

        <div class="entry-meta">
            <?php buzz_magazine_posted_on();?>
            <?php buzz_magazine_posted_by();?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
