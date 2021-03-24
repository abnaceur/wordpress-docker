<?php
/**
 * Active Callbacks for theme option
 *
 * @package buzz_magazine
 */

if (!function_exists('buzz_magazine_flash_news_toggle')){
    function buzz_magazine_flash_news_toggle(){

        if(get_theme_mod('flash_news_toggle_button',true) == true){
            return true;
        }
        return false;
    }
}


if (!function_exists('buzz_magazine_flash_news_category')){

    function buzz_magazine_flash_news_category(){
        if(get_theme_mod('flash_news_toggle_button',true) != true){
            return false;
        }

        if ('category' == get_theme_mod('flash_news_radio_option','category')){
            return true;
        }

        return false;
    }

}

if (!function_exists('buzz_magazine_top_header_toggle')){
    function buzz_magazine_top_header_toggle(){
        if(get_theme_mod('top_header_toggle_button',true) == true){
            return true;
        }
        return false;
    }
}


if (!function_exists('buzz_magazine_slider_toggle')){
    function buzz_magazine_slider_toggle(){
        if(get_theme_mod('slider_section_option_toggle',true) == true){
            return true;
        }
        return false;
    }
}

//Single page/post
if (!function_exists('buzz_magazine_toggle_related_posts')){
    function buzz_magazine_toggle_related_posts(){
        if(get_theme_mod('toggle_related_posts',true) == true){
            return true;
        }
        return false;
    }
}
// Footer Widget
if (!function_exists('buzz_magazine_slider_featured_latest_posts')){
    function buzz_magazine_slider_featured_latest_posts(){
        if(get_theme_mod('buzz_magazine_slider_layout', 'layout-one') == 'layout-two' && buzz_magazine_slider_toggle() ){
            return true;
        }
        return false;
    }
}

/**
 * Theme Option >> Top Header >> Menu
 */
if (!function_exists('buzz_magazine_top_header_menu')){
    function buzz_magazine_top_header_menu(){
        if(buzz_magazine_top_header_toggle() && (get_theme_mod('top_header_section_left_element', 'social-icon') == 'menu' || get_theme_mod('top_header_section_right_element', 'menu') == 'menu')){
            return true;
        }
        return false;
    }
}

/**
 * Theme Option >> Top Header >> Phone/Address
 */
if (!function_exists('buzz_magazine_top_header_number_address')){
    function buzz_magazine_top_header_number_address(){
        if(buzz_magazine_top_header_toggle() && (get_theme_mod('top_header_section_left_element', 'social-icon') == 'address-email' || get_theme_mod('top_header_section_right_element', 'menu') == 'address-email')){
            return true;
        }
        return false;
    }
}

/**
 * Theme Option >> Top Header >> Address Link
 */
if (!function_exists('buzz_magazine_top_header_address_link')){
    function buzz_magazine_top_header_address_link(){
        if(buzz_magazine_top_header_toggle() && !empty(get_theme_mod('top_header_section_address', '')) ){
            return true;
        }
        return false;
    }
}


/**
 * Theme Option >> Top Header >> Address Link
 */
if (!function_exists('buzz_magazine_main_header_logo_layout')){
	function buzz_magazine_main_header_logo_layout(){
		if(get_theme_mod('main_header_logo_layout', 'left') != 'center'){
			return true;
		}
		return false;
	}
}
