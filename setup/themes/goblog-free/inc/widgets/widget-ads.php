<?php
/**
 * Create ads widget.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */
 
// ADS widget
class Goblog_Free_Widget_Ads extends WP_Widget {

    public function __construct() {
        $box = array( 
            'classname'                   => 'goblog_ads_widget',
            'description'                 => esc_html__( 'Display any kinds of advertisements.', 'goblog-free' ),
            'customize_selective_refresh' => true, 
        );

        parent::__construct( 'goblog_widget_ads', esc_html__( 'Goblog ADS', 'goblog-free' ), $box );               
    } 

    // Front-end
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
        }
        
        $ads_code = ! empty( $instance['ads_code'] ) ? $instance['ads_code']: '';

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

			// Display the ad banner.
			if ( $ads_code ) {
				echo '<div class="ads_widget">' . $ads_code . '</div>';
			}

        echo $args['after_widget'];

	}

    // Form Widget
	public function form( $instance ) {
		$title    = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
		$ads_code = isset( $instance['ads_code'] ) ? esc_textarea( $instance['ads_code'] ) : '';
	?>

        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_html_e( 'Title:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $title ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" />
        </p>

        <!-- Ads Code -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'ads_code' ) ); ?>">
                <?php esc_html_e( 'Ads Code:', 'goblog-free' ); ?>
            </label>
            <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'ads_code' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'ads_code' ) ); ?>" cols="30" rows="6"><?php echo esc_html($ads_code); ?></textarea>
        </p>

	<?php

    }
    
    // Update Widget
	public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title']   = sanitize_text_field( $new_instance['title'] );
        
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['ads_code'] = $new_instance['ads_code'];
		} else {
			$instance['ads_code'] = wp_kses_post( $new_instance['ads_code'] );
        }
        
        return $instance;
	}

}