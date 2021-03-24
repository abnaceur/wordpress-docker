<?php
/**
 * Colon : Dynamic CSS Stylesheet
 *
 */

function colon_dynamic_css_stylesheet() {

    $primary_color= sanitize_hex_color(get_theme_mod( 'colon_site_primary_color','#ed516c' ));
    $secondary_color= sanitize_hex_color(get_theme_mod( 'colon_site_secondary_color','#ca2e49' ));
    $footer_bg_color= sanitize_hex_color(get_theme_mod( 'colon_footer_bg_color','#fff' ));
    $footer_content_color= sanitize_hex_color(get_theme_mod( 'colon_footer_content_color','#555' ));
    $footer_links_color= sanitize_hex_color(get_theme_mod( 'colon_footer_links_color','#b3b3b3' ));
    $transparent_header_menu_color= sanitize_hex_color(get_theme_mod( 'colon_transparent_header_menu_color','#fff' ));
    $menu_spacing_from_top= absint(get_theme_mod( 'colon_menu_spacing_from_top','20' ));
    $menu_spacing_from_bottom= absint(get_theme_mod( 'colon_menu_spacing_from_bottom','0' ));
    $menu_items_spacing= absint(get_theme_mod( 'colon_menu_items_spacing','18' ));
    $logo_width_settings= absint(get_theme_mod( 'colon_logo_width_settings','200' ));
    $logo_width_mobile_settings= absint(get_theme_mod( 'colon_logo_width_mobile_settings','180' ));
    $logo_column_width_mobile_settings= absint(get_theme_mod( 'colon_logo_column_width_mobile_settings','65' ));
    $logo_spacing_settings= absint(get_theme_mod( 'colon_logo_spacing_settings','12' ));
    $logo_spacing_mobile_settings= absint(get_theme_mod( 'colon_logo_spacing_mobile_settings','12' ));
    $layout_content_width= absint(get_theme_mod( 'colon_layout_content_width_settings','1170' ));
    $page_title_spacing_top= absint(get_theme_mod( 'colon_page_title_spacing_top','70' ));
    $page_title_spacing_bottom= absint(get_theme_mod( 'colon_page_title_spacing_bottom','70' ));
    $page_content_spacing_top_title= absint(get_theme_mod( 'colon_page_content_spacing_top_title','70' ));
    $page_title_color= sanitize_hex_color(get_theme_mod( 'colon_page_title_color','#555' ));
    $page_title_breadcrumbs_color= sanitize_hex_color(get_theme_mod( 'colon_page_title_breadcrumbs_color','#555' ));
    $page_title_bg_color= sanitize_hex_color(get_theme_mod( 'colon_page_title_bg_color','#ed516c' ));
    $footer_content_spacing= absint(get_theme_mod( 'colon_footer_content_spacing','70' ));
    $footer_spacing= absint(get_theme_mod( 'colon_footer_spacing','70' ));
    $header_toggle_menu_spacing= absint(get_theme_mod( 'colon_header_toggle_menu_spacing','0' ));    


    $css = '


    a:hover,a:focus {
        color: ' . $secondary_color . ';
    }

    .pagination .nav-links .current {
        background: ' . $primary_color . ' !important;
    }

    header .header-wrapper {
        margin-top: ' . $menu_spacing_from_top . 'px !important;
        margin-bottom: ' . $menu_spacing_from_bottom . 'px !important;
    }

    .top-menu .navigation > li > a {
        padding: 14px ' . $menu_items_spacing . 'px !important;
    }

    .top-menu .navigation > li > ul > li:hover > a, 
    .dropdown-menu > li > a:focus,
    .top-menu .navigation > li > ul > li > ul > li > a:hover,
    .top-menu .navigation > li > ul > li > ul > li > a:focus {
        background: ' . $primary_color . ';
    }

    .header-wrapper .logo img {
        width: ' . $logo_width_settings . 'px !important;
        max-width: ' . $logo_width_settings . 'px !important;
    }

    .header-wrapper .logo a {
        padding: ' . $logo_spacing_settings . 'px 0;
    }

    .dropdown-menu {
        border: 1px solid #efefef !important;
        box-shadow: none;
        border-radius: none !important;
    }

    button.navbar-toggle,
    button.navbar-toggle:hover {
        background: none !important;
        box-shadow: none;
    }

    .btntoTop.active:hover {
        background: ' . $primary_color . ';
        border: 1px solid ' . $primary_color . ';
    }

    button, input[type="submit"], 
    input[type="reset"] {
        background: ' . $primary_color . ';
    }

    button, input[type="submit"]:hover, 
    input[type="reset"]:hover {
        background: ' . $secondary_color . ';
    }

    footer.entry-footer {
        display: none;
    }

    .widget-column li > a {
        text-decoration: none;
    }

    .page-title span {
        padding-right: 5px;
    }

    .search .nav-links a {
        background: ' . $primary_color . ';
    }

    .meta svg {
        width: 12px;
        vertical-align: middle;
    }

    footer#footer {        
        background: ' . $footer_bg_color . ';
        color: ' . $footer_content_color . ';
    }

    footer h4{
        color: ' . $footer_content_color . ';
        margin-bottom: 30px;  
    }

    footer#footer a,
    footer#footer a:hover{
        color: ' . $footer_links_color . ';      
    }

    footer {
        margin-top: ' . $footer_spacing . 'px;
        padding-top: ' . $footer_content_spacing . 'px;
    }

    .page-title h1 {
        color: ' . $page_title_color . ';
     }

    .page-title span,
    .page-title span a,
    .page-title #breadcrumbs,
    .page-title #breadcrumbs a {
        color: ' . $page_title_breadcrumbs_color . ';
    }

    .page-title .breadcrumbs li:after {
        content: ">";
        display: inline-block;
        color: ' . $page_title_breadcrumbs_color . ';
    }


    @media only screen and (max-width: 480px) {
        .header-wrapper .logo img {
            width: ' . $logo_width_mobile_settings . 'px !important;
            max-width: ' . $logo_width_mobile_settings . 'px !important;
            margin-top: 0 !important;
        }

        .style1 .header-wrapper .logo {
            width: ' . $logo_column_width_mobile_settings . '% !important;
        }

        .header-wrapper .logo a {
            padding: ' . $logo_spacing_mobile_settings . 'px 0;
        }
    }

    @media only screen and (max-width: 767px) {
        nav.top-menu .menu-header {
            margin: ' . $header_toggle_menu_spacing . 'px 0;
        }

        .style1 .header-wrapper .logo {
            width: ' . $logo_column_width_mobile_settings . '% !important;
        }
    }

