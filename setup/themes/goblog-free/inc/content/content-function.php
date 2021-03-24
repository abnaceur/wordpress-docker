<?php
/**
 * Additional function code.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.1
 */

/**
 * Add function to display author.
 */
if ( ! function_exists( 'goblog_free_author_post' ) ) {

	function goblog_free_author_post() {
		$author = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
		echo '<i class="fas fa-user-alt"></i><a class="author" href="' . $author . '">' . esc_html( get_the_author() ) . '</a>';
	}
}

/**
 * Add function to display thumbnail Post default.
 */
if ( ! function_exists( 'goblog_free_thumbnail_post' ) ) {
	function goblog_free_thumbnail_post() {
		if ( has_post_thumbnail() ) : ?>

			<a class="thumbs" href="<?php the_permalink(); ?>">
				<span class="screen-reader-text"><?php esc_html_e('thumbnail', 'goblog-free'); ?></span>
			    <?php the_post_thumbnail('goblog-free-med'); ?> 
			</a>
		<?php endif; 
		
		if ( has_post_format ( 'video' ) ) {
				echo '<div class="postformat"><i class="fas fa-play" aria-hidden="true"></i></div>';
			} elseif ( has_post_format ( 'gallery' ) ) {
				echo '<div class="postformat"><i class="fas fa-images" aria-hidden="true"></i></i></div>';
			} elseif ( has_post_format ( 'Audio' ) ) {
				echo '<div class="postformat"><i class="fas fa-headphones" aria-hidden="true"></i></div>';
			} elseif ( has_post_format ( 'image' ) ) {
				echo '<div class="postformat"><i class="fas fa-image" aria-hidden="true"></i></div>';
		}		
	} 
}

/**
 * Add function to display thumbnail Post grids2
 */
if ( ! function_exists( 'goblog_free_thumbnail_post_grids2' ) ) {
	function goblog_free_thumbnail_post_grids2() {
		if ( has_post_thumbnail() ) : ?>

			<a class="thumbs" href="<?php the_permalink(); ?>">
				<span class="screen-reader-text"><?php esc_html_e('thumbnail', 'goblog-free'); ?></span>
			    <?php the_post_thumbnail('goblog-free-grids2'); ?> 
			</a>
		
		<?php endif; 

		if ( has_post_format ( 'video' ) ) {
				echo '<div class="postformat"><i class="fas fa-play" aria-hidden="true"></i></div>';
			} elseif ( has_post_format ( 'gallery' ) ) {
				echo '<div class="postformat"><i class="fas fa-images" aria-hidden="true"></i></i></div>';
			} elseif ( has_post_format ( 'Audio' ) ) {
				echo '<div class="postformat"><i class="fas fa-headphones" aria-hidden="true"></i></div>';
			} elseif ( has_post_format ( 'image' ) ) {
				echo '<div class="postformat"><i class="fas fa-image" aria-hidden="true"></i></div>';
		}		
	} 
}

/**
 * Add function to display featured image single.
 */
if ( ! function_exists( 'goblog_free_featured_image' ) ) {
	function goblog_free_featured_image() {
		if ( has_post_thumbnail() ) { 
			the_post_thumbnail('goblog-free-featured-image'); 				
		}	
	} 
}

/**
 * Add function to display featured image single1.
 */
if ( ! function_exists( 'goblog_free_featured_image1' ) ) {
	function goblog_free_featured_image1() {
		if ( has_post_thumbnail() ) { 
			the_post_thumbnail('goblog-free-featured-image1'); 				
		}	
	} 
}

/**
 * Add function image social media, if you don't have a thumbnail.
 */
if ( ! function_exists( 'goblog_free_content_thumbnail_sosmed' ) ) {
	function goblog_free_content_thumbnail_sosmed() {
		if ( has_post_thumbnail() ) { 
			the_post_thumbnail_url( get_the_ID() );
		}		
	}
}

/**
 * Add function to display date.
 */
if ( ! function_exists( 'goblog_free_date_post' ) ) {
	function goblog_free_date_post() {
		echo '<i class="far fa-calendar" aria-hidden="true"></i>' . '<time datetime="'.esc_html(get_the_date('Y-m-d')).'" class="time">' . esc_html(get_the_date()) . '</time>';	
	}
}

/**
 * Add function to display title.
 */
if ( ! function_exists( 'goblog_free_title_post' ) ) {
	function goblog_free_title_post() {
		the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
	}
}

/**
 * Add function to display comment.
 */
if ( ! function_exists( 'goblog_free_comment_numb' ) ) {
	function goblog_free_comment_numb() {
		echo '<i class="fas fa-comments" aria-hidden="true"></i> ' . '<span class="com">' . absint( get_comments_number() ) . '</span>';	
	}	
}

