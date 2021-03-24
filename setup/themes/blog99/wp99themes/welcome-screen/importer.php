<?php
/**
 * OCDI support.
 *
 * @package Blog99
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function blog99_ocdi_after_import() {

    // Assign navigation menu locations.
    $menu_location_details = array(
        'menu-1'  => 'Primary menu',
        'top-header'  => 'Top Header Menu',
    );

    if ( ! empty( $menu_location_details ) ) {
        $navigation_settings = array();
        $current_navigation_menus = wp_get_nav_menus();
        if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
            foreach ( $current_navigation_menus as $menu ) {
                foreach ( $menu_location_details as $location => $menu_slug ) {
                    if ( $menu->slug === $menu_slug ) {
                        $navigation_settings[ $location ] = $menu->term_id;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations', $navigation_settings );
    }
}
add_action( 'pt-ocdi/after_import', 'blog99_ocdi_after_import' );


/**
 * Demo export/import
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blog99
 */
if (!function_exists('blog99_ocdi_files')) :
    /**
     * OCDI files.
     *
     * @since 1.0.0
     *
     * @return array Files.
     */
    function blog99_ocdi_files() {

        return apply_filters( 'blog99_demo_import_files', array(
            
            array(
                'import_file_name'             => esc_html__( 'Blog99 Main', 'blog99' ),
                'import_file_url'            => 'https://demo.wp99themes.com/demo-content/blog99-main/blog99.WordPress.2020-06-04.xml',
                'import_widget_file_url'     => 'https://demo.wp99themes.com/demo-content/blog99-main/widgets.wie',
                'import_customizer_file_url' => 'https://demo.wp99themes.com/demo-content/blog99-main/blog99-export.dat',
                'import_preview_image_url'     => 'https://demo.wp99themes.com/demo-content/blog99-demo-images/Blog99-demo11.png',
                'import_notice'              => __( 'After you import this demo, you will have to setup the header menu seprately.', 'blog99' ),
                'preview_url'                  => 'http://demo.wp99themes.com/blog99/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Blog99 Business', 'blog99' ),
                'import_file_url'            => 'https://demo.wp99themes.com/demo-content/blog99-business/content.xml',
                'import_widget_file_url'     => 'https://demo.wp99themes.com/demo-content/blog99-business/widgets.wie',
                'import_customizer_file_url' => 'https://demo.wp99themes.com/demo-content/blog99-business/blog99-export.dat',
                'import_preview_image_url'     => 'https://demo.wp99themes.com/demo-content/blog99-demo-images/blog99-business-1.png',
                'import_notice'              => __( 'Please install Recommended Plugins first. <br/>After you import this demo, you will have to setup the header menu seprately.', 'blog99' ),
                'preview_url'                  => 'http://demo.wp99themes.com/blog99/business1',
            ),
            array(
                'import_file_name'             => esc_html__( '99Agency', 'blog99' ),
                'import_file_url'            => 'https://demo.wp99themes.com/demo-content/blog99-agency/content.xml',
                'import_widget_file_url'     => 'https://demo.wp99themes.com/demo-content/blog99-agency/widgets.wie',
                'import_customizer_file_url' => 'https://demo.wp99themes.com/demo-content/blog99-agency/blog99-export.dat',
                'import_preview_image_url'     => 'https://demo.wp99themes.com/demo-content/blog99-demo-images/blog99-agency1.png',
                'import_notice'              => __( 'Please install Recommended Plugins first. <br/>After you import this demo, you will have to setup the header menu seprately.', 'blog99' ),
                'preview_url'                  => 'http://demo.wp99themes.com/blog99/agency/',
            ),
            array(
                'import_file_name'             => esc_html__( '99Consultant', 'blog99' ),
                'import_file_url'            => 'https://demo.wp99themes.com/demo-content/blog99-consultant/content.xml',
                'import_widget_file_url'     => 'https://demo.wp99themes.com/demo-content/blog99-consultant/widgets.wie',
                'import_customizer_file_url' => 'https://demo.wp99themes.com/demo-content/blog99-consultant/blog99-export.dat',
                'import_preview_image_url'     => 'https://demo.wp99themes.com/demo-content/blog99-demo-images/blog99-consultant1.png',
                'import_notice'              => __( 'Please install Recommended Plugins first. <br/>After you import this demo, you will have to setup the header menu seprately.', 'blog99' ),
                'preview_url'                  => 'http://demo.wp99themes.com/blog99/consultant/',
            ),
            array(
                'import_file_name'             => esc_html__( '99Fashion', 'blog99' ),
                'import_file_url'            => 'https://demo.wp99themes.com/demo-content/blog99-fashion/content.xml',
                'import_widget_file_url'     => 'https://demo.wp99themes.com/demo-content/blog99-fashion/widgets.wie',
                'import_customizer_file_url' => 'https://demo.wp99themes.com/demo-content/blog99-fashion/blog99-export.dat',
                'import_preview_image_url'     => 'https://demo.wp99themes.com/demo-content/blog99-demo-images/blog99-fashion1.png',
                'import_notice'              => __( 'Please install Recommended Plugins first. <br/>After you import this demo, you will have to setup the header menu seprately.', 'blog99' ),
                'preview_url'                  => 'http://demo.wp99themes.com/blog99/fashion/',
            ),
            array(
                'import_file_name'             => esc_html__( '99 WooCcommerce', 'blog99' ),
                'import_file_url'            => 'https://demo.wp99themes.com/demo-content/blog99-woocommerce/content.xml',
                'import_widget_file_url'     => 'https://demo.wp99themes.com/demo-content/blog99-woocommerce/widgets.wie',
                'import_customizer_file_url' => 'https://demo.wp99themes.com/demo-content/blog99-woocommerce/blog99-export.dat',
                'import_preview_image_url'     => 'https://demo.wp99themes.com/demo-content/blog99-demo-images/blog99-commerce1.png',
                'import_notice'              => __( 'Please install Recommended Plugins first. <br/>After you import this demo, you will have to setup the header menu seprately.', 'blog99' ),
                'preview_url'                  => 'http://demo.wp99themes.com/blog99/woocommerce/',
            )

        ));
    }
endif;
add_filter( 'pt-ocdi/import_files', 'blog99_ocdi_files');