';

// check it's not a homepage
if(!is_front_page()):
    $css .='
        .page .content-page {
            margin-top: ' . $page_content_spacing_top_title . 'px !important;
        }

        .page #sidebar-wrapper {
            margin-top: ' . $page_content_spacing_top_title . 'px !important;
        }

        .page-title {
            padding-top: ' . $page_title_spacing_top . 'px;
            padding-bottom: ' . $page_title_spacing_bottom . 'px;
        }
    ';
endif;

// check if site title tagline disble
if(false===get_theme_mod( 'colon_display_site_title_tagline',true)) :
    $css .='
         h1.site-title,
         p.site-description {
            display: none;
        }
    ';
endif;

// check if single post heading enable
if(true===get_theme_mod( 'colon_enable_single_page_heading',true)) :
    $css .='
        .single h1.entry-title {
            display: block !important;
        }
    ';
endif;

// check if single page title section false
if(false===get_theme_mod( 'colon_enable_single_page_title_section',false)) :
    $css .='
         .single .page-title {
            display: none;
        }
    ';
endif;

// check if single page title true
if(true===get_theme_mod( 'colon_enable_single_page_title',false)) :
    $css .='
         .single .page-title h1 {
            display: block;
        }
    ';
else:
    $css .='
         .single .page-title h1 {
            display: none;
        }

        .single .breadcrumb-wrapper {
            margin: 30px 0;
        }
    ';
