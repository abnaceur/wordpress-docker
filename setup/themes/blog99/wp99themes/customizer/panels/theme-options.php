<?php
/**
 * Header  Panel
 *
 * @package Blog99
 */
function blog99_customize_register_header_panel( $wp_customize ) {
    $wp_customize->add_panel( 'blog99_theme_options_panel', array(
        'title'      => esc_html__( 'Theme Options', 'blog99' ),
        'priority'   => 2
    ) );
}
add_action( 'customize_register', 'blog99_customize_register_header_panel' );