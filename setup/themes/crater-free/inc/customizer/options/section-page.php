<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_page_register' ) ) :
function crater_free_customizer_page_register( $wp_customize ) {

    // Page Settings
    CraterFree_Kirki::add_section( 'crater_free_page_settings', array(
        'title'          => esc_html__( 'Page Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_home_page_content_settings',
        'label'       => '',
        'section'     => 'crater_free_page_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Front Page Content Spacing', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Set front page content spacing
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_fp_content_spacing',
        'label'    => esc_html__( 'Content Spacing', 'crater-free' ),
        'description'   => esc_html__( 'Set front page content spacing. Default value is 70', 'crater-free' ),
        'section'  => 'crater_free_page_settings',
        'default'  => 0,
        'choices'  => [
            'min'  => 0,
            'max'  => 300,
            'step' => 5,
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_inner_page_content_settings',
        'label'       => '',
        'section'     => 'crater_free_page_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Inner Page Content Spacing', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Set inner page content spacing
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_ip_content_spacing',
        'label'    => esc_html__( 'Content Spacing', 'crater-free' ),
        'description'   => esc_html__( 'Set inner pages content spacing. Default value is 70', 'crater-free' ),
        'section'  => 'crater_free_page_settings',
        'default'  => 0,
        'choices'  => [
            'min'  => 0,
            'max'  => 300,
            'step' => 5,
        ],
    ] );
    
}
endif;

add_action( 'init', 'crater_free_customizer_page_register' );