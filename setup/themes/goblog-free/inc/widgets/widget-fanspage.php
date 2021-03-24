<?php
/**
 * Create fans page widget.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

// Script fans page facebook
function goblog_load_scripts() {
	wp_enqueue_script( 'goblog-fb-likes', get_template_directory_uri() . '/assets/js/fb-like.js', array(), '', true );
}

// Adds widget: facebook fans page
class Goblog_Free_Fans_Page extends WP_Widget {

    public function __construct() {
        $box = array( 
            'classname'                   => 'goblog_fans_page',
            'description'                 => esc_html__( 'This is a widget for displaying Facebook Fans Page.', 'goblog-free' ),
            'customize_selective_refresh' => true, 
        );

        parent::__construct( 'goblog_fans_page', esc_html__( 'Goblog Facebook Fans Page', 'goblog-free' ), $box );    
        
        // enqueue JS on frontend only if widget is active.
        if ( is_active_widget( false, false, $this->id_base, true ) ) {
            add_action('wp_enqueue_scripts', 'goblog_load_scripts');
        }
    } 

    // Front-end 
	public function widget( $args, $instance ) {
		$page_url              = ! empty( $instance['page_url'] ) ? esc_url( $instance['page_url'] ) : '';
        $tab_post              = ! empty( $instance['tab_post'] ) ? sanitize_key( $instance['tab_post'] ) : '';
        $width                 = ! empty( $instance['width'] ) ? absint( $instance['width'] ) : 340;
        $height                = ! empty( $instance['height'] ) ? absint( $instance['height'] ) : 500;
        $use_small_header      = ! empty( $instance['use_small_header'] ) ? sanitize_key( $instance['use_small_header'] ) : '';
        $adapt_container_width = ! empty( $instance['adapt_container_width'] ) ? sanitize_key( $instance['adapt_container_width'] ) : '';
        $hide_cover_photo      = ! empty( $instance['hide_cover_photo'] ) ? sanitize_key( $instance['hide_cover_photo'] ) : '';
        $show_friend_faces     = ! empty( $instance['show_friend_faces'] ) ? sanitize_key( $instance['show_friend_faces'] ) : '';

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        if($page_url): ?>
            <div class="fb-page" 
                data-href="<?php echo esc_url( $page_url ); ?>" 
                data-tabs="<?php echo esc_attr( $tab_post ); ?>" 
                data-width="<?php echo esc_attr( $width ); ?>" 
                data-height="<?php echo esc_attr( $height ); ?>"
                data-small-header="<?php echo esc_attr( $use_small_header ); ?>" 
                data-adapt-container-width="<?php echo esc_attr( $adapt_container_width ); ?>" 
                data-hide-cover="<?php echo esc_attr( $hide_cover_photo ); ?>" 
                data-show-facepile="<?php echo esc_attr( $show_friend_faces ); ?>">
            </div>
        <?php endif;

		echo $args['after_widget'];
	}        
    
    // Form Widget
    function form( $instance ) {
        $title                  = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
        $page_url               = isset( $instance['page_url'] ) ? esc_url( $instance['page_url'] ) : '';
        $tab_post               = isset( $instance['tab_post'] ) ? esc_html( $instance['tab_post'] ) : '';
        $width                  = isset( $instance['width'] ) ? absint( $instance['width'] ) : 340;
        $height                 = isset( $instance['height'] ) ? absint( $instance['height'] ) : 500;
        $use_small_header       = isset( $instance['use_small_header'] ) ? (bool) $instance['use_small_header'] : false;
        $adapt_container_width  = isset( $instance['adapt_container_width'] ) ? (bool) $instance['adapt_container_width'] : true;
        $hide_cover_photo       = isset( $instance['hide_cover_photo'] ) ? (bool) $instance['hide_cover_photo'] : false;
        $show_friend_faces      = isset( $instance['show_friend_faces'] ) ? (bool) $instance['show_friend_faces'] : true;
?>
        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_html_e( 'Title:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $title ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" />
        </p> 
                
        <!-- page_url -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>">
                <?php esc_html_e( 'Facebook Page URL:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $page_url ); ?>" type="url" id="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page_url' ) ); ?>" placeholder="<?php esc_attr_e( 'Facebook Page URL', 'goblog-free' ); ?>" />
        </p>

        <!-- tab_post -->
        <p style="margin-bottom: 5px;"><?php echo __('Tabs', 'goblog-free'); ?></p>
		<select id="<?php echo esc_attr( $this->get_field_id('tab_post') ); ?>" name="<?php echo esc_attr( $this->get_field_name('tab_post') ); ?>" class="widefat goblog-dropdown-fans-page">
		    <option <?php selected( $tab_post, 'timeline'); ?> value="timeline"><?php echo __('timeline', 'goblog-free'); ?></option> 
		    <option <?php selected( $tab_post, 'messages'); ?> value="messages"><?php echo __('messages', 'goblog-free'); ?></option>   
		    <option <?php selected( $tab_post, 'events'); ?> value="events"><?php echo __('events', 'goblog-free'); ?></option>      
		</select><br />

        <!-- width -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>">
                <?php esc_html_e( 'Width:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $width ); ?>" type="number" min="<?php echo esc_attr( 180 ); ?>" max="<?php echo esc_attr( 500 ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" placeholder="<?php esc_attr_e( 'Min. 180 to Max. 500', 'goblog-free' ); ?>" />
        </p>

        <!-- height -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>">
                <?php esc_html_e( 'Height:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $height ); ?>" type="number" min="<?php echo esc_attr( 70 ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" placeholder="<?php esc_attr_e( 'Min. 70', 'goblog-free' ); ?>" />
        </p>

        <!-- use_small_header -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $use_small_header ); ?> id="<?php echo esc_attr( $this->get_field_id( 'use_small_header' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'use_small_header' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'use_small_header' ) ); ?>">
                <?php esc_html_e( 'Use Small Header?', 'goblog-free' ); ?>
            </label>
        </p>

        <!-- Adapt to plugin container width -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $adapt_container_width ); ?> id="<?php echo esc_attr( $this->get_field_id( 'adapt_container_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'adapt_container_width' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'adapt_container_width' ) ); ?>">
                <?php esc_html_e( 'Adapt to plugin container width?', 'goblog-free' ); ?>
            </label>
        </p>

        <!-- Hide Cover Photo-->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $hide_cover_photo ); ?> id="<?php echo esc_attr( $this->get_field_id( 'hide_cover_photo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_cover_photo' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'hide_cover_photo' ) ); ?>">
                <?php esc_html_e( 'Hide Cover Photo?', 'goblog-free' ); ?>
            </label>
        </p>

        <!-- Show Friend's Faces-->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_friend_faces ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_friend_faces' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_friend_faces' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_friend_faces' ) ); ?>">
                <?php esc_html_e( "Show Friend's Faces?", 'goblog-free' ); ?>
            </label>
        </p>

    <?php
    }

    // Update Widget
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title']                 = sanitize_text_field( $new_instance['title'] );
        $instance['page_url']              = esc_url_raw( $new_instance['page_url'] );
        $instance['tab_post']              = sanitize_key( $new_instance['tab_post'] );
        $instance['width']                 = absint( $new_instance['width'] );
        $instance['height']                = absint( $new_instance['height'] );
        $instance['use_small_header']      = sanitize_key( $new_instance['use_small_header'] );
        $instance['adapt_container_width'] = sanitize_key( $new_instance['adapt_container_width'] );
        $instance['hide_cover_photo']      = sanitize_key( $new_instance['hide_cover_photo'] );
        $instance['show_friend_faces']     = sanitize_key( $new_instance['show_friend_faces'] );

        return $instance;
    }  

}