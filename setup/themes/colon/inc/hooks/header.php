<?php

/**
* Header
*/

if ( ! function_exists( 'colon_header_menu_styles' ) ) :
function colon_header_menu_styles() {
    get_template_part( 'inc/header-menu/content',esc_html(get_theme_mod('colon_header_menu_style','style1')));
}
endif;
add_action( 'colon_action_header', 'colon_header_menu_styles' );