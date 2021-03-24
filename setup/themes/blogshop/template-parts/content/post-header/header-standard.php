<?php
/**
 * Template part for display audio header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogshop
 */

$postdateclass = (has_post_thumbnail() ? '' : ' position-static');
?>

<div class="blogshop-standard-post__thumbnail post-header">
	<?php the_post_thumbnail( 'blogshop-thumbnail-medium' );
	?> 
	<div class="blogshop-standard-post__posted-date<?php echo esc_attr( $postdateclass );?>">
		<?php blogshop_posted_on(); ?>
	</div>
</div>