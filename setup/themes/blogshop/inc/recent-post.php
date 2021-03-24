<?php

/**
 *
 * blogshop Latest Post Widgets
 */
class blogshop_Recent_Post_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'blogshop-latest-post',
			esc_html__( 'blogshop Latest Posts', 'blogshop' ),
			array(
				'description'   => esc_html__( 'blogshop Latest Post Widgets', 'blogshop' ),
			)
		);
	}
	public function widget( $args, $instance ) { ?>
		<?php echo $args['before_widget']; ?>
		 <?php
			if ( ! empty( $instance['recent_post_title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', esc_html( $instance['recent_post_title'] ), $this->id_base ) . $args['after_title'];
			}
			?>
	<ul class="recent-post-widget">
		<?php
		$post_count = ! empty( $instance['post_count'] ) ? $instance['post_count'] : 5;
		$resent_post    = new WP_Query(
			array(
				'post_type' => array( 'post' ),
				'posts_per_page'    => $post_count,
			)
		);
		while ( $resent_post->have_posts() ) :
			$resent_post->the_post();
			?>
		<li>
			<div class="recent-post-thumb">
				<?php the_post_thumbnail( 'blogshop-thubnail-mobile' ); ?>
			</div>
			<div class="recent-widget-content">
				 <a href="<?php echo esc_url( get_permalink() ); ?>"><h5 class="rct-news-title"><?php the_title(); ?></h5></a>
		  		<p><?php blogshop_posted_by(); ?></p>
			</div>
		</li>
		<?php endwhile; ?>
	</ul>
		<?php echo $args['after_widget']; ?>
		<?php
	}
	public function form( $instance ) {
		 $title = ! empty( $instance['recent_post_title'] ) ? $instance['recent_post_title'] : esc_html__( 'Recent Post', 'blogshop' );
		$post_count = ! empty( $instance['post_count'] ) ? $instance['post_count'] : 5;
		?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'recent_post_title' ) ); ?>"><?php echo esc_html__( 'Title :', 'blogshop' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'recent_post_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'recent_post_title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>"><?php echo esc_html__( 'Post Count:', 'blogshop' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_count' ) ); ?>" type="number" value="<?php echo esc_attr( $post_count ); ?>">
	</p>
		<?php
	}
}

add_action( 'widgets_init', 'blogshop_recent_posts' );
function blogshop_recent_posts() {
	register_widget( 'blogshop_Recent_Post_Widget' );
}

