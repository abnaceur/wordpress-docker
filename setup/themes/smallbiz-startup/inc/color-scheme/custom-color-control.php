<?php 

$smallbiz_startup_color_scheme_gradiant1 = get_theme_mod('smallbiz_startup_color_scheme_gradiant1');

$smallbiz_startup_color_scheme_gradiant2 = get_theme_mod('smallbiz_startup_color_scheme_gradiant2');

$smallbiz_startup_color_scheme_css = "";

if($smallbiz_startup_color_scheme_gradiant1 != false || $smallbiz_startup_color_scheme_gradiant2 != false){

  $smallbiz_startup_color_scheme_css .='.contact-us a, 
  .pagemore a, 
  .serv-btn a, 
  .woocommerce ul.products li.product .button, 
  .woocommerce #respond input#submit.alt, 
  .woocommerce a.button.alt, 
  .woocommerce button.button.alt, 
  .woocommerce input.button.alt, 
  .woocommerce a.button, 
  .woocommerce button.button, 
  .woocommerce #respond input#submit, 
  #commentform input#submit,
  nav.woocommerce-MyAccount-navigation ul li,
  .listarticle, 
  aside.widget,
  .logo,
  .header-top,
  #sidebar input.search-submit, 
  #footer input.search-submit, 
  form.woocommerce-product-search button,
  .img-box,
  span.color-inner-box img,
  span.design-box,
  .thumbbx,
  span.onsale {';

  $smallbiz_startup_color_scheme_css .='background-image: linear-gradient(to right, '.esc_attr($smallbiz_startup_color_scheme_gradiant1).' , '.esc_attr($smallbiz_startup_color_scheme_gradiant2).') , linear-gradient(to right, '.esc_attr($smallbiz_startup_color_scheme_gradiant1).' , '.esc_attr($smallbiz_startup_color_scheme_gradiant2).') !important ';

  $smallbiz_startup_color_scheme_css .='}';

  $smallbiz_startup_color_scheme_css .='.listarticle,
  aside.widget{';

  $smallbiz_startup_color_scheme_css .='border-left-color: '.esc_attr($smallbiz_startup_color_scheme_gradiant1).'';

  $smallbiz_startup_color_scheme_css .='}';

  $smallbiz_startup_color_scheme_css .='.listarticle, 
  aside.widget{';

  $smallbiz_startup_color_scheme_css .='border-right-color: '.esc_attr($smallbiz_startup_color_scheme_gradiant2).'';

  $smallbiz_startup_color_scheme_css .='}';

  $smallbiz_startup_color_scheme_css .='a,
  .ftr-4-box h5 span,
  .listarticle h2 a:hover, 
  #sidebar ul li a:hover, 
  .ftr-4-box ul li a:hover, 
  .ftr-4-box ul li.current_page_item a, 
  .social-icons i:hover, 
  .main-nav ul ul a:hover,
  .main-nav a:hover{';

  $smallbiz_startup_color_scheme_css .='color: '.esc_attr($smallbiz_startup_color_scheme_gradiant1).'';

  $smallbiz_startup_color_scheme_css .='}';

  $smallbiz_startup_color_scheme_css .='.contact-us a:hover, 
  .pagemore a:hover, 
  .serv-btn a:hover, 
  .woocommerce ul.products li.product .button:hover, 
  .woocommerce #respond input#submit.alt:hover, 
  .woocommerce a.button.alt:hover, 
  .woocommerce button.button.alt:hover, 
  .woocommerce input.button.alt:hover, 
  .woocommerce a.button:hover, 
  .woocommerce button.button:hover, 
  #commentform input#submit:hover{';

  $smallbiz_startup_color_scheme_css .='background: '.esc_attr($smallbiz_startup_color_scheme_gradiant2).' !important';

  $smallbiz_startup_color_scheme_css .='}';
}