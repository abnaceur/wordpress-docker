<?php
/**
 * Customizer Blog
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
* Meta
*/

// Meta category
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_meta_category_show',
	'label'       => esc_attr__( 'Show meta category', 'everse' ),
	'section'     => 'everse_settings_post_meta',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_meta_date_show',
	'label'       => esc_attr__( 'Show meta date', 'everse' ),
	'section'     => 'everse_settings_post_meta',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_meta_author_show',
	'label'       => esc_attr__( 'Show meta author', 'everse' ),
	'section'     => 'everse_settings_post_meta',
	'default'     => true,
) );


// Post excerpt
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_post_excerpt_show',
	'label'       => esc_attr__( 'Show post excerpt', 'everse' ),
	'section'     => 'everse_settings_post_meta',
	'default'     => true,
) );


/**
* Single Post
*/

// Post title
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_post_title_show',
	'label'       => esc_attr__( 'Show post title', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Featured Image
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_featured_image_show',
	'label'       => esc_attr__( 'Show featured image', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Meta category
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_category_show',
	'label'       => esc_attr__( 'Show category', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_date_show',
	'label'       => esc_attr__( 'Show date', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_author_show',
	'label'       => esc_attr__( 'Show author', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Meta comments
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_single_comments_show',
	'label'       => esc_attr__( 'Show comments', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Post tags
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_post_tags_show',
	'label'       => esc_attr__( 'Show tags', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Post author box
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_author_box_show',
	'label'       => esc_attr__( 'Show author box', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Related posts heading
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'everse_settings_single_post',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Related Posts', 'everse' ) . '</h3>',
) );

// Related posts
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_related_posts_show',
	'label'       => esc_attr__( 'Show related posts', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => true,
) );

// Related by
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'select',
	'settings'    => 'everse_settings_related_posts_relation',
	'label'       => esc_html__( 'Related by', 'everse' ),
	'section'     => 'everse_settings_single_post',
	'default'     => 'category',
	'choices'     => array(
		'category' => esc_attr__( 'Category', 'everse' ),
		'tag' => esc_attr__( 'Tag', 'everse' ),
		'author' => esc_attr__( 'Author', 'everse' ),
	),
) );


/**
* Socials Share Buttons
*/

// Social Share Buttons
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_post_share_buttons_show',
	'label'       => esc_attr__( 'Show share buttons', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => true,
) );

// Facebook Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_facebook',
	'label'       => esc_attr__( 'Facebook', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => true,
) );

// Twitter Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_twitter',
	'label'       => esc_attr__( 'Twitter', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => true,
) );

// Linkedin Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_linkedin',
	'label'       => esc_attr__( 'Linkedin', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => true,
) );

// Pinterest Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_pinterest',
	'label'       => esc_attr__( 'Pinterest', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_pocket',
	'label'       => esc_attr__( 'Pocket', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );

// Facebook Messenger Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_facebook_messenger',
	'label'       => esc_attr__( 'Facebook Messenger', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_whatsapp',
	'label'       => esc_attr__( 'Whatsapp', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_viber',
	'label'       => esc_attr__( 'Viber', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_telegram',
	'label'       => esc_attr__( 'Telegram', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_reddit',
	'label'       => esc_attr__( 'Reddit', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'everse_settings_share_email',
	'label'       => esc_attr__( 'Email', 'everse' ),
	'section'     => 'everse_settings_social_share',
	'default'     => false,
) );


/**
* Read More
*/

// Read More Show
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'everse_settings_read_more_show',
	'label'       => esc_attr__( 'Show read more', 'everse' ),
	'section'     => 'everse_settings_read_more',
	'default'     => true,
) );

// Read More Text
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'text',
	'settings'    => 'everse_settings_read_more_text',
	'label'       => esc_attr__( 'Read more text', 'everse' ),
	'section'     => 'everse_settings_read_more',
	'default'     => esc_html__( 'Read More', 'everse' ),
) );