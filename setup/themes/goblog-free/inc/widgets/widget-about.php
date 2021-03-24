<?php
/**
 * Create about me widget.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

// Adds widget: Goblog Free About Me
class Goblog_Free_Aboutme_Widget extends WP_Widget {

	public function __construct() {
        $box = array( 
            'classname'                   => 'goblog_about_me',
            'description'                 => esc_html__( 'This is a widget for displaying personal information.', 'goblog-free' ),
            'customize_selective_refresh' => true, 
		);
		
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'media_fields' ) );

        parent::__construct( 'goblog_widget_about_me', esc_html__( 'Goblog About Me', 'goblog-free' ), $box );               
    }

	private $widget_fields = array(
		array(
			'id'   => 'imageupload_media',
			'type' => 'media',
		),
		array(
			'id'   => 'description_textarea',
			'type' => 'textarea',
		),
	);

	// Front-end 
	public function widget( $args, $instance ) {

		$description_textarea   = ! empty( $instance['description_textarea'] ) ? esc_html( $instance['description_textarea'] ) : '';

		$facebook  = ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '';
		$twitter   = ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '';
		$youtube   = ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '';
		$instagram = ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '';
		$linkedin  = ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';
		$pinterest = ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '';
		$github    = ! empty( $instance['github'] ) ? esc_url( $instance['github'] ) : '';

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

		$author_image = wp_get_attachment_image_src( $instance['imageupload_media'], 'thumbnail' );

		// Output
		echo '<div class="widget-about-me">';

			if ( ! empty($author_image[0] ) ) {
				echo '<img src="' . esc_url( $author_image[0] ) . '" alt="' . esc_attr__( 'About Me', 'goblog-free' ) . '" />';
			}
			echo '<p class="description">' . esc_html( $description_textarea ) . '</p>';
		?>

			<div class="container-sosmed">
				<?php if ( $facebook ): ?>
					<a rel="nofollow noreferrer noopener" href="<?php echo esc_url($facebook); ?>" target="_blank">
						<span class="screen-reader-text"><?php esc_html_e('facebook', 'goblog-free'); ?></span>
						<i class="fab fa-facebook-f" aria-hidden="true"></i>
					</a>
				<?php endif; ?>

				<?php if ( $twitter ): ?>
					<a rel="nofollow noreferrer noopener" href="<?php echo esc_url($twitter); ?>" target="_blank">
						<span class="screen-reader-text"><?php esc_html_e('twitter', 'goblog-free'); ?></span>
						<i class="fab fa-twitter" aria-hidden="true"></i>
					</a>
				<?php endif; ?>
							
				<?php if ( $youtube ): ?>
					<a rel="nofollow noreferrer noopener" href="<?php echo esc_url($youtube); ?>" target="_blank">
						<span class="screen-reader-text"><?php esc_html_e('youtube', 'goblog-free'); ?></span>
						<i class="fab fa-youtube" aria-hidden="true"></i>
					</a>
				<?php endif; ?>	

				<?php if ( $instagram ): ?>
					<a rel="nofollow noreferrer noopener" href="<?php echo esc_url($instagram); ?>" target="_blank">
						<span class="screen-reader-text"><?php esc_html_e('instagram', 'goblog-free'); ?></span>
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</a>
				<?php endif; ?>	
				
				<?php if ( $linkedin ): ?>
					<a rel="nofollow noreferrer noopener" href="<?php echo esc_url($linkedin); ?>" target="_blank">
						<span class="screen-reader-text"><?php esc_html_e('linkedin', 'goblog-free'); ?></span>
						<i class="fab fa-linkedin-in" aria-hidden="true"></i>
					</a>	
				<?php endif; ?>			
				
				<?php if ( $pinterest ): ?>
					<a rel="nofollow noreferrer noopener" href="<?php echo esc_url($pinterest); ?>/" target="_blank">
						<span class="screen-reader-text"><?php esc_html_e('pinterest', 'goblog-free'); ?></span>
						<i class="fab fa-pinterest"></i>
					</a>
				<?php endif; ?>	
				
				<?php if ( $github ): ?>
					<a rel="nofollow noreferrer noopener" href="<?php echo esc_url($github); ?>/" target="_blank">
						<span class="screen-reader-text"><?php esc_html_e('github', 'goblog-free'); ?></span>
						<i class="fab fa-github"></i>
					</a>
				<?php endif; ?>	

			</div> <!-- End container-sosmed-->

		</div> <!-- End widget-about-me -->

		<?php
		echo $args['after_widget'];
	}

	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
						_orig_send_attachment = wp.media.editor.send.attachment;
					$(document).on('click','.custommedia',function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id');
						_custom_media = true;
						wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.id);
								$('span#preview'+id).css('background-image', 'url('+attachment.url+')');
								$('input#'+id).trigger('change');
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
					$(document).on('click', '.remove-media', function() {
						var parent = $(this).parents('p');
						parent.find('input[type="media"]').val('').trigger('change');
						parent.find('span').css('background-image', 'url()');
					});
				}
			});
		</script>
		<?php
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset( $widget_field['default'] ) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : $default;
			switch ( $widget_field['type'] ) {
				case 'media':
					$media_url = '';
					if ( $widget_value ) {
						$media_url = wp_get_attachment_url( $widget_value );
					}
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_html__( 'Image Upload', 'goblog-free' ) . ':</label> ';
					$output .= '<input style="display:none;" class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . esc_attr( $widget_field['type'] ) . '" value="' . esc_attr( $widget_value ) . '">';
					$output .= '<span id="preview' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" style="margin-right:10px;border:2px solid #eee;display:block;width: 100px;height:100px;background-image:url(' . esc_url( $media_url ) . ');background-size:contain;background-repeat:no-repeat;"></span>';
					$output .= '<button id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" class="button select-media custommedia">' . esc_html__( 'Add Media', 'goblog-free' ) . '</button>';
					$output .= '<input style="width: 19%;" class="button remove-media" id="buttonremove" name="buttonremove" type="button" value="' . esc_attr__( 'Clear', 'goblog-free' ) . '" />';
					$output .= '</p>';
					break;
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_html__( 'Description', 'goblog-free' ) . ':</label> ';
					$output .= '<textarea class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" rows="6" cols="6" value="' . esc_attr( $widget_value ) . '">' . esc_html( $widget_value ) . '</textarea>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_html( $widget_field['label'] ) . ':</label> ';
					$output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . esc_attr( $widget_field['type'] ) . '" value="' . esc_attr( $widget_value ) . '">';
					$output .= '</p>';
			}
		}

		echo $output;

	}

	// Form Widget
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '';
		$youtube   = isset( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';
		$pinterest = isset( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '';
		$github    = isset( $instance['github'] ) ? esc_url( $instance['github'] ) : '';
		?>

		<!-- Title -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_html_e( 'Title:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $title ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" />
		</p>
		
		<?php $this->field_generator( $instance ); ?>

		<!-- Facebook -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>">
                <?php esc_html_e( 'Link Facebook:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $facebook ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" placeholder="<?php esc_attr_e( 'https://facebook.com/', 'goblog-free' ); ?>" />
		</p>

		<!-- Twitter -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>">
                <?php esc_html_e( 'Link Twitter:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $twitter ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" placeholder="<?php esc_attr_e( 'https://twitter.com/', 'goblog-free' ); ?>" />
		</p>

		<!-- Youtube -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>">
                <?php esc_html_e( 'Link Youtube:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $youtube ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" placeholder="<?php esc_attr_e( 'https://youtube.com/', 'goblog-free' ); ?>" />
		</p>

		<!-- Instagram -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>">
                <?php esc_html_e( 'Link Instagram:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $instagram ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" placeholder="<?php esc_attr_e( 'https://instagram.com/', 'goblog-free' ); ?>" />
		</p>

		<!-- LinkedIn -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>">
                <?php esc_html_e( 'Link LinkedIn:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $linkedin ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" placeholder="<?php esc_attr_e( 'https://linkedin.com/', 'goblog-free' ); ?>" />
		</p>

		<!-- Pinterest -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>">
                <?php esc_html_e( 'Link Pinterest:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $pinterest ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" placeholder="<?php esc_attr_e( 'https://pinterest.com/', 'goblog-free' ); ?>" />
		</p>

		<!-- Github -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>">
                <?php esc_html_e( 'Link Github:', 'goblog-free' ); ?>
            </label>
            <input class="widefat" value="<?php echo esc_attr( $github ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" placeholder="<?php esc_attr_e( 'https://github.com/', 'goblog-free' ); ?>" />
		</p>
		
	<?php 
	}

    // Update Widget
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		
		// this input textarea not id
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? sanitize_text_field( $new_instance[ $widget_field['id'] ] ) : '';
			}
		}

		$instance['facebook']  = esc_url_raw( $new_instance['facebook'] );
		$instance['twitter']   = esc_url_raw( $new_instance['twitter'] );
		$instance['youtube']   = esc_url_raw( $new_instance['youtube'] );
		$instance['instagram'] = esc_url_raw( $new_instance['instagram'] );
		$instance['linkedin']  = esc_url_raw( $new_instance['linkedin'] );
		$instance['pinterest'] = esc_url_raw( $new_instance['pinterest'] );
		$instance['github']    = esc_url_raw( $new_instance['github'] );

        return $instance;
	} 
	
}