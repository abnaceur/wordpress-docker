<?php
/**
 * Create widgets for the post Grids Order builder.
 *
 * @subpackage Goblog Free
 * @since 1.0
 */

/**
 * Implement widgets Goblog Free Grids Order
 *
 * @since 1.0
 */
class Goblog_Free_Grids_Order extends WP_Widget {


    /**
	 * Sets up a new Goblog Free Grids Order widget instance.
	 *
	 * @since 1.0
	 */
    public function __construct() {
        $box = array( 
            'classname'                   => 'goblog_grids_order',
            'description'                 => esc_html__( 'This widget only applies to the Front Page section.', 'goblog-free' ),
            'customize_selective_refresh' => true, 
        );

        parent::__construct( 'goblog_grids_order', esc_html__( 'Goblog Posts Builder (By: order)', 'goblog-free' ), $box );               
    } 

    /**
	 * Outputs the content for the current Goblog Free Grids Order widget instance.
	 *
	 * @since 1.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Goblog Free Grids Order widget instance.
	 */
    public function widget( $args, $instance ) { 
        $title    = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
        $number   = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        $category = ! empty( $instance['category'] ) ? sanitize_key( $instance['category'] ) : false;
        $author   = ! empty( $instance['author'] ) ? sanitize_key( $instance['author'] ) : false;
        $comment  = ! empty( $instance['comment'] ) ? sanitize_key( $instance['comment'] ) : false;
        $date     = ! empty( $instance['date'] ) ? sanitize_key( $instance['date'] ) : false;
        $pagi     = ! empty( $instance['pagi'] ) ? sanitize_key( $instance['pagi'] ) : false;
        $post     = ! empty( $instance['post'] ) ? sanitize_key( $instance['post'] ) : 'post3';
        $layout   = ! empty( $instance['layout'] ) ? sanitize_key( $instance['layout'] ) : 'layout1';

        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

        if ( $post === 'post2') {
            $post = array(
                'post__in'       => get_option( 'sticky_posts' ),
                'posts_per_page' => $number,
                'post_type'      => 'post',
                'paged'          => $paged,
            );
        } elseif ( $post === 'post3') {
            $post = array(
                'post__not_in'   => get_option ('sticky_posts'),
                'orderby'        => 'rand',
                'posts_per_page' => $number,
                'post_type'      => 'post',
                'paged'          => $paged,
            );
        } elseif ( $post === 'post4') {
            $post = array(
                'post__not_in'   => get_option ('sticky_posts'),
                'orderby'        => 'comment_count',
                'posts_per_page' => $number,
                'post_type'      => 'post',
                'paged'          => $paged,
            );
        } elseif ( $post === 'post5') {
            $post = array(
                'post_status'         => 'publish',
                'order'               => 'DESC',
                'posts_per_page'      => $number,
                'ignore_sticky_posts' => true,
                'paged'               => $paged,
            );
        } elseif ( $post === 'post6') {
            $post = array(
                'post_status'         => 'publish',
                'order'               => 'ASC',
                'posts_per_page'      => $number,
                'ignore_sticky_posts' => true,
                'paged'               => $paged,
            );
        }

        $posting = new WP_Query( $post );

        echo $args['before_widget'];

        if ( $posting->have_posts() ): 

            if ( $layout === 'layout1' ) {
                echo '<div class="grids grids1">';
            } elseif ( $layout === 'layout2' ) {
                echo '<div class="grids grids2">';
            } elseif ( $layout === 'layout3' ) {
                echo '<div class="grids grids3">';
            } else {
                echo '<div class="grids grids1">';
            } 

            if ( ! empty( $instance['title'] ) ) : ?>
                <div class="name-post builder-grids-order">
                    <h2 class="title-home">                           
                        <?php echo apply_filters( 'widget_title', $instance['title'] ); ?>           
                    </h2>
                </div>
            <?php endif; ?>
        
            <!-- Start While -->
            <?php while( $posting->have_posts() ): $posting->the_post(); ?> 
            
                <div class="box-content">
                    <div class="content">
                        <div class="categoris">
                            <?php if( $category ){ goblog_free_the_category(); } ?>
                        </div>
                        <?php goblog_free_title_post(); ?>
                        <div class="box-content-info">
                            <?php if( $author ){ goblog_free_author_post(); } ?>
                            <?php if( $comment ){ goblog_free_comment_numb(); } ?>                           
                            <?php if( $date ){ goblog_free_date_post(); } ?>
                        </div>
                        <p><?php echo goblog_free_get_excerpt(); ?></p>
                    </div>
                    <div class="content-gambar">
                        <?php 

                        if( $layout === 'layout2' ) {
                            goblog_free_thumbnail_post_grids2();
                        } else {
                            goblog_free_thumbnail_post(); 
                        }
        
                        ?>
                    </div>
                </div> <!-- End box-content -->    

            <!-- End While -->
            <?php endwhile; ?>
            
            <!-- Pagination -->
            <?php if($pagi) { goblog_free_pagination_default(); } ?>

            </div> <!-- End grids number -->

        <!-- Get post none -->
        <?php else: get_template_part( 'template-parts/post/content', 'none' ); ?>

        <?php endif; // End check have_posts() ?>

        <!-- Reset post data -->
        <?php wp_reset_postdata(); ?>

        <?php echo $args['after_widget'];
    } 

