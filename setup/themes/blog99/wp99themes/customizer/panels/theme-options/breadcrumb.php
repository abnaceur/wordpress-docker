<?php
/**
 * Breadcrumb Settings
 *
 * @package   aCommerce
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        https://wp99themes.com/
 * @since       aCommerce 1.0.0
 * */
function blog99_customize_breadcrumb_settings( $wp_customize ) {

    //Breadcrumb Section
    $wp_customize->add_section( 'blog99_breadcrumb_sections', array(
        'title'    => esc_html__( 'Breadcrumb Settings', 'blog99' ),
        'panel'    =>'blog99_theme_options_panel'
    ) );

    //Breadcrumb Enable
    $wp_customize->add_setting(
        'blog99_breadcrumb_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_breadcrumb_enable',
			array(
				'section'	  => 'blog99_breadcrumb_sections',
				'label'		  => esc_html__( 'Breadcrumb Sections', 'blog99' ),
                'description' => esc_html__( 'Show/Hide Breadcrumb Sections.', 'blog99' ),
                'priority'    => 1
			)
		)
    );


    //Breadcrumb Header Title Enable
    $wp_customize->add_setting(
        'blog99_breadcrumb_title_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_breadcrumb_title_enable',
			array(
				'section'	  => 'blog99_breadcrumb_sections',
				'label'		  => esc_html__( 'Breadcrumb Section Title', 'blog99' ),
                'description' => esc_html__( 'Show/Hide breadcrumb title', 'blog99' ),
                'priority'    => 2
			)
		)
    );


    //Breadcrumb disable list 
    $wp_customize->add_setting(
        'blog99_breadcrumb_list_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_breadcrumb_list_enable',
			array(
				'section'	  => 'blog99_breadcrumb_sections',
				'label'		  => esc_html__( 'Breadcrumb Nav Menu', 'blog99' ),
                'description' => esc_html__( 'Show/Hide breadcrumb nav menu', 'blog99' ),
                'priority'    => 3
			)
		)
    );

}
add_action( 'customize_register', 'blog99_customize_breadcrumb_settings' );