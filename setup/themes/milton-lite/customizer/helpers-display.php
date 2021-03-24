<?php


function academiathemes_get_css_rules(){
    return array(

        'color-rules' => array(
            array(
                'id' => 'color-body-text',
                'selector' => 'body',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-link',
                'selector' => 'a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .site-breadcrumbs a, .entry-content a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-link',
                'selector' => '#site-homepage-widgets .widget-recent-posts .site-readmore-span .site-readmore-anchor:hover, #site-homepage-widgets .widget-recent-posts .site-readmore-span .site-readmore-anchor:focus, .entry-content thead th, .posts-navigation .current, .posts-navigation a:hover, .posts-navigation a:focus',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-link',
                'selector' => '.posts-navigation .current, .posts-navigation a:hover, .posts-navigation a:focus',
                'rule' => 'border-color'
            ),

            array(
                'id' => 'color-link-hover',
                'selector' => 'a:hover, a:focus,h1 a:hover, h1 a:focus, h2 a:hover, h2 a:focus, h3 a:hover, h3 a:focus, h4 a:hover, h4 a:focus, h5 a:hover, h5 a:focus, h6 a:hover, h6 a:focus, .site-breadcrumbs a:hover, .site-breadcrumbs a:focus, .site-column-aside .current-menu-item a, .site-column-aside .current-cat a', 
                'rule' => 'color'
            ),

            array(
                'id' => 'color-link-hover',
                'selector' => '.site-call2action-anchor:hover, .site-call2action-anchor:focus', 
                'rule' => 'background'
            ),

            array(
                'id' => 'color-frame',
                'selector' => '.site-section-wrapper-main', 
                'rule' => 'background-color'
            ),
            
            array(
                'id' => 'color-accent',
                'selector' => '#site-secondary-nav .current-menu-item > a, #site-secondary-nav a:hover, #site-secondary-nav a:focus, .large-nav a:hover, .large-nav a:focus, .large-nav .current-menu-item > a, .large-nav .current_page_item > a, .large-nav .current-menu-parent > a, #site-footer .current-menu-item a, #site-footer a:hover, #site-footer a:focus, .large-nav li .current-menu-item a, .large-nav .sub-menu a:hover, .large-nav .sub-menu a:focus',
                'rule' => 'color'
            ),

            // Header

            array(
                'id' => 'color-header-background',
                'selector' => '#site-masthead',
                'rule' => 'background'
            ),

            array(
                'id' => 'color-header-logo-color',
                'selector' => '#site-logo a',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-header-logo-color-hover',
                'selector' => '#site-logo a:hover, #site-logo a:focus',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-header-logo-tagline-color',
                'selector' => '#site-logo .site-description',
                'rule' => 'color'
            ),

			// Main Menu

            array(
                'id' => 'color-menu-background',
                'selector' => '.site-section-wrapper-primary-menu',
                'rule' => 'background'
            ),

            array(
                'id' => 'color-menu-link',
                'selector' => '.large-nav a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-menu-link-hover',
                'selector' => '.large-nav a:hover, .large-nav a:focus, .large-nav .current-menu-item > a, .large-nav .current_page_item > a, .large-nav .current-menu-parent > a, .slicknav_nav a:hover, .slicknav_nav a:focus, .slicknav_btn:hover .slicknav_menutxt, .slicknav_btn:focus .slicknav_menutxt',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-menu-link-hover',
                'selector' => '.slicknav_btn:hover .slicknav_icon-bar, .slicknav_btn:focus .slicknav_icon-bar',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-submenu-background',
                'selector' => '.large-nav ul',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-submenu-background-hover',
                'selector' => '.large-nav ul li:hover, .large-nav ul li:focus',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-submenu-border-bottom',
                'selector' => '.large-nav ul .menu-item',
                'rule' => 'border-bottom-color'
            ),
            array(
                'id' => 'color-submenu-menu-link',
                'selector' => '.large-nav ul a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-submenu-menu-link-hover',
                'selector' => '.large-nav .sub-menu a:hover, .large-nav .sub-menu a:focus, .large-nav .sub-menu .current-menu-item > a',
                'rule' => 'color'
            ),

            // Mobile Menu

            array(
                'id' => 'color-mobile-menu-toggle-background',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-mobile-menu-toggle-background-hover',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor:hover, #site-mobile-menu-toggle .site-toggle-anchor:focus',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-mobile-menu-toggle',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-toggle-hover',
                'selector' => '#site-mobile-menu-toggle .site-toggle-anchor:hover, #site-mobile-menu-toggle .site-toggle-anchor:focus',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-container-background',
                'selector' => '#site-mobile-menu',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-mobile-menu-link-border',
                'selector' => '#site-mobile-menu .menu li, #site-mobile-menu .sub-menu-toggle',
                'rule' => 'border-color'
            ),

            array(
                'id' => 'color-mobile-menu-link',
                'selector' => '#site-mobile-menu a, #site-mobile-menu .sub-menu-toggle',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-link-hover',
                'selector' => '#site-mobile-menu a:hover, #site-mobile-menu a:focus',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-mobile-menu-link-hover',
                'selector' => '#site-mobile-menu .sub-menu-toggle:hover, #site-mobile-menu .sub-menu-toggle:focus',
                'rule' => 'background-color'
            ),

            // Secondary Menu

            array(
                'id' => 'color-secondary-menu-background',
                'selector' => '#site-secondary-nav',
                'rule' => 'background'
            ),

            array(
                'id' => 'color-secondary-menu-bottom-border',
                'selector' => '#site-secondary-nav',
                'rule' => 'border-bottom-color'
            ),

            array(
                'id' => 'color-secondary-menu-link',
                'selector' => '#site-secondary-nav a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-secondary-menu-link-hover',
                'selector' => '#site-secondary-nav .current-menu-item > a, #site-secondary-nav a:hover, #site-secondary-nav a:focus',
                'rule' => 'color'
            ),

            // Footer
            array(
                'id' => 'color-footer-background',
                'selector' => '#site-footer',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-footer-bottom-border',
                'selector' => '#site-footer-menu',
                'rule' => 'border-bottom-color'
            ),
            array(
                'id' => 'color-footer-text',
                'selector' => '#site-footer',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-widget-title',
                'selector' => '#site-footer .widget-title',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-link',
                'selector' => '#site-footer a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-link-hover',
                'selector' => '#site-footer .current-menu-item a, #site-footer a:hover, #site-footer a:focus',
                'rule' => 'color'
            ),

            // Footer Copyright
            array(
                'id' => 'color-footer-credits-background',
                'selector' => '#site-footer-credit',
                'rule' => 'background'
            ),
            array(
                'id' => 'color-footer-credits-border-color',
                'selector' => '#site-footer-credit',
                'rule' => 'border-top-color'
            ),
            array(
                'id' => 'color-footer-credits-text',
                'selector' => '#site-footer-credit',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-credits-link',
                'selector' => '#site-footer-credit a',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-footer-credits-link-hover',
                'selector' => '#site-footer-credit a:hover, #site-footer-credit a:focus',
                'rule' => 'color'
            ),

            // Homepage: Welcome Message
            array(
                'id' => 'color-homepage-welcome-background',
                'selector' => '.site-home-welcome',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-homepage-welcome-color',
                'selector' => '.site-home-welcome',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-homepage-welcome-title-color',
                'selector' => '.site-home-welcome .widget_text .title-welcome',
                'rule' => 'color'
            ),

            // Homepage: Featured Pages
            array(
                'id' => 'color-homepage-featured-pages-background',
                'selector' => '.site-home-featured-pages',
                'rule' => 'background-color'
            ),

            array(
                'id' => 'color-homepage-welcome-color',
                'selector' => '.site-home-welcome',
                'rule' => 'color'
            ),

            array(
                'id' => 'color-homepage-welcome-title-color',
                'selector' => '.site-home-welcome .widget_text .title-welcome',
                'rule' => 'color'
            ),

            // Single Post
            array(
                'id' => 'color-single-title',
                'selector' => 'h1, h2, h3, h4, h5, h6, #academia-comments .title-section',
                'rule' => 'color'
            ),
            array(
                'id' => 'color-single-meta',
                'selector' => '.entry-tagline, .logged-in-as, .custom-widget-featured-page .entry-tagline, .custom-widget-featured-pages .entry-tagline',
                'rule' => 'color'
            ),

        ),

    );
}
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * This function reads in the options from theme mods and determines whether a CSS rule is needed to implement an
 * option. CSS is only written for choices that are non-default in order to avoid adding unnecessary CSS. All options
 * are also filterable allowing for more precise control via a child theme or plugin.
 *
 * Note that all CSS for options is present in this function except for the CSS for fonts and the logo, which require
 * a lot more code to implement.
 *
 * @return void
 */
function academiathemes_css_add_rules() {
    /**
     * Colors section
     */

    $rules = academiathemes_get_css_rules();
    
    foreach($rules['color-rules'] as $color_rule) {
        academiathemes_css_add_simple_color_rule($color_rule['id'], $color_rule['selector'], $color_rule['rule']);
    }
}

add_action( 'academiathemes_css', 'academiathemes_css_add_rules' );

function academiathemes_css_add_simple_color_rule( $setting_id, $selectors, $declarations ) {
    $value = academiathemes_maybe_hash_hex_color( get_theme_mod( $setting_id, academiathemes_get_default( $setting_id ) ) );

    if ( $value === academiathemes_get_default( $setting_id ) ) {
        return;
    }
    
    if ( strtolower( $value ) === strtolower( academiathemes_get_default( $setting_id ) ) ) {
        return;
    }

    if ( is_string( $selectors ) ) {
        $selectors = array( $selectors );
    }

    if ( is_string( $declarations ) ) {
        $declarations = array(
            $declarations => $value
        );
    }

    academiathemes_get_css()->add( array(
        'selectors'    => $selectors,
        'declarations' => $declarations
    ) );
}