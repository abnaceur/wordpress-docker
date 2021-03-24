<?php

		/*---------------------------First highlight color-------------------*/

	$vw_life_coach_first_color = get_theme_mod('vw_life_coach_first_color');

	$vw_life_coach_custom_css= "";

	/*---------------- Second highlight color-------------------*/

	$vw_life_coach_second_color = get_theme_mod('vw_life_coach_second_color');

	if($vw_life_coach_first_color != false || $vw_life_coach_second_color != false){
		$vw_life_coach_custom_css .='input[type="submit"], .top-bar,#footer-2,.main-inner-box span.entry-date,#comments a.comment-reply-link, .more-btn a, #comments input[type="submit"], .widget_product_search button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .wp-block-button__link{
		background: linear-gradient(to right, '.esc_html($vw_life_coach_first_color).', '.esc_html($vw_life_coach_second_color).');
		}';
	}

	if($vw_life_coach_second_color != false || $vw_life_coach_first_color != false){
		$vw_life_coach_custom_css .='#slider .carousel-caption h1{
		border-image: linear-gradient(to bottom, '.esc_html($vw_life_coach_second_color).', '.esc_html($vw_life_coach_first_color).') 1 100%;
		}';
	}

	/*---------------- Third highlight color-------------------*/

	$vw_life_coach_third_color = get_theme_mod('vw_life_coach_third_color');

	if($vw_life_coach_third_color != false){
		$vw_life_coach_custom_css .='.woocommerce span.onsale{';
			$vw_life_coach_custom_css .='background-color: '.esc_html($vw_life_coach_third_color).';';
		$vw_life_coach_custom_css .='}';
	}

	if($vw_life_coach_third_color != false){
		$vw_life_coach_custom_css .='.inner-box i, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus,a{
			color: '.esc_html($vw_life_coach_third_color).';
		}';
	}

	if($vw_life_coach_third_color != false){
		$vw_life_coach_custom_css .='@media screen and (max-width: 1000px){
		.main-navigation a:hover{';
			$vw_life_coach_custom_css .='color: '.esc_html($vw_life_coach_third_color). '!important;';
		$vw_life_coach_custom_css .='} }';
	}

	/*---------------- Fourth highlight color-------------------*/

	$vw_life_coach_fourth_color = get_theme_mod('vw_life_coach_fourth_color');

	if($vw_life_coach_fourth_color != false){
		$vw_life_coach_custom_css .='.main-navigation ul.sub-menu>li>a:before{';
			$vw_life_coach_custom_css .='background-color: '.esc_html($vw_life_coach_fourth_color).';';
		$vw_life_coach_custom_css .='}';
	}

	if($vw_life_coach_fourth_color != false){
		$vw_life_coach_custom_css .='.main-navigation ul.sub-menu a:hover, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, a.doc_btn i{
			color: '.esc_html($vw_life_coach_fourth_color).';
		}';
	}

	if($vw_life_coach_third_color != false || $vw_life_coach_fourth_color != false){
		$vw_life_coach_custom_css .='.custom-social-icons i:hover, .cosulation-btn a, .more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .scrollup i, #sidebar h3, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .toggle-nav i, .wp-block-button .wp-block-button__link:hover, .wp-block-button .wp-block-button__link:focus, #sidebar .tagcloud a:hover,.pagination span, .pagination a{
			background: linear-gradient(to right, '.esc_html($vw_life_coach_third_color).', '.esc_html($vw_life_coach_fourth_color).');
		}';
	}

	if($vw_life_coach_third_color != false || $vw_life_coach_fourth_color != false){
		$vw_life_coach_custom_css .='.middle-bar p i, .heading-text strong{
		background: linear-gradient(to right, '.esc_html($vw_life_coach_third_color).', '.esc_html($vw_life_coach_fourth_color).');
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_life_coach_theme_lay = get_theme_mod( 'vw_life_coach_width_option','Full Width');
    if($vw_life_coach_theme_lay == 'Boxed'){
		$vw_life_coach_custom_css .='body{';
			$vw_life_coach_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_life_coach_custom_css .='}';
		$vw_life_coach_custom_css .='#slider .carousel-control-prev-icon{';
			$vw_life_coach_custom_css .='border-width: 25px 163px 25px 0; top: 42px;';
		$vw_life_coach_custom_css .='}';
		$vw_life_coach_custom_css .='#slider .carousel-control-next-icon{';
			$vw_life_coach_custom_css .='border-width: 25px 0 25px 170px; top: 42px;';
		$vw_life_coach_custom_css .='}';
	}else if($vw_life_coach_theme_lay == 'Wide Width'){
		$vw_life_coach_custom_css .='body{';
			$vw_life_coach_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_life_coach_custom_css .='}';
	}else if($vw_life_coach_theme_lay == 'Full Width'){
		$vw_life_coach_custom_css .='body{';
			$vw_life_coach_custom_css .='max-width: 100%;';
		$vw_life_coach_custom_css .='}';
	}

	/*--------------------------- Slider Content Layout -------------------*/

	$vw_life_coach_slider_image = get_theme_mod('vw_life_coach_slider_image');
	if($vw_life_coach_slider_image != false){
		$vw_life_coach_custom_css .='#slider{';
			$vw_life_coach_custom_css .='background: url('.esc_url($vw_life_coach_slider_image).');';
		$vw_life_coach_custom_css .='}';
	}

	$vw_life_coach_theme_lay = get_theme_mod( 'vw_life_coach_slider_content_option','Left');
    if($vw_life_coach_theme_lay == 'Left'){
		$vw_life_coach_custom_css .='#slider .carousel-caption{';
			$vw_life_coach_custom_css .='text-align:left; right: 48%;';
		$vw_life_coach_custom_css .='}';
		$vw_life_coach_custom_css .='#slider .carousel-caption h1{';
			$vw_life_coach_custom_css .='border-left: solid 4px; padding-left: 15px;';
		$vw_life_coach_custom_css .='}';
	}else if($vw_life_coach_theme_lay == 'Center'){
		$vw_life_coach_custom_css .='#slider .carousel-caption{';
			$vw_life_coach_custom_css .='text-align:center; right: 25%; left: 25%;';
		$vw_life_coach_custom_css .='}';
		$vw_life_coach_custom_css .='#slider .carousel-caption h1{';
			$vw_life_coach_custom_css .='border:none';
		$vw_life_coach_custom_css .='}';
	}else if($vw_life_coach_theme_lay == 'Right'){
		$vw_life_coach_custom_css .='#slider .carousel-caption{';
			$vw_life_coach_custom_css .='text-align:right; right: 10%; left: 48%;';
		$vw_life_coach_custom_css .='}';
		$vw_life_coach_custom_css .='#slider .carousel-caption h1{';
			$vw_life_coach_custom_css .='border-right: solid 4px; padding-right: 15px;';
		$vw_life_coach_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_life_coach_theme_lay = get_theme_mod( 'vw_life_coach_blog_layout_option','Default');
    if($vw_life_coach_theme_lay == 'Default'){
		$vw_life_coach_custom_css .='.post-main-box{';
			$vw_life_coach_custom_css .='';
		$vw_life_coach_custom_css .='}';
	}else if($vw_life_coach_theme_lay == 'Center'){
		$vw_life_coach_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$vw_life_coach_custom_css .='text-align:center;';
		$vw_life_coach_custom_css .='}';
		$vw_life_coach_custom_css .='.post-info{';
			$vw_life_coach_custom_css .='margin-top:10px;';
		$vw_life_coach_custom_css .='}';
	}else if($vw_life_coach_theme_lay == 'Left'){
		$vw_life_coach_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$vw_life_coach_custom_css .='text-align:Left;';
		$vw_life_coach_custom_css .='}';
		$vw_life_coach_custom_css .='.post-main-box h2{';
			$vw_life_coach_custom_css .='margin-top:10px;';
		$vw_life_coach_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_life_coach_resp_slider = get_theme_mod( 'vw_life_coach_resp_slider_hide_show',true);
    if($vw_life_coach_resp_slider == true){
    	$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='#slider{';
			$vw_life_coach_custom_css .='display:block;';
		$vw_life_coach_custom_css .='} }';
	}else if($vw_life_coach_resp_slider == false){
		$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='#slider{';
			$vw_life_coach_custom_css .='display:none;';
		$vw_life_coach_custom_css .='} }';
	}

	$vw_life_coach_resp_metabox = get_theme_mod( 'vw_life_coach_metabox_hide_show',true);
    if($vw_life_coach_resp_metabox == true){
    	$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='.post-info{';
			$vw_life_coach_custom_css .='display:block;';
		$vw_life_coach_custom_css .='} }';
	}else if($vw_life_coach_resp_metabox == false){
		$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='.post-info{';
			$vw_life_coach_custom_css .='display:none;';
		$vw_life_coach_custom_css .='} }';
	}

	$vw_life_coach_resp_sidebar = get_theme_mod( 'vw_life_coach_sidebar_hide_show',true);
    if($vw_life_coach_resp_sidebar == true){
    	$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='#sidebar{';
			$vw_life_coach_custom_css .='display:block;';
		$vw_life_coach_custom_css .='} }';
	}else if($vw_life_coach_resp_sidebar == false){
		$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='#sidebar{';
			$vw_life_coach_custom_css .='display:none;';
		$vw_life_coach_custom_css .='} }';
	}

	$vw_life_coach_resp_scroll_top = get_theme_mod( 'vw_life_coach_resp_scroll_top_hide_show',false);
    if($vw_life_coach_resp_scroll_top == true){
    	$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='.scrollup i{';
			$vw_life_coach_custom_css .='display:block;';
		$vw_life_coach_custom_css .='} }';
	}else if($vw_life_coach_resp_scroll_top == false){
		$vw_life_coach_custom_css .='@media screen and (max-width:575px) {';
		$vw_life_coach_custom_css .='.scrollup i{';
			$vw_life_coach_custom_css .='display:none !important;';
		$vw_life_coach_custom_css .='} }';
	}

	/*---------------- Button Settings ------------------*/

	$vw_life_coach_button_border_radius = get_theme_mod('vw_life_coach_button_border_radius');
	if($vw_life_coach_button_border_radius != false){
		$vw_life_coach_custom_css .='.post-main-box .more-btn a{';
			$vw_life_coach_custom_css .='border-radius: '.esc_attr($vw_life_coach_button_border_radius).'px;';
		$vw_life_coach_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_life_coach_copyright_alingment = get_theme_mod('vw_life_coach_copyright_alingment');
	if($vw_life_coach_copyright_alingment != false){
		$vw_life_coach_custom_css .='.copyright p{';
			$vw_life_coach_custom_css .='text-align: '.esc_attr($vw_life_coach_copyright_alingment).';';
		$vw_life_coach_custom_css .='}';
	}