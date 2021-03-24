<?php
/**
 * Template part for displaying social media template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

?>
<div class="container-sosmed-share">
	<div class="box-sosmed-share">
		<div class="sosmed-txt">
			<strong><?php echo __('Share:', 'goblog-free'); ?></strong><i class="fas fa-share-alt" aria-hidden="true"></i>
		</div>

		<div class="facebook">
			<a rel="nofollow noreferrer noopener" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" data-link="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"
		><span class="screen-reader-text"><?php esc_html_e('facebook', 'goblog-free'); ?></span><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
		</div>

		<div class="twitter">
			<a rel="nofollow noreferrer noopener" href="https://twitter.com/intent/tweet?text=<?php the_title_attribute(); ?>&amp;url=<?php the_permalink(); ?>"><span class="screen-reader-text"><?php esc_html_e('twitter', 'goblog-free'); ?></span><i class="fab fa-twitter" aria-hidden="true"></i></a>
		</div>

		<div class="whatsapp">
			<a rel="nofollow noreferrer noopener" href="whatsapp://send?text=<?php the_title_attribute(); ?><?php the_permalink(); ?>"><span class="screen-reader-text"><?php esc_html_e('whatsapp', 'goblog-free'); ?></span><i class="fab fa-whatsapp" aria-hidden="true"></i></a> 
		</div>	

		<div class="pinterest">
			<a rel="nofollow noreferrer noopener" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID() ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('pinterest', 'goblog-free'); ?></span><i class="fab fa-pinterest" aria-hidden="true"></i></a> 
		</div>

		<div class="linkedin">
			<a rel="nofollow noreferrer noopener" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title_attribute(); ?>&summary=<?php echo esc_attr(goblog_free_get_excerpt()); ?>&source=<?php echo esc_url($_SERVER['SERVER_NAME']); ?>"><span class="screen-reader-text"><?php esc_html_e('linkedin', 'goblog-free'); ?></span><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> 
		</div>
	</div>
</div>