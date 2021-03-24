<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Buzz_Magazine
 */

?>
    <section class="featured-posts <?php echo esc_attr(buzz_magazine_get_slider_template_layout())?>">
        <?php
        $buzz_magazine_featured_posts_per_page = buzz_magazine_get_featured_posts_count();
        $buzz_magazine_argc = array(
            'posts_per_page' => absint($buzz_magazine_featured_posts_per_page ),
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'post__not_in'  => get_option( 'sticky_posts' ),
        );

        $buzz_magazine_query_for_featured = new WP_Query( $buzz_magazine_argc );
        if ($buzz_magazine_query_for_featured->have_posts()):?>
            <div class="featured-post-vertical">
            <?php while ($buzz_magazine_query_for_featured->have_posts()):$buzz_magazine_query_for_featured->the_post(); ?>
	            <?php
	            $buzz_magazine_image_id = get_post_thumbnail_id();
	            $buzz_magazine_image_url = wp_get_attachment_image_src($buzz_magazine_image_id,'buzz-magazine-featured-posts', false);?>
                <?php if (has_post_thumbnail()):?>
                    <article class="post hentry">
                    <?php if (has_post_thumbnail()):?>
                        <figure>
                            <img src="<?php echo esc_url( $buzz_magazine_image_url[0] );?>">
                        </figure>
                    <?php endif;?>
                    <div class="post-content">
                        <?php
                            buzz_magazine_category();
                        ?>
                        <header class="entry-header">
                            <h4 class="entry-title">
                                <a href="<?php the_permalink();?>" tabindex="0"><?php the_title()?></a>
                            </h4>
                        </header>
                        <div class="entry-meta">
                            <?php
                                buzz_magazine_posted_on();
                            ?>
                            <?php
                                buzz_magazine_posted_by();
                            ?>
                            <?php
                                buzz_magazine_entry_footer();

                            ?>
                        </div>
                    </div>
                </article>
                <?php endif ?>
            <?php endwhile;?>
        </div>
        <?php  endif; wp_reset_postdata(); ?>

        <?php
        $buzz_magazine_id_cat = get_theme_mod('slider_select_category' ,0);
        $buzz_magazine_slider_post_per_page = get_theme_mod('slider_per_post' ,'');

        $buzz_magazine_argc = array(
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'post__not_in'  => get_option( 'sticky_posts' ),
        );
        if ($buzz_magazine_id_cat > 0){
            $buzz_magazine_argc['cat'] = absint($buzz_magazine_id_cat);
        }
        if ($buzz_magazine_slider_post_per_page > 0){
            $buzz_magazine_argc['posts_per_page'] = absint($buzz_magazine_slider_post_per_page);
        }

        $buzz_magazine_query_for_slider = new WP_Query( $buzz_magazine_argc );

        if ($buzz_magazine_query_for_slider->have_posts()):?>
            <div class="main-slider">
                <div class="main-slider-wrap absolute-content">
                    <?php while ($buzz_magazine_query_for_slider->have_posts()):$buzz_magazine_query_for_slider->the_post();?>
                    <?php

                        $buzz_magazine_image_id = get_post_thumbnail_id();
                        $buzz_magazine_image_url = wp_get_attachment_image_src($buzz_magazine_image_id,'buzz-magazine-slider-posts', false);
                        if (has_post_thumbnail()):?>
                      <article class="featured-post post has-post-thumbnail hentry category-featured">
                        <?php if (has_post_thumbnail()):?>
                            <figure>
                                <img src="<?php echo esc_url( $buzz_magazine_image_url[0] );?>">
                            </figure>
                        <?php endif;?>
                        <div class="post-content">
                            <?php
                                buzz_magazine_category();
                            ?>
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h4>
                            </header>
                            <div class="entry-meta">
                                <?php
                                    buzz_magazine_posted_on();
                                ?>
                                <?php
                                    buzz_magazine_posted_by();
                                ?>
                                <?php
                                    buzz_magazine_entry_footer();

                                ?>
                            </div>
                        </div>
                    </article>
                    <?php endif;?>
                    <?php endwhile; ?>
                </div>
        </div>
        <?php  endif; wp_reset_postdata();?>
    </section>
