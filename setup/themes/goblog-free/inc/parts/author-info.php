<?php
/**
 * Template part for displaying author template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

?>
<div class="author-box">
    <div class="author-img">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>  
    </div>
    <div class="author-info">
    	<h4><?php $author = get_author_posts_url( get_the_author_meta( 'ID' ) );
		echo '<a class="author" href="' . esc_url($author) . '">' .  esc_html(get_the_author()) . '</a>';
		?></h4>
    	<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
	</div>
</div>