	/**
	 * Outputs the settings form for the Goblog Free Grids Order widget.
	 *
	 * @since 1.0
	 *
	 * @param array $instance Current settings.
	 */
    public function form( $instance ) {
        $title    = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
        $number   = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        $category = isset( $instance['category'] ) ? (bool) $instance['category'] : true;
        $author   = isset( $instance['author'] ) ? (bool) $instance['author'] : true;
        $comment  = isset( $instance['comment'] ) ? (bool) $instance['comment'] : true;
        $date     = isset( $instance['date'] ) ? (bool) $instance['date'] : true;
        $pagi     = isset( $instance['pagi'] ) ? (bool) $instance['pagi'] : false;
        $post     = isset( $instance['post'] ) ? sanitize_key( $instance['post'] ) : 'post3';
        $layout   = isset( $instance['layout'] ) ? sanitize_key( $instance['layout'] ) : 'layout1';

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
    
        <!-- category -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $category ); ?> id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Display category?', 'goblog-free' ); ?></label>
        </p>         

        <!-- author -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $author ); ?> id="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>"><?php esc_html_e( 'Display author?', 'goblog-free' ); ?></label>
        </p>         

        <!-- comment -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $comment ); ?> id="<?php echo esc_attr( $this->get_field_id( 'comment' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'comment' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'comment' ) ); ?>"><?php esc_html_e( 'Display comment?', 'goblog-free' ); ?></label>
        </p>        

        <!-- show date -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>">
                <?php esc_html_e( 'Display post date?', 'goblog-free' ); ?>
            </label>
        </p>

        <!-- pagi -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $pagi ); ?> id="<?php echo esc_attr( $this->get_field_id( 'pagi' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pagi' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'pagi' ) ); ?>">
                <?php esc_html_e( 'Display pagination?', 'goblog-free' ); ?>
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
        <div id="builder-layout">

        <div class="box">
            <p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout1' ) ); ?>">
            <input <?php checked( $layout, 'layout1' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout1' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />   

            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/post1.png" alt="layout1"/>
            </label></p>
        </div>

        <div class="box">
            <p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout2' ) ); ?>">
            <input <?php checked( $layout, 'layout2' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout2' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />   

            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/post2.png" alt="layout2"/>
            </label></p>
        </div>

        <div class="box">
            <p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout3' ) ); ?>">
            <input <?php checked( $layout, 'layout3' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout3' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />   

            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/post3.png" alt="layout3"/>
            </label></p>
        </div>

        </div>

<?php
    } 

	/**
	 * Handles updating the settings for the current Goblog Free Grids Order widget instance.
	 *
	 * @since 1.0
	 *
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title']    = sanitize_text_field( $new_instance['title'] );
        $instance['number']   = absint( $new_instance['number'] );
        $instance['category'] = sanitize_key( $new_instance['category'] );
        $instance['author']   = sanitize_key( $new_instance['author'] );
        $instance['comment']  = sanitize_key( $new_instance['comment'] );
        $instance['date']     = sanitize_key( $new_instance['date'] );
        $instance['pagi']     = sanitize_key( $new_instance['pagi'] );
        $instance['post']     = sanitize_key( $new_instance['post'] );
        $instance['layout']   = sanitize_key( $new_instance['layout'] );

        return $instance;
    }    
}