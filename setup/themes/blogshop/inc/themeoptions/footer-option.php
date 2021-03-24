<?php
$wp_customize->add_section(
	'footer_news_letter',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Footer NewsLetter', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'footer_news_letter_on_off',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_sanitize_checkbox',
		'default'     => false,
	)
);
$wp_customize->add_control(
	'footer_news_letter_on_off',
	array(
		'label'       => __( 'Footer News Letter On//Off', 'blogshop' ),
		'section'     => 'footer_news_letter',
		'type'        => 'checkbox',
	)
);
$wp_customize->add_setting(
	'newsletter_title',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'newsletter_title',
	array(
		'label'       => __( 'Title', 'blogshop' ),
		'section'     => 'footer_news_letter',
		'type'        => 'textarea',
	)
);
$wp_customize->add_setting(
	'form_shortcode',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'form_shortcode',
	array(
		'label'       => __( 'Form', 'blogshop' ),
		'section'     => 'footer_news_letter',
		'type'        => 'textarea',
	)
);
$wp_customize->add_setting(
	'form_shortcode',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'form_shortcode',
	array(
		'label'       => __( 'Form', 'blogshop' ),
		'section'     => 'footer_news_letter',
		'type'        => 'textarea',
	)
);
$wp_customize->add_section(
	'footer_column_section',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Footer Column', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'footer_column',
	array(
		'transport'            => 'refresh',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'blogshop_sanitize_radio',
		'default'     => 3,
	)
);
$wp_customize->add_control(
	'footer_column',
	array(
		'label'       => __( 'Footer Column', 'blogshop' ),
		'section'     => 'footer_column_section',
		'type'        => 'radio',
		'choices' => array(
			'2' => __( '2 Column', 'blogshop' ),
			'3' => __( '3 Column', 'blogshop' ),
			'4' => __( '4 Column', 'blogshop' ),
		),
	)
);

$wp_customize->add_section(
	'footer_content',
	array(
		'panel'          => 'blogshop',
		'title'          => __( 'Copyright', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'copyright_text',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'wp_kses_post',
	)
);
// Control: Name.
$wp_customize->add_control(
	'copyright_text',
	array(
		'label'       => __( 'Copyright Text', 'blogshop' ),
		'section'     => 'footer_content',
		'type'        => 'textarea',
	)
);

