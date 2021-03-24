<?php
    // Layout Section.

    
    $wp_customize->add_section('dashy_dark_mode',array(
        'title'=>esc_html__( 'Dark Mode Option', 'dashy' ),
        'description'=>esc_html__( 'Dark mode Options', 'dashy'),
        'panel'      => 'dashy_options_panal',        
        'priority'=>'1'    
      ));

$wp_customize->add_setting('dashy_dark_mode', array(
    'capability'        => 'edit_theme_options',
    'default'           => $default['dashy_dark_mode'],
    'sanitize_callback' => 'dashy_sanitize_select'
));

$wp_customize->add_control('dashy_dark_mode', array(
    'choices' => array(
            'dark-mode' => __('Dark Mode', 'dashy'),
            'default-mode'  => __('Default Mode', 'dashy'),    
        
        ),
    'label'         => __('Default/Dark Mode', 'dashy'),
    'section'       => 'dashy_dark_mode',
    'settings'      => 'dashy_dark_mode',
    'type'          => 'select',
    'priority'	    => 10
));