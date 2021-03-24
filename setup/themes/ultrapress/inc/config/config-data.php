<?php

/**

 * Creative starter demo config

 */

$options = array(
    'default' => array(
        'title'         => esc_html__('Default', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Business', 'ultrapress'),
        'pro_demo'    => false, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/main/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main Menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "WooCommerce",
                "plugin_slug" => "woocommerce",
                "plugin_filename" => "woocommerce",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'blogify' => array(
        'title'         => esc_html__('Blogify', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Blog / Magazine', 'ultrapress'),
        'pro_demo'    => false, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/blogify',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "WooCommerce",
                "plugin_slug" => "woocommerce",
                "plugin_filename" => "woocommerce",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'construct' => array(
        'title'         => esc_html__('Construct', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Business', 'ultrapress'),
        'pro_demo'    => false, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/construct/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'kreato' => array(
        'title'         => esc_html__('Kreato', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Business', 'ultrapress'),
        'pro_demo'    => true, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress-pro/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/kreato/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "WooCommerce",
                "plugin_slug" => "woocommerce",
                "plugin_filename" => "woocommerce",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
            array(
                "plugin_name" => "Ultra Addons for Elementor",
                "plugin_slug" => "ultra-addons-for-elementor",
                "plugin_filename" => "ultra-addons-for-elementor",
                "plugin_local" => true
            ),
            array(
                "plugin_name" => "Ultrapress Pro",
                "plugin_slug" => "ultrapress-pro",
                "plugin_filename" => "ultrapress-pro",
                "plugin_local" => true
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'magpro' => array(
        'title'         => esc_html__('Magpro', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Blog / Magazine', 'ultrapress'),
        'pro_demo'    => true, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress-pro/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/magpro/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
            array(
                "plugin_name" => "Ultra Addons for Elementor",
                "plugin_slug" => "ultra-addons-for-elementor",
                "plugin_filename" => "ultra-addons-for-elementor",
                "plugin_local" => true
            ),
            array(
                "plugin_name" => "Ultrapress Pro",
                "plugin_slug" => "ultrapress-pro",
                "plugin_filename" => "ultrapress-pro",
                "plugin_local" => true
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'mentor' => array(
        'title'         => esc_html__('Mentor', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Business', 'ultrapress'),
        'pro_demo'    => true, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress-pro/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/mentor/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "WooCommerce",
                "plugin_slug" => "woocommerce",
                "plugin_filename" => "woocommerce",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
            array(
                "plugin_name" => "Ultra Addons for Elementor",
                "plugin_slug" => "ultra-addons-for-elementor",
                "plugin_filename" => "ultra-addons-for-elementor",
                "plugin_local" => true
            ),
            array(
                "plugin_name" => "Ultrapress Pro",
                "plugin_slug" => "ultrapress-pro",
                "plugin_filename" => "ultrapress-pro",
                "plugin_local" => true
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'recipe' => array(
        'title'         => esc_html__('Recipe', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Blog / Magazine', 'ultrapress'),
        'pro_demo'    => true, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress-pro/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/recipe/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "WooCommerce",
                "plugin_slug" => "woocommerce",
                "plugin_filename" => "woocommerce",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
            array(
                "plugin_name" => "Ultra Addons for Elementor",
                "plugin_slug" => "ultra-addons-for-elementor",
                "plugin_filename" => "ultra-addons-for-elementor",
                "plugin_local" => true
            ),
            array(
                "plugin_name" => "Ultrapress Pro",
                "plugin_slug" => "ultrapress-pro",
                "plugin_filename" => "ultrapress-pro",
                "plugin_local" => true
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'workouts' => array(
        'title'         => esc_html__('workouts', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Health / Fitness', 'ultrapress'),
        'pro_demo'    => true, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress-pro/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/workouts/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "WooCommerce",
                "plugin_slug" => "woocommerce",
                "plugin_filename" => "woocommerce",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
            array(
                "plugin_name" => "Ultra Addons for Elementor",
                "plugin_slug" => "ultra-addons-for-elementor",
                "plugin_filename" => "ultra-addons-for-elementor",
                "plugin_local" => true
            ),
            array(
                "plugin_name" => "Ultrapress Pro",
                "plugin_slug" => "ultrapress-pro",
                "plugin_filename" => "ultrapress-pro",
                "plugin_local" => true
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
    'ultradine' => array(
        'title'         => esc_html__('Ultradine', 'ultrapress'),
        'main_cat'           => esc_html__('Starter Sites', 'ultrapress'),
        'cat'           => esc_html__('Hotel / Restaurant', 'ultrapress'),
        'pro_demo'    => true, 
        'demo_type' => 'starter',
        'purchage_url'    => 'https://uncodethemes.com/wordpress-themes/ultrapress-pro/',
        'preview_url'   => 'http://ultrapress.uncodethemes.com/ultradine/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'is_shop'       => true,
        'menus'         => array(
            'primary-menu'   => 'Main menu',
        ),
        'plugins' => array(
            array(
                "plugin_name" => "Contact Form 7",
                "plugin_slug" => "contact-form-7",
                "plugin_filename" => "wp-contact-form-7", 
            ),
            array(
                "plugin_name" => "Elementor",
                "plugin_slug" => "elementor",
                "plugin_filename" => "elementor",
            ),
            array(
                "plugin_name" => "WooCommerce",
                "plugin_slug" => "woocommerce",
                "plugin_filename" => "woocommerce",
            ),
            array(
                "plugin_name" => "UT Elementor Addons Lite",
                "plugin_slug" => "ut-elementor-addons-lite",
                "plugin_filename" => "ut-elementor-addons-lite",
            ),
            array(
                "plugin_name" => "Ultra Addons for Elementor",
                "plugin_slug" => "ultra-addons-for-elementor",
                "plugin_filename" => "ultra-addons-for-elementor",
                "plugin_local" => true
            ),
            array(
                "plugin_name" => "Ultrapress Pro",
                "plugin_slug" => "ultrapress-pro",
                "plugin_filename" => "ultrapress-pro",
                "plugin_local" => true
            ),
        ),
        'elementor'         => array(
            'color'   => 'disable',
            'font'   => 'disable',
        ),
        'theme'     => 'ultrapress',
    ),
);
UT_Demo_Importer::instance( $options );