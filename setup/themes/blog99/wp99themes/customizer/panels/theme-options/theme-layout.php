<?php
/**
 * Theme Layout Hear
 *
 * @package blog99
 */

function blog99_theme_layout_settings( $wp_customize ) {
	
    //Products Category
    $wp_customize->add_section( 'blog99_theme_layout_section', array(
        'title'    => esc_html__( 'Full WebPage Layout', 'blog99' ),
        'panel'    =>'blog99_theme_options_panel'
	) );

   /*//Theme layout
    $wp_customize->add_setting(
        'blog99_theme_layout_settings',
        array(
            'default'           =>  'blog99-wide-layout',
            'sanitize_callback' =>  'blog99_sanitize_radio'
        )
    );
    
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_theme_layout_settings', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'WebPage Layout', 'blog99' ),
            'section'       => 'blog99_theme_layout_section',
            'choices'       => array(
                    'blog99-wide-layout'             =>  esc_url( BLOG99_THEME_IMG . 'box-layout/wide-layout.jpg'),
                    'blog99-box-layout'             =>  esc_url( BLOG99_THEME_IMG . 'box-layout/box-layout.jpg'),
                )
            )
        )
    );*/

}
add_action( 'customize_register', 'blog99_theme_layout_settings' );