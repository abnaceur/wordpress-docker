<?php
/**
 * Custom Widgets
 *
 * @since 1.0.0
 */

if( ! function_exists( 'gtl_news_load_widgets' ) ) :
	/**
     * Register and load widgets.
     *
     * @since 1.0.0
     */
	function gtl_news_load_widgets() {

		/*
			Main Highlight Widget Register
		*/
		register_widget( 'Gtl_News_Main_Highlight' );

	}
	add_action( 'widgets_init', 'gtl_news_load_widgets' );
endif;


if( ! class_exists( 'Gtl_News_Main_Highlight' ) ) :
	/**
	 * Main Highlight
	 *
	 * @since 1.0.0
	 */
	class Gtl_News_Main_Highlight extends WP_Widget
	{
		
		function __construct()
		{
			$opts = array(
				'classname' => '',
				'description'	=> esc_html__( 'Displays Main Highlight posts. Place it in "Home Page Main Highlight  Widget Area" ', 'gtl-news' )
			);
			parent::__construct( 'Gtl_News_Main_Highlight', esc_html__( 'GTL News Main Highlight', 'gtl-news' ), $opts );
		}

		function form( $instance ) {
			$cat_1 = ! empty( $instance[ 'cat_1' ] ) ? $instance[ 'cat_1' ] : absint( 0 );
			$cat_2 = ! empty( $instance[ 'cat_2' ] ) ? $instance[ 'cat_2' ] : absint( 0 );
			$cat_3 = ! empty( $instance[ 'cat_3' ] ) ? $instance[ 'cat_3' ] : absint( 0 );
			$cat_4 = ! empty( $instance[ 'cat_4' ] ) ? $instance[ 'cat_4' ] : absint( 0 );
			$cat_5 = ! empty( $instance[ 'cat_5' ] ) ? $instance[ 'cat_5' ] : absint( 0 );
			
		
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_1' ) )?>"><strong><?php echo esc_html__( 'Slider  Posts: ', 'gtl-news' ); ?></strong></label>
				<?php
					$cat_args_1 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_1' ),
						'name'	=> $this->get_field_name( 'cat_1' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_1 ),
						'show_option_all'	=> esc_html__( 'Choose Category', 'gtl-news' )
					);
					wp_dropdown_categories( $cat_args_1 );
				?>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_2' ) )?>"><strong><?php echo esc_html__( 'Highlight Box 1: ', 'gtl-news' ); ?></strong></label>
				<?php
					$cat_args_1 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_2' ),
						'name'	=> $this->get_field_name( 'cat_2' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_2 ),
						'show_option_all'	=> esc_html__( 'Choose Category', 'gtl-news' )
					);
					wp_dropdown_categories( $cat_args_1 );
				?>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_3' ) )?>"><strong><?php echo esc_html__( 'Highlight Box 2: ', 'gtl-news' ); ?></strong></label>
				<?php
					$cat_args_1 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_3' ),
						'name'	=> $this->get_field_name( 'cat_3' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_3 ),
						'show_option_all'	=> esc_html__( 'Choose Category', 'gtl-news' )
					);
					wp_dropdown_categories( $cat_args_1 );
				?>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_4' ) )?>"><strong><?php echo esc_html__( 'Highlight Box 3: ', 'gtl-news' ); ?></strong></label>
				<?php
					$cat_args_1 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_4' ),
						'name'	=> $this->get_field_name( 'cat_4' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_4 ),
						'show_option_all'	=> esc_html__( 'Choose Category', 'gtl-news' )
					);
					wp_dropdown_categories( $cat_args_1 );
				?>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_5' ) )?>"><strong><?php echo esc_html__( 'Highlight Box 4: ', 'gtl-news' ); ?></strong></label>
				<?php
					$cat_args_5 = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat_5' ),
						'name'	=> $this->get_field_name( 'cat_5' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat_5 ),
						'show_option_all'	=> esc_html__( 'Choose Category', 'gtl-news' )
					);
					wp_dropdown_categories( $cat_args_5 );
				?>
			</p>
			
			
			
		
			<?php
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'cat_1' ] = absint( $new_instance[ 'cat_1' ] );
			$instance[ 'cat_2' ] = absint( $new_instance[ 'cat_2' ] );
			$instance[ 'cat_3' ] = absint( $new_instance[ 'cat_3' ] );		
			$instance[ 'cat_4' ] = absint( $new_instance[ 'cat_4' ] );
			$instance[ 'cat_5' ] = absint( $new_instance[ 'cat_5' ] );
			


			return $instance;
		}

		function widget( $args, $instance ) {
			$cat_1 = ! empty( $instance[ 'cat_1' ] ) ? $instance[ 'cat_1' ] : absint( 1 );
			$cat_2 = ! empty( $instance[ 'cat_2' ] ) ? $instance[ 'cat_2' ] : absint( 1 );
			$cat_3 = ! empty( $instance[ 'cat_3' ] ) ? $instance[ 'cat_3' ] : absint( 1 );
			$cat_4 = ! empty( $instance[ 'cat_4' ] ) ? $instance[ 'cat_4' ] : absint( 1 );
			$cat_5 = ! empty( $instance[ 'cat_5' ] ) ? $instance[ 'cat_5' ] : absint( 1 );
			

			?>
<section class="wrapper below-header">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 pad0r left-content">
            <div class="wrapper-slider">
                <div class="slider-controls">
                    <a href="#" id="slide-prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#" id="slide-next"><i class="fa fa-angle-right"></i></a>
                </div>

                <div id="cycle-slideshow" class="cycle-slideshow" data-cycle-log="false"  data-cycle-swipe=true
                data-cycle-fx=fadeout  data-cycle-speed=2000                            data-cycle-carousel-fluid=true
                data-cycle-carousel-visible=5
                data-cycle-pause-on-hover=true
                data-cycle-auto-height=container
                data-cycle-slides="> div"
                data-cycle-prev=#slide-prev
                data-cycle-next=#slide-next 
                data-cycle-timeout=5000 >
                	<?php
	              			$arg_1 = array(
								'cat'				=> absint( $cat_1 ),
								'posts_per_page' 	=> 5,
								'post_type'			=> 'post',
								'post__not_in'=>get_option("sticky_posts") 
							);
							$query_1 = new WP_Query( $arg_1 );
							if( $query_1->have_posts() ) :
								while( $query_1->have_posts() ) :
									$query_1->the_post();
	              		?>
		                <div class="slide-item">
		                    <figure class="post-img">
		                    <a href="<?php the_permalink(); ?>">
		                       <?php
									if( has_post_thumbnail() ) :
										the_post_thumbnail( 'gtl-news-slider-thumb' );
									endif;
								?></a>
		                    </figure>

		                    <div class="slider-post thumb-post">
		                        <div class="overlay-post-content">
		                            <div class="container-fluid">
		                                <div class="row">
		                                    <div class="col-xs-10 col-sm-12 col-md-12 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 pad0lr">
		                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
		                                        
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <?php
	                			endwhile;
	                			wp_reset_postdata();
	                		endif;
	                	?>
                        </div>
                       
                    </div>
                    </div>               
                    <div class="col-xs-12 col-sm-12 col-md-12 second-section pad0l mainslider-right-content right-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
			                            <?php
					              			$arg_2 = array(
												'cat'				=> absint( $cat_2 ),
												'posts_per_page' 	=> 1,
												'post_type'			=> 'post',
												'post__not_in'=>get_option("sticky_posts") 
											);
											$query_2 = new WP_Query( $arg_2 );
											if( $query_2->have_posts() ) :
												while( $query_2->have_posts() ) :
													$query_2->the_post();
					              		?>
			                                <div class="thumb-post second">
			                                    <figure class="post-img">
			                                     <a href="<?php the_permalink(); ?>">
			                                        <?php
												if( has_post_thumbnail() ) :
													the_post_thumbnail( 'gtl-news-highlight-thumb' );
												endif;
											?></a>
			                                    </figure>
			                                    <div class="overlay-post-content">
			                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
			                                        
			                                        </div>
			                                    </div>
			                                     <?php
						                			endwhile;
						                			wp_reset_postdata();
						                		endif;
						                	?>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <?php
					              			$arg_3 = array(
												'cat'				=> absint( $cat_3 ),
												'posts_per_page' 	=> 1,
												'post_type'			=> 'post',
												'post__not_in'=>get_option("sticky_posts") 
											);
											$query_3 = new WP_Query( $arg_3 );
											if( $query_3->have_posts() ) :
												while( $query_3->have_posts() ) :
													$query_3->the_post();
					              		?>
			                                <div class="thumb-post second">
			                                    <figure class="post-img">
			                                     <a href="<?php the_permalink(); ?>">
			                                        <?php
												if( has_post_thumbnail() ) :
													the_post_thumbnail( 'gtl-news-highlight-thumb' );
												endif;
											?></a>
			                                    </figure>
			                                    <div class="overlay-post-content">
			                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
			                                        
			                                        </div>
			                                    </div>
			                                     <?php
						                			endwhile;
						                			wp_reset_postdata();
						                		endif;
						                	?>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <?php
						              			$arg_4 = array(
													'cat'				=> absint( $cat_4 ),
													'posts_per_page' 	=> 1,
													'post_type'			=> 'post',
													'post__not_in'=>get_option("sticky_posts") 
												);
												$query_4 = new WP_Query( $arg_4 );
												if( $query_4->have_posts() ) :
													while( $query_4->have_posts() ) :
														$query_4->the_post();
						              		?>
				                                <div class="thumb-post second">
				                                    <figure class="post-img">
				                                     <a href="<?php the_permalink(); ?>">
				                                        <?php
													if( has_post_thumbnail() ) :
														the_post_thumbnail( 'gtl-news-highlight-thumb' );
													endif;
												?></a>
				                                    </figure>
				                                    <div class="overlay-post-content">
				                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
				                                        
				                                        </div>
				                                    </div>
				                                     <?php
							                			endwhile;
							                			wp_reset_postdata();
							                		endif;
							                	?>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3">
					                            <?php
							              			$arg_5 = array(
														'cat'				=> absint( $cat_5 ),
														'posts_per_page' 	=> 1,
														'post_type'			=> 'post',
														'post__not_in'=>get_option("sticky_posts") 
													);
													$query_5 = new WP_Query( $arg_5 );
													if( $query_5->have_posts() ) :
														while( $query_5->have_posts() ) :
															$query_5->the_post();
							              		?>
							              		 
					                                <div class="thumb-post second">
					                                    <figure class="post-img">
					                                     <a href="<?php the_permalink(); ?>">
					                                        <?php
														if( has_post_thumbnail() ) :
															the_post_thumbnail( 'gtl-news-highlight-thumb' );
														endif;
													?></a>
					                                    </figure>
					                                    <div class="overlay-post-content">
					                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
					                                        
					                                        </div>
					                                    </div>
					                                    
					                                     <?php
								                			endwhile;
								                			wp_reset_postdata();
								                		endif;
								                	?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </section>
      		<?php
		}
	}
endif; 
?>