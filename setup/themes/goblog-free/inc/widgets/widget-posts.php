<?php
/**
 * Create blog posts widget.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

// Adds widget: blog posts
class Goblog_Free_Widget_Blog_Posts_Order extends WP_Widget {

    public function __construct() {
        $box = array( 
            'classname'                   => 'goblog_blog_posts',
            'description'                 => esc_html__( 'This is a widget for displaying article posts.', 'goblog-free' ),
            'customize_selective_refresh' => true, 
        );

        parent::__construct( 'goblog_widget_blog_posts', esc_html__( 'Goblog Posts (By: order)', 'goblog-free' ), $box );               
    } 

    // Front-end 
    public function widget( $args, $instance ) { 
    	$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        $date   = ! empty( $instance['date'] ) ? sanitize_key( $instance['date'] ) : false;
        $post   = ! empty( $instance['post'] ) ? sanitize_key( $instance['post'] ) : 'post3';
        $layout = ! empty( $instance['layout'] ) ? sanitize_key( $instance['layout'] ) : 'layout1';

        if ( $post === 'post2') {
            $post = array(
                'post__in' => get_option( 'sticky_posts' ),
                'posts_per_page' => $number,
                'post_type'      => 'post',
            );
        } elseif ( $post === 'post3') {
            $post = array(
                'post__not_in'   => get_option ('sticky_posts'),
                'orderby'        => 'rand',
                'posts_per_page' => $number,
                'post_type'      => 'post',
            );
        } elseif ( $post === 'post4') {
            $post = array(
                'post__not_in'   => get_option ('sticky_posts'),
                'orderby'        => 'comment_count',
                'posts_per_page' => $number,
                'post_type'      => 'post',
            );
        } elseif ( $post === 'post5') {
            $post = array(
                'post_status'         => 'publish',
                'order'				  => 'DESC',
                'posts_per_page'      => $number,
                'ignore_sticky_posts' => true,
            );
        } elseif ( $post === 'post6') {
            $post = array(
                'post_status'         => 'publish',
                'order'				  => 'ASC',
                'posts_per_page'      => $number,
                'ignore_sticky_posts' => true,
            );
        }

        $posting = new WP_Query( $post );

        if ( $layout === 'layout1' ) {
            $flex = 'widget-post-flex-direction1';
        } else {
            $flex = 'widget-post-flex-direction2';
        }

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        if ( $posting->have_posts() ) {
            while( $posting->have_posts() ): $posting->the_post(); 
?>                
                <div class="box-wg-post <?php echo esc_html($flex); ?>">
                    <div class="goblog-wg-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php if( $date ): ?>
                            <p><?php echo esc_html( get_the_date() ); ?></p>
                        <?php endif; ?> 
                    </div>             
                    <div class="goblog-wg-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('goblog-free-widget-posts'); ?>
                        </a> 
                    </div>
                </div>
<?php           
            endwhile;
        }  // End check have_posts

        wp_reset_postdata();
        echo $args['after_widget'];
    } 

    // Form Widget
    public function form( $instance ) {
        $title  = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        $date   = isset( $instance['date'] ) ? (bool) $instance['date'] : true;
        $post   = isset( $instance['post'] ) ? sanitize_key( $instance['post'] ) : 'post3';
        $layout = isset( $instance['layout'] ) ? sanitize_key( $instance['layout'] ) : 'layout1';

?>
        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_html_e( 'Title:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $title ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" />
        </p>
      
        <!-- Number -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
                <?php esc_html_e( 'Number of post:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" />
        </p>
    
        <!-- show date -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>">
                <?php esc_html_e( 'Display post date?', 'goblog-free' ); ?>
            </label>
        </p>

        <!-- post -->
        <p style="margin-bottom: 5px;"><?php echo __('Type Posts', 'goblog-free'); ?></p>
		<select id="<?php echo esc_attr( $this->get_field_id('post') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post') ); ?>" class="widefat goblog-post">
		    <option <?php selected( $post, 'post2'); ?> value="post2"><?php echo __('Sticky Post', 'goblog-free'); ?></option> 
		    <option <?php selected( $post, 'post3'); ?> value="post3"><?php echo __('Random Post', 'goblog-free'); ?></option>   
		    <option <?php selected( $post, 'post4'); ?> value="post4"><?php echo __('Top Comments Post', 'goblog-free'); ?></option>  
 		    <option <?php selected( $post, 'post5'); ?> value="post5"><?php echo __('Recent Post ( DESC = 3 2 1)', 'goblog-free'); ?></option>   
		    <option <?php selected( $post, 'post6'); ?> value="post6"><?php echo __('Recent Post ( ASC = 1 2 3 )', 'goblog-free'); ?></option>    
		</select><br /><br />

        <!-- layout -->
        <div id="admin-widget-post">

        <div class="box">
            <p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout1' ) ); ?>">
            <input <?php checked( $layout, 'layout1' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout1' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />   

            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/post1.png" alt="layout1"/>
            </label></p>
        </div>

        <div class="box">
            <p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout2' ) ); ?>">
            <input <?php checked( $layout, 'layout2' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout2' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />  

            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/post3.png" alt="layout2"/>
            </label></p>
            </div>

        </div>

<?php
    } 

    // Update Widget
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title']  = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = absint( $new_instance['number'] );
        $instance['date']   = sanitize_key( $new_instance['date'] );
        $instance['post']   = sanitize_key( $new_instance['post'] );
        $instance['layout'] = sanitize_key( $new_instance['layout'] );

        return $instance;
    }    
}