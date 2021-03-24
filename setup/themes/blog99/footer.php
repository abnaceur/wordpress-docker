<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * 
 */
?>
	</div><!-- #content -->

		<?php blog99_content_bottom(); ?>

		<?php blog99_content_after(); ?>

		<?php blog99_footer_before(); ?>

		<?php blog99_footer(); ?>

		<?php blog99_footer_after(); ?>

	</div><!-- #page -->

<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">
    <div class="menu-modal-inner modal-inner">
        <div class="menu-wrapper section-inner">
            <div class="menu-top">

                <button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
                    <span class="toggle-text"><?php esc_html_e( 'Close Menu', 'blog99' ); ?></span>
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button><!-- .nav-toggle -->

                <nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'blog99' ); ?>" role="navigation">
                    <ul class="modal-menu">
                        <?php
                            if ( has_nav_menu( 'menu-1' ) ) {

                                wp_nav_menu(
                                    array(
                                        'container'      => '',
                                        'items_wrap'     => '%3$s',
                                        'show_toggles'   => true,
                                        'theme_location' => 'menu-1',
                                    )
                                );

                            } else {

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_toggles'       => true,
                                        'title_li'           => false,
                                        'walker'             => new Blog99_Walker_Page(),
                                    )
                                );

                            }
                        ?>
                    </ul>
                </nav>

            </div><!-- .menu-top -->
        </div><!-- .menu-wrapper -->
    </div><!-- .menu-modal-inner -->
</div><!-- .menu-modal -->  

<a href="#" id="back-to-top" class="progress" data-tooltip="Back To Top">
	<div class="arrow-top"></div>
	<div class="arrow-top-line"></div>
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet"> <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg> 
</a>

<?php wp_footer(); ?>

</body>
</html>
