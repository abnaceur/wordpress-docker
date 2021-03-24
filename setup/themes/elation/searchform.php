<?php
/**
 * The search form template
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( get_theme_mod( 'elation-search-txt', customizer_library_get_default( 'elation-search-txt' ) ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	</label>
</form>
