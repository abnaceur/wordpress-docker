<?php

/**
 * Core Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Everse
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
 * Checks if WooCommerce is activated
 * @return boolean
 */
if ( !function_exists( 'everse_is_woocommerce_activated' ) ) {
    function everse_is_woocommerce_activated()
    {
        return ( class_exists( 'WooCommerce' ) ? true : false );
    }

}
/**
 * Checks if LearnDash post
 * @return boolean
 */
if ( !function_exists( 'everse_is_learndash_post' ) ) {
    function everse_is_learndash_post()
    {
        if ( !class_exists( 'SFWD_LMS' ) ) {
            return;
        }
        if ( is_singular( 'sfwd-courses' ) || is_singular( 'sfwd-lessons' ) || is_singular( 'sfwd-topic' ) || is_singular( 'sfwd-quiz' ) || is_singular( 'sfwd-certificates' ) || is_singular( 'sfwd-assignment' ) ) {
            return true;
        }
        return false;
    }

}
/**
 * Shim for wp_body_open
 *
 * @since  1.0.0
 */
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open()
    {
        do_action( 'wp_body_open' );
    }

}
/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function everse_skip_link_focus_fix()
{
    // The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
    ?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php 
}

add_action( 'wp_print_footer_scripts', 'everse_skip_link_focus_fix' );
/**
 * Check if page built with Elementor
 *
 * @since  1.0.0
 */
function everse_is_elementor_page()
{
    $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
    if ( is_search() || is_archive() ) {
        return false;
    }
    
    if ( (bool) $elementor_page ) {
        return true;
    } else {
        return false;
    }

}

/**
* Gutenberg Check
*
* @since 1.0.0
*/
function everse_is_gutenberg()
{
    return function_exists( 'register_block_type' );
}

/**
 * Check if it's project CPT archive
 *
 * @since  1.0.0
 */
function everse_is_project()
{
    
    if ( is_tax( 'projects_categories' ) || is_post_type_archive( 'projects' ) ) {
        return true;
    } else {
        return false;
    }

}

/**
 * Check if it's service CPT archive
 *
 * @since  1.0.0
 */
function everse_is_service()
{
    
    if ( is_tax( 'services_categories' ) || is_post_type_archive( 'services' ) ) {
        return true;
    } else {
        return false;
    }

}

/**
 * Allow shorcodes in text widgets
 */
add_filter( 'widget_text', 'do_shortcode' );
/**
 * Custom excerpt length
 */
function everse_custom_excerpt_length( $length )
{
    if ( is_admin() ) {
        return;
    }
    $excerpt_length = get_theme_mod( 'everse_settings_posts_excerpt_settings', 55 );
    return $excerpt_length;
}

add_filter( 'excerpt_length', 'everse_custom_excerpt_length' );

if ( !function_exists( 'everse_embed_responsive_video' ) ) {
    /**
     * Add responsive container to embeds
     */
    function everse_embed_responsive_video(
        $cache,
        $url,
        $attr,
        $post_ID
    )
    {
        $classes = array();
        $classes_all = array( 'ratio', 'ratio-16x9', 'mb-32' );
        if ( false !== strpos( $url, 'twitter.com' ) ) {
            return $cache;
        }
        if ( false !== strpos( $url, 'vimeo.com' ) ) {
            $classes[] = 'embed-responsive-vimeo';
        }
        if ( false !== strpos( $url, 'youtube.com' ) ) {
            $classes[] = 'embed-responsive-youtube';
        }
        $classes = array_merge( $classes, $classes_all );
        return '<div class="' . esc_attr( implode( $classes, ' ' ) ) . '">' . $cache . '</div>';
    }
    
    add_filter(
        'embed_oembed_html',
        'everse_embed_responsive_video',
        10,
        4
    );
    add_filter( 'video_embed_html', 'everse_embed_responsive_video' );
    // Jetpack
}

