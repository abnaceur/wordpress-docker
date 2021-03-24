<?php
/**
 * Template part for displaying Hero Content
 *
 * @package Vip_Business
 */

$vip_business_enable_promotional = vip_business_gtm( 'vip_business_promotional_headline_visibility' );

if ( ! vip_business_display_section( $vip_business_enable_promotional ) ) {
	return;
}

get_template_part( 'template-parts/promotional-headline/post-type' );
