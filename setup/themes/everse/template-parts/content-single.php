<?php
/**
 * Single post
 *
 * @package Everse
 */
?>

<?php 
	$tags_show = get_theme_mod( 'everse_settings_post_tags_show', true );
	$socials_share_show = get_theme_mod( 'everse_settings_post_share_buttons_show', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-post__entry' ); ?>>	
	<div class="entry__article-wrap">
		<div class="entry__article-content">

			<?php everse_entry_content_top(); ?>

			<div class="entry__article single-post__entry-article clearfix">
				<?php the_content(); ?>
			</div>

			<?php everse_multi_page_pagination(); ?>

			<?php everse_entry_content_bottom(); ?>

		</div> <!-- .entry__article-content -->	
	</div>
</article><!-- #post-## -->


<?php if ( ! everse_is_learndash_post() ) : ?>

	<?php if ( $tags_show || $socials_share_show ) : ?>
		<div class="row">
			<?php if ( $tags_show && has_tag() ) : ?>
				<div class="<?php if ( $socials_share_show && function_exists( 'everse_social_sharing_buttons' ) ) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
					<!-- Tags -->
					<div class="entry__tags">
						<?php the_tags( '', '', '' ); ?>
					</div> <!-- end tags -->
				</div>
			<?php endif; ?>

			<?php if ( $socials_share_show && function_exists( 'everse_social_sharing_buttons' ) ) : ?>
				<div class="<?php if ( $tags_show ) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
					<!-- Share -->
					<div class="entry__share <?php if ( $tags_show && has_tag() ) { echo 'entry__share--right'; } ?>">
						<?php echo everse_social_sharing_buttons(); ?>
					</div>
				</div>
			<?php endif; ?>

		</div>
	<?php endif; ?>


	<?php if ( get_theme_mod( 'everse_settings_author_box_show', true ) ) {
		everse_author_box();
	} ?>

	<?php if ( get_theme_mod( 'everse_settings_related_posts_show', true ) ) {
		everse_related_posts();
	} ?>

	<?php
		// Comments
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

<?php endif; ?>