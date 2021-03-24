<?php
/**
 *
 * Template Name: Frontpage

 *
 * @package FT Directory Listing
 */

$ft_directory_listing_options = ft_directory_listing_theme_options();
$listing_item_show = $ft_directory_listing_options['listing_item_show'];
$blog_show = $ft_directory_listing_options['blog_show'];

get_header();


get_template_part('template-parts/homepage/banner', 'section');




if($listing_item_show == 1)
get_template_part('template-parts/homepage/listings', 'section');


get_template_part('template-parts/homepage/cta', 'section');

if($blog_show == 1)
get_template_part('template-parts/homepage/blog', 'section');

get_footer();
