<?php
/**
 * Template part for display audio header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogshop
 */
$postdateclass = (function_exists('get_field') ? '' : ' position-static');
$get_gallery_images = '';
if (function_exists('get_field')) {
	$get_gallery_images = get_field('gallery_images');
}
?>

<div class="blogshop-standard-post__gallery-header post-header">
	<div class="owl-carousel post-gallery">
		<?php
		if (is_array($get_gallery_images)) :
			foreach ($get_gallery_images as $get_gallery_image) :
				?>
				<div class="single-gallery-image">
					<?php echo wp_get_attachment_image( $get_gallery_image['id'], 'blogshop-thumbnail-medium' ); ?>
				</div>
				<?php
			endforeach;
		endif;
		?>
	</div>
	<div class="blogshop-standard-post__posted-date <?php echo esc_attr( $postdateclass );?>">
			<?php blogshop_posted_on(); ?>
		</div>
</div>