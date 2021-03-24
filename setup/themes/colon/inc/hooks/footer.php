<?php

/**
* Footer copyrights
*/

if ( ! function_exists( 'colon_footer_copyrights' ) ) :
function colon_footer_copyrights() {
    ?>
        <div class="row">
            <div class="copyrights">
                <p>
                    <?php
                        if("" != esc_html(get_theme_mod( 'colon_footer_copyright_text'))) :
                            echo esc_html(get_theme_mod( 'colon_footer_copyright_text'));
                        else :
                            echo date_i18n(
                                /* translators: Copyright date format, see https://secure.php.net/date */
                                _x( 'Y', 'copyright date format', 'colon' )
                            );
                            ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                <span><?php esc_html_e(' | Theme by ','colon') ?><a href="<?php echo esc_url(COLON_THEME_AUTH); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e('Spiracle Themes','colon') ?></a></span>
                            <?php
                        endif;
                    ?>
                </p>
            </div>
        </div>
    <?php
}
endif;
add_action( 'colon_action_footer', 'colon_footer_copyrights' );