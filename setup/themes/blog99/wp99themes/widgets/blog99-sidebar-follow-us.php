<?php
/**
 * Blog99 Follow us widget
 *
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
class Blog99_Follow_Us_Layout extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'blog99_follow_us_widgets', // Base ID
			esc_html__( 'Blog99: Follow Us', 'blog99' ), //Widget Name
			array( 'description' => esc_html__( 'Display Social Links.', 'blog99' ), ) // Args
		);
	}

	/**
     * Widget Form Section
     */
	public function form( $instance ) {
		$defaults = array(
			'title'			=> esc_html__( 'Follow me on', 'blog99' ),
            'facebook_url'	=> '',
            'twitter_url'	=> '',
            'instagram_url'	=> '',
            'youtube_url'	=> '',
            'medium_url'	=> '',
            'linkedin_url'	=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>"><?php echo esc_html__( 'Facebook URL:', 'blog99' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_url' ) );?>" value="<?php echo esc_url( $instance['facebook_url'] ); ?>" size="3"/> 
		</p>

        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>"><?php echo esc_html__( 'Twitter URL:', 'blog99' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_url' ) );?>" value="<?php echo esc_url( $instance['twitter_url'] ); ?>" size="3"/> 
		</p>    

        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>"><?php echo esc_html__( 'Instagram URL:', 'blog99' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_url' ) );?>" value="<?php echo esc_url( $instance['instagram_url'] ); ?>" size="3"/> 
		</p>

        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube_url' ) ); ?>"><?php echo esc_html__( 'Youtube URL:', 'blog99' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'youtube_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube_url' ) );?>" value="<?php echo esc_url( $instance['youtube_url'] ); ?>" size="3"/> 
		</p>

        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'medium_url' ) ); ?>"><?php echo esc_html__( 'Medium URL:', 'blog99' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'medium_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'medium_url' ) );?>" value="<?php echo esc_url( $instance['medium_url'] ); ?>" size="3"/> 
		</p>
        
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin_url' ) ); ?>"><?php echo esc_html__( 'Linkedin URL:', 'blog99' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'linkedin_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin_url' ) );?>" value="<?php echo esc_url( $instance['linkedin_url'] ); ?>" size="3"/> 
		</p>
	<?php

	}

    /**
     * Post Update 
     */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );	
        $instance[ 'facebook_url' ] = esc_url($new_instance[ 'facebook_url' ]);
        $instance[ 'twitter_url' ]  = esc_url($new_instance[ 'twitter_url' ]);
        $instance[ 'instagram_url' ] = esc_url($new_instance[ 'instagram_url' ]);
        $instance[ 'youtube_url' ]  = esc_url($new_instance[ 'youtube_url' ]);
        $instance[ 'medium_url' ] = esc_url($new_instance[ 'medium_url' ]);
        $instance[ 'linkedin_url' ]  = esc_url($new_instance[ 'linkedin_url' ]);
		return $instance;
	}


    /**
     * Front End Display
     */
	public function widget( $args, $instance ) {
		extract( $args );

		$title              = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';	
        $home_blog_title    = apply_filters( 'widget_title', $title , $instance, $this->id_base );
        $facebook_url       = ( ! empty( $instance['facebook_url'] ) ) ? esc_url( $instance['facebook_url'] ) : ''; 
        $twitter_url        = ( ! empty( $instance['twitter_url'] ) ) ? esc_url( $instance['twitter_url'] ) : ''; 
        $instagram_url      = ( ! empty( $instance['instagram_url'] ) ) ? esc_url( $instance['instagram_url'] ) : ''; 
        $youtube_url        = ( ! empty( $instance['youtube_url'] ) ) ? esc_url( $instance['youtube_url'] ) : ''; 
        $medium_url         = ( ! empty( $instance['medium_url'] ) ) ? esc_url( $instance['medium_url'] ) : ''; 
        $linkedin_url       = ( ! empty( $instance['linkedin_url'] ) ) ? esc_url( $instance['linkedin_url'] ) : ''; 
       
		// Latest Posts
		echo wp_kses_post( $before_widget );
	?>
        <div class="blog99-sidebar-follow-us">
            <?php if( $home_blog_title ): ?>
                <h2 class="widget-title"><?php echo esc_html($home_blog_title); ?><span class="effect"></span></h2>
            <?php endif; ?>

            <div class="blog99-social-icons">
                <div>
                    <?php if( $facebook_url ): ?><span class="social-icons facebook"><a href="<?php echo esc_url( $facebook_url ) ?>" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i><?php echo esc_html_e('Facebook','blog99'); ?></a></span><?php endif; ?>
					<?php if( $twitter_url ): ?><span class="social-icons twitter"><a href="<?php echo esc_url( $twitter_url ) ?>" target="_blank" ><i class="fa fa-twitter" aria-hidden="true"></i><?php echo esc_html_e('Twitter','blog99'); ?></a></span><?php endif; ?>
					<?php if( $instagram_url ): ?><span class="social-icons instagram"><a href="<?php echo esc_url( $instagram_url ) ?>" target="_blank" ><i class="fa fa-instagram" aria-hidden="true"></i><?php echo esc_html_e('Instagram','blog99'); ?></a></span><?php endif; ?>
					<?php if( $youtube_url ): ?><span class="social-icons youtube"><a href="<?php echo esc_url( $youtube_url ) ?>" target="_blank" ><i class="fa fa-youtube-play" aria-hidden="true"></i><?php echo esc_html_e('Youtube','blog99'); ?></a></span><?php endif; ?>
					<?php if( $medium_url ): ?><span class="social-icons medium"><a href="<?php echo esc_url( $medium_url ) ?>" target="_blank" ><i class="fa fa-medium" aria-hidden="true"></i><?php echo esc_html_e('Medium','blog99'); ?></a></span><?php endif; ?>
					<?php if( $linkedin_url ): ?><span class="social-icons linkedin"><a href="<?php echo esc_url( $linkedin_url ) ?>" target="_blank" ><i class="fa fa-linkedin" aria-hidden="true"></i><?php echo esc_html_e('Linked In','blog99'); ?></a></span><?php endif; ?>
                </div>
            </div>
        </div>
	<?php
		echo wp_kses_post( $after_widget );
	}
}
// Register The Category Posts
function blog99_follow_us_layout_config() {
    register_widget( 'Blog99_Follow_Us_Layout' );
}
add_action( 'widgets_init', 'blog99_follow_us_layout_config' );