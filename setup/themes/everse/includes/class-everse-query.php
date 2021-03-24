<?php
/**
 * Everse Query.
 * 
 * The class responsible for queries.
 * 
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! class_exists( 'Everse_Query' ) ) :

	/**
	 * Everse_Query
	 */
	class Everse_Query {

		/**
		 * Instance
		 *
		 * @var $Everse_Query
		 */
		private static $instance;

		/**
		 * Initiator
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
		 */
		public function __construct() {

			// Query
			add_action( 'everse_primary_content_query', array( $this, 'content_query_markup' ) );

			// Template Parts
			add_action( 'everse_template_parts_content', array( $this, 'template_parts_content' ) );
			add_action( 'everse_template_parts_content', array( $this, 'template_parts_comments' ), 15 );

			// Template None.
			add_action( 'everse_template_parts_content_none', array( $this, 'template_parts_content_none' ) );

		}


		/**
		 * Template part content
		 *
		 * @since 1.0.0
		 */
		public function template_parts_content(  ) {
			if ( ! is_page() || ! is_404() || ! is_single() ) {
				get_template_part( 'template-parts/content', get_post_format() );
			}
		}


		/**
		* Template part comments
		*
		* @since 1.0.0
		*/
		public function template_parts_comments() {
			if ( is_single() || is_page() ) {
				if ( comments_open() || get_comments_number() ) : ?>
					<div class="col-lg-12">
						<?php comments_template(); ?>
					</div>
				<?php endif;
			}
		}

		/**
		 * Query markup content
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function content_query_markup() {

			if ( have_posts() ) :

				if ( everse_is_project() ) {
					$row_classes = 'masonry-grid__project';
				} elseif ( everse_is_service() ) {
					$row_classes = 'masonry-grid__service';
				} else {
					$row_classes = '';
				}
				?>

				<div class="row row-40 masonry-grid <?php echo esc_attr( $row_classes ); ?>" id="masonry-grid">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php $column_classes = ( everse_is_project() ) ? 'project ' . $this->get_columns() : $this->get_columns(); ?>
					
						<div class="<?php echo esc_attr( $column_classes ); ?> col-md-6 masonry-item">
							<?php if ( everse_is_project() ) : ?>
								<?php get_template_part( 'template-parts/content-project' ); ?>
							<?php elseif ( everse_is_service() ) : ?>
								<?php get_template_part( 'template-parts/content-service' ); ?>
							<?php else : ?>
								<?php do_action( 'everse_template_parts_content' ); ?>
							<?php endif; ?>								
						</div>

					<?php endwhile; ?>
				
				</div> <!-- .row -->
				
				<?php else :
					do_action( 'everse_template_parts_content_none' );

			endif;
		}

		
		/**
		* Get columns number.
		*
		* @since 1.0.0
		*/
		public function get_columns() {
			$columns = '';
			$blog_columns = get_theme_mod( 'everse_settings_blog_columns', 'col-lg-12' );
			$archive_columns = get_theme_mod( 'everse_settings_archive_columns', 'col-lg-4' );
			$search_columns = get_theme_mod( 'everse_settings_search_results_columns', 'col-lg-4' );
			$project_columns = get_theme_mod( 'everse_settings_projects_columns', 'col-lg-4' );
			$service_columns = get_theme_mod( 'everse_settings_services_columns', 'col-lg-4' );

			if ( is_home() ) {
				$columns = $blog_columns;
			}

			if ( is_archive() ) {
				$columns = $archive_columns;
			}

			if ( is_search() ) {
				$columns = $search_columns;
			}

			if ( everse_is_project() ) {
				$columns = $project_columns;
			}

			if ( everse_is_service() ) {
				$columns = $service_columns;
			}

			return $columns;
		}


		/**
		* Template part content none
		*
		* @since 1.0.0
		*/
		public function template_parts_content_none() {
			if ( is_archive() || is_search() ) {
				get_template_part( 'template-parts/content', 'none' );
			}
		}

	}

	/**
	* Initialize class object with 'get_instance()' method
	*/
	Everse_Query::get_instance();

endif;