<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_preloader_register' ) ) :
function crater_free_customizer_preloader_register( $wp_customize ) {


    // Preloader Settings
    CraterFree_Kirki::add_section( 'crater_free_preloader_settings', array(
        'title'          => esc_html__( 'Preloader Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_preloader_settings',
        'label'       => '',
        'section'     => 'crater_free_preloader_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Enable/Disable Preloader', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // toggle for preloader 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_preloader_display',
        'label'    => esc_html__( 'Enable preloader for site:', 'crater-free' ),
        'description'   => esc_html__( 'Choose whether to show a preloader before a site opens', 'crater-free' ),
        'section'  => 'crater_free_preloader_settings',
        'default'  => 1,
    ] ); 


    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_custom_preloader_settings',
        'label'       => '',
        'section'     => 'crater_free_preloader_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Custom Preloader', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // toggle for custom preloader 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_custom_preloader_display',
        'label'    => esc_html__( 'Enable Custom preloader:', 'crater-free' ),
        'description'   => esc_html__( 'Choose whether to show a preloader of your own', 'crater-free' ),
        'section'  => 'crater_free_preloader_settings',
        'default'  => 0,
    ] );


    // Preloader Image
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'image',
        'settings' => 'cr_custom_preloader_img',
        'label'    => esc_html__( 'Add Preloader', 'crater-free' ),
        'description'   => esc_html__( 'Add Gif/jpg/SVG preloader image', 'crater-free' ),
        'section'  => 'crater_free_preloader_settings',
        'default'  => '',
    ] );


}
endif;

add_action( 'init', 'crater_free_customizer_preloader_register' );