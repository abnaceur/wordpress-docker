<?php 
/**
 * Add filters to the add filter hook.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

/**
 * Filter the categories count widget.
 */
function goblog_free_count_widgets($links){
    $links = str_replace( '</a> (', '</a> <span class="count">', $links );
    $links = str_replace( ')', '</span>', $links );
    return $links;
}
add_filter( 'wp_list_categories', 'goblog_free_count_widgets');

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Goblog Free 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function goblog_free_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Post title. */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'goblog-free' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'goblog_free_excerpt_more' );

/**
 * Filter the cloud widget.
 */
function goblog_free_tagcloud_size( $args ){
    $args['largest']  = 15;
    $args['smallest'] = 15;
    $args['unit']     = 'px';
    $args['format']   = 'list';

    return $args;
}
add_filter('widget_tag_cloud_args', 'goblog_free_tagcloud_size');

/**
 * Filter archive title.
 */
function goblog_free_arhive_title($title) {

    if ( is_category() ) {
        /* translators: Category archive title. %s: Category name. */
        $title = sprintf( __( 'Category: %s', 'goblog-free' ), '<span>' . single_cat_title( '', false ) . '</span>' );
    } elseif ( is_tag() ) {
        /* translators: Tag archive title. %s: Tag name. */
        $title = sprintf( __( 'Tag: %s', 'goblog-free' ), '<span>' . single_tag_title( '', false ) . '</span>' );
    } elseif ( is_author() ) {
        /* translators: Author archive title. %s: Author name. */
        $title = sprintf( __( 'Author: %s', 'goblog-free' ), '<span class="vcard">' . get_the_author() . '</span>' );
    } elseif ( is_post_type_archive() ) {
        /* translators: Post type archive title. %s: Post type name. */
        $title = sprintf( __( 'Archives: %s', 'goblog-free' ), '<span>' . post_type_archive_title( '', false ) . '</span>' );
    }

    return $title; 
}
add_filter('get_the_archive_title', 'goblog_free_arhive_title');