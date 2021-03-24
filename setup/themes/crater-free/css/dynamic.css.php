<?php
/**
 * Crater Free : Dynamic CSS Stylesheet
 *
 */


function crater_free_dynamic_css_stylesheet() {

    $link_color= sanitize_hex_color(get_theme_mod( 'cr_link_color','#555555' ));
    $link_hover_color= sanitize_hex_color(get_theme_mod( 'cr_link_hover_color','#555555' ));

    $heading_color= sanitize_hex_color(get_theme_mod( 'cr_heading_color','#444444' ));
    $heading_hover_color= sanitize_hex_color(get_theme_mod( 'cr_heading_hover_color','#dd3333' ));

    $button_color= sanitize_hex_color(get_theme_mod( 'cr_button_color','#fe7237' ));
    $button_hover_color= sanitize_hex_color(get_theme_mod( 'cr_button_hover_color','#db5218' ));


    $footer_bg_color= sanitize_hex_color(get_theme_mod( 'cr_footer_bg_color','#000000' ));
    $footer_content_color= sanitize_hex_color(get_theme_mod( 'cr_footer_content_color','#ffffff' ));
    $footer_links_color= sanitize_hex_color(get_theme_mod( 'cr_footer_links_color','#b3b3b3' ));

    $header_bg_color= sanitize_hex_color(get_theme_mod( 'cr_header_bg_color','#fff' ));
    $top_menu_color= sanitize_hex_color(get_theme_mod( 'cr_top_menu_color','#000' ));
    $top_active_menu_color= sanitize_hex_color(get_theme_mod( 'cr_top_active_menu_color','#b91313' ));
    $top_menu_bb_color= sanitize_hex_color(get_theme_mod( 'cr_top_menu_bb_color','#b91313' ));

    $sb_items_border_color= sanitize_hex_color(get_theme_mod( 'cr_sb_items_border_color','#ff0000' ));

    $site_title_color= sanitize_hex_color(get_theme_mod( 'cr_site_title_color','#000' ));
    $site_desc_color= sanitize_hex_color(get_theme_mod( 'cr_site_desc_color','#000' ));

    //fonts
    $body_font_size= absint(get_theme_mod( 'cr_body_font_size','13' ));

    //menu fonts
    $menu_font_size= absint(get_theme_mod( 'cr_menu_font_size','13' ));

    $menu_padding= absint(get_theme_mod( 'cr_menu_pad','20' ));
    $logo_padding= absint(get_theme_mod( 'cr_logo_pad','15' ));
    $inner_logo_padding= absint(get_theme_mod( 'cr_ip_logo_pad','15' ));
    $site_desc_padding= absint(get_theme_mod( 'cr_site_desc_pad','5' ));

    //button radius
    $button_radius= absint(get_theme_mod( 'cr_button_radius','0' ));

    //sticky header
    $sticky_menu_pad= absint(get_theme_mod( 'cr_sticky_menu_pad','20' ));
    $sticky_menu_color= sanitize_hex_color(get_theme_mod( 'cr_sticky_menu_color','#000' ));
    $sticky_logo_height= absint(get_theme_mod( 'cr_sticky_logo_height','50' ));

    //inner page title spacing
    $page_title_pad= absint(get_theme_mod( 'cr_page_title_pad','20' ));

    //sidebar
    $sidebar_headings_font_size= absint(get_theme_mod( 'cr_sidebar_headings_font_size','15' ));

    //inner page
    $ip_menu_color= sanitize_hex_color(get_theme_mod( 'cr_ip_menu_color','#000' ));
    $ip_content_spacing= absint(get_theme_mod( 'cr_ip_content_spacing','0' ));

    //front page
    $fp_content_spacing= absint(get_theme_mod( 'cr_fp_content_spacing','0' ));   

    //preloader image
    $preloader_image=esc_url(get_theme_mod( 'cr_custom_preloader_img' ));  

    $css = '

    html{
        font-size: ' . $body_font_size . 'px;
    }

    html, body{
        font-size: ' . $body_font_size . 'px;
    }

    h1,h2,h3,h4,h5,h6{
        color: ' . $heading_color . ';
    }

    .site-title a,
    .site-title a:hover,
    .site-title a:focus,
    .site-title a:visited{
        color: ' . $site_title_color . ';
    }

    .crater-menu-wrapper.page p.site-description{
        color: ' . $site_desc_color . ';
    }

    #crater-main-menu-wrapper .nav>li>a,
    #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu li a{
        font-size: ' . $menu_font_size . 'px;
    }

    #crater-main-menu-wrapper .nav>li{
        padding: ' . $menu_padding . 'px 0;
    }

    .crater-menu-wrapper.style1 a.custom-logo-link,
    .crater-menu-wrapper.style2 a.custom-logo-link {
        margin-top: ' . $logo_padding . 'px;
    }

    .crater-menu-wrapper.style1 a.logo-inner-page,
    .crater-menu-wrapper.style2 a.logo-inner-page {
        margin-top: ' . $inner_logo_padding . 'px;
    }

    p.site-description{
        margin: ' . $site_desc_padding . 'px 0;
    }

    a{
        color: ' . $link_color . ';
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    a:hover,a:focus{
        color: ' . $link_hover_color . ';
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    h1,h2,h3,h4,h5,h6{
        color: ' . $heading_color . ';
    }

    h1:hover,
    h2:hover,
    h3:hover,
    h4:hover,
    h5:hover,
    h6:hover{
        color: ' . $heading_hover_color . ';
    }

    .title-date h1>a{
        color: ' . $heading_color . ';
    }

    .title-date h1>a:hover{
        color: ' . $heading_hover_color . ';
    }

    #commentform input[type=submit]{
        background: ' . $button_color . ' !important;
    }

    #commentform input[type=submit]:hover,
    #commentform input[type=submit]:focus {
        background: ' . $button_hover_color . ' !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out;
    }

    .slide-bg-section .read-more a:hover,
    .slider .slider-button .read-more a:hover,
    .slider-buttons a:hover,
    .slide-bg-section .read-more a:focus,
    .slider .slider-button .read-more a:focus,
    .slider-buttons a:focus {
        background: ' . $button_hover_color . ' !important;
        border: 1px solid ' . $button_hover_color . ' !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out;
    }

    .btn-default{
        background: ' . $button_color . ' !important;
        border: 1px solid ' . $button_color . ' !important;
    }

    .btn-default:hover,
    .btn-default:focus{
        background: ' . $button_hover_color . ' !important;
    }

    .slider-buttons a .btn-default{
        background:none !important;
    }

    .pagination .nav-links .current{
        background: ' . $link_color . ' !important;
    }

    footer#footer{
        background: ' . $footer_bg_color . ';
        color: ' . $footer_content_color . ';
    }

    footer h4{
        color: ' . $footer_content_color . ';
    }

    footer#footer a,
    footer#footer a:hover{
        color: ' . $footer_links_color . ';
    }

    #search-box .search input{
        color: #555;
    }

    #search-box .search input::-webkit-input-placeholder,
    #search-box .search input::placeholder{
       color: ' . $top_menu_color . ';
    }

    #crater-main-menu-wrapper .nav>li>a,
    #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu li a,
    .navbar-toggle{
        color: ' . $top_menu_color . ';
    }

    #crater-main-menu-wrapper .nav>li.active{
        background: ' . $top_active_menu_color . ';
        border-bottom: 3px solid ' . $top_menu_bb_color . ';
    }

    #crater-main-menu-wrapper .nav>li:hover{
        border-bottom: 3px solid ' . $top_menu_bb_color . ';
    }

    .crater-main-menu.page .navbar-toggle{
        color: #555 !important;
    }

    header #crater-main-menu-wrapper .menu-search:before{
        border: 1px solid ' . $top_menu_color . ';
    }

    header #crater-main-menu-wrapper .menu-search:after,
    header #crater-main-menu-wrapper .menu-search-x:before,
    header #crater-main-menu-wrapper .menu-search-x:after{
        background-color: ' . $top_menu_color . ';
    }

    header.style1.fixed #crater-main-menu-wrapper .menu-search:before,
    header.style2.fixed #crater-main-menu-wrapper .menu-search:before {
        border: 1px solid ' . $sticky_menu_color . ';
    }

    header.style1.fixed #crater-main-menu-wrapper .menu-search:after,
    header.style1.fixed #crater-main-menu-wrapper .menu-search-x:before,
    header.style1.fixed #crater-main-menu-wrapper .menu-search-x:after,

    header.style2.fixed #crater-main-menu-wrapper .menu-search:after,
    header.style2.fixed #crater-main-menu-wrapper .menu-search-x:before,
    header.style2.fixed #crater-main-menu-wrapper .menu-search-x:after {
        background-color: ' . $sticky_menu_color . ';
    }

    #search-box .search input{
        color: #555;
    }

    #search-box .search input::-webkit-input-placeholder,
    #search-box .search input::placeholder{
       color: ' . $top_menu_color . ';
    }

    #crater-main-menu-wrapper .nav>li>a,
    #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu li a,
    .navbar-toggle{
        color: ' . $top_menu_color . ';
    }

    #crater-main-menu-wrapper .nav>li.active{
        background: ' . $top_active_menu_color . ';
        border-bottom: 3px solid ' . $top_menu_bb_color . ';
    }

    .crater-main-menu.page .navbar-toggle{
        color: #555 !important;
    }

    header.crater-menu-wrapper.style1{
        background: ' . $header_bg_color . ';
    }

    header.menu-wrapper.fixed nav ul li a,
    header.menu-wrapper.style-2.fixed nav ul li a{
        color: #555;
    }

    .slide-bg-section h1,
    .slide-bg-section,
    .slide-bg-section .read-more a{
        color: #fff;
    }

    .slide-bg-section .read-more a,
    .scroll-down .mouse{
        border: 1px solid: #fff !important;
    }

    .blog-wrapper .read-more a{
        background: ' . $button_color . ' !important;
    }

    .blog-wrapper .read-more a:hover,
    .blog-wrapper .read-more a:focus{
        background: ' . $button_hover_color . ' !important;
    }

    form.wpcf7-form input,
    form.wpcf7-form textarea,
    form.wpcf7-form radio,
    form.wpcf7-form checkbox{
        border: 1px solid #d0d0d0;
        color: #555;
    }

    form.wpcf7-form input::placeholder,
    form.wpcf7-form textarea::placeholder{
        color: #555;
    }

    form.wpcf7-form input[type="submit"]{
        color: #fff;
    }

    form.wpcf7-form input[type="submit"]:hover,
    form.wpcf7-form input[type="submit"]:focus{
        background: ' . $button_hover_color . ' !important;
        color: #fff;
    }

    form.wpcf7-form label{
        color: #555;
    }

    button.navbar-toggle,
    button.navbar-toggle:hover{
        background: none !important;
        box-shadow: none;
    }

    .style1 button.navbar-toggle,
    .style1 button.navbar-toggle:hover,
    .style2 button.navbar-toggle,
    .style2 button.navbar-toggle:hover {
        margin-top: 20px !important;
    }


    .style1 .navbar-toggle{
        float: right;
    }

    .btntoTop.active:hover{
        background: ' . $button_color . ';
        border: 1px solid ' . $button_color . ';
    }

    .menu-social li a{
        color: ' . $link_color . ';
    }

    .menu-social li a:hover{
        color: ' . $link_hover_color . ';
    }

    button.mfp-close,
    button.mfp-arrow{
        background: none !important;
        border-radius: none;
    }

    aside h4.widget-title:hover{
        color: inherit;
    }

    aside h4.widget-title:hover{
        color: ' . $heading_hover_color . ';
    }

    aside .widget li{
        border-left: 4px solid ' . $sb_items_border_color . ';
    }

    .home.page .content-inner {
        margin: 0;
    }

    header.style1.fixed #crater-main-menu-wrapper .nav>li{
        padding: ' . $sticky_menu_pad . 'px 0;
    }

    header.style1.fixed #crater-main-menu-wrapper .nav>li.active a{
        color: #fff;
    }

    .section-title.page-title{
        padding: ' . $page_title_pad . 'px 5px;
    }

    header #logo-alt img {
        max-height: ' . $sticky_logo_height . 'px;
    }

    .btn,
    article .read-more a,
    button,
    input[type="submit"],
    input[type="reset"],
    .slide-bg-section .read-more a,
    .slider .slider-button .read-more a {
        border-radius: ' . $button_radius . 'px;
    }

    .slide-bg-section .read-more a{
        background: ' . $button_color . ';
        color: #fff !important;
    }

    .slider .slider-button .read-more a{
        background: ' . $button_color . ';
        color: #fff !important;
    }

    button,
    input[type=submit],
    input[type="reset"],
    article .read-more a{
        background: ' . $button_color . ';
    }

    button:hover,
    input[type=submit]:hover,
    input[type=reset]:hover,
    article .read-more a:hover,
    button:focus,
    input[type=submit]:focus,
    input[type=reset]:focus,
    article .read-more a:focus {
        background: ' . $button_hover_color . ';
    }

    header#page-inner #crater-main-menu-wrapper .nav>li.active a{
        color: #fff;
    }

    header#page-inner #crater-main-menu-wrapper .menu-search:before{
        border: 1px solid ' . $ip_menu_color . ';
    }

    header#page-inner #crater-main-menu-wrapper .menu-search:after,
    header#page-inner #crater-main-menu-wrapper .menu-search-x:before,
    header#page-inner #crater-main-menu-wrapper .menu-search-x:after{
        background-color: ' . $ip_menu_color . ';
    }
    
}
';