if ( !function_exists( 'everse_sidebar' ) ) {
    /**
     * Get sidebar
     *
     * @since 1.0.0
     */
    function everse_sidebar( $sidebar = '' )
    {
        ?>
			<aside class="sidebar col-lg">
				<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">
					<?php 
        everse_sidebar_before();
        ?>
					<?php 
        dynamic_sidebar( $sidebar );
        ?>
					<?php 
        everse_sidebar_after();
        ?>
				</div> <!-- #secondary -->
			</aside>
		<?php 
    }

}
if ( !function_exists( 'everse_is_active_sidebar' ) ) {
    /**
     * Check if sidebar is active
     *
     * @since 1.0.0
     */
    function everse_is_active_sidebar( $sidebar = '', $default = 'right-sidebar' )
    {
        if ( 'fullwidth' !== everse_layout_type( $sidebar, $default ) && is_active_sidebar( 'everse-' . $sidebar . '-sidebar' ) ) {
            return true;
        }
    }

}
if ( !function_exists( 'everse_layout_type' ) ) {
    /**
     * Check layout type based on customizer and meta settings
     * @return string $type Layout type
     */
    function everse_layout_type( $type, $default = 'right-sidebar' )
    {
        $layout = '';
        $meta = get_post_meta( get_the_ID(), '_everse_page_layout', true );
        $page_for_posts = get_option( 'page_for_posts' );
        if ( is_home() && $page_for_posts ) {
            $meta = get_post_meta( $page_for_posts, '_everse_page_layout', true );
        }
        if ( is_archive() || is_404() || is_search() || is_home() ) {
            $meta = '';
        }
        if ( 'left-sidebar' == get_theme_mod( 'everse_settings_' . $type . '_layout_type', $default ) ) {
            $layout = ( $meta ? $meta : 'left-sidebar' );
        }
        if ( 'right-sidebar' == get_theme_mod( 'everse_settings_' . $type . '_layout_type', $default ) ) {
            $layout = ( $meta ? $meta : 'right-sidebar' );
        }
        if ( 'fullwidth' == get_theme_mod( 'everse_settings_' . $type . '_layout_type', $default ) ) {
            $layout = ( $meta ? $meta : 'fullwidth' );
        }
        return $layout;
    }

}
/**
 * Sanitize HTML input.
 *
 * @param string $input HTML input.
 * @return string
 */
function everse_sanitize_html( $input )
{
    return wp_kses( $input, array(
        'a'      => array(
        'href'   => array(),
        'target' => array(),
    ),
        'i'      => array(),
        'span'   => array(),
        'em'     => array(),
        'strong' => array(),
    ) );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function everse_body_classes( $classes )
{
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'everse-group-blog';
    }
    // Page Layout Class
    if ( is_page() ) {
        
        if ( everse_is_woocommerce_activated() ) {
            
            if ( is_front_page() ) {
                $classes[] = '';
            } elseif ( is_cart() || is_checkout() || is_account_page() ) {
                $classes[] = 'everse-' . everse_layout_type( 'shop_pages' );
            } else {
                $classes[] = 'everse-' . everse_layout_type( 'page' );
            }
        
        } else {
            $classes[] = 'everse-' . everse_layout_type( 'page' );
        }
    
    }
    // Blog Layout Class
    if ( is_single() || is_home() ) {
        
        if ( everse_is_woocommerce_activated() ) {
            
            if ( is_product() ) {
                $classes[] = '';
            } else {
                $classes[] = 'everse-' . everse_layout_type( 'blog' );
            }
        
        } elseif ( everse_is_learndash_post() ) {
            $classes[] = '';
        } else {
            $classes[] = 'everse-' . everse_layout_type( 'blog' );
        }
    
    }
    // Archives Layout Class
    if ( is_archive() ) {
        
        if ( everse_is_woocommerce_activated() ) {
            
            if ( is_shop() ) {
                $classes[] = '';
            } else {
                $classes[] = 'everse-' . everse_layout_type( 'archive', 'fullwidth' );
            }
        
        } else {
            $classes[] = 'everse-' . everse_layout_type( 'archive', 'fullwidth' );
        }
    
    }
    // Search Layout Class
    if ( is_search() ) {
        $classes[] = 'everse-' . everse_layout_type( 'search_results' );
    }
    // Shop Layout Class
    if ( everse_is_woocommerce_activated() ) {
        if ( !is_product() && is_woocommerce() || is_shop() ) {
            $classes[] = 'everse-' . everse_layout_type( 'shop', 'fullwidth' );
        }
    }
    $classes[] = '';
    return $classes;
}

add_filter( 'body_class', 'everse_body_classes' );
/**
 * Adds custom admin classes.
 *
 * @param string $classes Classes for the body element.
 * @return string
 */
function everse_admin_body_classes( $classes )
{
    $screen = get_current_screen();
    // Add blog layout class
    if ( $screen->id === "post" ) {
        $classes = 'everse-' . everse_layout_type( 'blog' );
    }
    // Add page layout class
    if ( $screen->id === "page" ) {
        $classes = 'everse-' . everse_layout_type( 'page' );
    }
    return $classes;
}

add_filter( 'admin_body_class', 'everse_admin_body_classes' );