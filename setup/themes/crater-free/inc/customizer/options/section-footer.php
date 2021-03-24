<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_footer_register' ) ) :
function crater_free_customizer_footer_register( $wp_customize ) {

    // Footer Settings
    CraterFree_Kirki::add_section( 'crater_free_footer_settings', array(
        'title'          => esc_html__( 'Footer Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    // Copyrights text
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'textarea',
        'settings' => 'cr_copyright_text',
        'label'    => esc_html__( 'Footer copyright text', 'crater-free' ),
        'description'   => esc_html__( 'Copyright text to be displayed in the footer.', 'crater-free' ),
        'section'  => 'crater_free_footer_settings',
    ] );

    // Footer widgets
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'radio',
        'settings' => 'cr_footer_widgets',
        'label'    => esc_html__( 'Nubmer of Footer Widgets:', 'crater-free' ),
        'section'  => 'crater_free_footer_settings',
        'default'  => '4',
        'choices'     => [
            '1'   => esc_html__( '1', 'crater-free' ),
            '2' => esc_html__( '2', 'crater-free' ),
            '3'   => esc_html__( '3', 'crater-free' ),
            '4' => esc_html__( '4', 'crater-free' ),
        ],
    ] ); 
    
}
endif;

add_action( 'init', 'crater_free_customizer_footer_register' );