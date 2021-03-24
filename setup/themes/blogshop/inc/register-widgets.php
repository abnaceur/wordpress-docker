<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogshop_widgets_init() {
	/**
	 * Main Sidebar
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'blogshop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'blogshop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 1
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'blogshop' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'blogshop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 2
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'blogshop' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'blogshop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 3
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'blogshop' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'blogshop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	/**
	 * Sidebar Footer 4
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'blogshop' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'blogshop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Top', 'blogshop' ),
			'id'            => 'footer-top',
			'description'   => esc_html__( 'Add widgets here.', 'blogshop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'blogshop' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'blogshop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'blogshop_widgets_init' );