<?php
/**
 * Blog99 Loop
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
if ( ! class_exists( 'Blog99_Loop' ) ) :

	/**
	 * Blog99_Loop
	 *
	 * @since 1.0.0
	 */
	class Blog99_Loop {

		/**
		 * Instance
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @var object Class object.
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 *
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			// Loop.
			add_action( 'blog99_content_loop', array( $this, 'loop_markup' ) );
			add_action( 'blog99_content_page_loop', array( $this, 'loop_markup_page' ) );

			// Template Parts.
			add_action( 'blog99_page_template_parts_content', array( $this, 'template_parts_page' ) );
			add_action( 'blog99_page_template_parts_content', array( $this, 'template_parts_comments' ), 15 );
			add_action( 'blog99_template_parts_content', array( $this, 'template_parts_post' ) );
			add_action( 'blog99_template_parts_content', array( $this, 'template_parts_search' ) );
			add_action( 'blog99_template_parts_content', array( $this, 'template_parts_default' ) );
			add_action( 'blog99_template_parts_content', array( $this, 'template_parts_comments' ), 15 );

			// Template None.
			add_action( 'blog99_template_parts_content_none', array( $this, 'template_parts_none' ) );
			add_action( 'blog99_template_parts_content_none', array( $this, 'template_parts_404' ) );
			add_action( 'blog99_404_content_template', array( $this, 'template_parts_404' ) );

			// Content top and bottom.
			add_action( 'blog99_template_parts_content_top', array( $this, 'template_parts_content_top' ) );
			add_action( 'blog99_template_parts_content_bottom', array( $this, 'template_parts_content_bottom' ) );

			// Add closing and ending div 'blog99-row'.
			add_action( 'blog99_template_parts_content_top', array( $this, 'blog99_templat_part_wrap_open' ), 25 );
			add_action( 'blog99_template_parts_content_bottom', array( $this, 'blog99_templat_part_wrap_close' ), 5 );
		
			//blog99_breadcrumb_trail
			add_action( 'blog99_breadcrumb_trail', array( $this, 'blog99_breadcrumb_trail_sec' ), 5 );
		
		}

		/**
		 * Template part none
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_none() {

			if ( is_archive() || is_search() ) {

				get_template_part( 'wp99themes/template-parts/content', 'none' );
			}
		}

		/**
		 * Template part 404
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_404() {
			if ( is_404() ) {
				get_template_part( 'wp99themes/template-parts/content', '404' );
			}
		}

		/**
		 * Template part page
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_page() {
			get_template_part( 'wp99themes/template-parts/content', 'page' );
		}

		/**
		 * Template part single
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_post() {
			if ( is_single() ) {
				get_template_part( 'wp99themes/template-parts/content', 'single' );
			}
		}


		/**
		 * Breadcrumb Section
		 * @since 1.0.0
		 */
		public function blog99_breadcrumb_trail_sec() {
			if(get_theme_mod('blog99_breadcrumb_enable',true))
				get_template_part( 'wp99themes/template-parts/breadcrumb/breadcrumb', 'trail' );
		}



		/**
		 * Template part search
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_search() {
			if ( is_search() ) {
				get_template_part( 'wp99themes/template-parts/content', 'search' );
			}
		}

		/**
		 * Template part comments
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_comments() {
			if ( is_single() || is_page() ) {
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}
		}

		/**
		 * Template part default
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_default() {
			if ( ! is_page() && ! is_single() && ! is_search() && ! is_404() ) {
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'wp99themes/template-parts/content', get_post_format() );
			}
		}

		/**
		 * Loop Markup for content page
		 *
		 * @since 1.0.0
		 */
		public function loop_markup_page() {
			$this->loop_markup( true );
		}

		/**
		 * Template part loop
		 *
		 * @param  boolean $is_page Loop outputs different content action for content page and default content.
		 *         if is_page is set to true - do_action( 'blog99_page_template_parts_content' ); is added
		 *         if is_page is false - do_action( 'blog99_template_parts_content' ); is added.
		 * @since 1.0.0
		 * @return void
		 */
		public function loop_markup( $is_page = false ) { ?>

			<main id="main" class="site-main">
				<div class="blog99-trendingnews">
					<div class="blog99-trendingnews-outer-wrapper">
						<div class="blog99-trendingnews-inner-wrapper">
							<div class="blog99-trendingnews-left">
								<?php 
									if ( have_posts() ) :

										do_action( 'blog99_template_parts_content_top' );

									
										while ( have_posts() ) : the_post();

											if ( is_singular() && !$is_page) :

												get_template_part( 'wp99themes/template-parts/content-single', get_post_format() );
												
												//is single page then
												if( is_single() ){

													$this->blog99_related_post();
												}

												//is comment part
												$this->template_parts_comments();

											else:

												if ( true == $is_page ) {

													do_action( 'blog99_page_template_parts_content' );

												} else {

													do_action( 'blog99_template_parts_content' );
												}

											endif;

										endwhile; 
									
									    do_action( 'blog99_template_parts_content_bottom' );

									else : 

										do_action( 'blog99_template_parts_content_none' ); 

									endif; 
								?>
							</div>
						</div>
					</div>
				</div>
			</main><!-- #main -->
			
		<?php }

		/**
		 * Display Related Post
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function blog99_related_post() {

			/**
			 * Get the category id
			 * @since 1.0.0
			 */
			$post_id = get_the_ID();
			$cat_ids = array();
			$categories = get_the_category( $post_id );

			if(!empty($categories) && is_wp_error($categories)):
				foreach ($categories as $category):
					array_push($cat_ids, $category->term_id);
				endforeach;
			endif;
		
			$current_post_type = get_post_type($post_id);
			$query_args = array( 
				'category__in'   => $cat_ids,
				'post_type'      => $current_post_type,
				'post_not_in'    => array($post_id),
				'posts_per_page'  => get_theme_mod('blog99_related_number_of_post',4)
			 );
		
			$related_cats_post = new WP_Query( $query_args );

			//related title
			$blog99_relate_header_title = get_theme_mod('blog99_related_post_header_title','RELATED ARTICLES');

			if( get_theme_mod('blog99_single_post_disable',true) == true ){
		?>
			<div class="blog99-newsfeed blog99-related-post ">
				<div class="blog99-newsfeed-outer-wrapper">
					<div class="blog99-newsfeed-inner-wrapper">
						<?php if( $blog99_relate_header_title ): ?>
							<div class="blog99-header-title wow fadeInUp">
								<h2 class="entry-title widget-title"><?php echo esc_html($blog99_relate_header_title); ?></h2>
							</div>
						<?php endif; ?>
						<div class="middle-bottom">
							<div class="row">
								<?php 
									if($related_cats_post->have_posts()):
										while($related_cats_post->have_posts()): $related_cats_post->the_post();
								?>
									<div class="col-lg-6 col-md-6 blog99-matchheight-article   wow fadeInUp ">
										<article class="blog99-article post hentry ">
											<?php blog99_entry_top(); ?>
												<div class="blog99-article-thumbnail-section">
													<a href="<?php the_permalink(); ?>">
														<div class="post-image fade-in one"><span class="overlay"></span>
															<?php blog99_get_post_thumbnail(); ?>
														</div>
													</a>
												</div>
												<div class="blog99-post-contnet p-3">
													<h2 class="post-title entry-title">
														<a href="<?php the_permalink(); ?>">
															<?php the_title(); ?>
														</a>
													</h2>
													<div class="blog99-author-date">
														<?php
															blog99_posted_by();
															blog99_posted_on();
														?>
													</div>
													<div class="blog99-shot-content">
														<?php the_excerpt(); ?>
													</div>

													<?php blog99_get_post_link(get_the_ID()) ?>
												</div>
												
											<?php blog99_entry_bottom(); ?>
										</article><!-- #post-<?php the_ID(); ?> -->
									</div>
									<?php endwhile;

								wp_reset_postdata();
								endif;

							?>
							</div>
						</div>
					</div>
				</div>
			</div>

	<?php } }


		/**
		 * Template part content top
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_content_top() {
			if ( is_archive() ) {
				blog99_content_while_before();
			}
		}

		/**
		 * Template part content bottom
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function template_parts_content_bottom() {
			if ( is_archive() ) {
				blog99_content_while_after();
			}
		}

		/**
		 * Add wrapper div 'blog99-row' for Blog99 template part.
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function blog99_templat_part_wrap_open() {
			if ( is_archive() || is_search() || is_home() ) {
				echo '<div class="blog99-row row">';
			}
		}

		/**
		 * Add closing wrapper div for 'blog99-row' after Blog99 template part.
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function blog99_templat_part_wrap_close() {
			if ( is_archive() || is_search() || is_home() ) {
				echo '</div>';
			}
		}

	}

	/**
	 * Initialize class object with 'get_instance()' method
	 */
	Blog99_Loop::get_instance();

endif;