<?php
/**
 * Home Page Options.
 *
 * @package Creativ Blog
 */

$default = creativ_blog_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Homepage Sections', 'creativ-blog' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/

require get_template_directory() . '/inc/customizer/home-sections/slider.php';
require get_template_directory() . '/inc/customizer/home-sections/about-author.php';
