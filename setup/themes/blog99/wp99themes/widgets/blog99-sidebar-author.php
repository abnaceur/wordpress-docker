<?php
/**
 * Author Display Widget Section
 *
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
class Blog99_Author_Info extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'blog99_author_info_section_widgets', // Base ID
			esc_html__( 'Blog99: Author Info', 'blog99' ), //Widget Name
			array( 'description' => esc_html__( 'Display author information.', 'blog99' ), ) // Args
		);
	}

	/**
     * Widget Form Section
     */
	public function form( $instance ) {
		
		$defaults = array(
			'title'					=> esc_html__( 'About Author', 'blog99' ),
			'blog99_author_select'	=>'',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		//author list
		$args = array(
			'blog_id'      => $GLOBALS['blog_id'],
			'role'         => '',
			'role__in'     => array(),
			'role__not_in' => array(),
			'meta_key'     => '',
			'meta_value'   => '',
			'meta_compare' => '',
			'meta_query'   => array(),
			'date_query'   => array(),        
			'include'      => array(),
			'exclude'      => array(),
			'orderby'      => 'login',
			'order'        => 'ASC',
			'offset'       => '',
			'search'       => '',
			'number'       => '',
			'count_total'  => false,
			'fields'       => 'all',
			'who'          => '',
		); 

		$blog99_get_all_authors = get_users( $args );
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title', 'blog99' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'blog99_author_select' )); ?>"><?php esc_html_e( 'Select Author', 'blog99' ); ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'blog99_author_select' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'blog99_author_select' )); ?>" class="widefat">
				<?php
					// Loop through options and add each one to the select dropdown
					foreach(  $blog99_get_all_authors as  $blog99_get_all_author ){
						
						$blog99_username 	= $blog99_get_all_author->data->user_nicename;
						
						$blog99_user_id 	= $blog99_get_all_author->data->ID;

						$selected 			= $instance['blog99_author_select'];

						echo '<option value="' . esc_attr( $blog99_user_id ) . '" id="' . esc_attr( $blog99_user_id ) . '" '. selected( $blog99_user_id, $selected , false ) . '>'. esc_html( $blog99_username ). '</option>';
					}
				?>
			</select>
		</p>
	<?php

	}

    /**
     * Post Update
     */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ]        			= sanitize_text_field( $new_instance[ 'title' ] );	
		$instance[ 'blog99_author_select' ]     = sanitize_text_field( $new_instance[ 'blog99_author_select' ] );	
		return $instance;
	}


    /**
     * Front End Display
     */
	public function widget( $args, $instance ) {
		extract( $args );

        //blog99 author info
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__('About Author','blog99');	
        $home_blog_title = apply_filters( 'widget_title', $title , $instance, $this->id_base );
		$user_id   = ( ! empty( $instance['blog99_author_select'] ) ) ? $instance['blog99_author_select'] : '';	
		
		
		// Latest Posts
		echo wp_kses_post( $before_widget );
	?>
        <div class="blog99-sidebar-author-info">
            
            <?php if( $home_blog_title ): ?>
				<h2 class="widget-title"><?php echo esc_html( $home_blog_title ); ?><span class="effect"></span></h2>
			<?php endif; ?>

			<?php if( $user_id ): ?>	
                <div class="blog99-author-info-content">
                    <div class="blog99-author-thumbnail">
                        <?php blog99_author_image_style( get_avatar_url($user_id, array('size' => 500) ) ); ?>
                    </div>

                    <div class="blog99-author-content">
                       
                        <h2 class="blog99-author-heading"><?php the_author_meta( 'display_name', $user_id ); ?></h2>
						
						<p><?php the_author_meta( 'description', $user_id ); ?></p>
						
						<div class="blog99-author-link blog99-readmore-buttom py-3">
							<a href="<?php echo esc_url( get_author_posts_url( $user_id ) ); ?>" class="blog99 author-btn"><?php esc_html_e('Read More','blog99') ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"></path></g></svg>
							</a>
						</div>
                    </div>
                </div>
			<?php endif; ?>
        </div>
	<?php
		echo wp_kses_post( $after_widget );
	}
}
// Register The Category Posts
function blog99_blog99_widget_config() {
	
    register_widget( 'Blog99_Author_Info' );
}
add_action( 'widgets_init', 'blog99_blog99_widget_config' );
