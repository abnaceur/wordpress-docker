<?php
/**
 * Categorys List  Settings
 *
 * @package Blog99
 */
function blog99_customize_register_grid_categorys( $wp_customize ) {

    //header section category
    $wp_customize->add_section( 'blog99_category_section', array(
        'title'      => esc_html__( 'Features Category Section', 'blog99' ),
        'panel'     =>  'blog99_theme_options_panel'
    ) );


    //Disable the Category Grid
    $wp_customize->add_setting(
        'blog99_banner_category_grid_disable',
        array(
            'default'           => true,
            'sanitize_callback' => 'blog99_sanitize_checkbox',
            'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		new Blog99_Toggle_Control( 
			$wp_customize,
			'blog99_banner_category_grid_disable',
			array(
				'section'	  => 'blog99_category_section',
                'label'		  => esc_html__( 'Show Category', 'blog99' ),
                'description' =>    esc_html__('hide/show category list in home page', 'blog99')
			)
		)
    );
    $wp_customize->selective_refresh->add_partial( 'blog99_banner_category_grid_disable', array(
        'selector' 			=> '#blog99-category-list-section',
    ) );


    //Select The Category
    $wp_customize->add_setting(
		'blog99_frontpage_category_postlist', 
		array(
			'default' 			=> blog99_get_post_categories(),
			'sanitize_callback' => 'blog99_sanitize_multiple_check',				
		)
	);
	$wp_customize->add_control(
		new Blog99_MultiCheck_Control(
			$wp_customize,
			'blog99_frontpage_category_postlist',
			array(
				'section'     => 'blog99_category_section',
                'label'       => esc_html__( 'Select category', 'blog99' ),
                'description'       => esc_html__( 'Display selected category', 'blog99' ),
                'choices'     => blog99_get_post_categories(),
			)
		)
	);


	//Grid Category Layout
    $wp_customize->add_setting(
        'blog99_category_layout',
        array(
            'default' =>'blog99-gridlayout-one',
            'sanitize_callback' => 'blog99_sanitize_radio'
        )
    );
    $wp_customize->add_control( new Blog99_Radio_Control(
        $wp_customize, 
        'blog99_category_layout', 
        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'Category Layout', 'blog99' ),
            'description'         => esc_html__( 'Display category in different layout', 'blog99' ),
            'section'       => 'blog99_category_section',
            'choices'       => array(
                    'blog99-gridlayout-one'         => esc_url( BLOG99_THEME_IMG . 'category/category-grild.jpg'),
                    'blog99-gridlayout-two'         => esc_url( BLOG99_THEME_IMG . 'category/category-layout2.png'),
                    'blog99-gridlayout-three'       => esc_url( BLOG99_THEME_IMG . 'category/category-layout3.png'),
                )
            )
        )
    );


}
add_action( 'customize_register', 'blog99_customize_register_grid_categorys' );