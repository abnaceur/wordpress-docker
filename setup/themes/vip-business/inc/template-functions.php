<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Vip_Business
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function vip_business_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class with respect to layout selected.
	$layout  = vip_business_get_theme_layout();
	$sidebar = vip_business_get_sidebar_id();

	$layout_class = "layout-no-sidebar-content-width";

	if ( 'no-sidebar-full-width' === $layout ) {
		$layout_class = 'layout-no-sidebar-full-width';
	} elseif ( 'right-sidebar' === $layout ) {
		if ( '' !== $sidebar ) {
			$layout_class = 'layout-right-sidebar';
		}
	}

	$classes[] = $layout_class;

	// Add Site Layout Class.
	$classes[] = esc_attr( vip_business_gtm( 'vip_business_layout_type' ) . '-layout' );

	// Add Archive Layout Class.
	$classes[] = 'grid';

	// Add header Style Class.
	$classes[] = esc_attr( vip_business_gtm( 'vip_business_header_style' ) );

	// Add Color Scheme Class.
	$classes[] = esc_attr( vip_business_gtm( 'vip_business_color_scheme' ) . '-color-scheme' );

	$vip_business_enable = vip_business_gtm( 'vip_business_header_image_visibility' );

	if ( ! vip_business_display_section( $vip_business_enable ) || ( ! has_header_image() && ! ( is_header_video_active() && has_header_video() ) ) ) {
    	$classes[] = 'no-header-media';
    }

	return $classes;
}
add_filter( 'body_class', 'vip_business_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function vip_business_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'vip_business_pingback_header' );

if ( ! function_exists( 'vip_business_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 */
	function vip_business_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		// Getting data from Theme Options
		$length	= vip_business_gtm( 'vip_business_excerpt_length' );

		return absint( $length );
	} // vip_business_excerpt_length.
endif;
add_filter( 'excerpt_length', 'vip_business_excerpt_length', 999 );

if ( ! function_exists( 'vip_business_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a option from customizer
	 *
	 * @return string option from customizer prepended with an ellipsis.
	 */
	function vip_business_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		$more_tag_text = vip_business_gtm( 'vip_business_excerpt_more_text' );

		$link = sprintf( '<a href="%1$s" class="more-link"><span class="more-button">%2$s</span></a>',
			esc_url( get_permalink() ),
			/* translators: %s: Name of current post */
			wp_kses_data( $more_tag_text ). '<span class="screen-reader-text">' . esc_html( get_the_title( get_the_ID() ) ) . '</span>'
		);

		return '&hellip;' . $link;
	}
endif;
add_filter( 'excerpt_more', 'vip_business_excerpt_more' );

if ( ! function_exists( 'vip_business_custom_excerpt' ) ) :
	/**
	 * Adds Continue reading link to more tag excerpts.
	 *
	 * function tied to the get_the_excerpt filter hook.
	 */
	function vip_business_custom_excerpt( $output ) {
		if ( is_admin() ) {
			return $output;
		}

		if ( has_excerpt() && ! is_attachment() ) {
			$more_tag_text = vip_business_gtm( 'vip_business_excerpt_more_text' );

			$link = sprintf( '<a href="%1$s" class="more-link"><span class="more-button">%2$s</span></a>',
				esc_url( get_permalink() ),
				/* translators: %s: Name of current post */
				wp_kses_data( $more_tag_text ). '<span class="screen-reader-text">' . esc_html( get_the_title( get_the_ID() ) ) . '</span>'
			);

			$output .= '&hellip;' . $link;
			
		}

		return $output;
	} // vip_business_custom_excerpt.
endif;
add_filter( 'get_the_excerpt', 'vip_business_custom_excerpt' );

if ( ! function_exists( 'vip_business_more_link' ) ) :
	/**
	 * Replacing Continue reading link to the_content more.
	 *
	 * function tied to the the_content_more_link filter hook.
	 */
	function vip_business_more_link( $more_link, $more_link_text ) {
		$more_tag_text = vip_business_gtm( 'vip_business_excerpt_more_text' );

		return str_replace( $more_link_text, wp_kses_data( $more_tag_text ), $more_link );
	} // vip_business_more_link.
endif;
add_filter( 'the_content_more_link', 'vip_business_more_link', 10, 2 );

/**
 * Filter Homepage Options as selected in theme options.
 */
function vip_business_alter_home( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$cats = vip_business_gtm( 'vip_business_front_page_category' );

		if ( $cats ) {
			$query->query_vars['category__in'] = explode( ',', $cats );
		}
	}
}
add_action( 'pre_get_posts', 'vip_business_alter_home' );

/**
 * Display section as selected in theme options.
 */
function vip_business_display_section( $option ) {
	if ( 'entire-site' === $option || ( is_front_page() && 'homepage' === $option ) || ( ! is_front_page() && 'excluding-home' === $option ) ) {
		return true;
	}

	// Section is disabled.
	return false;
}

/**
 * Return theme layout
 * @return layout
 */
function vip_business_get_theme_layout() {
	$layout = '';

	if ( is_page_template( 'templates/full-width-page.php' ) ) {
		$layout = 'no-sidebar-full-width';
	} elseif ( is_page_template( 'templates/right-sidebar.php' ) ) {
		$layout = 'right-sidebar';
	} else {
		$layout = vip_business_gtm( 'vip_business_default_layout' );

		if ( is_home() || is_archive() ) {
			$layout = vip_business_gtm( 'vip_business_homepage_archive_layout' );
		}
	}

	return $layout;
}

/**
 * Return theme layout
 * @return layout
 */
function vip_business_get_sidebar_id() {
	$sidebar = '';

	$layout = vip_business_get_theme_layout();

	if ( 'no-sidebar-full-width' === $layout || 'no-sidebar' === $layout ) {
		return $sidebar;
	}

	$sidebaroptions = '';

	// WooCommerce Shop Page excluding Cart and checkout.
	if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
		$shop_id        = get_option( 'woocommerce_shop_page_id' );
		$sidebaroptions = get_post_meta( $shop_id, 'vip-business-sidebar-option', true );
	} else {
		global $post, $wp_query;

		// Front page displays in Reading Settings.
		$page_on_front  = get_option( 'page_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );

		// Get Page ID outside Loop.
		$page_id = $wp_query->get_queried_object_id();
		// Blog Page or Front Page setting in Reading Settings.
		if ( $page_id == $page_for_posts || $page_id == $page_on_front ) {
	        $sidebaroptions = get_post_meta( $page_id, 'vip-business-sidebar-option', true );
	    } elseif ( is_singular() ) {
	    	if ( is_attachment() ) {
				$parent 		= $post->post_parent;
				$sidebaroptions = get_post_meta( $parent, 'vip-business-sidebar-option', true );

			} else {
				$sidebaroptions = get_post_meta( $post->ID, 'vip-business-sidebar-option', true );
			}
		}
	}

	if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() ) ) {
		$sidebar = 'sidebar-woo'; // WooCommerce Sidebar.
	} elseif ( 'optional-sidebar-one' === $sidebaroptions ) {
		$sidebar = 'sidebar-optional-one';
	} elseif ( 'optional-sidebar-two' === $sidebaroptions ) {
		$sidebar = 'sidebar-optional-two';
	} elseif ( 'optional-sidebar-three' === $sidebaroptions ) {
		$sidebar = 'sidebar-optional-three';
	} elseif ( is_front_page() || ( is_home() && $page_id != $page_for_posts ) ) {
		$sidebar = 'sidebar-optional-homepage';
	} elseif ( is_archive() || ( is_home() && $page_id != $page_for_posts ) ) {
		$sidebar = 'sidebar-optional-archive';
	} elseif ( is_page() ) {
		$sidebar = 'sidebar-optional-page';
	} elseif ( is_single() ) {
		$sidebar = 'sidebar-optional-post';
	}

	return is_active_sidebar( $sidebar ) ? $sidebar : 'sidebar-1'; // sidebar-1 is main sidebar.
}


/**
 * Function to add Scroll Up icon
 */
function vip_business_scrollup() {
	$disable_scrollup = vip_business_gtm( 'vip_business_band_disable_scrollup' );

	if ( $disable_scrollup ) {
		return;
	}

	echo '<a href="#masthead" id="scrollup" class="backtotop">' . '<span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'vip-business' ) . '</span></a>' ;

}
add_action( 'wp_footer', 'vip_business_scrollup', 1 );

/**
 * Return args for specific section type
 */
function vip_business_get_section_args( $section_name ) {
	$numbers = vip_business_gtm( 'vip_business_' . $section_name . '_number' );

	$args = array(
		'ignore_sticky_posts' => 1,
		'posts_per_page'       => absint( $numbers ),
	);

	$category = vip_business_gtm( 'vip_business_' . $section_name . '_category' );

	if ( $category ) {
		$args['cat'] = $category;
	}

	return $args;
}
