<?php
$wp_customize->add_section(
	'social_links',
	array(
		'priority'       => 1,
		'panel'          => 'blogshop',
		'title'          => __( 'Social Links', 'blogshop' ),
		'description'    => __( 'Social Links. to disable social Icon keep that fields empty.', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'facebook',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'facebook',
	array(
		'label'       => __( 'Facebook Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'twitter',
	array(				
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'twitter',
	array(
		'label'       => __( 'twitter Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'pinterest',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'pinterest',
	array(
		'label'       => __( 'pinterest Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'whatsapp',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'whatsapp',
	array(
		'label'       => __( 'WhatsApp Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'youtube',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'youtube',
	array(
		'label'       => __( 'youtube Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);

$wp_customize->add_setting(
	'linkedin',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'linkedin',
	array(
		'label'       => __( 'linkedin Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'instagram',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'instagram',
	array(
		'label'       => __( 'Instagram Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'github',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'github',
	array(
		'label'       => __( 'github Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'stumbleupon',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'stumbleupon',
	array(
		'label'       => __( 'stumbleupon Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'tumblr',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'tumblr',
	array(
		'label'       => __( 'tumblr Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'wordpress',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'wordpress',
	array(
		'label'       => __( 'WordPress Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'weixin',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'weixin',
	array(
		'label'       => __( 'weixin Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'snapchat',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'snapchat',
	array(
		'label'       => __( 'snapchat Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'qq',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'qq',
	array(
		'label'       => __( 'QQ Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
$wp_customize->add_setting(
	'reddit',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'reddit',
	array(
		'label'       => __( 'reddit Link', 'blogshop' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
