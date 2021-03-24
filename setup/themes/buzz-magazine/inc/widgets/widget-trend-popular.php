<?php
/**
 * Single Feature Style Widget.
 * Homepage Widget
 * @package Buzz_Magazine
 */

class Buzz_Magazine_Latest_Trend extends WP_Widget{

    function __construct() {
        global $control_ops;
        $widget_ops = array(
            'classname'   => 'widget trending-and-latest-tab-section',
            'description' => esc_html__( 'Add Widget to Display Trending/Popular Post.', 'buzz-magazine' ),
            'customize_selective_refresh' => true,

        );
        parent::__construct(
                'buzz_magazine_latest_trend',
                esc_html__( 'Buzz Magazine Sidebar: Latest/Popular', 'buzz-magazine' ),
                $widget_ops
             );
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array(
            'trend_post_per'      	=> 4,
            'latest_post_per'      	=> 4,
            'display_content'      	=> true,
            'show_post_meta'	 	=> true,
            'display_category'	    => true,
        ) );

        $display_category	= isset( $instance['display_category'] ) ? (bool) $instance['display_category'] : true;
        $trend_post_per  	= isset( $instance['trend_post_per'] ) ? absint( $instance['trend_post_per'] ) : 4;
	    $display_content 		= isset( $instance['display_content'] ) ? (bool) $instance['display_content'] : true;
	    $latest_post_per  	= isset( $instance['latest_post_per'] ) ? absint( $instance['latest_post_per'] ) : 4;
        $show_post_meta 	= isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'trend_post_per' )); ?>">
                <?php echo esc_html__( 'Trend Per Post', 'buzz-magazine' );?>
            </label>

            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'trend_post_per' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'trend_post_per' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($trend_post_per); ?>" max="10" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'latest_post_per' )); ?>">
                <?php echo esc_html__( 'Latest Per Post', 'buzz-magazine' );?>
            </label>

            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'latest_post_per' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_post_per' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($latest_post_per); ?>" max="10" />
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_category ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_category' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>"><?php echo esc_html__( 'Enable category', 'buzz-magazine' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_content ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_content' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>"><?php echo esc_html__( 'Enable Content', 'buzz-magazine' ); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_post_meta ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_meta' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'buzz-magazine' ); ?></label></p>
        <?php
    }

    function widget( $args, $instance ) {
        extract( $args );
        $trend_post_per 	= ( ! empty( $instance['trend_post_per'] ) ) ? absint( $instance['trend_post_per'] ) : 4;
        $latest_post_per 	= ( ! empty( $instance['latest_post_per'] ) ) ? absint( $instance['latest_post_per'] ) : 4;
	    $display_content	= isset( $instance['display_content'] ) ? $instance['display_content'] : true;
	    $display_category	= isset( $instance['display_category'] ) ? $instance['display_category'] : true;
        $show_post_meta		= isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;

        echo $before_widget; ?>
        <div class="header-tab-button">
            <h4 class="widget-title current" data-tab="trending"><span><?php echo esc_html__( 'Trending', 'buzz-magazine' );?></span></h4>
            <h4 class="widget-title" data-tab="latest"><span><?php echo esc_html__( 'Latest', 'buzz-magazine' );?></span></h4>
        </div>
        <?php $latest_args = array(
            'posts_per_page'    => absint( $trend_post_per ),
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'post__not_in'      => get_option( 'sticky_posts' ),
        );
        $query_popular_post = new WP_Query( $latest_args );

        if ($query_popular_post->have_posts()) : $count= 0; ?>
            <div class="tab-content trending current">
                <?php while( $query_popular_post->have_posts() ): $query_popular_post->the_post(); ?>
                    <article class="featured-post post has-post-thumbnail hentry category-featured">
                        <?php if ( has_post_thumbnail() ): ?>
                            <figure class="featured-post-image">
                                <?php the_post_thumbnail( 'buzz-magazine-thumbnail' );?>
                            </figure>
                        <?php endif; ?>
                        <div class="post-content">
                            <?php if ( true == $display_category ):
                                buzz_magazine_category();
                            endif; ?>
                            <header class="entry-header">
                                <h5 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h5>
                            </header>
	                        <?php if ($display_content == true): ?>
                                <div class="entry-content">
			                        <?php buzz_magazine_content_type()?>
                                </div>
	                        <?php endif;?>
                            <div class="entry-meta">
                                <?php if ( true == $show_post_meta ):
                                    buzz_magazine_posted_on();
                                endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile;
                ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>

        <?php $args = array(
            'posts_per_page' => absint( $latest_post_per ),
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'orderby'	    => 'comment_count',
            'post__not_in'  => get_option( 'sticky_posts' ),
        );

        $query_trend_post = new WP_Query( $args );

        if ($query_trend_post->have_posts()) : $count= 0; ?>
            <div class="tab-content latest">
                <?php while( $query_trend_post->have_posts() ): $query_trend_post->the_post(); ?>
                    <article class="featured-post post hentry category-featured">
                        <?php if ( has_post_thumbnail() ): ?>
                            <figure class="featured-post-image">
                                <?php the_post_thumbnail( 'buzz-magazine-mixed' );?>
                            </figure>
                        <?php endif; ?>
                        <div class="post-content">
                            <?php if ( true == $display_category ):
                                buzz_magazine_category();
                            endif; ?>
                            <header class="entry-header">
                                <h5 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h5>
                            </header>
	                        <?php if ($display_content == true): ?>
                                <div class="entry-content">
			                        <?php buzz_magazine_content_type()?>
                                </div>
	                        <?php endif;?>
                            <div class="entry-meta">
                                <?php if ( true == $show_post_meta ):
                                    buzz_magazine_posted_on();
                                endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile;
                ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>

        <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['trend_post_per'] 	= (int) $new_instance['trend_post_per'];
        $instance['latest_post_per'] 	= (int) $new_instance['latest_post_per'];
	    $instance['display_content'] 	= (bool) $new_instance['display_content'];
	    $instance['display_category'] 	= (bool) $new_instance['display_category'];
        $instance['show_post_meta'] 	= (bool) $new_instance['show_post_meta'];

        return $instance;
    }


}
