<?php
/**
 * Template for displaying search forms in VIP Business
 *
 * @package Vip_Business
 */
?>

<?php $search_text = vip_business_gtm( 'vip_business_search_text' ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'vip-business' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( $search_text ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input type="submit" class="search-submit" value="&#xf002;" />

</form>
