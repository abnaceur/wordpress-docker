<?php

/**
 * BreadCrumb Settings
 */
if (!function_exists('colon_select_breadcrumbs')):
    function colon_select_breadcrumbs() {
        $breadcrumb_from = esc_html(get_theme_mod( 'colon_select_breadcrumb_settings','default'));
        if (function_exists('yoast_breadcrumb') && $breadcrumb_from == 'yoast') :
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        elseif (function_exists('bcn_display') && $breadcrumb_from == 'navxt'): 
            bcn_display();
        else:
            require get_template_directory() . '/inc/breadcrumbs.php';
            $breadcrumb_args = array(
                'container' => 'div',
                'show_browse' => false
            );        
            breadcrumb_trail($breadcrumb_args);
        endif;
    }
endif;
add_action('colon_breadcrumbs_hook', 'colon_select_breadcrumbs');