<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
*/
/**
 * Custom theme hooks
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package AeonMag
 */
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('aeonmag_breadcrumb_options')) :
    function aeonmag_breadcrumb_options()
    {
        global $aeonmag_theme_options;
        $enable_bcm = $aeonmag_theme_options['aeonmag-extra-breadcrumb'];
        if ('yoast'== $enable_bcm && (function_exists('yoast_breadcrumb'))) {
            yoast_breadcrumb();
        }elseif('rankmath' == $enable_bcm && (function_exists('rank_math_the_breadcrumbs'))) {
          rank_math_the_breadcrumbs();
        }else{
            //do nothing
        }
     }
endif;
add_action('aeonmag_breadcrumb_options_hook', 'aeonmag_breadcrumb_options');

if (!function_exists('aeonmag_add_main_header')) :
    
    /**
     * Add main header.
     *
     * @since 1.0.0
     */
    function aeonmag_add_main_header()
    {
        get_template_part('template-parts/sections/header', 'section');        
    }
endif;
add_action('aeonmag_action_header', 'aeonmag_add_main_header', 10);

/**
 * Custom theme hook for slider
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package AeonMag
 */
if (!function_exists('aeonmag_add_main_slider')) :
    
    /**
     * Add main slider.
     *
     * @since 1.0.0
     */
    function aeonmag_add_main_slider()
    {
        
        get_template_part('template-parts/sections/slider', 'section');
    }
endif;
add_action('aeonmag_action_slider', 'aeonmag_add_main_slider', 10);

/**
 * Custom theme hook for trending news
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package AeonMag
 */
if (!function_exists('aeonmag_add_main_trending')) :
    
    /**
     * Add main Trending.
     *
     * @since 1.0.0
     */
    function aeonmag_add_main_trending()
    {
               
        get_template_part('template-parts/sections/trending', 'news');
    }

endif;
add_action('aeonmag_action_trending', 'aeonmag_add_main_trending', 10);

/**
 * Custom theme hook for promo section
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package AeonMag
 */
if (!function_exists('aeonmag_boxes_section')) :
    
    /**
     * Add main slider.
     *
     * @since 1.0.0
     */
    function aeonmag_boxes_section()
    {       
        
        get_template_part('template-parts/sections/boxes', 'section');
    }
endif;
add_action('aeonmag_action_boxes', 'aeonmag_boxes_section', 10);

//only for blog and archive page
if( !function_exists( 'aeonmag_blog_sidebar_position_array' ) ) :
    /*
     * Function to get blog categories
     */
    function aeonmag_blog_sidebar_position_array() {

        $sidebar_positions = array(
            'right-sidebar'  => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'left-sidebar' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
            'no-sidebar'  => get_template_directory_uri() . '/assets/images/no-sidebar.png',
            'middle-column'  => get_template_directory_uri() . '/assets/images/middle-content.png',
        );
        
        return $sidebar_positions;

    }
endif;


//only for single page
if( !function_exists( 'aeonmag_sidebar_position_array' ) ) :
    /*
     * Function to get blog categories
     */
    function aeonmag_sidebar_position_array() {

        $sidebar_positions = array(
            'single-right-sidebar'  => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'single-left-sidebar' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
            'single-no-sidebar'  => get_template_directory_uri() . '/assets/images/no-sidebar.png',
            'single-middle-column'  => get_template_directory_uri() . '/assets/images/middle-content.png',
        );
        
        return $sidebar_positions;

    }
endif;