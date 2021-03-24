<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Buzz_Magazine
 */
get_header();
?>
        <div class="container">
            <section class="error-404 not-found" style="background-image: url('<?php echo esc_url(get_theme_mod('404_page_image',esc_url(BUZZ_MAGAZINE_IMAGE_URI.'error.jpg'))) ?>') ">
                <h2><?php echo esc_html(get_theme_mod('404_page_primary_title',''));?></h2>
                <h4>
                    <?php echo esc_html(get_theme_mod('404_page_secondary_title',''));?>
                </h4>
                <a class="button" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_theme_mod('404_page_button_title',''));?></a>
            </section>
        </div>
<?php
get_footer();
