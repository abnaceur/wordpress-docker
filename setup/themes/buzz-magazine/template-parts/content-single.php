<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buzz_Magazine
 */

?>

<article <?php post_class('featured-post single single-post-wrap');?>>
    <div class="post-content">
       <figure>
           <?php
            the_post_thumbnail('full');
            ?>
       </figure>
        <?php buzz_magazine_category(); ?>
         <header class="entry-header">
            <h2 class="entry-title">
                 <?php the_title() ?>
            </h2>
         </header>
        <div class="entry-meta">
         <?php
            buzz_magazine_posted_on();
            buzz_magazine_posted_by();
            buzz_magazine_entry_footer();
            ?>
            </div>

        <div class="entry-content">
            <?php
                if(get_theme_mod('content_type_radio_button','content') == 'content'){
                the_content();
                }else{
                the_excerpt();
                }
            ?>
            </div>

    </div>
</article>