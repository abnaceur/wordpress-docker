<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_misc_register' ) ) :
function crater_free_customizer_misc_register( $wp_customize ) {

    // Misc Settings
    CraterFree_Kirki::add_section( 'crater_free_misc_settings', array(
        'title'          => esc_html__( 'Misc Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_footer_social_icons_settings',
        'label'       => '',
        'section'     => 'crater_free_misc_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Footer Social Icons', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Enable/disable section
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_footer_social_backward_comp',
        'label'    => esc_html__( 'Font Compatibility for older version:', 'crater-free' ),
        'section'  => 'crater_free_misc_settings',
        'default'  => '0',
    ] );
    
}
endif;

add_action( 'init', 'crater_free_customizer_misc_register' );