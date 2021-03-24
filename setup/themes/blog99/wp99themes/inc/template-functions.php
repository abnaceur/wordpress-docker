<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blog99_body_classes( $classes ) {

	$classes[] = "wp99theme";

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {

		$classes[] = 'no-sidebar';
	}

	/**
	 * Blog99 Sidebar functions
	 * 
	 * @since 1.0.0
	*/
	$classes[] = 'blog99-'.blog99_get_sidebar_layout();
	

	/**
	 * Blog99 Theme layout class
	 * 
	 * @since 1.0.0
	*/
	$classes[] = get_theme_mod( 'blog99_theme_layout_settings','blog99-wide-layout' );
	

	/**
	 * Blog99 Theme layout class
	 * 
	 * @since 1.0.0
	*/
	$classes[] = 'blog99-blog-style-'.get_theme_mod( 'blog99_blog_style','list' );
	

	/**
	 * Get Breadcrumb Section
	 * @since 1.0.0
	 */
	//$classes[] = get_theme_mod('blog99_breadcrumb_position_layout','blog99-breadcrumb-center');


	/**
	 * Get Breadcrumb Section
	 * @since 1.0.0
	 */
	$classes[] = 'blog99-header-'.get_theme_mod('blog99_header_layout','two');

	/**
	 * sticky menu
	 * @since 1.0.0
	 */
	$enable_sticky_menu = get_theme_mod('blog99_header_enable_sticky_menu',false);
	
    if( $enable_sticky_menu ){

		$classes[] = 'blog99-sticky-menu';
	}

	/**
	 * Disable sidebar sticky
	 * @since 1.0.0
	 */
	$enable_sticky_menu = get_theme_mod('blog99_disable_sidebar_sticky',false);

	if( !$enable_sticky_menu ){

		$classes[] = 'blog99-sidebar-sticky-enable';
	}
	
	/**
	 * Disable sidebar sticky
	 * @since 1.0.0
	 */
	$enable_dark_version = get_theme_mod('blog99_enable_dark_version',false);

	if( $enable_dark_version ){

		$classes[] = 'blog99-dark-version-theme';
	}
	

	return $classes;
}
add_filter( 'body_class', 'blog99_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blog99_pingback_header() {
    
	if ( is_singular() && pings_open() ) {

		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blog99_pingback_header' );

/**
 * Footer Copyright Information
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'blog99_footer_copyright_action' ) ){

    function blog99_footer_copyright_action() {

        $copyright = blog99_banner_footer_copyright_callback(); 

        if( !empty( $copyright ) ) { 

            echo esc_html ( apply_filters( 'blog99_copyright_text', $copyright ) ); 

        } else { 

            echo esc_html( apply_filters( 'blog99_copyright_text', esc_html__('Copyright  &copy; ','blog99') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );
        }

		printf( ' WordPress Theme : By %1$s', '<a href=" ' . esc_url('https://wp99themes.com/') . ' " rel="designer" target="_blank">'.esc_html__('WP99 Themes','blog99').'</a>' );
		
    }
}
add_action( 'blog99_copyright', 'blog99_footer_copyright_action', 5 );



if ( ! function_exists( 'blog99_get_post_thumbnail' ) ){

	function blog99_get_post_thumbnail(){

		global $post;

		$postformat = get_post_format();

		//select the icon for post format
		if( $postformat == 'gallery' ){

			if (function_exists('has_block') && has_block('gallery', $post->post_content)) {
				
                $post_blocks = parse_blocks($post->post_content);
				
                $key = array_search('core/gallery', array_column($post_blocks, 'blockName'));
				
                $gallery_attachment_ids = $post_blocks[$key]['attrs']['ids'];
			
            }else {
				// gets the gallery info
				$gallery = get_post_gallery( $post->ID, false );

				$gallery_attachment_ids = array();

				if( count($gallery) and isset($gallery['ids'])) {
					// makes an array of image ids
					$gallery_attachment_ids = explode ( ",", $gallery['ids'] );
				}
			}

			if ( ! empty( $gallery_attachment_ids ) ) : ?>

				<div class="blog99-main-slider owl-carousel owl-theme">
					<?php foreach ( $gallery_attachment_ids as $gallery_attachment_id ) : ?>
						<div class="item">

							<?php echo wp_get_attachment_image( $gallery_attachment_id, 'full' ); ?>
						
                        </div>

					<?php endforeach; ?>
				</div>
			<?php else:

				blog99_get_default_thumbnail();

			endif;

		}elseif( $postformat == 'audio' ){

			$content = apply_filters( 'the_content', get_the_content() );
			$audio   = get_media_embedded_in_content( $content, array( 'audio', 'iframe' ) );
			
            ?>
    			<div class="post-format-media post-format-media--audio">
    				<?php if ( ! empty( $audio ) ) : ?>
    					<div class="post-format-audio">
    						<?php echo $audio[0]; ?>
    					</div>
    				<?php endif; ?>
    			</div>
		    <?php

		} else if( $postformat == 'video' ){
			
            $content = apply_filters( 'the_content', get_the_content() );
			
            $video   = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
			
            if ( ! empty( $video ) ) : ?>

				<div class="post-format-video">

					<?php echo $video[0]; ?>

				</div>

			<?php endif;

		}else{

			blog99_get_default_thumbnail();
		}
		
	}
}

if ( ! function_exists( 'blog99_get_default_thumbnail' ) ){

	function blog99_get_default_thumbnail(){

		if( has_post_thumbnail() ){

			the_post_thumbnail('post-thumbnail');

		}else{
			//grident-section.jpg
			echo '<div class="blog99-no-single-image">';

			 echo '<img src="'.esc_url( BLOG99_THEME_IMG . 'dummyimage.png' ).'" />';
			
            echo '</div>';
		}
	}
}



/**
 * Add a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @param stdClass $args An array of arguments.
 * @param string   $item Menu item.
 * @param int      $depth Depth of the current menu item.
 *
 * @return stdClass $args An object of wp_nav_menu() arguments.
 */
function blog99_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

    // Add sub menu toggles to the Expanded Menu with toggles.

        // Wrap the menu item link contents in a div, used for positioning.
        $args->before = '<div class="ancestor-wrapper">';
        $args->after  = '';

        // Add a toggle to items with children.
        if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

            $toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';

            // Add the sub menu toggle.
            $args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>';

        }

        // Close the wrapper.
        $args->after .= '</div><!-- .ancestor-wrapper -->';

    return $args;

}
add_filter( 'nav_menu_item_args', 'blog99_add_sub_toggles_to_main_menu', 10, 3 );


