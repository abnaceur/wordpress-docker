<?php

function academiathemes_customizer_define_color_scheme_sections( $sections ) {
    $panel           = 'academiathemes' . '_color-scheme';
    $colors_sections = array();

    $colors_sections['color'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'General', 'milton-lite' ),
        'options' => array(

            'color-body-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Body Text', 'milton-lite' ),
                ),
            ),

            'color-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color', 'milton-lite' ),
                ),
            ),

            'color-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color on Hover', 'milton-lite' ),
                ),
            ),

            'color-frame' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Content Frame Background', 'milton-lite' ),
                ),
            ),

            'color-accent' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Accent Color', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-header'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Header', 'milton-lite' ),
        'options' => array(

            'color-header-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Header Background', 'milton-lite' ),
                ),
            ),

            'color-header-logo-color' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Logo Text Color', 'milton-lite' ),
                ),
            ),

            'color-header-logo-color-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Logo Text Color :hover', 'milton-lite' ),
                ),
            ),

            'color-header-logo-tagline-color' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Logo Tagline', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-main-menu'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Main Menu', 'milton-lite' ),
        'options' => array(

            'color-menu-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Background', 'milton-lite' ),
                ),
            ),

            'color-menu-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Item', 'milton-lite' ),
                ),
            ),

            'color-menu-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Item on Hover', 'milton-lite' ),
                ),
            ),

            'color-submenu-menu-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Sub-Menu Item','milton-lite' ),
                ),
            ),

            'color-submenu-menu-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Sub-Menu Item on Hover','milton-lite' ),
                ),
            ),

            'color-submenu-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Sub-Menu Item Background','milton-lite' ),
                ),
            ),

            'color-submenu-background-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Sub-Menu Item Background on Hover','milton-lite' ),
                ),
            ),

            'color-submenu-border-bottom' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Sub-Menu Item Border Bottom','milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-secondary-menu'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Secondary Menu', 'milton-lite' ),
        'options' => array(

            'color-secondary-menu-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Background', 'milton-lite' ),
                ),
            ),

            'color-secondary-menu-bottom-border' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Bottom Border', 'milton-lite' ),
                ),
            ),

            'color-secondary-menu-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Item', 'milton-lite' ),
                ),
            ),

            'color-secondary-menu-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Item on Hover', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-mobile-menu'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Mobile Menu', 'milton-lite' ),
        'options' => array(

            'color-mobile-menu-toggle-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Background', 'milton-lite' ),
                ),
            ),

            'color-mobile-menu-toggle-background-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Background :hover', 'milton-lite' ),
                ),
            ),

            'color-mobile-menu-toggle' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Color', 'milton-lite' ),
                ),
            ),

            'color-mobile-menu-toggle-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Button Color :hover', 'milton-lite' ),
                ),
            ),
            'color-mobile-menu-container-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Open Menu Background', 'milton-lite' ),
                ),
            ),
            'color-mobile-menu-link-border' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Border Color', 'milton-lite' ),
                ),
            ),
            'color-mobile-menu-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color', 'milton-lite' ),
                ),
            ),
            'color-mobile-menu-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link Color :hover', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-footer'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Footer', 'milton-lite' ),
        'options' => array(

            'color-footer-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background', 'milton-lite' ),
                ),
            ),

            'color-footer-bottom-border' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Menu Bottom Border Color', 'milton-lite' ),
                ),
            ),

            'color-footer-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Text', 'milton-lite' ),
                ),
            ),

            'color-footer-widget-title' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Widget Title', 'milton-lite' ),
                ),
            ),

            'color-footer-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link', 'milton-lite' ),
                ),
            ),

            'color-footer-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link on Hover', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-footer-credits'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Footer: Copyright', 'milton-lite' ),
        'options' => array(

            'color-footer-credits-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background', 'milton-lite' ),
                ),
            ),

            'color-footer-credits-border-color' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Top Border Color', 'milton-lite' ),
                ),
            ),

            'color-footer-credits-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Text', 'milton-lite' ),
                ),
            ),

            'color-footer-credits-link' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link', 'milton-lite' ),
                ),
            ),

            'color-footer-credits-link-hover' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Link on Hover', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-homepage-welcome'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Homepage: Welcome Message', 'milton-lite' ),
        'options' => array(

            'color-homepage-welcome-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Widget Background', 'milton-lite' ),
                ),
            ),

            'color-homepage-welcome-color' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Widget Text Color', 'milton-lite' ),
                ),
            ),

            'color-homepage-welcome-title-color' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Widget Title Color', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-homepage-featured-pages'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Homepage: Featured Pages', 'milton-lite' ),
        'options' => array(

            'color-homepage-featured-pages-background' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Background', 'milton-lite' ),
                ),
            ),

        )
    );

    $colors_sections['color-single'] = array(
        'panel'   => $panel,
        'title'   => esc_html__( 'Posts and Pages', 'milton-lite' ),
        'options' => array(

            'color-single-title' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Post/Page Title', 'milton-lite' ),
                ),
            ),

            'color-single-meta' => array(
                'setting' => array(
                    'sanitize_callback' => 'academiathemes_maybe_hash_hex_color',
                    'transport'  => 'postMessage'
                ),
                'control' => array(
                    'control_type' => 'WP_Customize_Color_Control',
                    'label'        => esc_html__( 'Post Meta & Page Taglines', 'milton-lite' ),
                ),
            ),

        )
    );

    return array_merge( $sections, $colors_sections );
}

add_filter( 'academiathemes_customizer_sections', 'academiathemes_customizer_define_color_scheme_sections' );