endif;

// check if header menu align right
if(true===get_theme_mod( 'colon_enable_header_menu_align',true)) :
    $css .='
         #menu-primary {
            text-align: right;
        }
    ';
    if(is_rtl()):
        $css .='
             #menu-primary {
                text-align: left;
            }
        ';
    endif;
endif;

//content width settings
if( 1170 != absint(get_theme_mod( 'colon_layout_content_width_settings','1170'))) :
    $css .='
         @media (min-width: 1200px) {
            .container {
                width: ' . $layout_content_width . 'px ;
            }
        }
    ';
endif;

//check if left page title
if(true===get_theme_mod( 'colon_enable_page_title_left',false)) :
    $css .='
        .page-title {
            text-align: left;
        }

        .page-title .breadcrumbs li a {
            padding-left: 0 !important;
        }
    ';
endif;


//check if center copyrights text
if(true===get_theme_mod( 'colon_enable_center_copyrights_text',true)) :
    $css .='
         footer .copyrights {
            text-align: center;
         }
    ';
endif;


// breadcrumb enable
if( true === get_theme_mod( 'colon_enable_page_breadcrumbs',true)) :
    $css .='

        .page-title h1 {
            padding-bottom: 0;
        }

        .page-title #breadcrumbs {
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .page-title span {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        .page-title .breadcrumbs li {
            display: inline-block;
            padding: 0 3px;
        }

        .page-title .breadcrumbs li:after {
            content: ">";
            display: inline-block;
        }

        .page-title .breadcrumbs li:last-child::after {
            display: none;
        }

        .page-title .breadcrumbs li a {
            padding-left: 10px;
        }

        .page-title h1 {
            padding-bottom: 0;
        }

        .page-title span {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 15px;
        }
    ';
endif;



//check if page title bg is enabled
if(true===get_theme_mod( 'colon_enable_page_title_bg',false) && !is_front_page()) :
    $css .='
        .page-title {
            background: ' . $page_title_bg_color . ';
         }

        .page .content-inner {
            margin-top: 70px;
            margin-bottom: 70px;
        }
        
    ';
else:
    if ( !colon_is_active_woocommerce() ) :
        $css .='
            header {
                border-bottom: 1px solid #fbfbfb;
            }

        ';
    endif;
endif;


//check if header transparent
if(true===get_theme_mod( 'colon_enable_header_transparent',false)) :
    $css .='
        header {
            position: absolute;
            z-index: 9;
            margin: 0 auto;
            width: 100%;
            color: #fff !important;
            border-bottom: 1px solid #ffffff29;
        }

        header .site-title a,
        header .site-description,
        header .top-menu-wrapper ul.navigation > li > a,
        .top-bar li a,
        .top-bar div,
        .top-bar span {
            color: ' . $transparent_header_menu_color . '  !important;
        }

        .top-bar {
            background: none !important;
            border-bottom: 1px solid #ffffff29;
            color: #fff !important;
        }

        .page header,
        .blog header,
        .single header,
        .archive header,
        .author header,
        .search header,
        .error404 header {
            border-bottom: none;
        }

        @media only screen and (max-width: 767px) {
            .top-menu .menu-header span,
            .top-menu .menu-header button {
                color: ' . $transparent_header_menu_color . ';
            }

            .top-menu .navbar-toggle .icon-bar {
                background: ' . $transparent_header_menu_color . ';
            }
        }
    ';

endif;


/* check if header transparent enable and page title disabled */
if(true===get_theme_mod( 'colon_enable_header_transparent',false) && false===get_theme_mod( 'colon_enable_page_title',true)) :
    $blog_bg_color= sanitize_hex_color(get_theme_mod( 'colon_blog_bg_color','#ca2e49' ));
    $css .='
        .blog .page-title, 
        .single .page-title, 
        .archive .page-title, 
        .author .page-title {
            background: ' . $blog_bg_color . ';
            padding-top: 150px;
            padding-bottom: 70px;
         }

        .blog .page-title h1, 
        .single .page-title h1, 
        .archive .page-title h1, 
        .author .page-title h1 {
            padding-top: 0;
        }

        .page .content-inner {
            margin-top: 70px;
            margin-bottom: 70px;
        }
    ';

endif;


/* check if menu has last button */
if(true === get_theme_mod( 'colon_enable_header_menu_last_button',false )) :
    $button_color = sanitize_hex_color(get_theme_mod( 'colon_header_menu_last_button_content_color','#fff' ));
    $button_bg = sanitize_hex_color(get_theme_mod( 'colon_header_menu_last_button_bg_color','#ed516c' ));
    $button_border= sanitize_hex_color(get_theme_mod( 'colon_header_menu_last_button_border_color','#ed516c' ));


    $button_color_mobile = sanitize_hex_color(get_theme_mod( 'colon_header_menu_last_button_content_color_mobile','#fff' ));
    $button_bg_mobile = sanitize_hex_color(get_theme_mod( 'colon_header_menu_last_button_bg_color_mobile','#ed516c' ));
    $button_border_mobile = sanitize_hex_color(get_theme_mod( 'colon_header_menu_last_button_border_color_mobile','#ed516c' ));


    $button_border_radius = ('square'==esc_html(get_theme_mod('colon_choose_style_menu_last_button','square'))) ? '0' : '45px';
    

    if(!colon_is_active_woocommerce()) :
        $css .='
            header .top-menu-wrapper ul.navigation > li:nth-last-child(1) > a {
                border: 1px solid ' . $button_border . ';
                border-radius: ' . $button_border_radius . ';
                padding: 2px 20px !important;
                font-weight: 400;
                font-size: 13px;
                background: ' . $button_bg . ';
                color: ' . $button_color . ' !important;
            }

            header .top-menu-wrapper ul.navigation > li:nth-last-child(1) > a:before {
                background: none !important;
            }

            @media only screen and (max-width: 767px) {

                .side-menu nav ul.navigation > li:nth-last-child(1) {
                    width: 150px;
                    margin-top: 20px;
                }
                .side-menu nav ul.navigation > li:nth-last-child(1) > a {
                    border: 1px solid ' . $button_border_mobile . ';
                    border-radius: ' . $button_border_radius . ';
                    padding: 2px 20px !important;
                    font-weight: 400;
                    font-size: 13px;
                    background: ' . $button_bg_mobile . ';
                    color: ' . $button_color_mobile . ' !important;
                }
            }
        ';
    else :
        $css .='
            header .top-menu-wrapper ul.navigation > li:nth-last-child(1) > a {
                border: 1px solid ' . $button_border . ';
                border-radius: ' . $button_border_radius . ';
                padding: 2px 20px !important;
                font-weight: 400;
                font-size: 13px;
                background: ' . $button_bg . ';
                color: ' . $button_color . ' !important;
            }

            header .top-menu-wrapper ul.navigation > li:nth-last-child(1) > a:before {
                background: none !important;
            }

            @media only screen and (max-width: 767px) {

                .side-menu nav ul.navigation > li:nth-last-child(1) {
                    width: 150px;
                    margin-top: 20px;
                }
                .side-menu nav ul.navigation > li:nth-last-child(1) > a {
                    border: 1px solid ' . $button_border_mobile . ';
                    border-radius: ' . $button_border_radius . ';
                    padding: 2px 20px !important;
                    font-weight: 400;
                    font-size: 13px;
                    background: ' . $button_bg_mobile . ';
                    color: ' . $button_color_mobile . ' !important;
                }

            }
        ';
    endif;
endif;


/* Form button style */
if('square'==esc_html(get_theme_mod('colon_choose_forms_button_styles','square'))) :
    $css .='
        form input[type=submit],
        form button {
            border-radius: 0;
            padding: 15px 40px;
        }
    ';
else:
    $css .='
        form input[type=submit],
        form button {
            border-radius: 45px;
            padding: 15px 40px;
        }
    ';
endif;


/* Preloader */
if(true === get_theme_mod( 'colon_enable_preloader',false )) :
    $css .='

        .loader-wrapper {
            background: #fff;
            width: 100%;
            height: 100%;
            position: fixed !important;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 100000;
        }

        #pre-loader {
            height: 30px;
            width: 30px;
            position: absolute;
            top: 45%;
            left: 47%;
        }

        .loader-pulse {
            width: 50px;
            height: 50px;
            background-color: #555;
            border-radius: 100%;
            animation: loader-pulse 1.2s infinite cubic-bezier(0.455, 0.03, 0.515, 0.955); 
        }

        @keyframes loader-pulse {
            0% {
                transform: scale(0); 
            } 100% {
                transform: scale(1);
                opacity: 0; 
            }
        }

    ';
