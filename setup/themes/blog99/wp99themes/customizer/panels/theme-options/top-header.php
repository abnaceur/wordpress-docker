<?php
/**
 * Top Header Section
 * @package Blog99
*/
function blog99_customize_register_top_header( $wp_customize ) {
    
    //Products Category
    $wp_customize->add_section( 'blog99_top_header_section', array(
        'title'    => esc_html__( 'Top Header Settings', 'blog99' ),
        'panel'    =>'blog99_theme_options_panel'
    ) );
    
    //Disable the Search
    $wp_customize->add_setting(
        'blog99_top_header_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
            'transport'			=>	'postMessage',
        )
    );


    // Link to Panel:
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_top_header_disable',
			array(
				'section'	  => 'blog99_top_header_section',
                'label'		  => esc_html__( 'Enable Top Header', 'blog99' ),
                'description'=> '<a href="javascript:wp.customize.panel( \'nav_menus\' ).focus();">'.esc_html__('Creat Top Nav Menu','blog99').'</a>'
			)
		)
    );

    $wp_customize->selective_refresh->add_partial( 'blog99_top_header_disable', array(
        'selector'  => '.blog99-header-info ul.header-info',
    ) );

    //top Address
    $wp_customize->add_setting( 
        'blog99_top_header_address', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control( 
        'blog99_top_header_address', 
        array(
            'label' => esc_html__( 'Address', 'blog99' ),
            'section' => 'blog99_top_header_section',
            'type' => 'text',
        )
    );

    //top Email
    $wp_customize->add_setting( 
        'blog99_top_header_email', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( 
        'blog99_top_header_email', 
        array(
            'label' => esc_html__( 'Email', 'blog99' ),
            'section' => 'blog99_top_header_section',
            'type' => 'text',
        )
    );

    //top Phone No
    $wp_customize->add_setting( 
        'blog99_top_header_phone_no', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( 
        'blog99_top_header_phone_no', 
        array(
            'label' => esc_html__( 'Phone No', 'blog99' ),
            'section' => 'blog99_top_header_section',
            'type' => 'text',
        )
    );

}
add_action( 'customize_register', 'blog99_customize_register_top_header' );