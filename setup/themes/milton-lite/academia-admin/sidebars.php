<?php 
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)											 */
/*-----------------------------------------------------------------------------------*/

function milton_lite_widgetized_areas_init() {

	register_sidebar(array(
		'name' => __('Sidebar: Primary','milton-lite'),
		'id' => 'sidebar-primary',
		'before_widget' => '<div class="widget %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	));

	register_sidebar(array(
		'name' => __('Homepage: Welcome Message','milton-lite'),
		'id' => 'homepage-welcome',
		'description' => __('We recommend adding a single [Text Widget]. The widget\'s title will be wrapped in a <h1></h1> tag.','milton-lite'),
		'before_widget' => '<div class="widget widget-welcome %2$s clearfix" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="page-title title-welcome"><span class="title-welcome-span">',
		'after_title' => '</span></h1>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 1', 'milton-lite' ),
		'id'            => 'footer-col-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 2', 'milton-lite' ),
		'id'            => 'footer-col-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content-wrapper">',
		'after_widget'  => '</div><!-- .widget-content-wrapper --></div>',
		'before_title'  => '<p class="widget-title"><span>',
		'after_title'   => '</span></p>',
	) );

} 

add_action( 'widgets_init', 'milton_lite_widgetized_areas_init' );