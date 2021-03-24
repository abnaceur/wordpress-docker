<?php
/**
 * Popular Posts Widget.
 * Sidebar Widget
 * @package Buzz_Magazine
 */
class Buzz_magazine_Popular_Posts extends WP_Widget{

    function __construct() {
        global $control_ops;
        $widget_ops = array(
            'classname'   => 'widget popular-posts',
            'description' => esc_html__( 'Display Popular Style Widget.', 'buzz-magazine' ),
            'customize_selective_refresh' => true,

        );
        parent::__construct(
                'buzz_magazine_popular',
                esc_html__( 'Buzz Magazine Sidebar: Popular', 'buzz-magazine' ),
                $widget_ops,
                $control_ops
        );
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance,
            array(
                'title'			    => esc_html__( 'Popular', 'buzz-magazine' ),
                'category'       	=> '',
                'number'            => 4,
                'show_post_meta'	=> true,
                'display_category'  => true,
                'display_content'      => true,
            )
        );
        $title              = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Feature Slider', 'buzz-magazine' );
        $category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
        $number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        $display_category	= isset( $instance['display_category'] ) ? (bool) $instance['display_category'] : true;
        $show_post_meta 	= isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;
        $display_content   	= isset( $instance['display_content'] ) ? (bool) $instance['display_content'] : true;

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'buzz-magazine' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
                <?php esc_html_e( 'Slider Category:', 'buzz-magazine' ); ?>
            </label>

            <?php
            wp_dropdown_categories(array(
                'class' 		   => 'widefat',
                'show_option_all'  => esc_html__('From Recent Post','buzz-magazine'),
                'name'             => esc_attr($this->get_field_name( 'category' )),
                'selected'         => absint( $category ),
            ) );
            ?>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php echo esc_html__( 'Choose Number', 'buzz-magazine' );?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="10" />
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_category ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_category' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>"><?php echo esc_html__( 'Enable category', 'buzz-magazine' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_post_meta ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_meta' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'buzz-magazine' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_content ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_content' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>"><?php echo esc_html__( 'Enable Content', 'buzz-magazine' ); ?></label>
        </p>
        <?php
    }

    function widget( $args, $instance ) {

        extract( $args );
        $title 				= ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) :esc_html__('Popular','buzz-magazine');
	    $title              = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	    $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4;
        $show_post_meta		= isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;
        $display_category	= isset( $instance['display_category'] ) ? $instance['display_category'] : true;
        $display_content		= isset( $instance['display_content'] ) ? $instance['display_content'] : true;

        echo $before_widget;
        ?>
        <?php if ( !empty( $title ) ): ?>
            <h3 class="widget-title"><span><?php echo esc_html( $title );?></span></h3>
        <?php endif; ?>

        <?php $args = array(
            'posts_per_page' => absint( $number ),
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'orderby'	     => 'comment_count',
            'post__not_in'   => get_option( 'sticky_posts' ),
        );

        if ( absint( $category ) > 0 ) {
            $args['cat'] = absint( $category );
        }
        $query_popular_posts = new WP_Query( $args );

        if ($query_popular_posts->have_posts()) : $count= 0;
            while ( $query_popular_posts->have_posts() ) : $query_popular_posts->the_post(); $count++; ?>
                <article class="featured-post post has-post-thumbnail hentry category-featured">
                    <?php if ( has_post_thumbnail() ){ ?>
                        <figure class="featured-post-image">
                            <?php the_post_thumbnail( 'buzz-magazine-thumbnail' );?>
                        </figure>
                    <?php } ?>
                    <div class="post-content">
                        <?php if ( true == $display_category ):
                            buzz_magazine_category();
                        endif; ?>
                        <header class="entry-header">
                            <h5 class="entry-title">
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </h5>
                        </header>
                        <?php if ($display_content):?>
                            <div class="entry-content">
                                <?php buzz_magazine_content_type()?>
                            </div>
                        <?php endif;?>
                        <?php if ( true == $show_post_meta): ?>
                            <div class="entry-meta">
                                <?php buzz_magazine_posted_on(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile;

        endif;
        wp_reset_postdata();
        ?>

        <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] 				= sanitize_text_field( $new_instance['title'] );
        $instance['category'] 			= absint( $new_instance['category'] );
        $instance['number'] 			= (int) $new_instance['number'];
        $instance['display_category'] 	= (bool) $new_instance['display_category'];
        $instance['show_post_meta'] 	= (bool) $new_instance['show_post_meta'];
        $instance['display_content'] 	    = (bool) $new_instance['display_content'];

        return $instance;
    }


}