if('style2'===esc_html(get_theme_mod('cr_header_menu_style','style1'))) {
    $css .='
         .elementor-editor-active header.style2{
            display: none;
        }

        #slider-inner {
            height: 100vh;
        }
    ';
}

if('style2'===esc_html(get_theme_mod('cr_ip_header_menu_style','style1'))) {
    $css .='
         header#page-inner.crater-menu-wrapper.style2,
         header#page-inner.crater-menu-wrapper.style1{
           position: absolute;
           background: none;
           width: 100%;
           z-index: 1;
           top: 0%;
         }

         .elementor-editor-active header#page-inner{
            display: none;
        }

        .blog header#page-inner.crater-menu-wrapper.style2,
        .blog header#page-inner.crater-menu-wrapper.style1,
        .single header#page-inner.crater-menu-wrapper.style2,
        .single header#page-inner.crater-menu-wrapper.style1,
        .archive header#page-inner.crater-menu-wrapper.style2,
        .archive header#page-inner.crater-menu-wrapper.style1,
        .woocommerce-page header#page-inner.crater-menu-wrapper.style2,
        .woocommerce-page header#page-inner.crater-menu-wrapper.style1{
            position: relative;
        }
    ';
}
else{
  $css .='
       header#page-inner.crater-menu-wrapper.style2,
       header#page-inner.crater-menu-wrapper.style1{
         position: relative;
       }

       header#page-inner.crater-menu-wrapper.style2.fixed,
       header#page-inner.crater-menu-wrapper.style1.fixed{
         position: fixed;
       }
  ';
}

