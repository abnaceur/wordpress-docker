<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

?>
<div class="<?php echo esc_attr( blog99_get_list_gird_column_class() ); ?>">
	<article class="blog99-article post hentry ">
		<?php blog99_entry_top(); ?>
			<div class="blog99-article-thumbnail-section">
				<a href="<?php the_permalink(); ?>">
					<div class="post-image fade-in one"><span class="overlay"></span>
						<?php blog99_get_post_thumbnail(); ?>
					</div>
				</a>
			</div>
			<div class="blog99-post-contnet p-3">
				<h2 class="post-title entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<div class="blog99-author-date">
					<?php
						blog99_posted_by();
						blog99_posted_on();
					?>
				</div>
				<div class="blog99-shot-content">
					<?php the_excerpt(); ?>
				</div>

				<?php blog99_get_post_link(get_the_ID()) ?>
				
			</div>
			
		<?php blog99_entry_bottom(); ?>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>