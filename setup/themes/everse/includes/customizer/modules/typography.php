<?php
/**
 * Customizer Typography
 *
 * @package Everse
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Add custom choice
 */
if ( ! function_exists( 'everse_add_custom_choice' ) ) {
	function everse_add_custom_choice() {
		return array(
			'fonts' => apply_filters( 'everse_kirki_font_choices', array() )
		);
	}
}

/*-------------------------------------------------------*/
/* Headings
/*-------------------------------------------------------*/

// H1
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_headings_h1',
	'label'       => esc_html__( 'H1 Headings', 'everse' ),
	'section'     => 'everse_settings_typography_headings',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '42px',
		'font-weight' => '700',
		'line-height' => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h1'],
		),
		array(
			'element' => '.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H2
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_headings_h2',
	'label'       => esc_html__( 'H2 Headings', 'everse' ),
	'section'     => 'everse_settings_typography_headings',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '34px',
		'font-weight' => '700',
		'line-height' => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h2'],
		),
		array(
			'element' => '.edit-post-visual-editor h2.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H3
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_headings_h3',
	'label'       => esc_html__( 'H3 Headings', 'everse' ),
	'section'     => 'everse_settings_typography_headings',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '28px',
		'font-weight' => '700',
		'line-height' => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h3'],
		),
		array(
			'element' => '.edit-post-visual-editor h3.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H4
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_headings_h4',
	'label'       => esc_html__( 'H4 Headings', 'everse' ),
	'section'     => 'everse_settings_typography_headings',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '24px',
		'font-weight' => '700',
		'line-height' => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h4'],
		),
		array(
			'element' => '.edit-post-visual-editor h4.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H5
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_headings_h5',
	'label'       => esc_html__( 'H5 Headings', 'everse' ),
	'section'     => 'everse_settings_typography_headings',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '20px',
		'font-weight' => '700',
		'line-height' => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h5'],
		),
		array(
			'element' => '.edit-post-visual-editor h5.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H6
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_headings_h6',
	'label'       => esc_html__( 'H6 Headings', 'everse' ),
	'section'     => 'everse_settings_typography_headings',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '16px',
		'font-weight' => '700',
		'line-height' => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => 'h6',
		),
		array(
			'element' => '.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// Body typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_body_typography',
	'label'       => esc_html__( 'Body Text', 'everse' ),
	'description' => esc_html__( 'Select the body text typography.', 'everse' ),
	'help'        => esc_html__( 'The typography options you set here apply to all content on your site.', 'everse' ),
	'section'     => 'everse_settings_typography_body_text',
	'default'     => array(
		'font-family'    => $body_font,
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => 'normal',
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['text'],
		),
		array(
			'element' => '.editor-styles-wrapper.edit-post-visual-editor',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Blog
/*-------------------------------------------------------*/

// Post title typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_post_title_typography',
	'label'       => esc_html__( 'Post title', 'everse' ),
	'description' => esc_html__( 'Applies above 1200px,', 'everse' ),
	'section'     => 'everse_settings_typography_blog_text',
	'default'     => array(
		'font-size'   => '42px',
		'line-height' => '1.2',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.single-post__entry-title',
			'media_query' => $bp_xl_up,
		),
		array(
			'element' => '.edit-post-visual-editor .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
			'media_query' => $bp_xl_up,
		)
	),
	'transport' => 'auto',
));

// Post typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_post_typography',
	'label'       => esc_html__( 'Post body text', 'everse' ),
	'section'     => 'everse_settings_typography_blog_text',
	'default'     => array(
		'font-size'      => '18px',
		'line-height'    => '1.8',
		'letter-spacing' => 'normal',
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.entry__article',
		),
		array(
			'element' => '.editor-styles-wrapper.edit-post-visual-editor',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// Blog meta typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_blog_meta_typography',
	'label'       => esc_html__( 'Blog Meta', 'everse' ),
	'section'     => 'everse_settings_typography_blog_text',
	'default'     => array(
		'font-family'    => $body_font,
		'font-size'      => '14px',
		'font-weight'		 => 'normal',
		'letter-spacing' => 'normal',
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.entry__meta-item',
		),
	),
	'transport' => 'auto',
));

// Read more link typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_read_more_typography',
	'label'       => esc_html__( 'Read More Link', 'everse' ),
	'section'     => 'everse_settings_typography_blog_text',
	'default'     => array(
		'font-size'      => '16px',
		'font-weight'		 => 'normal',		
		'letter-spacing' => 'normal',
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.read-more',
		),
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Forms
/*-------------------------------------------------------*/

// Buttons typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_buttons_typography',
	'label'       => esc_html__( 'Buttons', 'everse' ),
	'section'     => 'everse_settings_typography_forms_text',
	'default'     => array(
		'font-family'    => $heading_font,
		'font-weight'		 => '700',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['buttons'],
		),
		array(
			'element'  => isset( $selectors['learndash_buttons'] ) ? $selectors['learndash_buttons'] : null,
		),
		array(
			'element' => '.wp-block-button .wp-block-button__link',
			'context' => array( 'editor' ),			
		)
	),
	'transport' => 'auto',
));

// Labels typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_labels_typography',
	'label'       => esc_html__( 'Labels', 'everse' ),
	'section'     => 'everse_settings_typography_forms_text',
	'default'     => array(
		'font-family'    => $heading_font,
		'font-size'			 => '12px',
		'font-weight'		 => '700',
		'letter-spacing' => 'normal',
		'text-transform' => 'uppercase'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => 'label',
		),
	),
	'transport' => 'auto',
));

// Input fields typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_input_fields_typography',
	'label'       => esc_html__( 'Input Fields', 'everse' ),
	'section'     => 'everse_settings_typography_forms_text',
	'default'     => array(
		'font-size'			 => '15px',
		'font-weight'		 => 'normal',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => 'input, select, textarea',
		),
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Shop
/*-------------------------------------------------------*/

// Shop typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_shop_product_titles_typography',
	'label'       => esc_html__( 'Product titles', 'everse' ),
	'description' => esc_html__( 'Will apply only on big screens', 'everse' ),
	'section'     => 'everse_settings_shop_text',
	'default'     => array(
		'font-size'			 => '16px',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element'			=> '.woocommerce ul.products li.product .woocommerce-loop-product__title',
			'media_query' => $bp_lg_up,
		),
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Header
/*-------------------------------------------------------*/

// Menu Links typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_menu_links_typography',
	'label'       => esc_html__( 'Menu Links', 'everse' ),
	'section'     => 'everse_settings_typography_header',
	'default'     => array(
		'font-family' => $body_font,
		'font-weight' => '600',
		'font-size'		=> '16px',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.nav__menu > li > a',
		),
	),
	'transport' => 'auto',
));

// Dropdown menu Links typography
Kirki::add_field( 'everse_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'everse_settings_dropdown_menu_links_typography',
	'label'       => esc_html__( 'Dropdown Menu Links', 'everse' ),
	'section'     => 'everse_settings_typography_header',
	'default'     => array(
		'font-family' => $body_font,
		'font-weight' => '400',
		'font-size'		=> '16px',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => everse_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.nav__dropdown-menu li a',
		),
	),
	'transport' => 'auto',
));