<?php
/**
 * Theme Option >> Category Color
 * Registers Category Color Section
 * @package Buzz_Magazine
 */

$wp_customize->add_section('category_section_color',
    array(
        'title'       => esc_html__('Categories Color ', 'buzz-magazine'),
        'panel'       => 'theme_option',
        'priority'    => 160,
    )
);
	
	
	$wp_customize->add_setting( 'simple_notice_category_color',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_title'
		)
	);
	
	$wp_customize->add_control( new Buzz_Magazine_Simple_Notice_Custom_control( $wp_customize, 'simple_notice_category_color',
		array(
			'label'     => esc_html__( 'Category ','buzz-magazine' ),
			'style'     => esc_attr('font-size:17px;color:#555D66;text-align:center'),
			'section'   => 'category_section_color'
		)
	) );

$categories = get_terms( 'category' ); // Get all Categories

foreach ( $categories as $category_list ) {

    $wp_customize->add_setting('category_color_option_'.esc_attr( strtolower($category_list->name) ).']',
        array(
            'default'              => '#FA3616',
            'capability'           => 'edit_theme_options',
            'sanitize_callback'    => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,'category_color_option_'.esc_attr( strtolower($category_list->name) ),
            array(
                'label'    =>  esc_html( ucfirst($category_list->name )),
                'section'  => 'category_section_color',
            )
        )
    );
}

$wp_customize->add_setting( 'simple_notice_tag_color',
    array(
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_title'
    )
);

$wp_customize->add_control( new Buzz_Magazine_Simple_Notice_Custom_control( $wp_customize, 'simple_notice_tag_color',
    array(
        'label'     => esc_html__( 'Tags','buzz-magazine' ),
        'style'     => esc_attr('font-size:17px;color:#555D66;text-align:center'),
        'section'   => 'category_section_color'
    )
) );

$tags = get_tags(); // Get all Tags

foreach ( $tags as $tag_list ) {

    $wp_customize->add_setting('tag_color_option_'.esc_attr( strtolower($tag_list->name) ).']',
        array(
            'default'              => '#FA3616',
            'capability'           => 'edit_theme_options',
            'sanitize_callback'    => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,'tag_color_option_'.esc_attr( strtolower($tag_list->name) ),
            array(
                'label'    =>  esc_html( ucfirst($tag_list->name )),
                'section'  => 'category_section_color',
            )
        )
    );
}



