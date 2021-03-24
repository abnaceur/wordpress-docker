<?php
/**
 * Loader Functions
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Enqueue Scripts
 */
if ( ! class_exists( 'Blog99_Enqueue_Scripts' ) ) {

	/**
	 * Theme Enqueue Scripts
	 */
	class Blog99_Enqueue_Scripts {

        
		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'admin_enqueue_scripts',array( $this, 'blog99_admin_style' ) );
		}


		/**
		 * Enqueue Scripts
		 */
		public function enqueue_scripts($custom) {

			/**
			 * Enqueue Google Fonts
			 * @since 1.0.0
			 */
			$blog99_google_fonts_list = array('Lato');

			foreach(  $blog99_google_fonts_list as $google_font ){

				wp_enqueue_style( 'blog99-google-fonts-'.esc_attr( $google_font ), '//fonts.googleapis.com/css?family='.esc_attr( $google_font ).':200,300,400,500,600,700,800', false ); 
			}

			$headings_font 		= esc_html(get_theme_mod('blog99_header_title_fonts', 'Arizonia'));
			$headings_desc_font = esc_html(get_theme_mod('blog99_header_description_fonts', 'Arizonia'));
			
			if( $headings_font ) {

				wp_enqueue_style( 'blog99-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
			}
			if( $headings_desc_font ) {

				wp_enqueue_style( 'blog99-headings-desc-fonts', '//fonts.googleapis.com/css?family='. $headings_desc_font );
			}

            /**
             * Enqueue Style
			 * @since 1.0.0
             */
			wp_enqueue_style( 'owl-carousel', trailingslashit ( get_template_directory_uri() ) . '/assets/library/owl-carousel/css/owl.carousel.min.css', array(), BLOG99_THEME_VERSION, false );
			
			wp_enqueue_style( 'bootstrap', trailingslashit ( get_template_directory_uri() ) . '/assets/library/bootstrap/css/bootstrap.css', array(), BLOG99_THEME_VERSION, false );
			
			wp_enqueue_style( 'font-awesome', trailingslashit ( get_template_directory_uri() ) . '/assets/library/font-awesome/css/font-awesome.css', array(), BLOG99_THEME_VERSION, false );
			
			wp_enqueue_style( 'blog99-style', get_stylesheet_uri() );

			//wp_enqueue_style( 'blog99-woocommerce', trailingslashit ( get_template_directory_uri() ) . '/assets/css/woocommerce.css', BLOG99_THEME_VERSION, false );

			//Fonts
			$headings_font_size = esc_html(get_theme_mod('blog99_header_title_fonts_size', 50));
			$headings_desc_font_size = esc_html(get_theme_mod('blog99_header_description_fonts_size', 20));
			
			if ( $headings_font ) {
				$font_pieces = explode(":", $headings_font);
				$custom .= ".site-branding .site-title a { 
					font-family: '{$font_pieces[0]}';
					font-size: {$headings_font_size}px;
				}"."\n";
			}

			if( $headings_desc_font) {
				$font_pieces = explode(":", $headings_desc_font);
				$custom .= ".site-branding p.site-description { 
					font-family: '{$font_pieces[0]}';
					font-size: {$headings_desc_font_size}px;
				}"."\n";
			}

			/** header image */
			$blog99_header_image = get_header_image();

			if(!empty($blog99_header_image)){

				$blog99_header_image_background_repeat		= esc_html(get_theme_mod('blog99_header_image_background_repeat' ));
				$blog99_header_image_background_position_x	= esc_html(get_theme_mod('blog99_header_image_background_position_x' ));
				$blog99_header_image_background_attachment	= esc_html(get_theme_mod('blog99_header_image_background_attachment' ));
				$blog99_header_image_background_size	= esc_html(get_theme_mod('blog99_header_image_background_size' ));

				$custom .= ".blog99-header{ 
					background-image: url({$blog99_header_image});
					background-repeat: {$blog99_header_image_background_repeat};
					background-position: {$blog99_header_image_background_position_x};
					background-attachment: {$blog99_header_image_background_attachment};
					background-size: {$blog99_header_image_background_size};
					
				}"."\n";
			}

			//Output all the styles
			wp_add_inline_style( 'blog99-style', $custom );

			$enable_dark_version = get_theme_mod('blog99_enable_dark_version',false);
			
			if( $enable_dark_version ){

				wp_enqueue_style( 'blog99-dark-version', trailingslashit ( get_template_directory_uri() ) . '/assets/css/dark-version.css', BLOG99_THEME_VERSION, false );
			}


            /**
             * Enqueue Script
			 * @since 1.0.0
             */
			/**
			 * default enable
			 * if disable not enqueue js
			 */
			if( get_theme_mod('blog99_disable_sidebar_sticky',false) == false ){
				
				wp_enqueue_script( 'theia-sticky-sidebar', trailingslashit ( get_template_directory_uri() ) . '/assets/library/theia-sticky-sidebar/theia-sticky-sidebar.js', array('jquery'), BLOG99_THEME_VERSION, true );
				wp_add_inline_script( 'theia-sticky-sidebar', 'jQuery(".content-area, .blog99-sidebar-sticky").theiaStickySidebar();', 'after' );
			}

			if( get_theme_mod('blog99_blog_style','masonry') == 'masonry' ){
				
				wp_enqueue_script( 'jquery-masonry' );

				wp_add_inline_script( 'masonry', '
				jQuery(
					"body.blog99-blog-style-masonry .blog99-trendingnews-left .blog99-row"
				).masonry({
					itemSelector: ".masonry",
					columnWidth: ".col-xl-6.col-lg-6.col-md-6.col-sm-12.col-12.masonry.wow.fadeInUp"
				});
				', 'after' );

			}else{
				wp_enqueue_script( 'matchheight', trailingslashit ( get_template_directory_uri() ) . '/assets/library/matchheight/jquery.matchHeight.js', array('jquery'), BLOG99_THEME_VERSION, true );

				wp_add_inline_script( 'matchheight', 'jQuery("body.blog99-blog-style-grid .blog99-trendingnews-left .blog99-article").matchHeight();', 'after' );
			}

			/**
			 * wow animation css and js
			 */
			if( get_theme_mod('blog99_disable_page_scroll_animation', false) == false ){

				wp_enqueue_script( 'wow', trailingslashit ( get_template_directory_uri() ) . '/assets/library/wow/wow.js', array('jquery'), BLOG99_THEME_VERSION, true );
				wp_enqueue_style( 'animate', trailingslashit ( get_template_directory_uri() ) . '/assets/library/animate/animate.css', array(), BLOG99_THEME_VERSION, false );

				wp_add_inline_script( 'wow', 'new WOW().init();', 'after' );
			}

			wp_enqueue_script( 'owl-carousel', trailingslashit ( get_template_directory_uri() ) . '/assets/library/owl-carousel/js/owl.carousel.min.js', array('jquery'), BLOG99_THEME_VERSION, true );
			wp_enqueue_script( 'bootstrap', trailingslashit ( get_template_directory_uri() ) . '/assets/library/bootstrap/js/bootstrap.js', array(), BLOG99_THEME_VERSION, true );
			wp_enqueue_script( 'blog99-navigation', trailingslashit ( get_template_directory_uri() ) . '/assets/js/navigation.js', array(), BLOG99_THEME_VERSION, true );
            wp_enqueue_script( 'blog99-skip-link-focus-fix', trailingslashit ( get_template_directory_uri() ) . '/assets/js/skip-link-focus-fix.js', array(), BLOG99_THEME_VERSION, true );
			wp_enqueue_script( 'blog99-custom', trailingslashit ( get_template_directory_uri() ) . '/assets/js/blog99-custom.js', array('jquery'), BLOG99_THEME_VERSION, true );
		
			/**
			 * comments replay js
			 */
            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
			}
			
		}

		/**
		 * Admin Scripts
		 * @since 1.0.0
		 */
		function blog99_admin_style() {
			wp_enqueue_style( 'blog99-widget-admin', trailingslashit ( get_template_directory_uri() ) . '/wp99themes/widgets/css/blog99-widget.css', BLOG99_THEME_VERSION, false );
		}
		

	}

	new Blog99_Enqueue_Scripts();
}
