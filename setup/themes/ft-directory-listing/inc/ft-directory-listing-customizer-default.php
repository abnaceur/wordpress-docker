<?php
if (!function_exists('ft_directory_listing_theme_options')) :
    function ft_directory_listing_theme_options()
    {
        $defaults = array(

            'banner_title' => '',
            'site_title_show' => 1,
            'banner_bg_image' => '',
            'cta_show' => 1,
            'cta_title' => '',
            'cta_button_txt' => '',
            'cta_button_url' => '',
            'cta_bg_image' => '',
            'listing_item_show' => 1,
            'listing_item_title' => '',
            'listing_item_desc' => '',
            'blog_show' => 1,
            'blog_title' => '',
            'blog_desc' => '',
            'blog_category' => '',
            'show_prefooter' => 1,


        );

        $options = get_option('ft_directory_listing_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;