/**
 * Custom page walker for this theme.
 *
 * @package Ikreate Themes
 * @subpackage Bussiness Roy
 * @since Bussiness Roy 1.0
 */

if ( ! class_exists( 'Blog99_Walker_Page' ) ) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Blog99_Walker_Page extends Walker_Page {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @see Walker::start_el()
         * @since 2.1.0
         *
         * @param string  $output       Used to append additional content. Passed by reference.
         * @param WP_Post $page         Page data object.
         * @param int     $depth        Optional. Depth of page. Used for padding. Default 0.
         * @param array   $args         Optional. Array of arguments. Default empty array.
         * @param int     $current_page Optional. Page ID. Default 0.
         */
        public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {

            if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ( $depth ) {
                $indent = str_repeat( $t, $depth );
            } else {
                $indent = '';
            }

            $css_class = array( 'page_item', 'page-item-' . $page->ID );

            if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
                $css_class[] = 'page_item_has_children';
            }

            if ( ! empty( $current_page ) ) {
                $_current_page = get_post( $current_page );
                if ( $_current_page && in_array( $page->ID, $_current_page->ancestors, true ) ) {
                    $css_class[] = 'current_page_ancestor';
                }
                if ( $page->ID === $current_page ) {
                    $css_class[] = 'current_page_item';
                } elseif ( $_current_page && $page->ID === $_current_page->post_parent ) {
                    $css_class[] = 'current_page_parent';
                }
            } elseif ( get_option( 'page_for_posts' ) === $page->ID ) {
                $css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
            $css_classes = $css_classes ? ' class="' . esc_attr( $css_classes ) . '"' : '';

            if ( '' === $page->post_title ) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf( __( '#%d (no title)', 'blog99' ), $page->ID );
            }

            $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
            $args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

            $atts                 = array();
            $atts['href']         = get_permalink( $page->ID );
            $atts['aria-current'] = ( $page->ID === $current_page ) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $args['list_item_before'] = '';
            $args['list_item_after']  = '';

            // Wrap the link in a div and append a sub menu toggle.
            if ( isset( $args['show_toggles'] ) && true === $args['show_toggles'] ) {
                // Wrap the menu item link contents in a div, used for positioning.
                $args['list_item_before'] = '<div class="ancestor-wrapper">';
                $args['list_item_after']  = '';

                // Add a toggle to items with children.
                if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {

                    $toggle_target_string = '.menu-modal .page-item-' . $page->ID . ' > ul';

                    // Add the sub menu toggle.
                    $args['list_item_after'] .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" aria-expanded="false"><i class="fas fa-angle-down"></i></button>';

                }

                // Close the wrapper.
                $args['list_item_after'] .= '</div><!-- .ancestor-wrapper -->';
            }

            // Add icons to menu items with children.
            if ( isset( $args['show_sub_menu_icons'] ) && true === $args['show_sub_menu_icons'] ) {
                if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
                    $args['list_item_after'] = '<span class="icon"></span>';
                }
            }

            $output .= $indent . sprintf(
                '<li%s>%s<a%s>%s%s%s</a>%s',
                $css_classes,
                $args['list_item_before'],
                $attributes,
                $args['link_before'],
                /** This filter is documented in wp-includes/post-template.php */
                apply_filters( 'the_title', $page->post_title, $page->ID ),
                $args['link_after'],
                $args['list_item_after']
            );

            if ( ! empty( $args['show_date'] ) ) {
                if ( 'modified' === $args['show_date'] ) {
                    $time = $page->post_modified;
                } else {
                    $time = $page->post_date;
                }

                $date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
                $output     .= ' ' . mysql2date( $date_format, $time );
            }
        }
    }
}