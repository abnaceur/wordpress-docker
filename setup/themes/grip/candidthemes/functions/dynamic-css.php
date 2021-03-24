<?php
/**
 * Dynamic CSS elements.
 *
 * @package grip
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('grip_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @since 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function grip_dynamic_css()
    {
        global $grip_theme_options;
        /* Paragraph Font Options */
        $grip_google_fonts = grip_google_fonts();
        $grip_body_fonts = esc_attr($grip_theme_options['grip-font-family-url']);
        $grip_font_family = $grip_google_fonts[$grip_body_fonts];
        $grip_font_size = $grip_theme_options['grip-font-paragraph-font-size'] ? absint( $grip_theme_options['grip-font-paragraph-font-size'] ) : 16;
    
        /* Heading Font Option */
        $grip_heading_fonts = esc_attr($grip_theme_options['grip-font-heading-family-url']);
        $grip_heading_font_family = $grip_google_fonts[$grip_heading_fonts];
        
        $grip_primary_color = $grip_theme_options['grip-primary-color'] ?  esc_attr( $grip_theme_options['grip-primary-color'] ) : '#ff8800';
        $grip_header_color = get_header_textcolor();
        $grip_custom_css = '';

        if (!empty($grip_header_color)) {
            $grip_custom_css .= ".site-title, .site-title a { color: #{$grip_header_color}; }";
        }
    
        /* Heading Typography Section */
        if (!empty($grip_heading_font_family)) {
            $grip_custom_css .= "h1, h2, h3, h4, h5, h6, 
                                .header-text, .site-title, 
                                .entry-content a.read-more-text, 
                                .ct-title-head { font-family: {$grip_heading_font_family}; }";
        }

        /* Body Typography Section */
        if (!empty($grip_font_family)) {
            $grip_custom_css .= "body { font-family: {$grip_font_family}; }";
        }

        if (!empty($grip_font_size)) {
            $grip_custom_css .= "body { font-size: {$grip_font_size}px; }";
        }

        /* Primary Color Section */
        if (!empty($grip_primary_color)) {
            //font-color
            $grip_custom_css .= ".entry-content a, .entry-title a:hover, .related-title a:hover, .posts-navigation .nav-previous a:hover, .post-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .post-navigation .nav-next a:hover, #comments .comment-content a:hover, #comments .comment-author a:hover, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item > a, .offcanvas-menu nav ul.top-menu li a:hover, .offcanvas-menu nav ul.top-menu li.current-menu-item > a, .post-share a:hover, .error-404-title, #grip-breadcrumbs a:hover, .entry-content a.read-more-text:hover, a:hover, a:visited:hover { color : {$grip_primary_color}; }";

            //background-color
            $grip_custom_css .= ".trending-title, .search-form input[type=submit], input[type=\"submit\"], ::selection, #toTop, .breadcrumbs span.breadcrumb, article.sticky .grip-content-container, .candid-pagination .page-numbers.current, .candid-pagination .page-numbers:hover, .ct-title-head, .widget-title:before, .widget ul.ct-nav-tabs:before, .widget ul.ct-nav-tabs li.ct-title-head:hover, .widget ul.ct-nav-tabs li.ct-title-head.ui-tabs-active { background : {$grip_primary_color}; }";

            //border-color
            $grip_custom_css .= "blockquote, .search-form input[type=\"submit\"], input[type=\"submit\"], .candid-pagination .page-numbers { border-color : {$grip_primary_color}; }";
            //woocommerce buttons
            if (class_exists('WooCommerce')) {
                // code that requires WooCommerce
                //background-color
                $grip_custom_css .= ".woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover { background-color : {$grip_primary_color}; }";
            }
        }

        $enable_category_color = $grip_theme_options['grip-enable-category-color'];
        if($enable_category_color == 1){
            $args = array(
                'orderby' => 'id',
                'hide_empty' => 0
            );
            $categories = get_categories( $args );
            $wp_category_list = array();
            $i = 1;
            foreach ($categories as $category_list ) {
                $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;
                $cat_color = 'cat-'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) );
                if(array_key_exists($cat_color, $grip_theme_options)) {
                    $cat_color_code = $grip_theme_options[$cat_color];
                    $grip_custom_css .= "
                    .cat-{$category_list->cat_ID} .ct-title-head,
                    .cat-{$category_list->cat_ID}.widget-title:before,
                     .cat-{$category_list->cat_ID} .widget-title:before {
                    background: {$cat_color_code}!important;
                    }
                    ";
                }
                $i++;
            }
        }
        wp_add_inline_style('grip-style', $grip_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'grip_dynamic_css', 99);