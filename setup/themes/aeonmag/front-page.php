<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AeonMag
 */

get_header();
?>
<section id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-lg-8 col-md-7 col-sm-12 content-area">
                <main id="main" class="site-main">
                <?php
                /**
                 * aeonmag_action_front_page hook
                 * @package AeonMag
                 *
                 * @hooked aeonmag_featured_section -  10
                 */
                do_action('aeonmag_action_front_page');
                ?>
            </main><!-- #main -->
            </div><!-- #primary -->

        <aside id="secondary" class="col-lg-4 col-md-5 col-sm-12 widget-area side-right">
            <?php get_sidebar(); ?>
        </aside><!-- #secondary -->
    </div> <!-- .front-page-content-wrapper -->
</div>
</section>
<?php

get_footer();