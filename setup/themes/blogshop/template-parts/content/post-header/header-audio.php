<?php
/**
 * Template part for display audio header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogshop
 */

$get_audio_link = '';
if (function_exists('get_field')) {
	$get_audio_link = get_field('audio_link');
}
?>

<div class="blogshop-standard-post__audio-header post-header">
	<?php echo $get_audio_link; ?>
	<div class="blogshop-standard-post__posted-date">
		<?php blogshop_posted_on(); ?>
	</div>
</div>