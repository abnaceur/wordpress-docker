<?php
/*Blog Page Settings*/
$wp_customize->add_section(
	'blog_page_settings',
	array(
		'priority'       => 6,
		'panel'          => 'blogshop',
		'title'          => __( 'Blog Settings', 'blogshop' ),
		'description'    => __( 'Customize Blog Page', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'blog_layout',
	array(
		'default' => 'list',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_radio'
	)
);
$wp_customize->add_control(
	'blog_layout',
	array(
		'label'       => __( 'Blog Layout', 'blogshop' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'grid'  => __( 'Grid', 'blogshop' ),
			'list' => __( 'List', 'blogshop' ),
		),
	)
);
$wp_customize->add_setting(
	'grid_column',
	array(
		'default' => 'col-sm-6',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_radio'
	)
);
$wp_customize->add_control(
	'grid_column',
	array(
		'label'       => __( 'Grid Column', 'blogshop' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'active_callback' => 'blogshop_blog_grid',
		'choices'  => array(
			'col-sm-3'  => __( '4 Colmun', 'blogshop' ),
			'col-sm-4' => __( '3 Column', 'blogshop' ),
			'col-sm-6' => __( '2 Column', 'blogshop' ),
		),
	)
);
$wp_customize->add_setting(
	'blog_page_sidebar',
	array(
		'default' => 'right',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_radio'
	)
);
$wp_customize->add_control(
	'blog_page_sidebar',
	array(
		'label'       => __( 'Blog Sidebar', 'blogshop' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'left'  => __( 'Left Sidebar', 'blogshop' ),
			'right' => __( 'Right Sidebar', 'blogshop' ),
			'no' => __( 'No Sidebar', 'blogshop' ),
		),
	)
);
$wp_customize->add_setting(
	'article_alignment',
	array(
		'default' => 'center',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_radio'
	)
);
$wp_customize->add_control(
	'article_alignment',
	array(
		'label'       => __( 'Article Alignment', 'blogshop' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'left'  => __( 'Left', 'blogshop' ),
			'right' => __( 'Right', 'blogshop' ),
			'center' => __( 'center', 'blogshop' ),
		),
	)
);
$wp_customize->add_setting(
	'excerpt_length',
	array(
		'default' => 200,
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_number_absint'
	)
);
$wp_customize->add_control(
	'excerpt_length',
	array(
		'label'       => __( 'Excerpt Length', 'blogshop' ),
		'section'     => 'blog_page_settings',
		'type'        => 'number',
	)
);
$wp_customize->add_setting(
	'readmore_text',
	array(
		'default' => __( 'Read More', 'blogshop' ),
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_kses_post'
	)
);
$wp_customize->add_control(
	'readmore_text',
	array(
		'label'       => __( 'Read More Text', 'blogshop' ),
		'section'     => 'blog_page_settings',
		'type'        => 'text',
	)
);
$wp_customize->add_setting(
	'blog_page_pagination',
	array(
		'default' => 'center',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'blogshop_sanitize_radio'
	)
);
$wp_customize->add_control(
	'blog_page_pagination',
	array(
		'label'       => __( 'Pagination Alignment', 'blogshop' ),
		'section'     => 'blog_page_settings',
		'type'        => 'radio',
		'choices'  => array(
			'left'  => __( 'Left', 'blogshop' ),
			'right' => __( 'Right', 'blogshop' ),
			'center' => __( 'center', 'blogshop' ),
		),
	)
);
