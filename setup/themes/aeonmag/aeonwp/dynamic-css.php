<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Dynamic css
 *
 * @since AeonMag 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('aeonmag_dynamic_css')) :

    function aeonmag_dynamic_css()
    {
        global $aeonmag_theme_options;

        /* Color Options Options */
        $aeonmag_primary_color              = esc_attr($aeonmag_theme_options['aeonmag_primary_color']);
        $aeonmag_logo_width              = absint($aeonmag_theme_options['aeonmag_logo_width_option']);
        
        $aeonmag_header_overlay  = esc_attr($aeonmag_theme_options['aeonmag_slider_overlay_color']);
        $aeonmag_header_transparent  = esc_attr($aeonmag_theme_options['aeonmag_slider_overlay_transparent']);
        $aeonmag_header_min_height              = absint($aeonmag_theme_options['aeonmag_header_image_height']);

        $custom_css = '';

        //Primary  Background 
        if (!empty($aeonmag_primary_color)) {
            $custom_css .= "
            #toTop,
            .tags__wrapper ul li a:hover,
            .tags__wrapper ul li a:focus,
            .trending-news .trending-news-inner .title,
            .trending-news-two .title,
            .tab__wrapper .tabs-nav li,
            .title-highlight:before,
            .card__post__category a,
            .slide-wrap .caption .post-category,
            .aeonmag-home-icon a,
            div.menu-description,
            a.effect:before,
            .widget .widget-title:before, 
            .widget .widgettitle:before,
            .show-more,
            a.link-format,
            .widget .widgettitle, 
            .widget .widget-title,
            .meta_bottom .post-share a:hover,
            .comment-form #submit,
            .pagination .page-numbers.current,
            .tabs-nav li.current,
            .post-slider-section .s-cat,
            .sidebar-3 .widget-title:after,
            .bottom-caption .slick-current .slider-items span,
            aarticle.format-status .post-content .post-format::after,
            article.format-chat .post-content .post-format::after, 
            article.format-link .post-content .post-format::after,
            article.format-standard .post-content .post-format::after, 
            article.format-image .post-content .post-format::after, 
            article.hentry.sticky .post-content .post-format::after, 
            article.format-video .post-content .post-format::after, 
            article.format-gallery .post-content .post-format::after, 
            article.format-audio .post-content .post-format::after, 
            article.format-quote .post-content .post-format::after{ 
                background-color: ". $aeonmag_primary_color."; 
                border-color: ".$aeonmag_primary_color.";
            }";

        }

        //Primary Color
        if (!empty($aeonmag_primary_color)) {
            $custom_css .= "
            .post__grid .cat-links a,
            .card__post__author-info .cat-links a,
            .post-cats > span i, 
            .post-cats > span a,
            .main-menu ul ul li:hover > a,
            .top-menu > ul > li > a:hover,
            .main-menu ul li.current-menu-item > a, 
            .header-2 .main-menu > ul > li.current-menu-item > a,
            .main-menu ul li:hover > a,
            .post-navigation .nav-links a:hover, 
            .post-navigation .nav-links a:focus,
            ul.trail-items li a:hover span,
            .author-socials a:hover,
            .post-date a:focus, 
            .post-date a:hover,
            .post-excerpt a:hover, 
            .post-excerpt a:focus, 
            .content a:hover, 
            .content a:focus,
            .post-footer > span a:hover, 
            .post-footer > span a:focus,
             
            .widget a:focus,
            .tags__wrapper ul li a,
            .footer-menu li a:hover, 
            .footer-menu li a:focus,
            .footer-social-links a:hover,
            .footer-social-links a:focus,
            .site-footer a:hover, 
            .site-footer a:focus, .content-area p a{ 
                color : ". $aeonmag_primary_color."; 
            }";
        }

        // Border Color
        if (!empty($aeonmag_primary_color)) {
            $custom_css .= "

            div.menu-description:before{ 
                border-color: transparent  ".$aeonmag_primary_color."; 
            }";
        }
        if (!empty($aeonmag_primary_color)) {
            $custom_css .= "

            .widget__title__wrap{ 
                border-right-color: ".$aeonmag_primary_color."; 
            }";
        }
        if (!empty($aeonmag_primary_color)) {
            $custom_css .= "
            #author:hover, #email:hover, #url:hover, #comment:hover{ 
                border-color: ".$aeonmag_primary_color."; 
            }";
        }
        //Logo Width
        if (!empty($aeonmag_logo_width)) {
            $custom_css .= "
            .header-1 .head_one .logo{ 
                max-width : ". $aeonmag_logo_width."px; 
            }";
        }

        //Header Overlay
        if (!empty($aeonmag_header_overlay)) {
            $custom_css .= "
            .header-image:before { 
                background-color : ". $aeonmag_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($aeonmag_header_transparent)) {
            $custom_css .= "
            .header-image:before { 
                opacity : ". $aeonmag_header_transparent."; 
            }";
        }

        //Header Min Height
        if (!empty($aeonmag_header_min_height)) {
            $custom_css .= "
            .header-1 .header-image .head_one { 
                min-height : ". $aeonmag_header_min_height."px; 
            }";
        }

        $enable_cat_color = $aeonmag_theme_options['aeonmag-category-color'];

        if ($enable_cat_color == 1) {
            $args = array(
                'orderby' => 'id',
                'hide_empty' => 0
            );
            $categories = get_categories($args);
            $wp_category_list = array();
            $i = 1;
            foreach ($categories as $category_list) {
                $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;
                $cat_color = 'cat-' . esc_attr(get_cat_id($wp_category_list[$category_list->cat_ID]));
                if (array_key_exists($cat_color, $aeonmag_theme_options)) {
                    $cat_color_code = $aeonmag_theme_options[$cat_color];
                    $custom_css .= "
                    a.cat-{$category_list->cat_ID}{
                    background-color: {$cat_color_code};
                    }
                    ";
                }
                $i++;
            }
        }

        wp_add_inline_style('aeonmag-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'aeonmag_dynamic_css', 99);