if(true===get_theme_mod( 'cr_homepage_sidebar',false)){
    $css .='
         aside#secondary{
            margin-top: 100px;
        }
    ';
}

if(true===get_theme_mod( 'cr_hide_page_title',false)){
    $css .='
         .title.content-section{
            display: none;
         }
    ';
}

if(true===get_theme_mod( 'cr_home_dark_overlay',true)){
    if('style2'===esc_attr(get_theme_mod('cr_header_menu_style','style1'))) {
        $css .='
             #slider-inner:before {
                content: "";
                position: absolute;
                width: 100%;
                height: 100vh;
                background: rgba(0,0,0,.5);
                text-align: center;
                color: #fff;
            }
        ';
    }
    else{
        $css .='
             #slider-inner:before {
                content: "";
                position: absolute;
                width: 100%;
                height: 90vh;
                background: rgba(0,0,0,.5);
                text-align: center;
                color: #fff;
            }
        ';
    }
    
}

if(true===get_theme_mod( 'cr_page_dark_overlay',false)){
    $css .='
         .page-title .img-overlay{
            background: rgba(0,0,0,.5);
            color: #fff;
        }
    ';
}

if('right'===esc_html(get_theme_mod( 'cr_blog_sidebar','right'))) {
    $css .='
         .blog article,
         .single article,
         .archive article{
            padding-right: 40px;
        }
    ';
}
else if('left'===esc_html(get_theme_mod( 'cr_blog_sidebar','right'))) {
    $css .='
         .blog article,
         .single article,
         .archive article{
            padding-left: 40px;
        }
    ';
}
else{
    $css .='
         .blog article{
            padding: 0;
        }
    ';
}

