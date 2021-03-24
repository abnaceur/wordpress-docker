<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function sociable_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'sociable' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = esc_html($page->post_title);
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function sociable_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'sociable' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = esc_html($post->post_title);
    }
    return  $choices;
}

if ( ! function_exists( 'sociable_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function sociable_site_layout() {
        $sociable_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'sociable_site_layout', $sociable_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'sociable_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function sociable_selected_sidebar() {
        $sociable_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'sociable' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'sociable' ),
        );

        $output = apply_filters( 'sociable_selected_sidebar', $sociable_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'sociable_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function sociable_global_sidebar_position() {
        $sociable_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'sociable_global_sidebar_position', $sociable_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'sociable_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function sociable_sidebar_position() {
        $sociable_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'sociable_sidebar_position', $sociable_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'sociable_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function sociable_pagination_options() {
        $sociable_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'sociable' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'sociable' ),
        );

        $output = apply_filters( 'sociable_pagination_options', $sociable_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'sociable_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function sociable_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'sociable' ),
            'off'       => esc_html__( 'Disable', 'sociable' )
        );
        return apply_filters( 'sociable_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'sociable_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function sociable_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'sociable' ),
            'off'       => esc_html__( 'No', 'sociable' )
        );
        return apply_filters( 'sociable_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'sociable_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function sociable_sortable_sections() {
        $sections = array(
            'introduction'  => esc_html__( 'Introduction', 'sociable' ),
            'clients'       => esc_html__( 'Clients', 'sociable' ),
            'portfolio'     => esc_html__( 'Portfolio', 'sociable' ),
            'blog'          => esc_html__( 'Blog', 'sociable' ),
        );
        return apply_filters( 'sociable_sortable_sections', $sections );
    }
endif;