endif;

/* Topbar */
if(true===get_theme_mod('colon_enable_header_topbar',false)) :
    $css .='
        .top-bar {
            text-align: right;
            background: #f9f9f9;
        }

        .top-bar ul li {
            display: inline-block;
            padding: 5px 10px;
        }

        .top-bar .left-column {
            text-align: left;
            padding: 5px;
        }

        .top-bar .right-column {
            text-align: right;
            padding: 5px;
        }

        .top-bar ul li {
            padding: 0;
        }

        .top-bar ul li  a {
            padding-right: 10px;
        }
    ';

    if(is_rtl()) :
        $css .='
            .top-bar .left-column {
                text-align: right;
            }

            .top-bar .right-column {
                text-align: left;
            }
        ';
    endif;
endif;


/* Single blog post */

if(is_single()) :
    $css .='
        .single h1.entry-title {
            display: none;
        }

        .single h1.entry-title a {
            color: #555;
            transition: all 0.3s ease-in-out;
        }

        .blog.single-no-sidebar article {
            width: 49%;
        }

        .single #blog-section {
            margin: 70px 0;
        }

        .single .meta {
            margin: 20px 0;
        }

        .single time.updated {
            display: none;
        }

        .single time.published {
            display: block;
        }

        .single .author-gravatar > img {
            width: 55px !important;
            vertical-align: top;
            border: 1px solid #efefef;
            border-radius: 45px;
        }

        .single .author-post-url {
            margin-left: 15px;
            font-size: 15px;
            font-weight: 500;
            color: #000;
            margin-top: 5px;
        }

        .single .date-meta {
            margin-left: 75px;
            line-height: 0;
            font-size: 11px;
            margin-top: -20px;
        }

        .single .content {
            margin-top: 25px;
        }

        .single  nav.post-navigation {
            border-top: 1px solid #ececec;
            padding: 10px;
            margin-bottom: 70px;
            margin-top: 50px;
            border-bottom: 1px solid #ececec;
        }

        .nav-previous, .nav-links .nav-next {
            width: 50%;
            display: inline-block;
            vertical-align: top;
        }

        .nav-links .nav-previous .meta-nav:before {
            content: "<";
            font-weight: 900;
            padding-right: 5px;
        }

        .nav-links .nav-next .meta-nav:after {
            content: ">";
            font-weight: 900;
            padding-left: 5px;
        }

        .nav-links .nav-next {
            text-align: right;
        }

        .single div.post-categories {
            margin-top: 50px;
        }   

        .single .post-categories span a{
            padding-right: 5px;
        }

        .single .comment-awaiting-moderation {
            font-style: italic;
            color: #e68989;
        }

        .single h3.comments-title {
            font-weight: 400;
        }

        .single #comments {
            padding-top: 80px;
            margin: 0 auto;
        }

        .single.single-right-sidebar #comments,
        .single.single-left-sidebar #comments {
            width: 90%;
        }

        ol.comment-list {
            margin-top: 30px;
            list-style-type: none;
            margin-left: 0;

        }

        ol.comment-list li {
            padding: 30px 40px;
            background: #f7f8fB;
            margin-bottom: 15px;
        }

        .single .comment-author img {
            border-radius: 45px;
        }

        .single .comment-content p {
            font-size: 13px;
        }

        ol.children {
            list-style-type: none;
        }

        .comment-metadata {
            margin: 10px 0;
            padding: 0px 70px;
            border-radius: 45px;
            font-size: 11px;
        }

        #respond {
            margin-top: 50px;
        }

        .page #respond {
            margin: 50px 20px !important;
        }

        .comment-meta .reply {
            margin: 10px 0;
            float: right;
        }

        .post-tags a {
            margin-right: 5px;
        }

        .comment-meta b.fn {
            display: block;
            margin-left: 70px;
            margin-top: -50px;
        }

        footer.comment-meta {
            margin: 0;
        }

        .comment-meta span.says {
            margin-left: 70px;
        }

        #respond h3#reply-title {
            margin-bottom: 5px;
            font-weight: 400;
        }

        .single .content a,
        .single #comments a {
            text-decoration: underline;
        }
    ';
