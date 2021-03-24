<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

 
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php blog99_comments_before(); ?>
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<span class="blog99-comment-title">
				<?php
				$blog99_comment_count =  get_comments_number();
				if ( '1' === $blog99_comment_count ) {
					echo	'<span>'.esc_html('1 COMMENT','blog99'). '</span>';
				} else {
					echo	'<span>'.esc_html($blog99_comment_count).esc_html(' COMMENTS','blog99'). '</span>';
				}
				?>
			</span><span class="effect" ></span>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'blog99' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>
	<?php blog99_comments_after(); ?>

</div><!-- #comments -->