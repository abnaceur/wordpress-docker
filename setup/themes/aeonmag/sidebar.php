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
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AeonMag
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="sidebar-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
