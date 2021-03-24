<?php

function academiathemes_option_defaults() {
    $defaults = array(
        
        /**
         * Color Scheme
         */
        // General
        'color-body-text'                     => '#222222',
        'color-link'                          => '#096ed3',
        'color-link-hover'                    => '#a51903',
        'color-frame'                         => '#ffffff',
        'color-accent'                        => '#96c5ec',

        // Main Menu
        'color-header-background'             => '#040404',
        'color-header-logo-color'             => '#ffffff',
        'color-header-logo-color-hover'       => '#96c5ec',
        'color-header-logo-tagline-color'     => '#aaaaaa',

        // Main Menu
        'color-menu-background'               => '#040404',
        'color-menu-link'                     => '#ffffff',
        'color-menu-link-hover'               => '#96c5ec',
        'color-submenu-background'            => '#ffffff',
        'color-submenu-background-hover'      => '#f8f8f8',
        'color-submenu-menu-link'             => '#121212',
        'color-submenu-menu-link-hover'       => '#b41225',
        'color-submenu-border-bottom'         => '#F0F0F0',

        // Secondary Menu
        'color-secondary-menu-background'     => '#040404',
        'color-secondary-menu-bottom-border'  => '#242424',
        'color-secondary-menu-link'           => '#aaaaaa',
        'color-secondary-menu-link-hover'     => '#96c5ec',

        // Mobile Menu
        'color-mobile-menu-toggle-background'         => '#b41225',
        'color-mobile-menu-toggle-background-hover'   => '#096ed3',
        'color-mobile-menu-toggle'                    => '#ffffff',
        'color-mobile-menu-toggle-hover'              => '#ffffff',
        'color-mobile-menu-container-background'      => '#111111',
        'color-mobile-menu-link-border'               => '#333333',
        'color-mobile-menu-link'                      => '#ffffff',
        'color-mobile-menu-link-hover'                => '#96c5ec',

        // Footer
        'color-footer-background'             => '#040404',
        'color-footer-bottom-border'          => '#242424',
        'color-footer-text'                   => '#aaaaaa',
        'color-footer-widget-title'           => '#ffffff',
        'color-footer-link'                   => '#ffffff',
        'color-footer-link-hover'             => '#96c5ec',

        // Footer: Credits
        'color-footer-credits-background'     => '#040404',
        'color-footer-credits-border-color'   => '#242424',
        'color-footer-credits-text'           => '#aaaaaa',
        'color-footer-credits-link'           => '',
        'color-footer-credits-link-hover'     => '#96c5ec',

        // Homepage: Welcome Message
        'color-homepage-welcome-background'   => '#003a6a',
        'color-homepage-welcome-color'        => '#ffffff',
        'color-homepage-welcome-title-color'  => '#ffffff',

        // Homepage: Featured Pages
        'color-homepage-featured-pages-background' => '#f4f4f2',

        // Single Post
        'color-single-title'                  => '#111111',
        'color-single-meta'                   => '#777777',

        /**
         * Theme Settings 
         */

        'theme-sidebar-primary'                 => 'left',
        'theme-related-pages-position'          => 'primary',
        'theme-slideshow-position'              => 'large',
        'theme-header-style'                    => 'default',
        'footer-widgets-display'                => 1,
        'footer-widgets-columns'                => 3,
        'footer-themecredit-display'            => 1,

        /* translators: This is the copyright notice that appears in the footer of the website. */
        'theme-homepage-posts-heading'        => __('Recent Posts','milton-lite'),
        'milton_lite_copyright_text'                => sprintf( esc_html__( 'Copyright &copy; %1$s %2$s. ', 'milton-lite' ), date( 'Y' ), get_bloginfo( 'name' ) ),
    );

    return $defaults;
}

function academiathemes_get_default( $option ) {
    $defaults = academiathemes_option_defaults();
    $default  = ( isset( $defaults[ $option ] ) ) ? $defaults[ $option ] : false;

    return $default;
}