/**
 * Add function to display author, comment and date.
 */
if ( ! function_exists( 'goblog_free_content_info' ) ) {
	function goblog_free_content_info() {
        goblog_free_author_post(); 
        goblog_free_comment_numb(); 
        goblog_free_date_post(); 	    	
	}
}

/**
 * Add function to display author, category, date and comment.
 */
if ( ! function_exists( 'goblog_free_content_info_single' ) ) {
	function goblog_free_content_info_single() {
		goblog_free_author_post(); 
		the_category();	
		goblog_free_date_post(); 
        goblog_free_comment_numb(); 		
	}
}

/**
 * Add function to display pagination link default.
 */
if ( ! function_exists( 'goblog_free_pagination_default' ) ) {
	function goblog_free_pagination_default() {
	    the_posts_pagination( 
	    	array(
	            'mid_size' => 2,
	            'prev_text' => __( '<i class="fas fa-chevron-left"></i><span class="screen-reader-text">prev</span>', 'goblog-free' ),
	            'next_text' => __( '<i class="fas fa-chevron-right"></i><span class="screen-reader-text">next</span>', 'goblog-free' ),
	        )
	    );	    	
	}
}

/**
 * Add function to display pagination link single. 
 */
if ( ! function_exists( 'goblog_free_pagination_single' ) ) {
	function goblog_free_pagination_single() { 
        wp_link_pages( 
            array(
                'before'      => '<div class="page-pagination"><div class="page-links">
                <span class="page-title">' . esc_html__( 'Pages:', 'goblog-free' ) . '</span>',
                'after'       => '</div></div>',
                'link_before' => '',
                'link_after'  => '',
            )
        ); 
	}
}

/**
 * Add function to display pagination link page.
 */
if ( ! function_exists( 'goblog_free_pagination_page' ) ) {
	function goblog_free_pagination_page() { 
		wp_link_pages( 
			array(
				'before'      => '<div class="page-pagination"><div class="page-links">
				<span class="page-title">' . esc_html__( 'Pages:', 'goblog-free' ) . '</span>',
				'after'       => '</div></div>',
				'link_before' => '',
				'link_after'  => '',
			)
		); 
	}
}

/**
 * Add function to display excerpt.
 */
if ( ! function_exists( 'goblog_free_get_excerpt' ) ) {
	function goblog_free_get_excerpt(){
		if ( ! empty( get_the_excerpt() ) ) {
			$content = substr( get_the_excerpt(), 0, 101);
			return esc_html($content); 
        } elseif ( ! empty( get_the_content() ) ) {
			$content = substr( get_the_content(), 0, 101);
			return esc_html($content);
        } elseif ( empty( get_the_excerpt() ) && empty( get_the_content() ) ) {
			$text = __('Sorry there is no quote', 'goblog-free');
			$content = $text;
			return esc_html($content);
        }    
	}
}

/**
 * Add function to display information archive.
 */
if ( ! function_exists( 'goblog_free_get_meta_arhive' ) ) {
	function goblog_free_get_meta_arhive() {
		if ( is_category() ) {
			$cat = single_cat_title( '', false );
			return esc_html($cat);
		} elseif ( is_tag() ) {
			$tag = single_tag_title( '', false );
			return esc_html($tag);
		} elseif ( is_author() ) {
			$author = get_the_author();
			return esc_html($author);
		} elseif ( is_post_type_archive() ) {
			$type = post_type_archive_title( '', false );
			return esc_html($type);
		}
	}
}

/**
 * Add function to display information title meta.
 */
if ( ! function_exists( 'goblog_free_the_title_meta' ) ) {
	function goblog_free_the_title_meta(){
		if ( is_front_page() ) {
			$front = get_bloginfo('name');
			echo esc_html( $front );
        } elseif ( is_archive() ) {
			echo esc_html( goblog_free_get_meta_arhive() );
        } elseif ( is_author() ) {
			$author = get_the_author();
			echo esc_html( $author );
        } else {
			$title = str_replace(' ', '', wp_title('', false) );
			echo esc_html($title);
		} 
	}
}

/**
 * Add function to display category custome.
 */
if ( ! function_exists( 'goblog_free_the_category' ) ) {
	function goblog_free_the_category(){
		$categories = get_the_category();
		$separator = ' ';
		$output = '';
		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {
				$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . 
				"<span class='first-letter'>".substr( esc_html( $category->name ), 0 , 1)."</span>"."<span class='arrow'></span>". esc_html( $category->name ) . '</a>' . $separator;
			}
			$cat = trim( $output, $separator );

			// Output HTML
			echo $cat;
		}
	}
}