if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')){
    $css .='
        footer#footer{
            padding-top: 50px;
        }
    ';
}

if("slider" != esc_html(get_theme_mod( 'cr_slide_options_radio' )) && is_front_page()){
	$css .='
        .header-outer{
            margin-top: 0 !important;
        }
    ';
}

if(is_page()){
    $css .='
        .header-outer{
            margin-top: 200px !important;
        }
    ';
}

if(is_front_page()){
    if(0!=$fp_content_spacing){
        $css .='
            #main .content-inner{
                margin: ' . $fp_content_spacing . 'px 0;
            }
        ';
    }
}
else{
    if(0!=$ip_content_spacing){
        $css .='
            #main .content-inner{
                margin: ' . $ip_content_spacing . 'px 0;
            }
        ';    
    }
}


if(true===get_theme_mod( 'cr_footer_social_backward_comp',false)){
    $css .='

        #menu-social-menu li a::before{
            display: block;
            font-size: 18px;
            text-align: center;
            width: 37px;
            line-height: 37px;
            border-radius: 50%;
            font-family: FontAwesome;
            color: inherit;
        }

        #menu-social-menu li a[href*="facebook.com"]::before {
          content: "\f09a";
          background: #3b5998;
          color: #fff;
        }

        #menu-social-menu li a[href*="twitter.com"]::before {
          content: "\f099";
          background: #1da1f2;
          color: #fff;
        }

        #menu-social-menu li a[href*="instagram.com"]::before {
          content: "\f16d";
          background: #df2176;
          color: #fff;
        }

        #menu-social-menu li a[href*="plus.google.com"]::before {
          content: "\f0d5";
          background: #ea4335;
          color: #fff;
        }

        #menu-social-menu li a[href*="linkedin.com"]::before {
          content: "\f0e1";
          background: #0078bb;
          color: #fff;
        }

        #menu-social-menu li a[href*="pinterest.com"]::before {
          content: "\f0d2";
          background: #cc0000;
          color: #fff;
        }

        #menu-social-menu li a[href*="behance.net"]::before {
          content: "\f1b4";
          background: #4465ff;
          color: #fff;
        }

        #menu-social-menu li a[href*="github.com"]::before {
          content: "\f09b";
          background: #000;
          color: #fff;
        }

        #menu-social-menu li a[href*="youtube.com"]::before {
          content: "\f167";
          background: #f40a;
          color: #fff;
        }
    ';
}
else{
    $css .='

        #menu-social-menu li a::before{
            display: block;
            font-size: 18px;
            text-align: center;
            width: 37px;
            line-height: 37px;
            border-radius: 50%;
            font-family: "Font Awesome 5 Brands";
            color: inherit;
        }

        #menu-social-menu li a[href*="facebook.com"]::before {
          content: "\f39e";
          background: #3b5998;
          color: #fff;
        }

        #menu-social-menu li a[href*="twitter.com"]::before {
          content: "\f099";
          background: #1da1f2;
          color: #fff;
        }

        #menu-social-menu li a[href*="instagram.com"]::before {
          content: "\f16d";
          background: #df2176;
          color: #fff;
        }

        #menu-social-menu li a[href*="plus.google.com"]::before {
          content: "\f0d5";
          background: #ea4335;
          color: #fff;
        }

        #menu-social-menu li a[href*="linkedin.com"]::before {
          content: "\f0e1";
          background: #0078bb;
          color: #fff;
        }

        #menu-social-menu li a[href*="pinterest.com"]::before {
          content: "\f0d2";
          background: #cc0000;
          color: #fff;
        }

        #menu-social-menu li a[href*="behance.net"]::before {
          content: "\f1b4";
          background: #4465ff;
          color: #fff;
        }

        #menu-social-menu li a[href*="github.com"]::before {
          content: "\f09b";
          background: #000;
          color: #fff;
        }

        #menu-social-menu li a[href*="youtube.com"]::before {
          content: "\f167";
          background: #f40a;
          color: #fff;
        }
    ';
}


