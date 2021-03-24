<?php
/**
 * Theme offcanvas navigatation
 *
 * @package Magazine Prime
 */
?>
<div id="offcanvas-menu" class="offcanvas-panel offcanvas-nav-panel">
    <div class="offcanvas-overlay offcanvas-nav-overlay"></div>
    <div class="offcanvas-panel-inner">
        <div class="twp-wrapper">
            <div class="offcanvas-item close-offcanvas-menu">
                <a href="javascript:void(0)" class="skip-link-canvas-start"></a>
                <a href="javascript:void(0)" class="offcanvas-close offcanvas-close-nav">
                    <span>
                       <?php echo esc_html__('Close', 'magazine-prime'); ?>
                    </span>
                </a>
            </div>

            <?php if (has_nav_menu('primary')) { ?>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-navigation">
                    <div class="offcanvas-title">
                        <?php esc_html_e('Menu', 'magazine-prime'); ?>
                    </div>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu',
                    )); ?>
                </div>
            <?php } ?>

            <?php if (has_nav_menu('social')) { ?>
                <div class="offcanvas-item offcanvas-social">
                    <div class="offcanvas-title">
                        <?php esc_html_e('Social profiles', 'magazine-prime'); ?>
                    </div>
                    <div class="social-icons">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'social',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                            'menu_id' => 'social-menu',
                            'fallback_cb' => false,
                            'link_before' => '<span class="screen-reader-text">',
                            'menu_class'=> false
                        )); ?>
                    </div>
                </div>
            <?php } ?>

            <div class="offcanvas-item offcanvas-search">
                <?php get_search_form(); ?>
                <a class="search-box-render-footer screen-reader-text" href="javascript:void(0)"></a>
            </div>
        </div>
    </div>
</div>