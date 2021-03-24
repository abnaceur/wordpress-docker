<?php
/**
 * Header  Settings
 *
 * @package Blog99
 */
function blog99_customize_register_banner_slider( $wp_customize ) {

    //header section
    $wp_customize->add_section( 'blog99_banner_section', array(
        'title'      => esc_html__( 'Main Slider Settings', 'blog99' ),
        'panel'     =>  'blog99_theme_options_panel'
    ) );


    //Disable Banner Slider
    $wp_customize->add_setting(
        'blog99_banner_slider_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
            'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_banner_slider_disable',
			array(
				'section'	  => 'blog99_banner_section',
                'label'		  => esc_html__( 'Enable Slider', 'blog99' ),
                'description' => esc_html__('hide/show slider block', 'blog99')
			)
		)
    );
	$wp_customize->selective_refresh->add_partial( 'blog99_banner_slider_disable', array(
        'selector' 			=> '#blog99_banner_slider_display',
    ) );


    //Disable Category
    $wp_customize->add_setting(
        'blog99_banner_category_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_banner_category_disable',
			array(
				'section'	  => 'blog99_banner_section',
                'label'		  => esc_html__( 'Show category', 'blog99' ),
                'description'		  => esc_html__( 'Show category list', 'blog99' ),
			)
		)
    );

    //Disable Meta
    $wp_customize->add_setting(
        'blog99_banner_metabox_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_banner_metabox_disable',
			array(
				'section'	  => 'blog99_banner_section',
                'label'		  => esc_html__( 'Show Meta', 'blog99' ),
                'description'		  => esc_html__( 'show comment, date time', 'blog99' ),
			)
		)
    );

    //Disable Learn More Buttom
    $wp_customize->add_setting(
        'blog99_banner_learn_more_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_banner_learn_more_disable',
			array(
				'section'	  => 'blog99_banner_section',
                'label'		  => esc_html__( 'Enable Readmore Buttom', 'blog99' ),
			)
		)
    );



    //get Banner Slider Settings
	$wp_customize->add_setting( 
        'blog99_main_slider_cat_id', 
        array(
			'default' => esc_html__('all','blog99'),
            'sanitize_callback' => 'blog99_sanitize_select'
        )
    );
    
    $wp_customize->add_control( 
        'blog99_main_slider_cat_id', 
        array(
			'label'         => esc_html__( 'Select Category', 'blog99' ),
			'description'         => esc_html__( 'Display post image from selected category', 'blog99' ),
            'section'       => 'blog99_banner_section',
            'type'          => 'select',
            'choices'       => blog99_get_post_categories(),
        )
    ); 
    

    //Banner Number of Slider
	$wp_customize->add_setting(
        'blog99_main_slider_numberofpost',
        array(
            'default'           => 3,
            'sanitize_callback' => 'absint',
        )
    );
    
    $wp_customize->add_control(
		'blog99_main_slider_numberofpost',
		array(
			'section'	  => 'blog99_banner_section',
            'label'		  => esc_html__( 'Slider Number of Post', 'blog99' ),
            'description'=> esc_html__('No of slider', 'blog99'),
            'type'        => 'number',
		)
    );


}
add_action( 'customize_register', 'blog99_customize_register_banner_slider' );