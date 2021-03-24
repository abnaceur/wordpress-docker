<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_general_register' ) ) :
function crater_free_customizer_general_register( $wp_customize ) {

    // General Settings
    CraterFree_Kirki::add_section( 'crater_free_general_settings', array(
        'title'          => esc_html__( 'General Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_home_disable',
        'label'       => '',
        'section'     => 'crater_free_general_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Home Background Image Section', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Enable/disable section
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_home_disable_section',
        'label'    => esc_html__( 'Disable Home Background Image Section:', 'crater-free' ),
        'description'   => esc_html__( 'Choose whether to show this section in Home Page or not', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'default'  => '0',
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_home_bg',
        'label'       => '',
        'section'     => 'crater_free_general_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Upload Home Background Image', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Home Background Image
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'image',
        'settings' => 'cr_theme_home_bg',
        'label'    => esc_html__( 'Home Background Image', 'crater-free' ),
        'description'   => esc_html__( 'This setting will add background image if Background Image was selected above.', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'default'  => '',
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_home_content',
        'label'       => '',
        'section'     => 'crater_free_general_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Content Settings', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Home Section Heading text
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'text',
        'settings' => 'cr_home_heading_text',
        'label'    => esc_html__( 'Heading Text', 'crater-free' ),
        'description'   => esc_html__( 'Heading for the home section', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'partial_refresh'    => [
            'heading_text' => [
                'selector'        => '.slide-bg-section h1',
                'render_callback' => function() {
                    return sanitize_text_field( get_theme_mod( 'cr_home_heading_text' ) );
                },
            ],
        ],
    ] );

    // Home Section SubHeading text
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'textarea',
        'settings' => 'cr_home_subheading_text',
        'label'    => esc_html__( 'Sub Heading Text', 'crater-free' ),
        'description'   => esc_html__( 'Subheading for the home section', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'partial_refresh'    => [
            'sub_heading_text' => [
                'selector'        => '.slide-bg-section p',
                'render_callback' => function() {
                    return sanitize_text_field( get_theme_mod( 'cr_home_subheading_text' ) );
                },
            ],
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_home_buttons',
        'label'       => '',
        'section'     => 'crater_free_general_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Button Settings', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );


    // Home Section Button text 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'text',
        'settings' => 'cr_home_button_text',
        'label'    => esc_html__( 'Button Text', 'crater-free' ),
        'description'   => esc_html__( 'Button text for the home section', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
    ] );


    // Home Section Button url 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'link',
        'settings' => 'cr_home_button_url',
        'label'    => esc_html__( 'Button URL', 'crater-free' ),
        'description'   => esc_html__( 'Button URL for the home section', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'default'  => '#',
    ] );

    // Home Section Button2 text 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'text',
        'settings' => 'cr_home_button2_text',
        'label'    => esc_html__( 'Button 2 Text', 'crater-free' ),
        'description'   => esc_html__( 'Button 2 text for the home section', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
    ] );

    // Home Section Button2 url 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'link',
        'settings' => 'cr_home_button2_url',
        'label'    => esc_html__( 'Button 2 URL', 'crater-free' ),
        'description'   => esc_html__( 'Button 2 URL for the home section', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'default'  => '#',
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_text_position',
        'label'       => '',
        'section'     => 'crater_free_general_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Text Position', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Text position
    CraterFree_Kirki::add_field( 'crater-free',[
        'type'        => 'radio-buttonset',
        'settings'    => 'cr_home_text_position',
        'label'       => esc_html__( 'Select Text Position', 'crater-free' ),
        'section'     => 'crater_free_general_settings',
        'default'     => 'center',
        'choices'     => [
            'left' =>esc_html__( 'Left', 'crater-free' ),
            'center' =>esc_html__( 'Center', 'crater-free' ),
            'right' => esc_html__( 'Right', 'crater-free' ),
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_dark_overlay',
        'label'       => '',
        'section'     => 'crater_free_general_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Dark Overlay', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Enable Dark Overlay
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_home_dark_overlay',
        'label'    => esc_html__( 'Enable Dark Overlay:', 'crater-free' ),
        'description'   => esc_html__( 'Choose whether to show a dark overlay over background image', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'default'  => 1,
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_disable_section',
        'label'       => '',
        'section'     => 'crater_free_general_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . esc_html__( 'Enable Header Search', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    //Enable/disalble Header Menu Search
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_menu_search',
        'label'    => esc_html__( 'Enable Header Search Feature:', 'crater-free' ),
        'description'   => esc_html__( 'Choose whether to enable a search in header menu', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'default'  => 1,
    ] );

    // Set button radius
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_button_radius',
        'label'    => esc_html__( 'Button Radius', 'crater-free' ),
        'description'   => esc_html__( 'Choose button radius of your choice', 'crater-free' ),
        'section'  => 'crater_free_general_settings',
        'default'  => 0,
        'choices'  => [
            'min'  => 0,
            'max'  => 45,
            'step' => 1,
        ],
    ] );
}
endif;

add_action( 'init', 'crater_free_customizer_general_register' );