endif;


/* Archive */

if(is_archive()) :
    $css .='
        .author h2.entry-title,
        .archive h2.entry-title {
            font-weight: 400;
            padding: 0;
            font-size: 20px;
            margin: 0;
        }

        .archive .archive.heading h1.main-title,
        .author .archive.heading h1.main-title {
            font-weight: 400;
            margin-bottom: 50px;
            margin-left: 15px;
            padding: 0;
        }

        .author .post-day-icon img,
        .archive .meta .post-day-icon img,
        .author .author-icon img,
        .archive .meta .author-icon img,
        .author .comments-icon img,
        .archive .meta .comments-icon img {
            width: 12px;
        }

        .author .meta,
        .archive .meta {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .author .meta .meta-list li,
        .archive .meta .meta-list li {
            display: inline-block;
            padding-right: 10px;
        }

        .author article,
        .archive article {
            margin-bottom: 50px;
        }

        .author #blog-section,
        .archive #blog-section {
            margin-top: 70px;
        }

    ';
endif;


/* 404 page */

if(is_404()) :
    $css .='
        .error404 .content-page {
            margin-top: 70px;
        }

        .error404 h1.page-error {
            font-weight: 400;
        }
    ';
endif;


/* Search page */

if(is_search()) :
    $css .='
        .search .searchpage {
            margin-top: 70px;
        }

        .search h1.page-search {
            font-weight: 400;
        }

        .search h2.entry-title {
            font-weight: 400;
            padding: 0;
            font-size: 20px;
            margin: 0;
        }

        .search .post-day-icon img,
        .search .author-icon img,
        .search .comments-icon img {
            width: 12px;
        }

        .search .meta {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .search .meta .meta-list li {
            display: inline-block;
            padding-right: 10px;
        }

        .search article {
            margin-bottom: 50px;
        }

        .search #blog-section {
            margin-top: 70px;
        }

        .search .nav-previous,
        .search .nav-next {
            display: inline-block;
        }

        .search .nav-previous {
            float: left;
        }

        .search .nav-next {
            float: right;
        }

        .search .nav-links a {
            padding: 18px 35px;
            color: #fff;
        }

        .search time.updated {
            display: none;
        }
    ';
endif;

return apply_filters( 'colon_dynamic_css_stylesheet', colon_minimize_css($css));

}