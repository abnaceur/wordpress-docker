<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>
<div class="prr-content-js">
    <?php get_template_part( 'template-parts/home/section', 'top' ); ?>
    <?php get_template_part( 'template-parts/home/section', 'grid' ); ?>
    <?php get_template_part( 'template-parts/home/section', 'scroll' ); ?>
    <?php get_template_part( 'template-parts/home/section', 'bottom' ); ?>
</div>
<?php
get_footer();
