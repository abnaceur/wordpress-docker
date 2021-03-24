<?php

function ultra_mart_customize_register( $wp_customize ) {
    /* Theme Color */
    $wp_customize->get_setting('opstore_theme_color')->default='#dd1e25';
    $wp_customize->get_setting('top_header_bg_color')->default='#eff1f2';
    $wp_customize->get_setting('top_header_text_color')->default='#666';
    

    /* Header Layouts*/
    $wp_customize->get_setting('opstore_header_layouts')->default='style3'; 
    $wp_customize->get_control('opstore_header_layouts')->choices=array( 
                'style1'    => OPSTORE_IMAGES.'header2.png',
                'Style2'    => OPSTORE_IMAGES.'header1.png',
                'style3'    => get_stylesheet_directory_uri().'/assets/images/header3.png',
                'custom'    => get_stylesheet_directory_uri().'/assets/images/custom-header.png',
                );
    //Custom header
    $wp_customize->add_setting('opstore_custom_header',array(
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'ultra_mart_sanitize_select',
         'transport' => 'refresh',
         )
    );
    $wp_customize->add_control( 'opstore_custom_header',
         array(
             'label'  => esc_html__( 'Custom Header', 'ultra-mart' ),
             'section' => 'opstore_header_layouts_section',
             'type' => 'select',
             'choices' => ultra_mart_get_elementor_templates(),
             'priority' => 3,
             'active_callback' => 'ultra_mart_header_layouts_cb' 
         )
    );

    //Footer Layouts
    $wp_customize->add_setting( 'opstore_footer_layout_seperator', array(
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Opstore_Customize_Seperator_Control( $wp_customize, 'opstore_footer_layout_seperator',  array(
      'type'      => 'text',                    
      'label'     => esc_html__( 'Footer Layouts', 'ultra-mart' ),
      'section'   => 'opstore_footer_section',
      'priority' => 1
    ) ) );

    $wp_customize->add_setting('opstore_footer_layout',array(
    	'default' => 'default',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'ultra_mart_sanitize_select',
         'transport' => 'refresh',
         )
    );
    $wp_customize->add_control( 'opstore_footer_layout',
         array(
             'label'  => esc_html__( 'Footer Layout', 'ultra-mart' ),
             'section' => 'opstore_footer_section',
             'type' => 'select',
             'choices' => array(
             	'default' => __('Default','ultra-mart'),
             	'custom' => __('Custom','ultra-mart')
             ),
             'priority' => 3,
         )
    );
    $wp_customize->add_setting('opstore_custom_footer',array(
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'ultra_mart_sanitize_select',
         'transport' => 'refresh',
         )
    );
    $wp_customize->add_control( 'opstore_custom_footer',
         array(
             'label'  => esc_html__( 'Custom Footer', 'ultra-mart' ),
             'section' => 'opstore_footer_section',
             'type' => 'select',
             'choices' => ultra_mart_get_elementor_templates(),
             'priority' => 4,
             'active_callback' => 'ultra_mart_footer_layouts_cb' 
         )
    );


    /* before shop */
    $wp_customize->add_setting( 'opstore_woo_seperator_archive', array(
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Opstore_Customize_Seperator_Control( $wp_customize, 'opstore_woo_seperator_archive',  array(
      'type'      => 'text',                    
      'label'     => esc_html__( 'Product Archive', 'ultra-mart' ),
      'section'   => 'opstore_woo_section',
    ) ) );  

    $wp_customize->add_setting('opstore_before_shop',array(
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'ultra_mart_sanitize_select',
         'transport' => 'refresh',
         )
    );
    $wp_customize->add_control( 'opstore_before_shop',
         array(
             'label'  => esc_html__( 'Before Shop Page', 'ultra-mart' ),
             'description'  => esc_html__( 'The template made from elementor will be shown before shop page items.', 'ultra-mart' ),
             'section' => 'opstore_woo_section',
             'type' => 'select',
             'choices' => ultra_mart_get_elementor_templates() 
         )
    );
    /* Bottom Sticky Menu */
    $wp_customize->add_setting( 'opstore_bottom_menu_seperator', array(
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Opstore_Customize_Seperator_Control( $wp_customize, 'opstore_bottom_menu_seperator',  array(
      'type'      => 'text',                    
      'label'     => esc_html__( 'Bottom Sticky option', 'ultra-mart' ),
      'section'   => 'opstore_additional_section',
    ) ) ); 

    $wp_customize->add_setting( 'opstore_bottom_menu_option', array(
      'default' => 'show',
      'sanitize_callback' => 'opstore_sanitize_switch_option',
    ) );

    $wp_customize->add_control( new Opstore_Customize_Switch_Control( $wp_customize, 'opstore_bottom_menu_option',  array(
      'type'      => 'switch',                    
      'label'     => esc_html__( 'Enable/Disable Bottom Menu', 'ultra-mart' ),
      'section'   => 'opstore_additional_section',
      'choices'   => array(
            'show'  => esc_html__( 'Enable', 'ultra-mart' ),
            'hide'  => esc_html__( 'Disable', 'ultra-mart' )
          ),
    ) ) );   

} 
add_action( 'customize_register', 'ultra_mart_customize_register',999 );   

/* Active Callback Functions */
function ultra_mart_header_layouts_cb(){
    $header_layout = get_theme_mod('opstore_header_layouts','style3');
    if($header_layout == 'custom'){
        return true;
    }
    return false;
}

function ultra_mart_footer_layouts_cb(){
    $header_layout = get_theme_mod('opstore_footer_layout');
    if($header_layout == 'custom'){
        return true;
    }
    return false;
}