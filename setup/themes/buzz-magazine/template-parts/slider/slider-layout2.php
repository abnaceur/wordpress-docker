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
        <div class="featured-post-vertical">
            <div class="general-tab-section">
                <div class="header-tab-button">
                    <h4 class="widget-title current" data-tab="trending1"><span><?php esc_html_e('trending','buzz-magazine');?></span></h4>
                    <h4 class="widget-title" data-tab="latest1"><span><?php esc_html_e('latest','buzz-magazine');?></span></h4>
                </div>

               <?php $buzz_magazine_posts_per_page = get_theme_mod('slider_featured_per_post' , 6) ?>
                <!--.header-tab-button-->
                 <?php $buzz_magazine_latest_args = array(
                    'posts_per_page' => absint( $buzz_magazine_posts_per_page ),
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'post__not_in' => get_option( 'sticky_posts' ),
                );
                $buzz_magazine_query_layout_two = new WP_Query( $buzz_magazine_latest_args );?>
                <div class="tab-content trending1 current">
                    <?php while( $buzz_magazine_query_layout_two->have_posts() ): $buzz_magazine_query_layout_two->the_post(); ?>
	                    <?php
	                    $buzz_magazine_image_id = get_post_thumbnail_id();
	                    $buzz_magazine_image_url = wp_get_attachment_image_src($buzz_magazine_image_id,'buzz-magazine-thumbnail', false);?>
                    <?php if ( has_post_thumbnail() ): ?>
                        <article class="featured-post post has-post-thumbnail hentry category-featured">
                        <?php if ( has_post_thumbnail() ): ?>
                            <figure>
                                <img src="<?php echo esc_url( $buzz_magazine_image_url[0] );?>">
                            </figure>
                        <?php endif; ?>
                        <div class="post-content">
                            <?php
                            if (get_theme_mod('slider_section_category_option',true)) {
                                buzz_magazine_category();
                            }?>
                            <header class="entry-header">
                                <h5 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h5>
                            </header>
                            <div class="entry-meta">
                                <?php
                                if (get_theme_mod('slider_section_date_option',true)) {
                                    buzz_magazine_posted_on();
                                }
                                ?>
                            </div>
                        </div>
                    </article>
                    <?php endif;?>
                    <?php endwhile; wp_reset_postdata();?>
                </div>

                <?php
                $buzz_magazine_display_per_posts = get_theme_mod('slider_featured_per_post',6);
                $buzz_magazine_args = array(
                    'posts_per_page' => absint( $buzz_magazine_display_per_posts ),
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'orderby'	  => 'comment_count',
                    'post__not_in' => get_option( 'sticky_posts' ),
                );

                $buzz_magazine_query_layout_two = new WP_Query( $buzz_magazine_args );

                if ($buzz_magazine_query_layout_two->have_posts()) : $buzz_magazine_count= 0; ?>
                <!--#trending-->
                <div class="tab-content latest1">
                    <?php while( $buzz_magazine_query_layout_two->have_posts() ): $buzz_magazine_query_layout_two->the_post(); ?>
	                    <?php
	                    $buzz_magazine_image_id = get_post_thumbnail_id();
	                    $buzz_magazine_image_url = wp_get_attachment_image_src($buzz_magazine_image_id,'buzz-magazine-thumbnail', false);?>
                    <?php if ( has_post_thumbnail() ): ?>
                     <article class="featured-post post has-post-thumbnail hentry category-featured">
                        <?php if ( has_post_thumbnail() ): ?>
                            <figure>
                                <img src="<?php echo esc_url( $buzz_magazine_image_url[0] );?>">
                            </figure>
                        <?php endif; ?>
                        <div class="post-content">
                            <?php
                                buzz_magazine_category();
                            ?>
                            <header class="entry-header">
                                <h5 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h5>
                            </header>
                            <div class="entry-meta">
                                <?php
                                    buzz_magazine_posted_on();
                                ?>
                            </div>
                        </div>
                    </article>
                    <?php endif;?>
                    <?php endwhile;?>
                </div>
                <?php endif;?>
                <!--#latest-->
            </div>
        </div>
        <?php
        $buzz_magazine_id_cat = get_theme_mod('slider_select_category' ,0);
        $buzz_magazine_slider_post_per_page = get_theme_mod('slider_per_post' ,0);

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
	                    $buzz_magazine_image_url = wp_get_attachment_image_src($buzz_magazine_image_id,'buzz-magazine-slider-posts', false);?>
                        <?php if (has_post_thumbnail()):?>
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
