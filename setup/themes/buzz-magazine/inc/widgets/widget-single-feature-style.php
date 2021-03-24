<?php
/**
 * Single Feature Style Widget.
 * Homepage Widget
 * @package Buzz_Magazine
 */

class Buzz_Magazine_Single_Feature extends WP_Widget{

    function __construct() {
        $widget_ops = array(
            'classname'                   => 'entertainment-section widget"',
            'description'                 => esc_html__( 'Add Widget to Display List Feature Style Widget.', 'buzz-magazine' ),
            'customize_selective_refresh' => true,

        );
        parent::__construct(
                'buzz_magazine_single_feature_style',
                esc_html__( 'Buzz Magazine: Single Feature Style', 'buzz-magazine' ),
                $widget_ops
        );
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance,
            array(
                'title'			    => esc_html__( 'Sports', 'buzz-magazine' ),
                'category'       	=> '',
                'display_per_posts' => 5,
                'display_category'	=> true,
            )
        );
        $title                  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Business', 'buzz-magazine' );
        $category 		 	    = isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
        $display_per_posts  	= isset( $instance['display_per_posts'] ) ? absint( $instance['display_per_posts'] ) : 4;
        $display_category 		= isset( $instance['display_category'] ) ? (bool) $instance['display_category'] : true;

        ?>
        <p>
            <img src="<?php echo esc_url(BUZZ_MAGAZINE_IMAGE_URI. 'widgets/single-feature-style.png')?>" alt="single-feature-style">
        </p>

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
                'show_option_none' => '',
                'class' 		   => 'widefat',
                'show_option_all'  => esc_html__('From Recent Post','buzz-magazine'),
                'name'             => esc_attr($this->get_field_name( 'category' )),
                'selected'         => absint( $category ),
            ) );

            ?>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'display_per_posts' )); ?>">
                <?php echo esc_html__( 'Display Number Of Posts', 'buzz-magazine' );?>
            </label>

            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'display_per_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_per_posts' )); ?>" type="display_per_posts" step="1" min="1" value="<?php echo esc_attr($display_per_posts); ?>" max="10" />
        </p>

        <p>
            <input class="checkbox" type="checkbox"<?php checked( $display_category ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_category' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'display_category' )); ?>"><?php echo esc_html__( 'Enable Categories', 'buzz-magazine' ); ?></label>
        </p>

        <?php
    }

    function widget( $args, $instance ) {

        extract( $args );
        $title 				    = ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) :'';
	    $title                  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	    $category  			    = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $display_per_posts 	    = ( ! empty( $instance['display_per_posts'] ) ) ? absint( $instance['display_per_posts'] ) : 4;
        $display_category		= isset( $instance['display_category'] ) ? $instance['display_category'] : true;

        echo $before_widget;
        ?>
        <div class="container">
        <?php if ( !empty( $title ) ): ?>
            <div class="heading">
                <header class="entry-header">
                    <h3 class="entry-title"><?php echo esc_html( $title );?></h3>
                </header>
            </div>
        <?php endif; ?>
        <?php $args = array(
            'posts_per_page' => absint( $display_per_posts ),
            'post_status' => 'publish',

        );

        if ( absint( $category ) > 0 ) {
            $args['tax_query'] = [
                    [
                            'taxonomy' => 'category',
                            'field'    => 'id',
                            'terms'    => absint( $category )
                    ]
            ]
                ;
        }
        $query_single_feature_style = new WP_Query( $args );
        if ($query_single_feature_style->have_posts()) : $count= 0; ?>
            <div class="entertainment-wrap">
            <div class="video-title-option">
                <div class="video-title-option-wrap">
                    <ul>
                        <?php while ( $query_single_feature_style->have_posts() ) : $query_single_feature_style->the_post(); $count++; ?>
                            <?php if (has_post_thumbnail()):?>
                                <li data-tab="entertainment-item-<?php echo esc_attr($count)?>"  class="<?php if ($count == 1){echo "current";}?>" >
                                    <h4 class="entry-title">
                                        <?php the_title()?>
                                    </h4>
                                </li>
                            <?php endif;?>

                        <?php endwhile;?>
                    </ul>
                </div>
            </div>

            <?php $count= 0;?>
            <div class="entertainment-contain">
                    <?php while ( $query_single_feature_style->have_posts() ) : $query_single_feature_style->the_post(); $count++;?>
                        <?php if (has_post_thumbnail()):?>
                            <div class="entertainment-item <?php if ($count == 1){echo "current";}?> entertainment-item-<?php echo esc_attr($count)?>">
                    <article class="post hentry">
                        <figure>
                            <?php the_post_thumbnail( 'buzz-magazine-entertainment' );?>
                            <div class="video-icon">
                                <span></span>
                            </div>
                        </figure>
                        <div class="post-content">
                            <?php if ( true == $display_category ):
                                buzz_magazine_category();
                            endif; ?>
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="javascript:void(0)" tabindex="0"><?php the_title()?></a>
                                </h4>
                            </header>
                            <div class="entry-meta">
                                <?php buzz_magazine_posted_on(); ?>
                                <?php buzz_magazine_posted_by()?>
                                <?php  buzz_magazine_entry_footer()?>

                            </div>
                        </div>
                    </article>
                </div>
                        <?php endif;?>
                    <?php endwhile;?>

        <?php endif; wp_reset_postdata();?>
    </div>

        <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] 				= sanitize_text_field( $new_instance['title'] );
        $instance['category'] 			= absint( $new_instance['category'] );
        $instance['display_per_posts'] 	= (int) $new_instance['display_per_posts'];
        $instance['display_category'] 	= (bool) $new_instance['display_category'];
        return $instance;
    }

}
