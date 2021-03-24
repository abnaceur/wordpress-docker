<?php

$default = creativ_blog_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'creativ-blog' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Contact Info', 'creativ-blog' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'creativ-blog' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 
    'theme_options[show_header_social_links]', 
    array(
        'default'           => $default['show_header_social_links'],
        'sanitize_callback' => 'creativ_blog_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_social_links]',
    array(
        'label'       => __( 'Show Social Links', 'creativ-blog' ),
        'section'     => 'header_social_links_section',
        'type'        => 'checkbox',
    )
);

// Setting social_links.
$wp_customize->add_setting( 
    'theme_options[social_link_1]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_1]',
    array(
        'label'           => __( 'Social Link 1', 'creativ-blog' ),
        'description'     => __( 'Enter valid url.', 'creativ-blog' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'creativ_blog_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_2]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_2]',
    array(
        'label'           => __( 'Social Link 2', 'creativ-blog' ),
        'description'     => __( 'Enter valid url.', 'creativ-blog' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'creativ_blog_social_links_active',
    )
);
$wp_customize->add_setting( 
    'theme_options[social_link_3]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_3]',
    array(
        'label'           => __( 'Social Link 3', 'creativ-blog' ),
        'description'     => __( 'Enter valid url.', 'creativ-blog' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'creativ_blog_social_links_active',
    )
);