if(true == get_theme_mod( 'cr_custom_preloader_display' ) && "" != esc_url(get_theme_mod( 'cr_custom_preloader_img' ))) {
    $css .='     
        #pre-loader{
            height: 100px;
            width: 100px;
            top: 45%;
            background: url(' . $preloader_image . ') no-repeat !important;
        }
    ';  
}
else{
    $css .='
        .lds-flickr {
             position: relative;
        }

        .lds-flickr div {
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            top: 0px;
            left: 0px;
        }

        .lds-flickr div:nth-child(1) {
            background: #3be8b0;
            -webkit-animation: lds-flickr 1s linear infinite;
            animation: lds-flickr 1s linear infinite;
            -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
        }

        .lds-flickr div:nth-child(2) {
            top: 48%;
            left: 48%;
            background: #1aafd0;
            -webkit-animation: lds-flickr 1s linear infinite;
            animation: lds-flickr 1s linear infinite;
            -webkit-animation-delay: 0s;
            animation-delay: 0s;
        }

        .lds-flickr {
            -webkit-transform: translate(-100px, -100px) scale(1) translate(100px, 100px);
            transform: translate(-100px, -100px) scale(1) translate(100px, 100px);
        }
    ';
}


return apply_filters( 'crater_free_dynamic_css_stylesheet', $css);

}