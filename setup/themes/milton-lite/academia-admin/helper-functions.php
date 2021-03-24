<?php

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_breadcrumbs' ) ) {
	function academiathemes_helper_display_breadcrumbs($post) {

		// if( ! is_object( $post ) ) return;

		if ( is_singular() ) {

			$meta_target_id = $post->ID;

			if ( $post->ID == 0 ) {
				global $wp_query;
				if ( isset( $wp_query->queried_object->ID ) ) { $meta_target_id = $wp_query->queried_object->ID; }
			}

			// Fetch custom field (default/displayed/hidden)
			$meta_breadcrumbs = get_post_meta( $meta_target_id, 'academiathemes_meta_breadcrumbs', true );

			if ( isset($meta_breadcrumbs) && $meta_breadcrumbs == 'hidden' ) { 
				// is hidden by custom field in current post/page
				return;
			}

		}

		// CONDITIONAL FOR "Breadcrumb NavXT" plugin OR Yoast SEO Breadcrumbs
		// https://wordpress.org/plugins/breadcrumb-navxt/

		if ( function_exists('bcn_display') ) { ?>
		<div class="site-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<p class="site-breadcrumbs-p"><?php bcn_display(); ?></p>
		</div><!-- .site-breadcrumbs--><?php }

		// CONDITIONAL FOR "Yoast SEO" plugin, Breadcrumbs feature
		// https://wordpress.org/plugins/wordpress-seo/
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div class="site-breadcrumbs"><p class="site-breadcrumbs-p">','</p></div>');
		}

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_title' ) ) {
	function academiathemes_helper_display_title($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		// Fetch custom field for this post/page
		$meta_hide_title = get_post_meta( $post->ID, 'academiathemes_meta_hide_title', true );

		if ( isset($meta_hide_title) && $meta_hide_title == 1 ) { 
			// is hidden by custom field in current post/page
			return;
		}

		if ( is_home() ) { 
			$blog_title = get_the_title( get_option('page_for_posts', true) );
			echo '<h1 class="page-title">'. $blog_title .'</h1>';
		} else {
			the_title( '<h1 class="page-title">', '</h1>' );
		}
	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_entry_title' ) ) {
	function academiathemes_helper_display_entry_title($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		return the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>', 0 );

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_datetime' ) ) {
	function academiathemes_helper_display_datetime($post) {
		
		global $post;
		if( ! is_object( $post ) ) return;

		return '<p class="entry-descriptor"><span class="entry-descriptor-span"><time class="entry-date published" datetime="' . esc_attr(get_the_date('c')) . '">' . get_the_date() . '</time></span></p>';

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_excerpt' ) ) {
	function academiathemes_helper_display_excerpt($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		return '<p class="entry-excerpt">' . get_the_excerpt() . '</p>';

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_button_readmore' ) ) {
	function academiathemes_helper_display_button_readmore($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		return '<p class="entry-actions"><span class="site-readmore-span"><a href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( 'Continue Reading: %s', 'milton-lite' ), the_title_attribute( 'echo=0' ) ) . '" class="site-readmore-anchor" rel="bookmark">' . __('Read More','milton-lite') . '</a></span></p>';
		
	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_comments' ) ) {
	function academiathemes_helper_display_comments($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		if ( comments_open() || get_comments_number() > 0 ) :

			echo '<div id="academia-comments"">';
			comments_template();
			echo '</div><!-- #academia-comments -->';

		endif;

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_content' ) ) {
	function academiathemes_helper_display_content($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		echo '<div class="entry-content">';
			
			the_content();
			
			wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'milton-lite').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));

		echo '</div><!-- .entry-content -->';

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_tags' ) ) {
	function academiathemes_helper_display_tags($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		$themeoptions_hide_post_tags = esc_attr(get_theme_mod( 'theme-hide-post-tags', 0 ));

		if ( $themeoptions_hide_post_tags == 1 ) {
			return;
		}

		// Fetch custom field for this post/page
		$meta_hide_tags = get_post_meta( $post->ID, 'academiathemes_meta_hide_tags', true );

		if ( isset($meta_hide_tags) && $meta_hide_tags == 1 ) { 
			// is hidden by custom field in current post/page
			return;
		}

		if ( get_post_type($post->ID) == 'post' ) { 
			the_tags( '<p class="post-meta post-tags"><strong>'.__('Tags', 'milton-lite').':</strong> ', ', ', '</p>');
		}

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_postmeta' ) ) {
	function academiathemes_helper_display_postmeta($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		if ( get_post_type($post->ID) == 'post' ) { 

			$themeoptions_hide_post_dates = esc_attr(get_theme_mod( 'theme-hide-post-dates', 0 ));
			$themeoptions_hide_post_categories = esc_attr(get_theme_mod( 'theme-hide-post-categories', 0 ));

			if ( $themeoptions_hide_post_dates == 1 && $themeoptions_hide_post_categories == 1 ) {
				return;
			}

			// Fetch custom field for this post/page
			$meta_hide_date = get_post_meta( $post->ID, 'academiathemes_meta_hide_date', true );
			$meta_hide_categories = get_post_meta( $post->ID, 'academiathemes_meta_hide_categories', true );

			if ( ( isset($meta_hide_date) && $meta_hide_date == 1 ) && ( isset($meta_hide_categories) && $meta_hide_categories == 1 ) ) {
				return;
			}

			echo '<p class="entry-tagline">';

			if ( $themeoptions_hide_post_dates != 1 ) {
				if ( !isset($meta_hide_date) || ( isset($meta_hide_date) && $meta_hide_date != 1 ) ) { 
					echo '<span class="post-meta-span"><time datetime="' . get_the_time("Y-m-d") . '" pubdate>' . get_the_time(get_option('date_format')) . '</time></span>';
				}
			}

			if ( $themeoptions_hide_post_categories != 1 ) {
				if ( !isset($meta_hide_categories) || ( isset($meta_hide_categories) && $meta_hide_categories != 1 ) ) { 
					echo '<span class="post-meta-span category">'; 
					the_category(', '); 
					echo '</span>';
				}
			}

			echo '</p><!-- .entry-tagline -->';

		}

	}
}

// Get Header Style
if( ! function_exists( 'academiathemes_helper_get_header_style' ) ) {
	function academiathemes_helper_get_header_style() {

		global $post;

		$themeoptions_header_style = esc_attr(get_theme_mod( 'theme-header-style', 'default' ));

		if ( $themeoptions_header_style == 'default' ) {
			$default_position = 'page-header-default';
		} elseif ( $themeoptions_header_style == 'centered' ) {
			$default_position = 'page-header-centered';
		}

		return $default_position;
	}
}

// Get Sidebar Position for Current Page or Post
if( ! function_exists( 'academiathemes_helper_get_sidebar_position' ) ) {
	function academiathemes_helper_get_sidebar_position() {

		global $post;

		$themeoptions_sidebar_position = esc_attr(get_theme_mod( 'theme-sidebar-primary', 'left' ));
		$default_position = 'page-sidebar-left';

		if ( $themeoptions_sidebar_position == 'left' ) {
			$default_position = 'page-sidebar-left';
		} elseif ( $themeoptions_sidebar_position == 'right' ) {
			$default_position = 'page-sidebar-right';
		} elseif ( $themeoptions_sidebar_position == 'hidden' ) {
			$default_position = 'page-sidebar-hidden';
		}

		if ( is_page() ) {
			$template_file = get_post_meta($post->ID, '_wp_page_template', TRUE);
			if ( isset($template_file) && $template_file == 'page-templates/fullwidth.php' ) {
				$default_position = 'page-sidebar-hidden';
			}
		}

		return $default_position;
	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_page_slideshow' ) ) {
	function academiathemes_helper_display_page_slideshow ( $post,$location ) {

		global $post;

		$meta_target_id = $post->ID;

		if ( $post->ID == 0 ) {
			global $wp_query;
			if ( isset( $wp_query->queried_object->ID ) ) { $meta_target_id = $wp_query->queried_object->ID; }
		}

		$themeoptions_display_featured_hero = esc_attr(get_theme_mod( 'theme-display-post-featured-image', 1 ));

		if ( $themeoptions_display_featured_hero != '1' ) {
			return;
		}

		get_template_part('slideshow','single');

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_page_sidebar_column' ) ) {
	function academiathemes_helper_display_page_sidebar_column() {

		$display_sidebar_position = academiathemes_helper_get_sidebar_position();
		$related_pages_position = esc_attr(get_theme_mod( 'theme-related-pages-position', 'secondary' ));

		if ( isset($display_sidebar_position) && ( $display_sidebar_position == 'page-sidebar-hidden' || $display_sidebar_position == '0' ) ) {
			return;
		}

		?><div id="site-aside-primary" class="site-column site-column-aside">
			<div class="site-column-wrapper site-aside-wrapper clearfix">
				<?php 
				get_sidebar();
				?>
			</div><!-- .site-column-wrapper .site-aside-wrapper .clearfix -->
		</div><!-- #site-aside-primary .site-column site-column-aside --><?php

	}
}

// Content Column Wrapper Start
if( ! function_exists( 'academiathemes_helper_display_page_content_wrapper_start' ) ) {
	function academiathemes_helper_display_page_content_wrapper_start() {

		//

	}
}

// Content Column Wrapper Start
if( ! function_exists( 'academiathemes_helper_display_page_content_wrapper_end' ) ) {
	function academiathemes_helper_display_page_content_wrapper_end() {

		//

	}
}

// Page/Post Title
if( ! function_exists( 'academiathemes_helper_display_authorbio' ) ) {
	function academiathemes_helper_display_authorbio($post) {

		global $post;
		if( ! is_object( $post ) ) return;

		if ( get_post_type($post->ID) == 'post' ) { 

			$themeoptions_hide_post_authorbio = esc_attr(get_theme_mod( 'theme-hide-post-authorbio', 0 ));

			if ( $themeoptions_hide_post_authorbio == 1 ) {
				return;
			}

			// Fetch custom field for this post/page
			$meta_hide_authorbio = get_post_meta( $post->ID, 'academiathemes_meta_hide_author', true );

			if ( isset($meta_hide_authorbio) && $meta_hide_authorbio == 1 ) { 
				// is hidden by custom field in current post/page
				return;
			}

			?><div class="entry-authorbio-wrapper clearfix">
				
				<?php echo get_avatar( get_the_author_meta( 'ID' ) , 80 ); ?>

				<div class="author-description clearfix">

					<h3 class="author-title"><?php the_author_posts_link(); ?></h3>

					<?php if ( get_the_author_meta( 'user_url' ) || get_the_author_meta( 'facebook_url' ) || get_the_author_meta( 'twitter' ) || get_the_author_meta( 'instagram_url' ) ) {
					?><div class="author-links"><?php 
					if ( get_the_author_meta( 'user_url' ) ) { ?><a rel="external nofollow noopener" class="author_website" href="<?php the_author_meta( 'user_url' ); ?>" target="_blank"><span class="fa fa-link"></span></a><?php } 
					if ( get_the_author_meta( 'facebook_url' ) ) { ?><a rel="external nofollow noopener" class="author_facebook" href="<?php the_author_meta( 'facebook_url' ); ?>" target="_blank"><span class="fa fa-facebook-square"></span></a><?php } 
					if ( get_the_author_meta( 'twitter' ) ) { ?><a rel="external nofollow noopener" class="author_twitter" href="https://twitter.com/<?php the_author_meta( 'twitter' ); ?>" target="_blank"><span class="fa fa-twitter"></span></a><?php } 
					if ( get_the_author_meta( 'instagram_url' ) ) { ?><a rel="external nofollow noopener" class="author_instagram" href="https://instagram.com/<?php the_author_meta( 'instagram_url' ); ?>" target="_blank"><span class="fa fa-instagram"></span></a><?php } ?></div><!-- .author-links --><?php } ?>

					<div class="author-bio"><?php the_author_meta( 'description' ); ?></div>

				</div><!-- .author-description -->

			</div><!-- .entry-authorbio-wrapper .clearfix --><?php

		}

	}
}

if( ! function_exists( 'academiathemes_helper_verify_hexcolor' ) ) {
	function academiathemes_helper_verify_hexcolor($color) {

		//Check for a hex color string '#123456'
		if (preg_match('/^#[a-f0-9]{6}$/i', $color)) {
			return $color;
		} elseif (preg_match('/^[a-f0-9]{6}$/i', $color)) //hex color is valid
		{
			return '#' . trim(strtolower($color));
		}
	}
}

/* Convert HEX color to RGB value (for the customizer)						
==================================== */

if( ! function_exists( 'academiathemes_hex2rgb' ) ) {
	function academiathemes_hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);
		
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = "$r, $g, $b";
		return $rgb; // returns an array with the rgb values
	}
}

/**
 * Adds a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param WP_Post  $item  Menu item data object.
 * @param int      $depth Depth of menu item. Used for padding.
 * @return stdClass An object of wp_nav_menu() arguments.
 */
function milton_lite_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		$args->after  = '';

		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$args->after .= '<button class="sub-menu-toggle toggle-anchor"><span class="screen-reader-text">' . __( 'Show sub menu', 'milton-lite' ) . '</span><span class="dashicons dashicons-arrow-down-alt2"></span></span></button>';

		}
	} 

	return $args;

}

add_filter( 'nav_menu_item_args', 'milton_lite_add_sub_toggles_to_main_menu', 10, 3 );