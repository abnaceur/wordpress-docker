<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 * @return array An array of default values
 */

function sociable_get_default_theme_options() {
	$sociable_default_options = array(
		// Color Options
		'header_title_color'			=> '#000545',
		'header_tagline_color'			=> '#5c697a',
		'header_txt_logo_extra'			=> 'show-all',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 22,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'sociable' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved | ', 'sociable' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'introduction,portfolio,instagram,blog,clients',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'sociable' ),
		'hide_date' 					=> false,
		'hide_author'					=> false,
		'hide_category'					=> false,
		'archive_column'				=> 'col-2',

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,
		'single_post_hide_author'		=> false,

		/* Front Page */

		// topbar
		'topbar_social_enable'			=> false,

		// Introduction
		'introduction_section_enable'	=> false,
		'introduction_btn_title'		=> esc_html__( 'About Me', 'sociable' ),

		// Clients
		'clients_section_enable'		=> false,

		// Portfolio
		'portfolio_section_enable'		=> false,
		'portfolio_count'				=> 10,
		'portfolio_icon'				=> 'fa-briefcase',
		'portfolio_title'				=> esc_html__( 'Our Projects', 'sociable' ),

		// Instagram
		'instagram_section_enable'		=> false,
		'instagram_title'				=> esc_html__( 'Present yourself in Instagram', 'sociable' ),
		'instagram_description'			=> esc_html__( 'Meagan Fisher is an English actress, model and activist. She was born in Paris and brought up in Oxfordshire, Watson attended the Dragon School and trained as an acress at Oxforf branch of Stage coach Theatre Arts.', 'sociable' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'recent',
		'blog_icon'						=> 'fa-newspaper-o',
		'blog_title'					=> esc_html__( 'Latest Articles', 'sociable' ),

	);

	$output = apply_filters( 'sociable_default_theme_options', $sociable_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}