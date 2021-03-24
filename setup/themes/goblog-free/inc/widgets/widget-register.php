<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

// Widget Register
function goblog_free_widget_init_register() {

    // Front Page
    register_sidebar(
        array(
            'name'          => __( 'Front Page', 'goblog-free' ),
            'id'            => 'goblog-free-front',
            'description'   => __( 'Valid only for light blue widgets', 'goblog-free' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-tilte-sidebar">',
            'after_title'   => '</h4>',
        )
    );

	// Sidebar
    register_sidebar(
        array(
        	'name'          => __( 'Blog Sidebar', 'goblog-free' ),
        	'id'            => 'goblog-free-sidebar1',
            'description'   => __( 'This is to display the sidebar on the blog', 'goblog-free' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-tilte-sidebar">',
            'after_title'   => '</h4>',
	   )
    );

    // Footer 1
    register_sidebar(
        array(
            'name'          => __( 'Footer 1', 'goblog-free' ),
            'id'            => 'goblog-free-footer1',
            'description'   => __( 'Footeer section #1', 'goblog-free' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title-footer">',
            'after_title'   => '</h4>',
       )
    );

    // Footer 2
    register_sidebar(
        array(
            'name'          => __( 'Footer 2', 'goblog-free' ),
            'id'            => 'goblog-free-footer2',
            'description'   => __( 'Footeer section #2', 'goblog-free' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title-footer">',
            'after_title'   => '</h4>',
       )
    );

    // Footer 3
    register_sidebar(
        array(
            'name'          => __( 'Footer 3', 'goblog-free' ),
            'id'            => 'goblog-free-footer3',
            'description'   => __( 'Footeer section #3', 'goblog-free' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title-footer">',
            'after_title'   => '</h4>',
       )
    );
}
add_action( 'widgets_init', 'goblog_free_widget_init_register' );

// Register Widget Grids Categories
function goblog_free_register_builder_categories() {
    register_widget( 'Goblog_Free_Grids_Categories' );
}
add_action( 'widgets_init', 'goblog_free_register_builder_categories' );

// Register Widget Grids Order
function goblog_free_register_builder_order() {
    register_widget( 'Goblog_Free_Grids_Order' );
}
add_action( 'widgets_init', 'goblog_free_register_builder_order' );

// Register Widget Grids Tags
function goblog_free_register_builder_tags() {
    register_widget( 'Goblog_Free_Grids_Tags' );
}
add_action( 'widgets_init', 'goblog_free_register_builder_tags' );

// Register Widget About
function goblog_free_aboutme_widget_register() {
	register_widget( 'Goblog_Free_Aboutme_Widget' );
}
add_action( 'widgets_init', 'goblog_free_aboutme_widget_register' );

// Register Widget Ads
function goblog_free_register_widget_ads() {
    register_widget( 'Goblog_Free_Widget_Ads' );
}
add_action( 'widgets_init', 'goblog_free_register_widget_ads' );

// Register Widget Fans Page
function goblog_free_register_fans_page() {
    register_widget( 'Goblog_Free_Fans_Page' );
}
add_action( 'widgets_init', 'goblog_free_register_fans_page' );

// Register Widget Blog Posts
function goblog_free_register_widget_post() {
    register_widget( 'Goblog_Free_Widget_Blog_Posts_Order' );
}
add_action( 'widgets_init', 'goblog_free_register_widget_post' );