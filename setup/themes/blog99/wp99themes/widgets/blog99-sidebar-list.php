<?php
/**
 * The template for displaying 404 pages (not found)
 *
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
class Blog99_Sidebar_List_Layout extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'blog99_sidebar_post_list', // Base ID
			esc_html__( 'B99 Sidebar: Post List', 'blog99' ), //Widget Name
			array( 'description' => esc_html__( 'Display Sidebar Post List.', 'blog99' ), ) // Args
		);
	}

	/**
     * Widget Form Section
     */
	public function form( $instance ) {
		$defaults = array(
			'title'			=> esc_html__( 'Post List view', 'blog99' ),
			'category'		=> esc_html__( 'all', 'blog99' ),
			'number_posts'	=> 8,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'blog99' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label><?php echo esc_html__( 'Select a post category:', 'blog99' ); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => __('Show all posts','blog99' ), 'class' => 'widefat' ) ); ?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number_posts' ) ); ?>"><?php echo esc_html__( 'Number of posts:', 'blog99' ); ?></label>
			<input class="widefat" type="number" id="<?php echo esc_attr( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_posts' ) );?>" value="<?php echo absint( $instance['number_posts'] ); ?>" size="3"/> 
		</p>
					
	<?php

	}

    /**
     * Post Update 
     */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );	
		$instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
		$instance[ 'number_posts' ] = intval($new_instance[ 'number_posts' ]);
		return $instance;
	}


    /**
     * Front End Display
     */
	public function widget( $args, $instance ) {
		extract( $args );

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';	
        $home_blog_title = apply_filters( 'widget_title', $title , $instance, $this->id_base );
		$home_blog_category_id = ( ! empty( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
		$number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 6; 
        
		// Latest Posts
		echo wp_kses_post( $before_widget );
	?>
        <div class="blog99-trendingnews">
            <div class="blog99-trendingnews-outer-wrapper">
                <div class="">
                    <div class="blog99-trendingnews-inner-wrapper">
                        <div class="blog99-trendingnews-right">
                            <?php if( $home_blog_title != '' ): ?>

								<h2 class="widget-title"><span><?php echo wp_kses_post( $home_blog_title ); ?></span><span class="effect"></span></h2>
                            
                            <?php endif; ?>
                            
                            <div   class="blog99-trendingnews-right-top">
	                            <?php 
	                                /**
	                                 * args 
	                                 * 
	                                 * @since 1.0.0
	                                 */
	                                $args = array( 'post_type'=>'post','posts_per_page'=>$number_posts,'cat'=>$home_blog_category_id );
	                                $blog_query = new WP_Query( $args ); 

	                
	                                while( $blog_query->have_posts()): $blog_query->the_post(); 
	                                get_template_part( 'wp99themes/template-parts/widget/sidebar-list' );
	                                endwhile; wp_reset_postdata(); 
	                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	<?php
		echo wp_kses_post( $after_widget );
	}


}
// Register The Category Posts
function blog99_sidebar_list_layout_config() {
    register_widget( 'Blog99_Sidebar_List_Layout' );
}
add_action( 'widgets_init', 'blog99_sidebar_list_layout_config' );