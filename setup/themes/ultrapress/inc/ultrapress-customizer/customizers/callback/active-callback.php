<?php 
/* Header Layouts Callback */
function ultrapress_header_layouts_cb(){
	$header_layout = get_theme_mod('ultrapress_header_layouts');
	if($header_layout == 'custom'){
		return true;
	}
	return false;
}
function ultrapress_header_layouts_cb_default(){
	$header_layout = get_theme_mod('ultrapress_header_layouts');
	if($header_layout == 'default'){
		return true;
	}
	return false;
}

/* Banner Overlay Callback */
function ultrapress_bread_banner_image_cb(){
	$bg_image = get_theme_mod('ultrapress_bread_banner_bg_image');
	if(!empty($bg_image)){
		return true;
	}
	return false;
}

/* Archive Column Callback */
function ultrapress_archive_column_cb(){
	$archive_callback_option = get_theme_mod('ultrapress_archive_layout');
	if($archive_callback_option != 'list'){
		return true;
	}
	return false;
}
/* Meta Button Callback */
function ultrapress_meta_button_cb(){
	$show_meta = get_theme_mod('ultrapress_meta_switch',0);
	if($show_meta){
		return true;
	}
	return false;
}
/* Footer Layout Callback */
function ultrapress_footer_layouts_cb(){
	$footer_layout = get_theme_mod('ultrapress_footer_layouts');
	if($footer_layout == 'custom'){
		return true;
	}
	return false;
}

/* Footer Copyright Callback */
function ultrapress_footer_copyright_cb(){
	$footer_layout = get_theme_mod('ultrapress_footer_layouts');
	if($footer_layout == 'default'){
		return true;
	}
	return false;
}
/* Scroll to Top Callback */
function ultrapress_footer_scrolltotop_cb(){
	$scroll_to_top = get_theme_mod('ultrapress_scroll_top_switch',true);
	if($scroll_to_top){
		return true;
	}
	return false;
}

/* Shop Column Callback */
function ultrapress_shop_column_cb(){
	$display_layout = get_theme_mod('ultrapress_shop_display_layout','grid');
	if($display_layout == 'grid'){
		return true;
	}
	return false;
}
/* header Button Callback */
function ultrapress_header_button_cb(){
	$show_button = get_theme_mod('ultrapress_show_purchase_btn_switch',0);
	if($show_button){
		return true;
	}
	return false;
}
/* breadcrumb Button Callback */
function ultrapress_bread_button_cb(){
	$show_button = get_theme_mod('ultrapress_breadcrumb_switch',0);
	if($show_button){
		return true;
	}
	return false;
}
/* breadcrumb Button Callback */
function ultrapress_banner_button_cb(){
	$show_button = get_theme_mod('ultrapress_breadcrumb_banner_switch',0);
	if($show_button){
		return true;
	}
	return false;
}
/* archive_sidebar Callback */
function ultrapress_archive_sidebar_cb(){
	$show_sidebar = get_theme_mod('ultrapress_archive_sidebar_layout','no-sidebar');
	if($show_sidebar!='no-sidebar'){
		return true;
	}
	return false;
}
function ultrapress_single_sidebar_cb(){	
	$show_sidebar = get_theme_mod('ultrapress_post_sidebar_layout','no-sidebar');
	if($show_sidebar!='no-sidebar'){
		return true;
	}
	return false;
}
function ultrapress_page_sidebar_cb(){	
	$show_sidebar = get_theme_mod('ultrapress_page_sidebar_layout','no-sidebar');
	if($show_sidebar!='no-sidebar'){
		return true;
	}
	return false;
}
function ultrapress_single_shop_sidebar_cb(){	
	$show_sidebar = get_theme_mod('ultrapress_shop_sidebar_layout','no-sidebar');
	if($show_sidebar!='no-sidebar'){
		return true;
	}
	return false;
}
/* cart callback */
function ultrapress_mini_cart_switch_cb(){	
	$show_cart = get_theme_mod('ultrapress_mini_cart_switch',0);
	if($show_cart){
		return true;
	}
	return false;
}

