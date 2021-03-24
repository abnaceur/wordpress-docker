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
 * Post Navigation Function
 *
 * @since AeonMag 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('aeonmag_posts_navigation')) :
    function aeonmag_posts_navigation()
    {
        global $aeonmag_theme_options;
        $aeonmag_pagination_option = $aeonmag_theme_options['aeonmag-pagination-options'];
        if ('numeric' == $aeonmag_pagination_option) {
            echo "<div class='pagination'>";
                the_posts_pagination();
            echo "</div>";
        } else{
            the_posts_navigation();
        }
    }
endif;
add_action('aeonmag_action_navigation', 'aeonmag_posts_navigation', 10);