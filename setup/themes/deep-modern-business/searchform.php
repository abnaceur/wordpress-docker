<?php
/**
 * Deep Modern Business.
 *
 * @since   1.0.0
 * @author  Webnus
 */

?>

<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<div>
		<input name="s" type="text" placeholder="<?php echo esc_attr__( 'Enter Keywords...', 'deep-modern-business' ); ?>" class="search-side">
		<input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Search', 'deep-modern-business' ); ?>" class="btn">
	</div>
</form>