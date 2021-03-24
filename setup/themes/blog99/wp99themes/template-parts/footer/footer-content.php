<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

if( get_theme_mod('blog99_banner_footer_disable',true) == true ):

    if (is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ): ?>
    
        <footer id="colophon" class="site-footer">
            <div class="container">
                <div class="row">
                    <?php
                        $widget_count = 0;

                        for ($i = 1; $i <= 4; $i++) {

                            if (is_active_sidebar('footer-' . $i)) {
                                $widget_count++;
                            }
                        }

                        $widget_count = 12 / $widget_count;
                        $widget_class = 'col-lg-' . absint($widget_count);

                        for ($i = 1; $i <= 4; $i++) {

                            if (is_active_sidebar('footer-' . $i)) {
                    ?>
                        <div class="<?php echo esc_attr($widget_class); ?> col-md-6 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar('footer-' . $i); ?>
                        </div>
                    <?php } } ?>
                </div>

            </div>
        </footer><!-- #colophon -->

<?php endif; endif; ?>

<div class="sub_footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog99copyright">
                    <?php do_action('blog99_copyright'); 
                    the_privacy_policy_link(); ?>
                </div><!-- Copyright -->
            </div>
        </div>
    </div>
</div>