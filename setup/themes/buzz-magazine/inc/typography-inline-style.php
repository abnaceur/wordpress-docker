<?php
/**
 * Inline Typography For Dynamic Css
 * @package Buzz_Magazine
 */

if (!function_exists('buzz_magazine_inline_styles')):
    function buzz_magazine_inline_styles (){

	    /*
		 * Breadcrumb Section
		 */
        $breadcrumb_background_color                 = get_theme_mod('breadcrumb_background_color','#404d5b');

        /*
         * Archive Section
         */
        $archive_post_align                          = get_theme_mod('archive_post_align','left');

        /**
         * Single Post Section
         */
        $single_post_align                          = get_theme_mod('single_post_align' ,'left');

        /**
         * Page Section
         */
        $page_align                                 = get_theme_mod('page_align','left');

        $custom_inline_css = '
           
        .page-title-wrap:before{
        background-color:'.esc_attr($breadcrumb_background_color).';
        }

         .archive-align-wrap {
             text-align: '.esc_attr($archive_post_align).';
         }
         
         .single-post-wrap, .single-post-wrap .entry-header, .single-post-wrap .entry-meta , .single-post-wrap .entry-content , .single-post-wrap .post-cat-list .cat-links a , .single-post-wrap .social-links{
            text-align:'.esc_attr($single_post_align).';
         } 
         
         .page-wrap{
            text-align:'.esc_attr($page_align).';
         }                        
    ';
        wp_add_inline_style( 'buzz-magazine-style', $custom_inline_css );

    }

endif;

add_action( 'wp_enqueue_scripts', 'buzz_magazine_inline_styles' );
