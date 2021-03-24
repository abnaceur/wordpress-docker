<?php
/**
 * Widget and sidebars related functions
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
/**
 * Register widget area.
 */
if ( ! function_exists( 'blog99_widgets_init' ) ) :

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
    */
	function blog99_widgets_init() {
		/**
         * Register left sidebar widget area.
         *  @since 1.0.0
          */
        register_sidebar( array(
            'name'          => esc_html__( 'Right Sidebar Widget Area', 'blog99' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'blog99' ),
            'before_widget' => '<section id="%1$s" class=" widget wow fadeInUp %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '<span class="effect" ></span></h2>',
        ) );

        /**
         * Register left sidebar widget area.
         *  @since 1.0.0
          */
        register_sidebar( array(
            'name'          => esc_html__( 'Left Sidebar Widget Area', 'blog99' ),
            'id'            => 'sidebar-left',
            'description'   => esc_html__( 'Add widgets here.', 'blog99' ),
            'before_widget' => '<section id="%1$s" class=" widget wow fadeInUp %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '<span class="effect" ></span></h2>',
        ) );

        /**
         * Register Footer Widget Area One
         * @since 1.0.0
         */
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Widget Area One', 'blog99' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'blog99' ),
            'before_widget' => '<section id="%1$s" class="widget wow fadeInUp %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span><span class="effect" ></span></h2>',
        ) );


        
        /**
         * Register Footer Widget Area Two
         * @since 1.0.0
         */
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Widget Area Two', 'blog99' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here.', 'blog99' ),
            'before_widget' => '<section id="%1$s" class="widget wow fadeInUp %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span><span class="effect" ></span></h2>',
        ) );

        
        /**
         * Register Footter Widget Area Three
         * @since 1.0.0
         */
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Widget Area Three', 'blog99' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here.', 'blog99' ),
            'before_widget' => '<section id="%1$s" class="widget wow fadeInUp %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span><span class="effect" ></span></h2>',
        ) );


        /**
         * Register Footer Widget Area Four
         * @since 1.0.0
         */
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Widget Area Four', 'blog99' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here.', 'blog99' ),
            'before_widget' => '<section id="%1$s" class="widget wow fadeInUp %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span><span class="effect" ></span></h2>',
        ) );
		
	}
	add_action( 'widgets_init', 'blog99_widgets_init' );

endif;
