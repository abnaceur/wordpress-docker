<?php
/**
 * Template for displaying search forms in Goblog Free
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="label-search-form">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'goblog-free' ) ?></span>
	</label>

	<input type="search" id="label-search-form" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'goblog-free' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

	<button type="submit" class="search-submit">
		<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'goblog-free' ); ?></span><i class="fas fa-search" aria-hidden="true"></i>
	</button>
</form>