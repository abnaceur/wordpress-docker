<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Vip_Business
 */

$vip_business_enable = vip_business_gtm( 'vip_business_hero_content_visibility' );

if ( ! vip_business_display_section( $vip_business_enable ) ) {
	return;
}

get_template_part( 'template-parts/hero-content/content-hero' );
