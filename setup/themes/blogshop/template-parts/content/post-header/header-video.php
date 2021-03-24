<?php
/**
 * Template part for display audio header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogshop
 */
$get_video_link = '';
if (function_exists('get_field')) {	
	$get_video_link = get_field('video_link');
}
?>

<div class="blogshop-standard-post__video-header post-header">
	<?php echo $get_video_link; ?>
	<div class="blogshop-standard-post__posted-date">
		<?php blogshop_posted_on(); ?>
	</div>
</div>