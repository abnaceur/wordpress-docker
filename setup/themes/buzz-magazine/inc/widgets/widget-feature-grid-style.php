<?php
/**
 * Feature Grid Widget.
 * HomePage Widget
 * @package Buzz_Magazine
 */

class Buzz_Magazine_Widget_Feature_Grid_Style extends WP_Widget{

    function __construct() {
        $widget_ops = array(
            'description'                 => esc_html__( 'Display Feature Grid Style Widget.', 'buzz-magazine' ),
            'classname'                   => 'layout-section6',
            'customize_selective_refresh' => true,
        );
        parent::__construct(
                'buzz_magazine_widget_feature_grid_style',
                esc_html__( 'Buzz Magazine: Feature Grid Style',
                'buzz-magazine'
                ),$widget_ops );

    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance,
            array(
                'title'			            => esc_html__( 'Fashion', 'buzz-magazine' ),
                'category'                  => '',
                'icon'       	            => 'fa-tag',
                'display_per_posts'         => 4,
                'display_date'	            => true,
                'display_category'	        => false,
                'display_content'      	    => true,
                'view_all_title'	        => esc_html__( 'View All', 'buzz-magazine' ),
            )
        );


        $title                  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Fashion', 'buzz-magazine' );
        $icon                   = isset( $instance['icon'] ) ? esc_html( $instance['icon'] ) : esc_html('fa-tag');
        $category 			    = isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
        $display_per_posts    	= isset( $instance['display_per_posts'] ) ? absint( $instance['display_per_posts'] ) : 4;
	    $display_content 		= isset( $instance['display_content'] ) ? (bool) $instance['display_content'] : true;
	    $display_category 		= isset( $instance['display_category'] ) ? (bool) $instance['display_category'] : false;
        $display_date       	= isset( $instance['display_date'] ) ? (bool) $instance['display_date'] : true;
        $view_all_title         = isset( $instance['view_all_title'] ) ? esc_html( $instance['view_all_title'] ) : esc_html__( 'View All', 'buzz-magazine' );
        ?>
        <p>
            <img src="<?php echo esc_url(BUZZ_MAGAZINE_IMAGE_URI. 'widgets/feature-grid.png')?>" alt="feature-grid">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'buzz-magazine' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'icon' )); ?>"><?php echo esc_html__( 'Select Icon:', 'buzz-magazine' ); ?></label>
            <?php
            $name = $this->get_field_name('icon');
            buzz_magazine_get_icon_table( $name, $icon ); 
            ?>

        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
                <?php esc_html_e( 'Slider Category:', 'buzz-magazine' ); ?>
            </label>

            <?php
            wp_dropdown_categories(array(
                'class' 		   => 'widefat',
                'name'             => esc_attr($this->get_field_name( 'category' )),
                'show_option_all'  => esc_html__('From Recent Post','buzz-magazine'),
                'selected'         => absint( $category ),
            ) );
            ?>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'display_per_posts' )); ?>"><?php echo esc_html__( 'Display Number Of Posts', 'buzz-magazine' );?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'display_per_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_per_posts' )); ?>" type="display_per_posts" step="1" min="1" value="<?php echo esc_attr($display_per_posts); ?>" max="10" />
        </p>

        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_category ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_category' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>"><?php echo esc_html__( 'Enable Categories', 'buzz-magazine' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_content ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_content' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_content' )); ?>"><?php echo esc_html__( 'Enable Content', 'buzz-magazine' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_date' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_date' )); ?>"><?php echo esc_html__( 'Enable Date', 'buzz-magazine' ); ?></label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'view_all_title' )); ?>"><?php echo esc_html__( 'Read More Button Title', 'buzz-magazine' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'view_all_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'view_all_title' )); ?>" type="text" value="<?php echo esc_attr($view_all_title); ?>" />
        </p>
        <?php
    }

    function widget( $args, $instance ) {


        extract( $args );
        $title                  = ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) : esc_html__('Fashion','buzz-magazine');
	    $title                  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	    $icon 				    = ( ! empty( $instance['icon'] ) ) ? esc_html($instance['icon']) : esc_html('fa-tag');
        $category  			    = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : absint(0);
        $display_per_posts 	    = ( ! empty( $instance['display_per_posts'] ) ) ? absint( $instance['display_per_posts'] ) : absint(4) ;
        $display_date		    = isset( $instance['display_date'] ) ? $instance['display_date'] : true;
	    $display_content		= isset( $instance['display_content'] ) ? $instance['display_content'] : true;
	    $display_category		= isset( $instance['display_category'] ) ? $instance['display_category'] : true;
        $view_all_title 	    = ( ! empty( $instance['view_all_title'] ) ) ? esc_html($instance['view_all_title']) :'';
        $button_link            = get_permalink( get_option( 'page_for_posts' ) );

        if ( absint( $category ) > 0 ) {
            $button_link 		= get_category_link( $category );
        }
        echo $before_widget;
        ?>
            <?php if ( !empty( $title ) ): ?>
                <div class="heading">
                    <header class="entry-header">
                        <h3 class="entry-title"><span class="fa <?php echo esc_attr($icon); ?>"></span> <?php echo esc_html( $title );?></h3>
                    </header>
                    <a class="view-more" href="<?php echo esc_url( $button_link);?>"><?php echo esc_html( $view_all_title );?></a>
                </div>
            <?php endif; ?>

            <?php $args = array(
                'posts_per_page'    => absint( $display_per_posts ),
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'post__not_in'      => get_option( 'sticky_posts' ),
            );

            if ( absint( $category ) > 0 ) {
                $args['cat'] = absint( $category );
            }
            $feature_grid_query = new WP_Query( $args );

            if ($feature_grid_query->have_posts()) : $count= 0; ?>
                <div class="layout-section6-wrap">
                    <?php while ( $feature_grid_query->have_posts() ) : $feature_grid_query->the_post(); $count++;
                        $image_size = 'buzz-magazine-feature-grid';

                        if ( $count > 1 ){
                            $image_size = 'buzz-magazine-thumbnail';
                        }
                        ?>
                        <article class="post hentry">
                            <?php if ( has_post_thumbnail() ){ ?>
                                <figure class="featured-post-image">
                                    <?php the_post_thumbnail( $image_size );?>
                                </figure>
                            <?php } ?>
                            <div class="post-content">
                                <?php if ( true == $display_category && $count == 1 ):
                                    buzz_magazine_category();
                                endif; ?>
                                <header class="entry-header">
                                    <h5 class="entry-title">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    </h5>
                                </header>
                                <?php if ( $count !== 1 && $display_content == true): ?>
                                    <div class="entry-content">
                                       <?php buzz_magazine_content_type()?>
                                    </div>
                                <?php endif;?>
                                    <div class="entry-meta">
                                        <?php if ( true == $display_date): ?>
                                            <?php buzz_magazine_posted_on(); ?>
                                        <?php endif; ?>
                                        <?php
                                        if ( $count == 1 ):
                                                buzz_magazine_posted_by();
                                                buzz_magazine_entry_footer();
                                        endif;
                                        ?>
                                    </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php endif; wp_reset_postdata();?>

        <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        $instance['title']                  = sanitize_text_field( $new_instance['title'] );
        $instance['icon'] 				    = sanitize_text_field( $new_instance['icon'] );
	    $instance['display_content'] 		= (bool) $new_instance['display_content'];
	    $instance['category'] 			    = absint( $new_instance['category'] );
        $instance['display_per_posts'] 	    = absint ($new_instance['display_per_posts']);
        $instance['display_category'] 		= (bool) $new_instance['display_category'];
        $instance['display_date'] 	        = (bool) $new_instance['display_date'];
        $instance['view_all_title']		    = sanitize_text_field( $new_instance['view_all_title'] );
        return $instance;
    }


}
