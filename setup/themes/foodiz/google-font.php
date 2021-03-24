<?php
$main_heading_font = get_theme_mod( 'main_heading_font' );
$menu_font = get_theme_mod( 'menu_font');
$theme_title   = get_theme_mod( 'theme_title');
$desc_font_all   = get_theme_mod( 'desc_font_all' );
$foodiz_logo_font_size = get_theme_mod( 'foodiz_logo_font_size' );
$menu_font_size = get_theme_mod('menu_font_size');

$footer_color_setting = get_theme_mod('footer_color_setting');
$header_color = get_theme_mod('header_color');
?>

<style>
#logo_url {
	font-family: <?php echo $main_heading_font ?>;
	font-size: <?php echo $foodiz_logo_font_size ?>px;
}
.foodiz-nav li a {
	font-family: <?php echo $menu_font; ?>
}
.slider_contant a.post-title, .cat-link a, .about-section h1.color-pink, .parallex-txt h2, .color-pink, .blog-entry .text h3 a, #sidebar-footer .widget-title, h1.blog-title a, .post-sidebar-area .widget-title, .post-content h4, .breadCrumbBkground  {
	font-family: <?php echo $theme_title; ?>
}
.foodiz-nav li a {
	font-size: <?php echo $menu_font_size ?>px;
}
.footer-area {
	background: <?php echo $footer_color_setting ?>;
}
.head, .menu1, div#navbarNavDropdown {
	background: <?php echo $header_color ?>;
}
</style>