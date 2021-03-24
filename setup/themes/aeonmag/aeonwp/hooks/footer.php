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
 * Goto Top functions
 *
 * @since AeonMag 1.0.0
 *
 */

if (!function_exists('aeonmag_go_to_top')) :
    function aeonmag_go_to_top()
    {
    ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'aeonmag'); ?>">
                <i class="fa fa-long-arrow-up"></i>
            </a>
<?php
    } endif;
add_action('aeonmag_go_to_top_hook', 'aeonmag_go_to_top', 10, 1);