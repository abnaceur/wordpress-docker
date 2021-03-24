<?php
/**
 * Related Posts Template Appears Below The Single Posts
 * @package Buzz_Magazine
 */

global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="related-post-section">
        <?php
        $buzz_magazine_display_per_number = get_theme_mod('related_per_posts',4);
        $buzz_magazine_related_post_title  = get_theme_mod('related_posts_title','');
        $buzz_magazine_related_cat_ids = wp_get_post_categories($post->ID, ['fields'=>'ids']);
        $buzz_magazine_args = array(
            'post_type'         => 'post',
            'posts_per_page'    => absint( $buzz_magazine_display_per_number),
            'post_status'       => 'publish',
            'paged'             => 1,
            'category__in'      => $buzz_magazine_related_cat_ids,
            'post__not_in'      => array(absint(get_the_ID()))
        );
        $buzz_magazine_query_related_posts = new WP_Query( $buzz_magazine_args );
        if ($buzz_magazine_query_related_posts->have_posts()) : $buzz_magazine_count= 0; ?>
            <?php if ( !empty( $buzz_magazine_related_post_title ) ):?>

                <div class="heading">
                    <header class="entry-header">
                        <h3 class="entry-title"><?php echo esc_html( $buzz_magazine_related_post_title );?></h3>
                    </header>
                </div>
            <?php endif; ?>
            <div class="related-post-wrap">
                <?php while ( $buzz_magazine_query_related_posts->have_posts() ) : $buzz_magazine_query_related_posts->the_post();?>
                    <article class="featured-post post hentry">
                        <figure>
                        <?php the_post_thumbnail('buzz-magazine-grid-style'); ?>
                        </figure>
                            <div class="post-content">
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h4>
                            </header>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="entry-meta">
                                <?php
                                    buzz_magazine_posted_on();
                                    buzz_magazine_posted_by();
                                    buzz_magazine_entry_footer();

                                 ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();?>
            </div>
        <?php endif;?>
    </section>
</article>