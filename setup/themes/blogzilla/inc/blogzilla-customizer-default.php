<?php
if (!function_exists('blogzilla_theme_options')) :
    function blogzilla_theme_options()
    {
        $defaults = array(

            //banner section
            'banner_image_title' => '',
            'banner_image_description' => '',
            'upload_banner_image' => '',
            'single_btn1' => '',
            'single_link1' => '',
            'facebook_link' => '',
            'youtube_link' => '',
            'twitter_link' => '',
            'pinterest_link' => '',
            'instagram_link' => '',
            'banner_show_checkbox' => 1,
            'sidebar_show_checkbox' =>0,
            'single_sidebar_show_checkbox' =>0,
            'single_sidebar_page_show_checkbox' =>0,
            'prefooter_checkbox' =>1,
        );

        $options = get_option('blogzilla_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;
