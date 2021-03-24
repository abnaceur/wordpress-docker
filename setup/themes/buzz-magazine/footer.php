<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buzz_Magazine
 */


?>
</div>

<footer id="colophon" class="site-footer"> <!-- footer starting from here -->
    <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')):?>
    <div class="footer-widget-holder">
        <div class="container">
            <div class="row">
                <?php
                $buzz_magazine_counter_col  = (int) 0;
                $buzz_magazine_column_class = (int) 12;

                for ($i = 1 ; $i <= 4 ; $i++):
                    if (is_active_sidebar('footer-'.$i)){
                        $buzz_magazine_counter_col ++;
                        $buzz_magazine_column_class = 12/$buzz_magazine_counter_col;
                    }
                endfor;?>

                <?php for ($i = 1 ; $i <= 4 ; $i ++): ?>
                    <?php if ( is_active_sidebar( 'footer-' . $i ) ): ?>
                        <div class="custom-col-<?php echo absint($buzz_magazine_column_class)?>">
                            <?php dynamic_sidebar('footer-'.absint($i))?>
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="site-generator">
        <div class="container">
            <div class="row">
                <div class="custom-col-6">
                    <div class="copy-right">
                        <div class="section-copy-right">
	                        <?php echo esc_html(get_theme_mod('footer_bar_copy_right',''))?>
                        </div>
                        <div class="powered-by-aarambha">
                            <span><?php esc_html_e('Powered By','buzz-magazine');?> <a target="_blank" rel="designer" href="<?php echo esc_url( 'https://aarambhathemes.com/' )?>"> <?php echo esc_html__( 'Aarambha Themes', 'buzz-magazine' ) ?> </a></span>
                        </div>
                    </div>
                </div>
                <div class="custom-col-6 right">
                    <?php
                    if (get_theme_mod('footer_section_right_element','menu' )== 'menu'){
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'container_class' => 'footer-menu',
                                'menu_class' => 'menu',
                            )
                        );
                    }elseif(get_theme_mod('footer_section_right_element','menu' )== 'social-icon'){
                        buzz_magazine_get_social_icon();

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
if (get_theme_mod('toggle_scroll_to_top' ,1)):?>
    <div class="back-to-top">
        <a href="#masthead" title="<?php esc_attr_e('Go to Top','buzz-magazine');?>" class="fa-angle-up"></a>
    </div>
<?php endif;


?>
</footer>

</div>

<?php wp_footer(); ?>
</body>
</html>

