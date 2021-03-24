<?php
/**
 * Recent Posts Widget.
 * Sidebar Widget
 * @package Buzz_Magazine
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class Buzz_Magazine_Recent_Posts extends WP_Widget {

    /**
     * Sets up a new Recent Posts widget instance.
     *
     * @since 2.8.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname'                   => '',
            'description'                 => esc_html__( 'Your site&#8217;s most recent Posts.','buzz-magazine' ),
        );
        parent::__construct(
                'buzz_magazine_recent_posts',
                esc_html__( 'Buzz Magazine Sidebar: Recent Posts' , 'buzz-magazine' ),
                $widget_ops
        );
        $this->alt_option_name = 'widget_recent_entries';

    }

    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title        = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number       = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $display_date = isset( $instance['display_date'] ) ? (bool) $instance['display_date'] : false;
        $display_content = isset( $instance['display_content'] ) ? (bool) $instance['display_content'] : true;

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' , 'buzz-magazine' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:','buzz-magazine' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3" />
        </p>

        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_date')); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_date' )); ?>"><?php esc_html_e( 'Display post date?' , 'buzz-magazine' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_content ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_content')); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>"><?php esc_html_e( 'Display post content?' , 'buzz-magazine' ); ?></label>
        </p>
        <?php
    }

    /**
     * Outputs the content for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Posts widget instance.
     */
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $default_title = esc_html__( 'Recent Posts' ,'buzz-magazine' );
        $title         = ( ! empty( $instance['title'] ) ) ? $instance['title'] : $default_title;

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $display_date = isset( $instance['display_date'] ) ? $instance['display_date'] : false;

        $display_content = isset( $instance['display_content'] ) ? $instance['display_content'] : true;


        $r = new WP_Query(
            apply_filters(
                'widget_posts_args',
                array(
                    'posts_per_page'      => absint($number),
                    'no_found_rows'       => true,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                ),
                $instance
            )
        );

        if ( ! $r->have_posts() ) {
            return;
        }
        ?>

        <?php echo $args['before_widget']; ?>
      <aside class="widget recent-posts">
     <?php  if ( $title ):?>
            <h4 class="widget-title"><span><?php echo esc_html($title); ?></span></h4>
      <?php endif;?>

            <?php while ( $r->have_posts()):$r->the_post() ?>
                <?php
                global $post;
                $post_title   = get_the_title( $post->ID );
                $title        = ( ! empty( $post_title ) ) ? esc_html($post_title) : esc_html__( '(no title)' ,'buzz-magazine' );
                $aria_current = '';

                if ( get_queried_object_id() === $post->ID ) {
                    $aria_current = ' aria-current="page"';
                }
                ?>
                <article class="featured-post post has-post-thumbnail hentry category-featured">
                    <?php if ( has_post_thumbnail() ){ ?>
                                <figure class="featured-post-image">
                                    <?php the_post_thumbnail('thumbnail');?>
                                </figure>
                            <?php } ?>
                            <div class="post-content">
                                 <header class="entry-header">
                                    <h5 class="entry-title">
                                    <a href="<?php the_permalink( $post->ID ); ?>"<?php echo esc_attr($aria_current); ?>><?php echo esc_html($title); ?></a>
                                     </h5>
                                 </header>
                                 <?php if ($display_content):?>
                                     <div class="entry-content">
                                         <?php buzz_magazine_content_type()?>
                                      </div>
                                  <?php endif;?>
                                 <div class="entry-meta">
                                       <?php if ( $display_date ) : ?>
                                          <?php buzz_magazine_posted_on();?>
                                      <?php endif; ?>
                                     </div>
                                 </div>
                                 </article>

            <?php endwhile; ?>

        <?php

        echo $args['after_widget'];
    }



    /**
     * Handles updating the settings for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );
        $instance['number']       = (int) $new_instance['number'];
        $instance['display_date'] = isset( $new_instance['display_date'] ) ? (bool) $new_instance['display_date'] : false;
        $instance['display_content'] = ( $new_instance['display_content'] ) ? (bool) $new_instance['display_content'] : true;

        return $instance;
    }

}

