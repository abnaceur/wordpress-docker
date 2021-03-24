<?php

/**
 * Blog Section widget.
 */


if( ! class_exists('Colon_Blog_Section_Widget')) :

class Colon_Blog_Section_Widget extends WP_Widget {

	var $defaults;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'colon_blog_widget', // Base ID
			esc_html__( 'Colon: Blog Section Widget', 'colon' ), // Name
			array( 'description' => esc_html__( 'Adds latest blog posts in Colon WordPress theme. ', 'colon'), ) // Args
		);		     
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		extract( wp_parse_args( $instance, $this->defaults ) );
		$no_of_posts = ( ! empty( $instance['no_of_posts'] ) ) ? absint( $instance['no_of_posts'] ) : 3;
		$category = ! empty( $instance['category'] ) ? esc_html( $instance['category'] ) : 'category';
		$cb_excerpt = isset ( $instance['cb_excerpt'] ) ? (bool)$instance['cb_excerpt'] : false;

		?>
		<div class="latest-posts-wrapper">
			<div class="latest-posts-lists-wrapper">
				<div class="latest-posts-content">
					<?php
						if("-1"==$category) :
							$query = new WP_Query( array(
								'posts_per_page' 			=> $no_of_posts,
								'post_type'					=> 'post',
								'ignore_sticky_posts'       => 0
							) );
						else :
							$query = new WP_Query( array(
								'posts_per_page' 			=> $no_of_posts,
								'post_type'					=> 'post',
								'category__in'				=> $category,
								'ignore_sticky_posts'       => 0
							) );
						endif;
						
						while( $query-> have_posts() ) : $query->the_post(); ?>
							<article class="recent-blog-widget">
						        <div class="blog-post">
						            <div class="image">
						                <?php
						                    if ( has_post_thumbnail()) :
						                        the_post_thumbnail('medium');
						                    endif;
						                ?>
						                
						            </div>
						            <div class="clearfix"></div>
						            <div class="content">
						            	<div class="post-date bottom-left">
						                    <div class="post-day"><?php the_time(get_option('date_format')) ?></div>
						                </div>
						                <h3 class="entry-title">
						                    <?php
						                        if ( is_sticky() && is_home() ) :
						                    		echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="#626262" d="M11 6.5V1h1V0H4v1h1v5.5S3 8 3 10c0 .5 1.9.7 4 .7v2.2c0 .7.2 1.4.5 2.1l.5 1l.5-1c.3-.6.5-1.3.5-2.1v-2.2c2.1 0 4-.3 4-.7c0-2-2-3.5-2-3.5zm-4 .1s-.5.3-1.6 1.4c-1 1-1.5 1.9-1.5 1.9s.1-1 .8-1.9C5.6 6.9 6 6.6 6 6.6V1h1v5.6z"/></svg>';
						                        endif;
						                    ?>
						                    <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
						                </h3>
						                <div class="meta">
						                	<div class="author-meta meta-list">
							                	<span class="author-icon">
	                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"><path fill="#626262" d="M8 0C2.4 0 5.1 7.3 5.1 7.3c.6 1 1.4.8 1.4 1.5c0 .6-.7.8-1.4.9C4 9.7 3 9.5 2 11.3c-.6 1.1-.9 4.7-.9 4.7h13.7s-.3-3.6-.8-4.7c-1-1.9-2-1.6-3.1-1.7c-.7-.1-1.4-.3-1.4-.9s.8-.4 1.4-1.5C10.9 7.3 13.6 0 8 0z"/><rect x="0" y="0" width="16" height="16" fill="rgba(0, 0, 0, 0)" /></svg>
	                                            </span>
	                                            <span class="byline" itemprop="author" itemscope="" itemtype="https://schema.org/Person"> 
                                                    <span itemprop="name"><a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" itemprop="url"><?php the_author() ?></a></span>
                                                </span>
	                                        </div>
	                                        <div class="comments-meta meta-list">
							                	<span class="comments-icon">
	                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"><path fill="#626262" d="M14.2 14c.6-.5 1.8-1.6 1.8-3.2c0-1.4-1.2-2.6-2.8-3.3c.5-.6.8-1.5.8-2.4C14 2.3 11.1 0 7.4 0C3.9 0 0 2.1 0 5.1c0 2.1 1.6 3.6 2.3 4.2c-.1 1.2-.6 1.7-.6 1.7L.5 12H2c1.2 0 2.2-.3 3-.7c.3 1.9 2.5 3.4 5.3 3.4h.5c.6.5 1.8 1.3 3.5 1.3h1.4l-1.1-.9s-.3-.3-.4-1.1zm-3.9-.3C8 13.7 6 12.4 6 10.9v-.2c.2-.2.4-.3.5-.5h.7c2.1 0 4-.7 5.2-1.9c1.5.5 2.6 1.5 2.6 2.5s-.9 2-1.7 2.5l-.3.2v.3c0 .5.2.8.3 1.1c-1-.2-1.7-.7-1.9-1l-.1-.2h-1zM7.4 1C10.5 1 13 2.9 13 5.1s-2.6 4.1-5.8 4.1H6.1l-.1.2c-.3.4-1.5 1.2-3.1 1.5c.1-.4.1-1 .1-1.8v-.3C2 8 .9 6.6.9 5.2C.9 3 4.1 1 7.4 1z"/><rect x="0" y="0" width="16" height="16" fill="rgba(0, 0, 0, 0)" /></svg>
	                                            </span>
	                                            <span itemprop="commentCount"><a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?> <?php esc_html_e('Comments','colon'); ?></a></span>
                                                </span>
	                                        </div>
						                </div>

						                <?php
						                	if( true==$cb_excerpt ) :
						                		the_excerpt();  
						                        ?>
						                            <div class="read-more">
						                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('READ MORE','colon'); ?> <i class="la la-long-arrow-alt-right"></i></a>
						                            </div>
						                        <?php
						                	endif;
						                ?>
						            </div>
						        </div>
						    </article>
						<?php endwhile;
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
		<?php
    }
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	    $no_of_posts = ( ! empty( $instance['no_of_posts'] ) ) ? absint( $instance['no_of_posts'] ) : 3;
		$category = ! empty( $instance['category'] ) ? esc_html( $instance['category'] ) : 'category';
		$cb_excerpt = isset ( $instance['cb_excerpt'] ) ? (bool)$instance['cb_excerpt'] : false;
	    ?>     	  	    	
		    <p>
				<label for="<?php echo esc_attr($this->get_field_id( 'no_of_posts' )); ?>"><?php esc_html_e( 'Number of posts:', 'colon' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('no_of_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('no_of_posts')); ?>" type="text" value="<?php echo absint( $no_of_posts ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Choose Category', 'colon' ); ?>:</label>
				<?php wp_dropdown_categories( array( 'show_option_none' =>esc_html__('-- Select -- ','colon'),'name' => esc_attr($this->get_field_name( 'category' )), 'selected' => esc_attr($category) ) ); ?>
			</p>
			<p>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id('cb_excerpt')); ?>" name="<?php echo esc_attr($this->get_field_name('cb_excerpt')); ?>" value="<?php echo esc_attr('Excerpt','colon'); ?>" <?php checked( true, $cb_excerpt ); ?>>
				<label for="<?php echo esc_attr($this->get_field_id( 'cb_excerpt' )); ?>"><?php esc_html_e('Show Excerpt','colon') ?></label><br>
			</p>	
    	<?php
         
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;	
		$instance['no_of_posts'] = absint( $new_instance['no_of_posts'] );
		$instance[ 'category' ] = sanitize_text_field($new_instance[ 'category' ]);
		$instance['cb_excerpt'] = isset ( $new_instance['cb_excerpt'] ) ? (bool)$new_instance['cb_excerpt'] : false;
    	return $instance;
	}

}
endif;

if( ! function_exists('colon_register_blog_section_widget')) :
// register widget
function colon_register_blog_section_widget() {
    register_widget( 'Colon_Blog_Section_Widget' );
}
endif;

add_action( 'widgets_init', 'colon_register_blog_section_widget' );
