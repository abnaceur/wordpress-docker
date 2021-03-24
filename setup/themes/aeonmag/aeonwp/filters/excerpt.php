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
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 */
if (!function_exists('aeonmag_excerpt_more')) :
    function aeonmag_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'aeonmag_excerpt_more');

/**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if (!function_exists('aeonmag_alter_excerpt')) :
    function aeonmag_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }
        global $aeonmag_theme_options;
        $excerpt_length = absint($aeonmag_theme_options['aeonmag-excerpt-length']);
        if (!empty($excerpt_length)) {
            return $excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'aeonmag_alter_excerpt');

/**
 * Exclude category in blog page
 *
 * @since AeonMag 1.0.0
 *
 * @param null
 * @return int
 */
if (!function_exists('aeonmag_exclude_category_in_blog_page')) :
    function aeonmag_exclude_category_in_blog_page($query)
    {
        if ($query->is_home && $query->is_main_query()) {
            $GLOBALS['aeonmag_theme_options'] = aeonmag_get_options_value();
            global $aeonmag_theme_options;
            $blog_catid = esc_attr($aeonmag_theme_options['aeonmag-blog-exclude-category']);
            $exclude_categories = $blog_catid;
            if (!empty($exclude_categories)) {
                $cats = explode(',', $exclude_categories);
                $cats = array_filter($cats, 'is_numeric');
                $string_exclude = '';
                echo $string_exclude;
                if (!empty($cats)) {
                    $string_exclude = '-' . implode(',-', $cats);
                    $query->set('cat', $string_exclude);
                }
            }
        }
        return $query;
    }
endif;
add_filter('pre_get_posts', 'aeonmag_exclude_category_in_blog_page');