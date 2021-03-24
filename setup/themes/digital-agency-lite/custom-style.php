<?php

/*---------------------------First highlight color-------------------*/

	$digital_agency_lite_first_color = get_theme_mod('digital_agency_lite_first_color');

	$digital_agency_lite_custom_css= "";

	if($digital_agency_lite_first_color != false){
		$digital_agency_lite_custom_css .='.inner-box:hover, .nav-previous a:hover, .nav-next a:hover, .single-post .nav-previous a:hover, .single-post .nav-next a:hover{';
			$digital_agency_lite_custom_css .='background-color: '.esc_attr($digital_agency_lite_first_color).';';
		$digital_agency_lite_custom_css .='}';
	}
	if($digital_agency_lite_first_color != false){
		$digital_agency_lite_custom_css .='.main-navigation a:hover, .heading-text h2{';
			$digital_agency_lite_custom_css .='color: '.esc_attr($digital_agency_lite_first_color).';';
		$digital_agency_lite_custom_css .='}';
	}	
	if($digital_agency_lite_first_color != false){
		$digital_agency_lite_custom_css .='.main-navigation a:hover{';
			$digital_agency_lite_custom_css .='color: '.esc_attr($digital_agency_lite_first_color).'!important;';
		$digital_agency_lite_custom_css .='}';
	}	
	if($digital_agency_lite_first_color != false){
		$digital_agency_lite_custom_css .='.main-navigation ul ul{';
			$digital_agency_lite_custom_css .='border-top-color: '.esc_attr($digital_agency_lite_first_color).';';
		$digital_agency_lite_custom_css .='}';
	}	
	if($digital_agency_lite_first_color != false){
		$digital_agency_lite_custom_css .='.main-navigation ul ul{';
			$digital_agency_lite_custom_css .='border-bottom-color: '.esc_attr($digital_agency_lite_first_color).';';
		$digital_agency_lite_custom_css .='}';
	}
	
	/*---------------------------second highlight color-------------------*/

	$digital_agency_lite_second_color = get_theme_mod('digital_agency_lite_second_color');

	if($digital_agency_lite_second_color != false){
		$digital_agency_lite_custom_css .='#footer .textwidget a, #footer li a:hover{';
			$digital_agency_lite_custom_css .='color: '.esc_attr($digital_agency_lite_second_color).';';
		$digital_agency_lite_custom_css .='}';
	}	
	
	$digital_agency_lite_third_color = get_theme_mod('digital_agency_lite_third_color');

	$digital_agency_lite_fourth_color = get_theme_mod('digital_agency_lite_fourth_color');

	$digital_agency_lite_fiveth_color = get_theme_mod('digital_agency_lite_fiveth_color');

	if($digital_agency_lite_fiveth_color != false){
		$digital_agency_lite_custom_css .='.main-navigation ul ul li:hover > a,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, h2.section-title a, span.posted_in a, .woocommerce-MyAccount-content p a, .post-main-box:hover h3 a,#sidebar ul li a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .woocommerce td.product-name a, .woocommerce form.woocommerce-shipping-calculator a, .woocommerce-info a, .woocommerce-privacy-policy-text p a, p.logged-in-as a{';
			$digital_agency_lite_custom_css .='color: '.esc_attr($digital_agency_lite_fiveth_color).';';
		$digital_agency_lite_custom_css .='}';
	}

	if($digital_agency_lite_third_color != false || $digital_agency_lite_first_color != false){
		$digital_agency_lite_custom_css .='.more-btn a, #comments input[type="submit"], #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer a.custom_read_more, #sidebar a.custom_read_more, .wp-block-button__link{
		background-image: linear-gradient(to right, '.esc_attr($digital_agency_lite_third_color).', '.esc_attr($digital_agency_lite_first_color).');
		}';
	}

	if($digital_agency_lite_second_color != false || $digital_agency_lite_fourth_color != false){
		$digital_agency_lite_custom_css .='.pagination span, .pagination a,#footer-2, .middle-header, #sidebar h3, nav.woocommerce-MyAccount-navigation ul li, .header-fixed, .page-template-custom-home-page .header-fixed, #footer a.custom_read_more:hover, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a{
		background-image: linear-gradient(to right, '.esc_attr($digital_agency_lite_second_color).', '.esc_attr($digital_agency_lite_fourth_color).');
		}';
	}

	$digital_agency_lite_custom_css .='@media screen and (max-width:720px) {';
	if($digital_agency_lite_second_color != false || $digital_agency_lite_fourth_color != false){
		$digital_agency_lite_custom_css .='#slider{
		background-image: linear-gradient(to right, '.esc_attr($digital_agency_lite_second_color).', '.esc_attr($digital_agency_lite_fourth_color).');
		}';
	}
	$digital_agency_lite_custom_css .='}';

	if($digital_agency_lite_first_color != false || $digital_agency_lite_third_color != false){
		$digital_agency_lite_custom_css .='#comments a.comment-reply-link,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.pagination a:hover,.pagination .current,.widget_product_search button,input[type="submit"], .scrollup i, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current{
		background-image: linear-gradient(to right, '.esc_attr($digital_agency_lite_first_color).', '.esc_attr($digital_agency_lite_third_color).');
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$digital_agency_lite_theme_lay = get_theme_mod( 'digital_agency_lite_width_option','Full Width');
    if($digital_agency_lite_theme_lay == 'Boxed'){
		$digital_agency_lite_custom_css .='body{';
			$digital_agency_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$digital_agency_lite_custom_css .='}';
		$digital_agency_lite_custom_css .='#slider{';
			$digital_agency_lite_custom_css .='right: 1%;';
		$digital_agency_lite_custom_css .='}';
	}else if($digital_agency_lite_theme_lay == 'Wide Width'){
		$digital_agency_lite_custom_css .='body{';
			$digital_agency_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$digital_agency_lite_custom_css .='}';
	}else if($digital_agency_lite_theme_lay == 'Full Width'){
		$digital_agency_lite_custom_css .='body{';
			$digital_agency_lite_custom_css .='max-width: 100%;';
		$digital_agency_lite_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$digital_agency_lite_theme_lay = get_theme_mod( 'digital_agency_lite_slider_content_option','Left');
    if($digital_agency_lite_theme_lay == 'Left'){
		$digital_agency_lite_custom_css .='#slider .carousel-caption{';
			$digital_agency_lite_custom_css .='text-align:left;';
		$digital_agency_lite_custom_css .='}';
	}else if($digital_agency_lite_theme_lay == 'Center'){
		$digital_agency_lite_custom_css .='#slider .carousel-caption{';
			$digital_agency_lite_custom_css .='text-align:center;';
		$digital_agency_lite_custom_css .='}';
	}else if($digital_agency_lite_theme_lay == 'Right'){
		$digital_agency_lite_custom_css .='#slider .carousel-caption{';
			$digital_agency_lite_custom_css .='text-align:right;';
		$digital_agency_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$digital_agency_lite_theme_lay = get_theme_mod( 'digital_agency_lite_blog_layout_option','Default');
    if($digital_agency_lite_theme_lay == 'Default'){
		$digital_agency_lite_custom_css .='.post-main-box{';
			$digital_agency_lite_custom_css .='';
		$digital_agency_lite_custom_css .='}';
	}else if($digital_agency_lite_theme_lay == 'Center'){
		$digital_agency_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$digital_agency_lite_custom_css .='text-align:center;';
		$digital_agency_lite_custom_css .='}';
		$digital_agency_lite_custom_css .='.post-info{';
			$digital_agency_lite_custom_css .='margin-top:10px;';
		$digital_agency_lite_custom_css .='}';
	}else if($digital_agency_lite_theme_lay == 'Left'){
		$digital_agency_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$digital_agency_lite_custom_css .='text-align:Left;';
		$digital_agency_lite_custom_css .='}';
		$digital_agency_lite_custom_css .='.post-main-box h2{';
			$digital_agency_lite_custom_css .='margin-top:10px;';
		$digital_agency_lite_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$digital_agency_lite_resp_stickyheader = get_theme_mod( 'digital_agency_lite_stickyheader_hide_show',false);
	if($digital_agency_lite_resp_stickyheader == true && get_theme_mod( 'digital_agency_lite_sticky_header',false) != true){
    	$digital_agency_lite_custom_css .='.header-fixed, .page-template-custom-home-page .header-fixed{';
			$digital_agency_lite_custom_css .='position:static !important;';
		$digital_agency_lite_custom_css .='} ';
	}
    if($digital_agency_lite_resp_stickyheader == true){
    	$digital_agency_lite_custom_css .='@media screen and (max-width:575px) {';
		$digital_agency_lite_custom_css .='.header-fixed, .page-template-custom-home-page .header-fixed{';
			$digital_agency_lite_custom_css .='position:fixed !important;';
		$digital_agency_lite_custom_css .='} }';
	}else if($digital_agency_lite_resp_stickyheader == false){
		$digital_agency_lite_custom_css .='@media screen and (max-width:575px){';
		$digital_agency_lite_custom_css .='.header-fixed, .page-template-custom-home-page .header-fixed{';
			$digital_agency_lite_custom_css .='position:static !important;';
		$digital_agency_lite_custom_css .='} }';
	}

	$digital_agency_lite_resp_slider = get_theme_mod( 'digital_agency_lite_resp_slider_hide_show',false);
	if($digital_agency_lite_resp_slider == true && get_theme_mod( 'digital_agency_lite_slider_arrows', false) == false){
    	$digital_agency_lite_custom_css .='#slider{';
			$digital_agency_lite_custom_css .='display:none;';
		$digital_agency_lite_custom_css .='} ';
	}
    if($digital_agency_lite_resp_slider == true){
    	$digital_agency_lite_custom_css .='@media screen and (max-width:575px) {';
		$digital_agency_lite_custom_css .='#slider{';
			$digital_agency_lite_custom_css .='display:block;';
		$digital_agency_lite_custom_css .='} }';
	}else if($digital_agency_lite_resp_slider == false){
		$digital_agency_lite_custom_css .='@media screen and (max-width:575px) {';
		$digital_agency_lite_custom_css .='#slider{';
			$digital_agency_lite_custom_css .='display:none;';
		$digital_agency_lite_custom_css .='} }';
	}

	$digital_agency_lite_resp_sidebar = get_theme_mod( 'digital_agency_lite_sidebar_hide_show',true);
    if($digital_agency_lite_resp_sidebar == true){
    	$digital_agency_lite_custom_css .='@media screen and (max-width:575px) {';
		$digital_agency_lite_custom_css .='#sidebar{';
			$digital_agency_lite_custom_css .='display:block;';
		$digital_agency_lite_custom_css .='} }';
	}else if($digital_agency_lite_resp_sidebar == false){
		$digital_agency_lite_custom_css .='@media screen and (max-width:575px) {';
		$digital_agency_lite_custom_css .='#sidebar{';
			$digital_agency_lite_custom_css .='display:none;';
		$digital_agency_lite_custom_css .='} }';
	}

	$digital_agency_lite_resp_scroll_top = get_theme_mod( 'digital_agency_lite_resp_scroll_top_hide_show',true);
	if($digital_agency_lite_resp_scroll_top == true && get_theme_mod( 'digital_agency_lite_footer_scroll',true) != true){
    	$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='visibility:hidden !important;';
		$digital_agency_lite_custom_css .='} ';
	}
    if($digital_agency_lite_resp_scroll_top == true){
    	$digital_agency_lite_custom_css .='@media screen and (max-width:575px) {';
		$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='visibility:visible !important;';
		$digital_agency_lite_custom_css .='} }';
	}else if($digital_agency_lite_resp_scroll_top == false){
		$digital_agency_lite_custom_css .='@media screen and (max-width:575px){';
		$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='visibility:hidden !important;';
		$digital_agency_lite_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$digital_agency_lite_sticky_header_padding = get_theme_mod('digital_agency_lite_sticky_header_padding');
	if($digital_agency_lite_sticky_header_padding != false){
		$digital_agency_lite_custom_css .='.header-fixed, .page-template-custom-home-page .header-fixed{';
			$digital_agency_lite_custom_css .='padding: '.esc_attr($digital_agency_lite_sticky_header_padding).';';
		$digital_agency_lite_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$digital_agency_lite_search_font_size = get_theme_mod('digital_agency_lite_search_font_size');
	if($digital_agency_lite_search_font_size != false){
		$digital_agency_lite_custom_css .='.search-box i{';
			$digital_agency_lite_custom_css .='font-size: '.esc_attr($digital_agency_lite_search_font_size).';';
		$digital_agency_lite_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$digital_agency_lite_button_padding_top_bottom = get_theme_mod('digital_agency_lite_button_padding_top_bottom');
	$digital_agency_lite_button_padding_left_right = get_theme_mod('digital_agency_lite_button_padding_left_right');
	if($digital_agency_lite_button_padding_top_bottom != false || $digital_agency_lite_button_padding_left_right != false){
		$digital_agency_lite_custom_css .='.post-main-box .more-btn a{';
			$digital_agency_lite_custom_css .='padding-top: '.esc_attr($digital_agency_lite_button_padding_top_bottom).'; padding-bottom: '.esc_attr($digital_agency_lite_button_padding_top_bottom).';padding-left: '.esc_attr($digital_agency_lite_button_padding_left_right).';padding-right: '.esc_attr($digital_agency_lite_button_padding_left_right).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_button_border_radius = get_theme_mod('digital_agency_lite_button_border_radius');
	if($digital_agency_lite_button_border_radius != false){
		$digital_agency_lite_custom_css .='.post-main-box .more-btn a{';
			$digital_agency_lite_custom_css .='border-radius: '.esc_attr($digital_agency_lite_button_border_radius).'px;';
		$digital_agency_lite_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$digital_agency_lite_single_blog_post_navigation_show_hide = get_theme_mod('digital_agency_lite_single_blog_post_navigation_show_hide',true);
	if($digital_agency_lite_single_blog_post_navigation_show_hide != true){
		$digital_agency_lite_custom_css .='.post-navigation{';
			$digital_agency_lite_custom_css .='display: none;';
		$digital_agency_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$digital_agency_lite_copyright_alingment = get_theme_mod('digital_agency_lite_copyright_alingment');
	if($digital_agency_lite_copyright_alingment != false){
		$digital_agency_lite_custom_css .='.copyright p{';
			$digital_agency_lite_custom_css .='text-align: '.esc_attr($digital_agency_lite_copyright_alingment).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_copyright_padding_top_bottom = get_theme_mod('digital_agency_lite_copyright_padding_top_bottom');
	if($digital_agency_lite_copyright_padding_top_bottom != false){
		$digital_agency_lite_custom_css .='#footer-2{';
			$digital_agency_lite_custom_css .='padding-top: '.esc_attr($digital_agency_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($digital_agency_lite_copyright_padding_top_bottom).';';
		$digital_agency_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$digital_agency_lite_scroll_to_top_font_size = get_theme_mod('digital_agency_lite_scroll_to_top_font_size');
	if($digital_agency_lite_scroll_to_top_font_size != false){
		$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='font-size: '.esc_attr($digital_agency_lite_scroll_to_top_font_size).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_scroll_to_top_padding = get_theme_mod('digital_agency_lite_scroll_to_top_padding');
	$digital_agency_lite_scroll_to_top_padding = get_theme_mod('digital_agency_lite_scroll_to_top_padding');
	if($digital_agency_lite_scroll_to_top_padding != false){
		$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='padding-top: '.esc_attr($digital_agency_lite_scroll_to_top_padding).';padding-bottom: '.esc_attr($digital_agency_lite_scroll_to_top_padding).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_scroll_to_top_width = get_theme_mod('digital_agency_lite_scroll_to_top_width');
	if($digital_agency_lite_scroll_to_top_width != false){
		$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='width: '.esc_attr($digital_agency_lite_scroll_to_top_width).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_scroll_to_top_height = get_theme_mod('digital_agency_lite_scroll_to_top_height');
	if($digital_agency_lite_scroll_to_top_height != false){
		$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='height: '.esc_attr($digital_agency_lite_scroll_to_top_height).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_scroll_to_top_border_radius = get_theme_mod('digital_agency_lite_scroll_to_top_border_radius');
	if($digital_agency_lite_scroll_to_top_border_radius != false){
		$digital_agency_lite_custom_css .='.scrollup i{';
			$digital_agency_lite_custom_css .='border-radius: '.esc_attr($digital_agency_lite_scroll_to_top_border_radius).'px;';
		$digital_agency_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$digital_agency_lite_social_icon_font_size = get_theme_mod('digital_agency_lite_social_icon_font_size');
	if($digital_agency_lite_social_icon_font_size != false){
		$digital_agency_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$digital_agency_lite_custom_css .='font-size: '.esc_attr($digital_agency_lite_social_icon_font_size).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_social_icon_padding = get_theme_mod('digital_agency_lite_social_icon_padding');
	if($digital_agency_lite_social_icon_padding != false){
		$digital_agency_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$digital_agency_lite_custom_css .='padding: '.esc_attr($digital_agency_lite_social_icon_padding).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_social_icon_width = get_theme_mod('digital_agency_lite_social_icon_width');
	if($digital_agency_lite_social_icon_width != false){
		$digital_agency_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$digital_agency_lite_custom_css .='width: '.esc_attr($digital_agency_lite_social_icon_width).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_social_icon_height = get_theme_mod('digital_agency_lite_social_icon_height');
	if($digital_agency_lite_social_icon_height != false){
		$digital_agency_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$digital_agency_lite_custom_css .='height: '.esc_attr($digital_agency_lite_social_icon_height).';';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_social_icon_border_radius = get_theme_mod('digital_agency_lite_social_icon_border_radius');
	if($digital_agency_lite_social_icon_border_radius != false){
		$digital_agency_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$digital_agency_lite_custom_css .='border-radius: '.esc_attr($digital_agency_lite_social_icon_border_radius).'px;';
		$digital_agency_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$digital_agency_lite_related_product_show_hide = get_theme_mod('digital_agency_lite_related_product_show_hide',true);
	if($digital_agency_lite_related_product_show_hide != true){
		$digital_agency_lite_custom_css .='.related.products{';
			$digital_agency_lite_custom_css .='display: none;';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_products_padding_top_bottom = get_theme_mod('digital_agency_lite_products_padding_top_bottom');
	if($digital_agency_lite_products_padding_top_bottom != false){
		$digital_agency_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$digital_agency_lite_custom_css .='padding-top: '.esc_attr($digital_agency_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($digital_agency_lite_products_padding_top_bottom).'!important;';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_products_padding_left_right = get_theme_mod('digital_agency_lite_products_padding_left_right');
	if($digital_agency_lite_products_padding_left_right != false){
		$digital_agency_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$digital_agency_lite_custom_css .='padding-left: '.esc_attr($digital_agency_lite_products_padding_left_right).'!important; padding-right: '.esc_attr($digital_agency_lite_products_padding_left_right).'!important;';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_products_box_shadow = get_theme_mod('digital_agency_lite_products_box_shadow');
	if($digital_agency_lite_products_box_shadow != false){
		$digital_agency_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$digital_agency_lite_custom_css .='box-shadow: '.esc_attr($digital_agency_lite_products_box_shadow).'px '.esc_attr($digital_agency_lite_products_box_shadow).'px '.esc_attr($digital_agency_lite_products_box_shadow).'px #ddd;';
		$digital_agency_lite_custom_css .='}';
	}

	$digital_agency_lite_products_border_radius = get_theme_mod('digital_agency_lite_products_border_radius');
	if($digital_agency_lite_products_border_radius != false){
		$digital_agency_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$digital_agency_lite_custom_css .='border-radius: '.esc_attr($digital_agency_lite_products_border_radius).'px;';
		$digital_agency_lite_custom_css .='}';
	}