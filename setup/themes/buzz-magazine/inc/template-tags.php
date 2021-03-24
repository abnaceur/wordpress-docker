<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Buzz_Magazine
 */

if ( ! function_exists( 'buzz_magazine_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function buzz_magazine_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        $archive_year               = get_the_time('Y');
        $archive_month              = get_the_time('m');
        $archive_day                = get_the_time('d');

        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'%s',
			'<a href="' . esc_url(get_day_link( $archive_year, $archive_month, $archive_day) ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<div class="posted-on">' . $posted_on . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'buzz_magazine_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function buzz_magazine_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
            '%s',
			'<div class="post-author vcard"><a  href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></div>'
		);

		echo $byline ; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


if ( ! function_exists( 'buzz_magazine_category' ) ):
    /**
     *
     */
    function buzz_magazine_category(){
        // Hide category and tag text for pages.
        global $post;
        $post_id         = $post->ID;
            $categories_list = get_the_category($post_id);
            $tags_list = get_the_tags($post_id);
            $color_option_id = 'category_color_option_';

        if ( ! empty( $categories_list ) ) {
            ?>
            <div class="post-cat-list">
                <?php
                foreach ( $categories_list as $cat_data ) {
                    $cat_name = $cat_data->name;
                    $cat_id   = $cat_data->term_id;
                    $cat_link = get_category_link( $cat_id );
                    ?>
                    <span class="cat-links buzz-magazine-cat-<?php echo esc_attr( $cat_id ); ?>"><a
                                href="<?php echo esc_url( $cat_link ); ?>" style="background-color:<?php echo esc_attr(get_theme_mod($color_option_id.esc_html( strtolower($cat_name) ),'#FA3616'));?> "><?php echo esc_html( $cat_name ); ?></a></span>
                    <?php
                }
                ?>
            </div>
            <?php
        }

        if ( ! empty( $tags_list ) ) {
            ?>
            <div class="post-tag-list">
                <?php
                foreach ( $tags_list as $tag_data ) {
                    $tag_name = $tag_data->name;
                    $tag_id   = $tag_data->term_id;
                    $tag_link = get_tag_link( $tag_id );
                    $tag_color_option_id = 'tag_color_option_';


                    ?>
                    <span class="tag-links buzz-magazine-tag-<?php echo esc_attr( $tag_id ); ?>"><a
                                href="<?php echo esc_url( $tag_link ); ?>" style="background-color:<?php echo esc_attr(get_theme_mod($tag_color_option_id.esc_html( strtolower($tag_name) ),'#FA3616'));?> "><?php echo esc_html( $tag_name ); ?></a></span>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }

endif;

if ( ! function_exists( 'buzz_magazine_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function buzz_magazine_entry_footer() {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="post-comment">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'buzz-magazine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</div>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'buzz-magazine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


/**
 * Modifying Excerpt Length
 * @return int
 */
function buzz_magazine_excerpt_length(){
    return 10;
}
add_filter('excerpt_length', 'buzz_magazine_excerpt_length',999);
