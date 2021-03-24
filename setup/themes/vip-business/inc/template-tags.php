<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Vip_Business
 */

if ( ! function_exists( 'vip_business_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function vip_business_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.

	}
endif;

if ( ! function_exists( 'vip_business_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function vip_business_posted_by() {
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		echo '<span class="byline">' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.

	}
endif;

if ( ! function_exists( 'vip_business_posted_by_outside_loop' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function vip_business_posted_by_outside_loop() {
		$author_id = get_post_field( 'post_author', get_the_ID() );

		$author = get_user_by( 'ID', $author_id );
		
		// Get user display name
		$author_display_name = $author->display_name;
		
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( $author_display_name ) . '</a></span>';

		echo '<span class="byline">' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.

	}
endif;

if ( ! function_exists( 'vip_business_posted_cats' ) ) :
	/**
	 * Prints HTML with meta information for the current post's category.
	 */
	function vip_business_posted_cats() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'vip-business' ) );
			
			if ( $categories_list ) {
				if ( is_single() ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'vip-business' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
				} else {
					echo '<span class="cat-links">' . $categories_list . '</span>';
				}
			}
		}
	}
endif;

if ( ! function_exists( 'vip_business_posted_tags' ) ) :
	/**
	 * Prints HTML with meta information for the current post's tags.
	 */
	function vip_business_posted_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'vip-business' ) );
			if ( $tags_list ) {
				if ( is_single() ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'vip-business' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
				} else {
					echo '<span class="tags-links">' . $tags_list . '</span>';
				}
				
			}
		}
	}
endif;

if ( ! function_exists( 'vip_business_entry_header' ) ) :
	/**
	 * Prints HTML with meta information for the categories and posted date.
	 */
	function vip_business_entry_header() {
		vip_business_posted_on();

		vip_business_posted_by_outside_loop();
	}
endif;

if ( ! function_exists( 'vip_business_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function vip_business_entry_footer() {
		if ( is_single() ) {
			// Show tags only on single pages.
			vip_business_posted_tags();
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'vip-business' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'vip-business' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'vip_business_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function vip_business_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'vip_business_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since 1.0
 */
function vip_business_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

if ( ! function_exists( 'vip_business_get_featured_content_cats' ) ) :
	/**
	 * Returns HTML with meta information for the categories.
	 */
	function vip_business_get_featured_content_cats() {
		$output = '';

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( ' ' );

			if ( $categories_list ) {
				/* translators: 1: before html, 2: after html, 3: list of categories. */
				$output = sprintf( '<div class="new-cat"><span class="cat-links">' . esc_html__( '%1$sPosted in%2$s %3$s', 'vip-business' ) . '</span></div>', '<span class="screen-reader-text">', '</span>', $categories_list ); // WPCS: XSS OK.
			}

		}

		return $output;
	}
endif;

if ( ! function_exists( 'vip_business_featured_content_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function vip_business_featured_content_meta() {
		echo '<div class="entry-meta latest-posts-meta">';
		
		if ( 'post' === get_post_type() ) {
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link();
				echo '</span>';
			}
		}

		vip_business_posted_on();

		echo '</div><!-- .entry-meta latest-posts-meta -->';
	}
endif;
						
/**
 * Fooer Content
 */
function vip_business_footer() {
	if ( function_exists( 'wp_date' ) ) {
		echo sprintf( _x( 'Copyright &copy; %1$s %2$s %3$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'vip-business' ), esc_html( wp_date( __( 'Y', 'vip-business' ) ) ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>', esc_url( get_the_privacy_policy_link() ) ) . ' &#124; ' . esc_html__( 'VIP Business by', 'vip-business' ). '&nbsp;<a target="_blank" href="'. esc_url( 'https://fireflythemes.com' ) .'">Firefly Themes</a>';
	} else {
		echo sprintf( _x( 'Copyright &copy; %1$s %2$s %3$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'vip-business' ), esc_html( date_i18n( __( 'Y', 'vip-business' ) ) ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>', esc_url( get_the_privacy_policy_link() ) ) . ' &#124; ' . esc_html__( 'VIP Business by', 'vip-business' ). '&nbsp;<a target="_blank" href="'. esc_url( 'https://fireflythemes.com' ) .'">Firefly Themes</a>';
	}
	
}
add_action( 'vip_business_footer', 'vip_business_footer', 10 );

if ( ! function_exists( 'vip_business_section_title' ) ) :
	/**
	 * Prints HTML with Top Title, Title and Subtitle
	 */
	function vip_business_section_title( $section ) {
		$top_subtitle = vip_business_gtm( 'vip_business_' . $section . '_section_top_subtitle' );
		$title        = vip_business_gtm( 'vip_business_' . $section . '_section_title' );
		$subtitle     = vip_business_gtm( 'vip_business_' . $section . '_section_subtitle' );
		
		if ( $top_subtitle || $title || $subtitle ) : ?>
			<div class="section-title-wrap">
				<?php if ( $top_subtitle ) : ?>
				<p class="section-top-subtitle"><?php echo esc_html( $top_subtitle ); ?></p>
				<?php endif; ?>

				<?php if ( $title ) : ?>
				<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>

				<span class="divider"></span>
				<?php if ( $subtitle ) : ?>
				<p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif;
	}
endif;
