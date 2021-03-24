<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kiducation
 */
/**
* Hook - kiducation_action_doctype.
*
* @hooked kiducation_doctype -  10
*/
do_action( 'kiducation_action_doctype' );
?>
<head>
<?php
/**
* Hook - kiducation_action_head.
*
* @hooked kiducation_head -  10
*/
do_action( 'kiducation_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - kiducation_action_before.
*
* @hooked kiducation_page_start - 10
*/
do_action( 'kiducation_action_before' );

/**
*
* @hooked kiducation_header_start - 10
*/
do_action( 'kiducation_action_before_header' );

/**
*
*@hooked kiducation_site_branding - 10
*@hooked kiducation_header_end - 15 
*/
do_action('kiducation_action_header');

/**
*
* @hooked kiducation_content_start - 10
*/
do_action( 'kiducation_action_before_content' );

/**
 * Banner start
 * 
 * @hooked kiducation_banner_header - 10
*/
do_action( 'kiducation_banner_header' );  
