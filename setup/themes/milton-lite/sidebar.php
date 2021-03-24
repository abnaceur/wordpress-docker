<?php 
if ( is_page() || is_page_template() ) {
	
	$page_dynamic_menu_positions 	= get_post_meta( $post->ID, 'page-dynamic-menu', true );
	$related_pages_position 		= esc_attr(get_theme_mod( 'theme-dynamic-menu-position', 'display' ));

	if ( isset($page_dynamic_menu_positions) && $page_dynamic_menu_positions != 'none' ) {
		if ( $related_pages_position == 'display' ) {
			get_template_part('related-pages');
		} elseif ( $related_pages_position != 'display' && (isset($page_dynamic_menu_positions) && $page_dynamic_menu_positions == 'display') ) {
			get_template_part('related-pages');
		}
	}

}

if (is_active_sidebar('sidebar-primary')) {
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar: Primary') ) : ?> <?php endif;
}