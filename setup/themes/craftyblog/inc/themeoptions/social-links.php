<?php
$wp_customize->add_section(
	'social_links',
	array(
		'priority'       => 2,
		'panel'          => 'craftyblog',
		'title'          => __( 'Social Links', 'craftyblog' ),
		'description'    => __( 'Social Links. to disable social Icon keep that fields empty.', 'craftyblog' ),
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
		'label'       => __( 'Facebook Link', 'craftyblog' ),
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
		'label'       => __( 'twitter Link', 'craftyblog' ),
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
		'label'       => __( 'pinterest Link', 'craftyblog' ),
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
		'label'       => __( 'youtube Link', 'craftyblog' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);

$wp_customize->add_setting(
	'amazon',
	array(
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'amazon',
	array(
		'label'       => __( 'Amazon Link', 'craftyblog' ),
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
		'label'       => __( 'linkedin Link', 'craftyblog' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);

$wp_customize->add_setting(
	'instagram',
	array(
		'default' => '#',
		'transport'            => 'refresh', // Options: refresh or postMessage.
		'capability'           => 'edit_theme_options',
		'sanitize_callback'     => 'esc_url_raw',
	)
);
// Control: Name.
$wp_customize->add_control(
	'instagram',
	array(
		'label'       => __( 'Instagram Link', 'craftyblog' ),
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
		'label'       => __( 'github Link', 'craftyblog' ),
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
		'label'       => __( 'stumbleupon Link', 'craftyblog' ),
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
		'label'       => __( 'tumblr Link', 'craftyblog' ),
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
		'label'       => __( 'WhatsApp Link', 'craftyblog' ),
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
		'label'       => __( 'weixin Link', 'craftyblog' ),
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
		'label'       => __( 'snapchat Link', 'craftyblog' ),
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
		'label'       => __( 'QQ Link', 'craftyblog' ),
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
		'label'       => __( 'reddit Link', 'craftyblog' ),
		'section'     => 'social_links',
		'type'        => 'url',
	)
);
