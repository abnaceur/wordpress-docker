<?php
/**
 * Enqueue scripts and styles.
 */
function blogshop_scripts() {
	
	wp_enqueue_style( 'blogshop-style', get_stylesheet_uri() );
	//Fonts
	$body_font = esc_html(get_theme_mod('blogshop_body_fonts'));
	$body_font_size = esc_html(get_theme_mod('blogshop_body_fonts_size', 16));
	$body_font_weight = esc_html(get_theme_mod('blogshop_body_fonts_weight', 400));
	$body_font_line_height = esc_html(get_theme_mod('blogshop_body_fonts_line_height', 28));
	if( $body_font ) {
		wp_enqueue_style( 'blogshop-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );
	} else {
		wp_enqueue_style( 'blogshop-source-body', '//fonts.googleapis.com/css?family=Poppins:300,400,500,700,800');
	}
	$body_font_pieces = '0';
	if ( $body_font ) {
		$body_font_pieces = explode(":", $body_font);
	}
	//Output all the style
	$getprimarycolor = get_theme_mod( 'base_color' );
	$primarycolor = (!empty($getprimarycolor) ? $getprimarycolor : '#ff0000');
	$menucolor = get_theme_mod( 'menu_color_main', '#000000' );
	$menucolorhover = get_theme_mod( 'menu_color_hover', '#ff0000' );
	$header_height = get_theme_mod( 'header_height', 200 ) / 16;
	$data = '
	@media only screen and (min-width: 768px) {
		#cssmenu>ul>li>a, #cssmenu>ul>li>a:after, #cssmenu>ul>li.current-menu-item>a:after, #cssmenu>ul>li.current_page_item>a:after{
	    	color: '.$menucolor.' !important;
		}
		#cssmenu>ul>li>a:hover,#cssmenu>ul>li.current_page_item>a, #cssmenu>ul>li>a:hover:after, #cssmenu>ul>li.current-menu-item>a:hover:after, #cssmenu>ul>li.current_page_item>a:hover:after, #cssmenu ul ul li a:hover{
	    	color: '.$menucolorhover.' !important;
		}
	}
	
	.logo-area{
		height: '.$header_height.'rem;
		min-height: '.$header_height.'rem;
	}
	.blogshop-credit {
	    position: absolute !important;
	    left: 50% !important;
	    visibility: visible !important;
	    width: 15px !important;
	    height: 15px !important;
	    opacity: 1 !important;
	    z-index: 1 !important;
	    top: calc(50% - 9.5px);
	}
	.blogshop-credit span {
	    font-size: 0;
	}
	.blogshop-credit a, .blogshop-credit a:hover {
	    color: #ff0000 ;
	    cursor: pointer ;
	    opacity: 1 ;
	}
	body.border_and_box_shadow_hide .footer-area.section-padding, body.border_and_box_shadow_hide footer#colophon, body.border_and_box_shadow_hide .widget, body.border_and_box_shadow_hide .blog-post-section article, body.border_and_box_shadow_hide .archive-page-section article, body.border_and_box_shadow_hide .menu-area, body.border_and_box_shadow_hide .site-topbar-area {
	    border: 0 !important;
	    box-shadow: none !important;
	}
	.readmore a,.btn.btn-warning, input[type="submit"], button[type="submit"], span.edit-link a, .comment-form button.btn.btn-primary, .banner-button a, table#wp-calendar #today, ul.pagination li .page-numbers, .woocommerce ul.products li.product .button:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce span.onsale, .header-three .social-link-top a, .header-three-search .search-popup>div, .mini-shopping-cart-inner #minicarcount, .related-post-sldider .owl-nav button.owl-next, .related-post-sldider .owl-nav button.owl-prev, .sticky:before, .post-gallery .owl-nav button.owl-next, .post-gallery .owl-nav button.owl-prev, .scrooltotop a, .blogshop-standard-post__posted-date .posted-on a, .page-numbers li a, .page-numbers li span, .widget .widget-title:before, .widget .widgettitle:before, .comments-area ol.comment-list .single-comment .reply a, .blogshop-single-page .entry-footer a, .single-post-navigation .postarrow{
		background-color: '.esc_attr( $primarycolor ).';
	}
	.blog-meta ul li span.fa, .static_icon a, .site-info a, #cssmenu.light ul li a:hover, .social-link-top a:hover, .footer-menu ul li a:hover, #cssmenu.light ul li a:hover:after, a:hover, a:focus, a:active, .post-title a:hover h2, .post-title a:hover h4, #cssmenu.light li.current_page_item a, li.current_page_item a, .author-social-link a, .post-title a:hover h3, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .tagcloud a:hover, .blogshop-standard-post__categories > span.cat-links a, .page-banner-area .breadcrumb a, .blogshop-standard-post.sticky:before, .blogshop-standard-post__blog-meta > span.posted_by a i, .blogshop-standard-post__post-title a h2:hover, .blogshop-standard-post__post-title a h3:hover, .featured-area .blogshop-featured-slider__post-title a:hover h2, .featured-area .blogshop-featured-slider__categories > span.cat-links a{
		color: '.esc_attr( $primarycolor ).';
	}
	input[type="submit"], button[type="submit"], .title-parent, blockquote{
		border-color: '.esc_attr( $primarycolor ).';
	}
	body, button, input, select, textarea { 
		font-family: ' . $body_font_pieces[0] .'; 
		font-size: '.$body_font_size.'px;
		font-weight: '.$body_font_weight.';
		line-height: '.$body_font_line_height.'px;
	}
	';

	$stickyheader = get_theme_mod( 'sticky_header', false );
	if (true == $stickyheader) {
		$data .= '
			.menu-area.sticky-menu {
			    background: #fff;
			    position: fixed;
			    width: 100%;
			    left: 0;
			    top: 0;
			    z-index: 55;
			    transition: .6s;
			    margin: 0;
			}
			.site.boxlayout .menu-area.sticky-menu {
			    width: calc(100% - 200px);
			    left: 100px;
			}
		';
	}
	wp_add_inline_style( 'blogshop-style', $data );
	wp_enqueue_script('masonry');
	wp_enqueue_script( 'blogshop-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), '2.3.4', true );
	wp_enqueue_script( 'blogshop-active', get_template_directory_uri() . '/assets/js/z_active.js', array( 'jquery' ), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'blogshop_scripts' );


add_action( 'admin_enqueue_scripts', 'blogshop_admin_enqueue_script', 10 );

function blogshop_admin_enqueue_script(){
	
}