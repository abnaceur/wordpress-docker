<?php
/**
 * Gutenbiz mag functions and definitions
 * Gutenbiz mag only works in WordPress 4.7 or later.
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 * @package Gutenbiz Mag
 */

require get_stylesheet_directory() . '/classes/class-excerpt.php';

final class Gutenbiz_Mag_Theme{
	public function __construct(){
		# Get access to parent constructor
		// parent::__construct();

		# enqueue script
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'scripts' ) );

		# After parent theme
		add_action( 'after_setup_theme', array( __CLASS__, 'after_parent_theme' ) );

		# Adds top stories
		add_action( 'gutenbiz_after_header', array( __CLASS__, 'top_stories' ) );

		# Filter to remove banner in home page
		add_filter( 'gutenbiz_disable_inner_banner_content', array( __CLASS__, 'banner_filter' ) );

		# related post in single post
		add_action( 'gutenbiz_footer', array( __CLASS__, 'related_posts_on_single' ) );

		# header topbar
		add_action( 'gutenbiz_header', array( __CLASS__, 'header_top_bar' ) );

		# get description on nav menu
		add_filter('wp_nav_menu_objects', array( __CLASS__, 'add_descriprion_on_menu' ), 10, 2 );

		#change section name
		add_filter( 'gutenbiz_customizer_get_panel_arg', array( __CLASS__, 'change_pannel_title' ), 20, 2 );
	}

	/**
	* Enqueue styles and scripts
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Gutenbiz Mag
	*/
	public static function scripts(){
		$scripts = array(
			# enqueue parent stylesheet
			array(
				'handler'  => 'gutenbiz-style',
				'style'    => get_template_directory_uri() . '/style.css',
				'version'  => wp_get_theme()->get('Version'),
				'absolute' => true,
				'minified' => false
			),

			array(
		        'handler' => 'jquery-marquee',
		        'script'  => 'assets/js/jquery.marquee.js',
		    ),
		    array(
		        'handler' => 'gutenbizmag-script',
		        'script'  => 'assets/js/script.js',
		    )

		);

		if( !Gutenbiz_Helper::is_active_plugin( 'woocommerce' ) ){
			$slick_scripts = array(
				array(
			        'handler' => 'slick',
			        'script'  => 'assets/js/slick.js',
			    ),
		    	array(
		            'handler' => 'slick',
		            'style'  => 'assets/css/slick.css',
		        )
			);
			$scripts = array_merge( $scripts, $slick_scripts );
		}

		Gutenbiz_Helper::enqueue( $scripts );
	}

	/**
	 * Changed panel title
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function change_pannel_title( $args, $panel ){
		if( $panel[ 'id' ] == 'panel' ){
			$panel[ 'title' ] = esc_html__( 'Gutenbiz Mag Options', 'gutenbiz-mag' );
		}
		return $panel;
	}

	/**
	 * After parent theme
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function after_parent_theme(){

		register_nav_menus(
			array(
				'social-menu-topbar' => esc_html__( 'Topbar social menu', 'gutenbiz-mag' )
			)
		);

		# include options file
		Gutenbiz_Helper::include( array(
			'top-stories',
			'featured-options',
			'header-options',
			'top-bar'
		), 'includes/theme-options', '');

		# include custom control
		Gutenbiz_Helper::include( array(
			'cat-dropdown/cat-dropdown'
		), 'classes/custom-control', '');

		# include custom control
		Gutenbiz_Helper::include( array(
			'common'
		), 'includes/dynamic-css', '');

		# remove search icon
		remove_action( Gutenbiz_Helper::fn_prefix( 'after_primary_menu' ), array( 'Gutenbiz_Theme', 'add_search_icon' ), 20 );

		# filter to modify priority
		add_filter( Gutenbiz_Helper::with_prefix( 'customizer_get_defaults','_' ), array( __CLASS__ , 'change_defaults' ), 99 ,2 );

		#filter to change default on admin
		add_filter( Gutenbiz_Helper::fn_prefix( 'customizer_get_setting_arg' ), array( __CLASS__, 'change_default_admmin' ), 10, 2 );

		# Register or modify customizer options
		add_action( 'customize_register', array( __CLASS__, 'customize_register' ) );
	}

	/**
	* Register or modify customizer options
	*
	* @static
	* @access public
	* @since  1.0.0
	* @return void
	*
	* @package Gutenbiz Mag
	*/
	public static function customize_register( $wp_customize ){
		$wp_customize->get_setting( 'header_textcolor' )->default = '#ffffff';
	}

	/**
	 * Change default value on admin
	 *
	 * @static
	 * @access public
	 * @since  1.0.1
	 *
	 * @package Gutenbiz Mag
	 */	
	public static function change_default_admmin( $args, $field ){
		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'footer-copyright-text' ) ){
			$args[ 'default' ] = esc_html__( 'Copyright &copy; 2020 | Gutenbiz Mag', 'gutenbiz-mag' );
		}
		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'container-custom-width' ) ){
			$args[ 'default' ] = '1400';
		}
		if( $field[ 'id' ] == Gutenbiz_Helper::with_prefix( 'pre-loader' ) ){
			$args[ 'default' ] = true;
		}
		return $args;
	}

	/**
	 * Change default value
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 *
	 * @package Gutenbiz Mag
	 */	
	public static function change_defaults( $def, $instance ){
		$id = Gutenbiz_Helper::with_prefix( 'footer-copyright-text' );
		$customizer = Gutenbiz_Helper::with_prefix( 'container-custom-width' );
		$pre_loader = Gutenbiz_Helper::with_prefix( 'pre-loader' );

		$def[ $id ] = esc_html__( 'Copyright &copy; 2020 | Gutenbiz Mag', 'gutenbiz-mag' );

		$def[ $customizer ] = 1400;

		$def[ $pre_loader ] = true;

		return $def;
	}

	/**
	 * Get top stories content
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function top_stories(){
		if( !gutenbiz_get( 'top-stories-status' ) ){
			return;
		}
		get_template_part( 'templates/header/header-top', 'stories' );
	}

	/**
	 * print header topbar
	 *
	 * @static
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function header_top_bar(){
		if( !gutenbiz_get( 'mag-show-top-bar' )){
			return;
		}
		get_template_part( 'templates/header/header', 'topbar' );
	}

	/**
	 * Filter to remove banner in home page
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function banner_filter( $disable_banner ){
		if( is_home() ){
			$disable_banner = true;
		}
		return $disable_banner;
	}

	/**
	* Adds related posts on single page
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Gutenbiz Mag
	*/
	public static function related_posts_on_single(){
		if( !is_single() ){
			return;
		}
		$related = get_posts( 
		    array( 
		        'category__in' => wp_get_post_categories( get_the_ID() ), 
		        'numberposts'  => 4, 
		        'post__not_in' => array( get_the_ID() ) 
		    ) 
		);
		if( $related ){		
			set_query_var('single_related_posts', $related );
			get_template_part( 'templates/footer/footer-single', 'related');

			wp_reset_postdata();
		}
	}

	/**
	 * Get content for blog page
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 * @return object
	 *
	 * @package Gutenbiz Mag
	 */
	public static function get_blog_content(){
		if( is_archive() || is_search() || !gutenbiz_get( 'enable-featured-news' ) ){
			return;
		}

		get_template_part( 'templates/blog/featured', 'news' );		
	}

	/**
	 * Get header bg image
	 *	
	 * @static
	 * @access public
	 * @since 1.0.0
	 * @return url
	 *
	 * @package Gutenbiz Mag
	 */
	public static function the_header_bg_img(){
		$img = gutenbiz_get( 'header-bg-image' );
		if( $img ){ 
			$style = 'style="background-image: url( '. esc_url( $img ) .' )"';
		}else{
			$style = '';
		}
		echo $style;
	}

	/**
	 * Add description on menu
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 * @return object
	 *
	 * @package Gutenbiz Mag
	 */
	public static function add_descriprion_on_menu( $items, $args ){
		foreach( $items as &$item ) {
			if( '' != $item->description ){
				$item->title = $item->title . " <span>$item->description</span>";
			}
		}
		return $items;
	}

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function the_date( $post_id = null, $status = 'posted' ) {
		
		$show = apply_filters( Gutenbiz_Helper::fn_prefix( 'show_post_date' ), true );

		if( $show ):
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

			if( $status == 'updated'){
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
					$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
				}				
			}

			$time_tag = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C, $post_id ) ),
				esc_html( get_the_date( get_option('date_format'), $post_id ) ),
				esc_attr( get_the_modified_date( DATE_W3C, $post_id ) ),
				esc_html( get_the_modified_date( DATE_W3C, $post_id ) )
			);

			printf(
				'<span class="posted-on">
					%2$s 
					<a href="%1$s" rel="bookmark">
						%3$s
					</a>
				</span>',
				esc_url( Gutenbiz_Helper::get_day_link() ),
				( 'posted' == $status ) ? esc_html__( 'On', 'gutenbiz-mag' ) : esc_html__( 'Updated on', 'gutenbiz-mag' ),
				$time_tag
			);
		endif;
	}

	/**
	 * Prints the category of the posts
	 *
	 * @static
	 * @access public
	 * @return string
	 * @since  1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function the_category( $post_id = false ){
		$show = apply_filters( Gutenbiz_Helper::fn_prefix( 'show_post_category' ), true );
		if( $show ){ 
			the_category( '', '', $post_id ); 
		}
	}

	/**
	 * Get according to type
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Gutenbiz Mag
	 */
	public static function get_posts_by_type( $type, $cat_id, $post_to_display = false ){

		$posts = array();
		if( 'latest' == $type ){
			$recent_posts = wp_get_recent_posts(array(
			    'numberposts' => $post_to_display ? $post_to_display : -1,
			    'post_status' => 'publish'
			));

			foreach ( $recent_posts as $post) {
				$posts[] = $post[ 'ID' ]; 
			}
		}elseif( 'category' == $type ){			
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_to_display ? $post_to_display : -1,
				'orderby' => 'post__in',
				'ignore_sticky_posts' => 1,
			);
			if( $cat_id ){
				$args[ 'cat' ] = $cat_id; 
			}

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
			    while ( $query->have_posts() ) {
			        $query->the_post();
			        $posts[] = get_the_ID();
			    }
			}
			wp_reset_postdata();					
		}
		if( empty( $posts ) ){
			return false;
		}else{
			return $posts;
		}
	}
}

new Gutenbiz_Mag_Theme;