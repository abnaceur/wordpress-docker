<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogshop' ); ?></a>
	<?php
	blogshop_wp_body_open();
	blogshop_preloader();
	 ?>
<div id="page" class="site">
<?php
$getheaderlayout = get_theme_mod( 'header_layout', 'one' );
get_template_part( 'template-parts/header/header', $getheaderlayout );
$headerimage = (has_header_image() ? get_header_image() : '');

blogshop_default_page_banner();


?>
<div id="content" class="site-content">