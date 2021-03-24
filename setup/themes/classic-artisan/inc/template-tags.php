<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package classic_artisan
 */

if ( ! function_exists( 'classic_artisan_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author, as well as categories and tags.
 */
function classic_artisan_entry_footer() {
	if ( 'post' === get_post_type() ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		echo '<span class="byline"> ' . $byline . ', </span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'classic-artisan' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);

	// Only show meta on single.
	if ( is_single() ) {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'classic-artisan' ) );
			if ( $categories_list && classic_artisan_categorized_blog() ) {
				/* translators: %1$s is the category list */
				printf( '<p><span class="cat-links">' . esc_html__( 'Posted in %1$s. ', 'classic-artisan' ) . '</span>', $categories_list );
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'classic-artisan' ) );
			if ( $tags_list ) {
				/* translators: %1$s is the tags list */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s.', 'classic-artisan' ) . '</span>', $tags_list );
			}
		}
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function classic_artisan_categorized_blog() {
	if ( false === ( $categories = get_transient( 'classic_artisan_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$categories = count( $categories );

		set_transient( 'classic_artisan_categories', $categories );
	}

	if ( $categories > 1 ) {
		// This blog has more than 1 category so classic_artisan_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so classic_artisan_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in classic_artisan_categorized_blog.
 */
function classic_artisan_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'classic_artisan_categories' );
}
add_action( 'edit_category', 'classic_artisan_category_transient_flusher' );
add_action( 'save_post',     'classic_artisan_category_transient_flusher' );

/**
 * Display the footer site info/credits area.
 */
function classic_artisan_site_info() {
	$sep_span = '<span class="sep" role="separator" aria-hidden="true"> | </span>';
	?>&copy <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="footer-copy-name"><?php echo esc_html( get_theme_mod( 'copy_name', get_bloginfo( 'name' ) ) ); ?></a>
	<?php if ( '' !== get_privacy_policy_url() ) { ?>
		<span class="privacy-policy">
			<?php echo $sep_span; the_privacy_policy_link(); ?>
		</span>
	<?php } if( get_theme_mod( 'powered_by_wp', true ) || is_customize_preview() ) { ?>
		<span class="wordpress-credit" <?php if ( ! get_theme_mod( 'powered_by_wp', true ) && is_customize_preview() ) { echo 'style="display: none;"'; } ?>>
			<?php echo $sep_span; ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'classic-artisan' ) ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'classic-artisan' ), 'WordPress' ); ?></a>
		</span>
	<?php } if( get_theme_mod( 'theme_meta', false ) || is_customize_preview() ) { ?>
		<span class="theme-credit" <?php if ( ! get_theme_mod( 'theme_meta', false ) && is_customize_preview() ) { echo 'style="display: none;"'; } ?>>
			<?php echo $sep_span; ?><?php printf( __( 'Theme: %1$s by %2$s.', 'classic-artisan' ), 'Classic Artisan', '<a href="https://celloexpressions.com/" rel="designer">Nick Halsey</a>' ); ?>
		</span>
	<?php }
}
