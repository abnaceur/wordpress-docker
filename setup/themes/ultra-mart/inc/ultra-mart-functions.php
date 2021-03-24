<?php

/* Get Elementor Templates */
function ultra_mart_get_elementor_templates( $type = '' ) {
  $args = [
      'post_type'         => 'elementor_library',
      'posts_per_page'    => -1,
  ];
  
  if ( $type ) {
      $args['tax_query'] = [
          [
              'taxonomy' => 'elementor_library_type',
              'field'    => 'slug',
              'terms' => $type,
          ]
      ];
  }
  
  $page_templates = get_posts( $args );

  $options = array();
  $options[0] = __('Select Template','ultra-mart'); 
  if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ){
      foreach ( $page_templates as $post ) {
          $options[ $post->ID ] = $post->post_title;
      }
  }
  return $options;
}


/**
* sanitize select
*
*/
function ultra_mart_sanitize_select( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/* change defaults */
function ultra_mart_change_default_option($defaults){
  $defaults['opstore_theme_color'] = '#dd1e25';
  return $defaults;
}
add_filter('opstore_filter_default_theme_options','ultra_mart_change_default_option');

/* woocommerce changes */
function ultra_mart_remove_action(){
  remove_action( 'opstore_loop_before_thumbnail', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','ultra_mart_remove_action');

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );

function ultra_mart_setup() {
  register_nav_menus(
      array(
        'currency-menu' => esc_html__( 'Currency', 'ultra-mart' ),
        'language-menu' => esc_html__( 'Language', 'ultra-mart' ),
      )
    );
}  
add_action( 'after_setup_theme', 'ultra_mart_setup' );

/* Dynamic css */
function ultra_mart_dynamic_css($custom_css){
  $theme_color = sanitize_hex_color(get_theme_mod('opstore_theme_color','#dd1e25'));
  if($theme_color){
    $custom_css .= "
    .header-style3 .bottom-header,.woocommerce ul.products li .content a.add_to_cart_button:after, body.woocommerce ul.products li .content a.added_to_cart:after{ background-color:$theme_color !important;}
    .header-style3 .top-header ul li a:hover,.header-style3 .middle-header .tagcloud a:hover, 
    .middle-header .tag-links a:hover{ color: $theme_color;}
    ";
  }
  //Top Bar Color
  $top_bg_color = get_theme_mod('top_header_bg_color','#eff1f2');
  $top_text_color = get_theme_mod('top_header_text_color','#666');
  $custom_css .= "
  .header-style3 .top-header{ 
      background-color: $top_bg_color;
      color: $top_text_color;
  }
  .header-style3 .top-header ul li a{
      color:$top_text_color;
  }";

  return $custom_css;
}
add_filter( 'opstore_dynamic_css', 'ultra_mart_dynamic_css' );