<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AeonMag
 */
if ( ! function_exists( 'aeonmag_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function aeonmag_posted_on() {		
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

	$posted_on = 
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"> <i class="fa fa-clock-o"></i>' . $time_string . '</a>';

	$byline = sprintf(
            esc_html_x('By %s', 'post author', 'aeonmag'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );
        echo '<span class="posted-on">' . $posted_on . '</span>';
	}
endif;

if ( ! function_exists( 'aeonmag_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function aeonmag_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'aeonmag' ),
			'<span class="author vcard"><i class="fa fa-user-o"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
        echo '<span class="post_by"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'aeonmag_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function aeonmag_entry_meta() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'aeonmag' ) );

		if ( $categories_list ) {
			echo '<span class="cat-links">' . $categories_list . '</span>';
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'aeonmag' ) );
		if ( $tags_list && is_singular() ) {
			printf( '<span class="tags-links">' . '<i class="fa fa-tag"></i>' . '</span>', $tags_list ); // WPCS: XSS OK.
		}
      	
	}
	}
endif;

/**
 * Post Thumbnail
 *
 *  @since AeonMag 1.0.0
 */
if (!function_exists('aeonmag_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function aeonmag_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>
            <?php
            $image_size = 'large';
                ?>
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php

                    the_post_thumbnail( $image_size, array(
                        'class' => '',
                        'alt' => the_title_attribute(array(
                                'echo' => false,
                            )
                        )
                    ));
                    ?>
                </a>
            <?php
            ?>
        <?php endif; // End is_singular().
    }
endif;