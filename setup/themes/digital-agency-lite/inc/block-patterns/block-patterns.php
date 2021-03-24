<?php
/**
 * Digital Agency Lite: Block Patterns
 *
 * @package Digital Agency Lite
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'digital-agency-lite',
		array( 'label' => __( 'Digital Agency Lite', 'digital-agency-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'digital-agency-lite/banner-section',
		array(
			'title'      => __( 'Banner Section', 'digital-agency-lite' ),
			'categories' => array( 'digital-agency-lite' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":5979,\"dimRatio\":0,\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull banner-section\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"style\":{\"color\":{\"text\":\"#111111\"}}} -->\n<h1 class=\"has-text-align-left has-text-color\" style=\"color:#111111\">Te obtinuit ut adepto satis somno. Allisque institoribus iter</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#111111\"}}} -->\n<p class=\"has-text-color\" style=\"color:#111111\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard. Lorem Ipsum</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"gradient\":\"linear-gradient(100deg,rgb(250,124,66) 0%,rgb(250,90,86) 100%)\"}},\"className\":\"btn\"} -->\n<div class=\"wp-block-button btn\"><a class=\"wp-block-button__link has-background no-border-radius\" style=\"background:linear-gradient(100deg,rgb(250,124,66) 0%,rgb(250,90,86) 100%)\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"className\":\"circle-banner-section\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center circle-banner-section\"><!-- wp:image {\"align\":\"center\",\"id\":5679,\"width\":360,\"height\":360,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner-circle.png\" alt=\"\" class=\"wp-image-5679\" width=\"360\" height=\"360\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'digital-agency-lite/services-section',
		array(
			'title'      => __( 'Services Section', 'digital-agency-lite' ),
			'categories' => array( 'digital-agency-lite' ),
			'content'    => "<!-- wp:cover {\"overlayColor\":\"white\",\"align\":\"wide\",\"className\":\"article-outer-box\"} -->\n<div class=\"wp-block-cover alignwide has-white-background-color has-background-dim article-outer-box\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"color\":{\"text\":\"#fa5a56\"}}} -->\n<h2 class=\"has-text-align-center has-text-color\" style=\"color:#fa5a56\">OUR SERVICES</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"black\"} -->\n<p class=\"has-text-align-center has-black-color has-text-color\">We do awesome Services for our clients. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"black\"} -->\n<p class=\"has-text-align-center has-black-color has-text-color\">Check some of our Services</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"align\":\"wide\",\"className\":\"article-container\"} -->\n<div class=\"wp-block-columns alignwide article-container\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"customOverlayColor\":\"#f7f7f7\",\"className\":\"article-section\"} -->\n<div class=\"wp-block-cover has-background-dim article-section\" style=\"background-color:#f7f7f7\"><div class=\"wp-block-cover__inner-container\"><!-- wp:image {\"align\":\"center\",\"id\":5691,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services1.png\" alt=\"\" class=\"wp-image-5691\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"level\":3,\"style\":{\"color\":{\"text\":\"#111111\"}}} -->\n<h3 class=\"has-text-align-left has-text-color\" style=\"color:#111111\">Buildrop design style</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"textColor\":\"black\"} -->\n<p class=\"has-text-align-left has-black-color has-text-color\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"customOverlayColor\":\"#f7f7f7\",\"className\":\"article-section\"} -->\n<div class=\"wp-block-cover has-background-dim article-section\" style=\"background-color:#f7f7f7\"><div class=\"wp-block-cover__inner-container\"><!-- wp:image {\"align\":\"center\",\"id\":5696,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services2.png\" alt=\"\" class=\"wp-image-5696\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"level\":3,\"style\":{\"color\":{\"text\":\"#111111\"}}} -->\n<h3 class=\"has-text-align-left has-text-color\" style=\"color:#111111\">Buildrop design style</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"textColor\":\"black\"} -->\n<p class=\"has-text-align-left has-black-color has-text-color\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"customOverlayColor\":\"#f7f7f7\",\"className\":\"article-section\"} -->\n<div class=\"wp-block-cover has-background-dim article-section\" style=\"background-color:#f7f7f7\"><div class=\"wp-block-cover__inner-container\"><!-- wp:image {\"align\":\"center\",\"id\":5700,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services3.png\" alt=\"\" class=\"wp-image-5700\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"level\":3,\"style\":{\"color\":{\"text\":\"#111111\"}}} -->\n<h3 class=\"has-text-align-left has-text-color\" style=\"color:#111111\">Buildrop design style</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"textColor\":\"black\"} -->\n<p class=\"has-black-color has-text-color\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Write title\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\"></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->",
		)
	);
}