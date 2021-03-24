<?php
/**
 * Mixed Style Widget.
 * HomePage Widget
 * @package Buzz_Magazine
 */

class Buzz_Magazine_Mixed_Style extends WP_Widget{

    function __construct() {
        $widget_ops = array(
            'classname'                   => 'layout-section2',
            'description'                 => esc_html__( 'Display Mixed List Style Widget.', 'buzz-magazine' ),
            'customize_selective_refresh' => true,

        );
        parent::__construct(
                'buzz_magazine_mixed_style',
                esc_html__( 'Buzz Magazine: Mixed Style', 'buzz-magazine' ),
                $widget_ops
        );
    }


    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance,
            array(
                'title'			        => esc_html__( 'Sports', 'buzz-magazine' ),
                'category'       	    => '',
                'display_per_posts'     => 5,
                'icon'       	        => 'fa-spotify',
                'color'                 => '#FA3616',
                'display_date'	        => true,
                'display_category'	    => false,
                'view_all_title'	    => esc_html__( 'View All', 'buzz-magazine' ),
            )
        );

        $title                  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Business', 'buzz-magazine' );
        $category 			    = isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
	    $icon                   = isset( $instance['icon'] ) ? esc_html( $instance['icon'] ) : esc_html('fa-spotify');
	    $display_per_posts   	= isset( $instance['display_per_posts'] ) ? absint( $instance['display_per_posts'] ) : 4;
        $display_category 		= isset( $instance['display_category'] ) ? (bool) $instance['display_category'] : false;
	    $display_content 		= isset( $instance['display_content'] ) ? (bool) $instance['display_content'] : true;
	    $display_date 	        = isset( $instance['display_date'] ) ? (bool) $instance['display_date'] : true;
        $view_all_title         = isset( $instance['view_all_title'] ) ? esc_html( $instance['view_all_title'] ) : esc_html__( 'View All', 'buzz-magazine' );
        ?>
        <p>
            <img src="<?php echo esc_url(BUZZ_MAGAZINE_IMAGE_URI. 'widgets/mixed-style.png')?>" alt="mixed-style">
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

        <p><label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Slider Category:', 'buzz-magazine' ); ?></label>
            <?php
            wp_dropdown_categories(array(
                'show_option_none' => '',
                'class' 		   => 'widefat',
                'show_option_all'  => esc_html__('From Recent Post','buzz-magazine'),
                'name'             => esc_attr($this->get_field_name( 'category' )),
                'selected'         => absint( $category ),
            ) );
            ?>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'display_per_posts' )); ?>"><?php echo esc_html__( 'Display Number Of Posts', 'buzz-magazine' );?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'display_per_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_per_posts' )); ?>" type="display_per_posts" step="1" min="1" value="<?php echo esc_attr($display_per_posts); ?>" max="10" />
        </p>

        <p>
            <label for="checkbox"><?php esc_html_e('Note:-Changes occurs which have already value','buzz-magazine')?></label>
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
            <label for="<?php echo esc_attr($this->get_field_id( 'display_date' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'buzz-magazine' ); ?></label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'view_all_title' )); ?>"><?php echo esc_html__( 'Title:', 'buzz-magazine' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'view_all_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'view_all_title' )); ?>" type="text" value="<?php echo esc_attr($view_all_title); ?>" />
        </p>
        <?php
    }

    function widget( $args, $instance ) {

        extract( $args );
        $title 				    = ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) :esc_html__('Sports','buzz-magazine');
	    $title                  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	    $icon 				    = ( ! empty( $instance['icon'] ) ) ? esc_html($instance['icon']) : esc_html('fa-spotify');
	    $category  			    = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $display_per_posts 	    = ( ! empty( $instance['display_per_posts'] ) ) ? absint( $instance['display_per_posts'] ) : 4;
        $display_date		    = isset( $instance['display_date'] ) ? $instance['display_date'] : true;
	    $display_content		= isset( $instance['display_content'] ) ? $instance['display_content'] : true;
	    $display_category		= isset( $instance['display_category'] ) ? $instance['display_category'] : false;
        $view_all_title 	    = ( ! empty( $instance['view_all_title'] ) ) ? esc_html($instance['view_all_title']) :'';
        $button_link            = get_permalink( get_option( 'page_for_posts' ) );

        if ( absint( $category ) > 0 ) {
            $button_link 		= get_category_link( $category );
        }else{
            $button_link = null;
        }
        echo $before_widget;
        ?>
        <?php if ( !empty( $title ) ): ?>
            <div class="heading">
                <header class="entry-header">
                    <h3 class="entry-title"><span class="fa <?php echo esc_attr($icon); ?>"></span> <?php echo esc_html( $title );?></h3>
                </header>
                <?php if ($button_link != null){?>
                    <a class="view-more" href="<?php echo esc_url( $button_link);?>"><?php echo esc_html( $view_all_title );?></a>
                    <?php
                }?>
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
        $query_mixed_style = new WP_Query( $args );

        if ($query_mixed_style->have_posts()) : $count= 0; ?>
            <div class="layout-section2-wrap">
                <?php while ( $query_mixed_style->have_posts() ) : $query_mixed_style->the_post(); $count++;
                    $total = $query_mixed_style->post_count;
                    $image_size = 'thumbnail';
                    if ( $total - 2 < $count ){
                        $image_size = 'buzz-magazine-mixed-style';
                    }
                    ?>
                    <article class="post hentry">
                        <?php if ( has_post_thumbnail() ){ ?>
                            <figure class="featured-post-image">
                                <?php the_post_thumbnail( $image_size );?>
                            </figure>
                        <?php } ?>
                        <div class="post-content">
                            <?php if ( true == $display_category && $total - 2 < $count):
                                buzz_magazine_category();
                            endif; ?>
                            <header class="entry-header">
                                <h5 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h5>
                            </header>
	                        <?php if ($total - 2 >= $count  && $display_content == true): ?>
                                <div class="entry-content">
			                        <?php buzz_magazine_content_type()?>
                                </div>
	                        <?php endif;?>
                                <div class="entry-meta">
                                    <?php if ( true == $display_date): ?>
                                        <?php buzz_magazine_posted_on(); ?>
                                    <?php endif; ?>

                                    <?php
                                    if ( $total - 2 < $count):
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
        $instance['title'] 				= sanitize_text_field( $new_instance['title'] );
        $instance['category'] 			= absint( $new_instance['category'] );
	    $instance['icon'] 				    = sanitize_text_field( $new_instance['icon'] );
	    $instance['display_per_posts'] 	= (int) $new_instance['display_per_posts'];
	    $instance['display_content'] 		= (bool) $new_instance['display_content'];
        $instance['display_category'] 	= (bool) $new_instance['display_category'];
        $instance['display_date'] 	    = (bool) $new_instance['display_date'];
        $instance['view_all_title']	    = sanitize_text_field( $new_instance['view_all_title'] );
        return $instance;
    }


}
