<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */
/**
 * List down the post category
 *
 * @param int $post_id
 * @return string list of category
 *
 */
if (!function_exists('aeonmag_list_category')) :
    function aeonmag_list_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            $post_id = $post->ID;
        }
        $separator = ' ';
        $output = aeonmag_get_category($post_id);
        if ($output) {
                echo trim($output, $separator);

        }
    }
endif;


/**
 * List down the get category
 *
 * @param int $post_id
 * @return string list of category
 *
 */
if (!function_exists('aeonmag_get_category')) :
    function aeonmag_get_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            $post_id = $post->ID;
        }
        $categories = get_the_category($post_id);
        $output = '';
        $separator = ' ';
        if ($categories) {
            global $aeonmag_theme_options;
            $output .= '<ul class="cat__links">';
            foreach ($categories as $category) {
                $output .= '<li><a class="cat-' . esc_attr($category->term_id) . '" href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a></li>' . $separator;
            }
            $output .= '</ul>';
            return $output;

    }
}
endif;

/*add menu description*/
if (!function_exists('aeonmag_add_menu_description')) :
function aeonmag_add_menu_description( $item_output, $item, $depth, $args ) {

    if( 'menu-1' == $args->theme_location  && $item->description )
        $item_output = str_replace( '</a>', '<div class="menu-description">' . $item->description . '</div></a>', $item_output );

    return $item_output;
}
endif;
add_filter( 'walker_nav_menu_start_el', 'aeonmag_add_menu_description', 10, 4 );
