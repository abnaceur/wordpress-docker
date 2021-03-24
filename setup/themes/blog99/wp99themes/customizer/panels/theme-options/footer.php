<?php
/**
 * Footer Copyright Text
 *
 * @package Blog99
 */
function blog99_customize_register_footer_copyright( $wp_customize ) {

    //header section category
    $wp_customize->add_section( 'blog99_footer_section', array(
        'title'      => esc_html__( 'Footer Settings', 'blog99' ),
        'panel'     =>  'blog99_theme_options_panel'
    ) );


    //Disable Footer
    $wp_customize->add_setting(
        'blog99_banner_footer_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_banner_footer_disable',
			array(
				'section'	  => 'blog99_footer_section',
                'label'		  => esc_html__( 'Disable Footer Widget', 'blog99' ),
			)
		)
    );


    //Footer Copyright Text
    $wp_customize->add_setting( 
        'blog99_footer_copyright_text', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control( 
        'blog99_footer_copyright_text', 
        array(
            'label' => esc_html__( 'Footer Copyright Text', 'blog99' ),
            'section' => 'blog99_footer_section',
            'type' => 'text',
        )
    );


}
add_action( 'customize_register', 'blog99_customize_register_footer_copyright' );