<?php
/**
 * Goblog Free Add Customizer navigasi footer.
 *
 * @subpackage Goblog Free
 * @since 1.0
 */

function goblog_free_customizer_navigasi_footer( $wp_customize ) { 

    // Section
    $wp_customize->add_section( 'navigasi_footer', 
        array(
            'title'           => __( 'Navigasi Footer', 'goblog-free' ),
            'priority'        => 220,
            'active_callback' => 'goblog_free_callback_navigasi_footer',
        ) 
    );

    // Callback
    function goblog_free_callback_navigasi_footer() {
        if ( has_nav_menu( 'goblog-free-footer' ) ) {
            return true;
        }
    }

    // =================== Background Color ===================
    // Setting
    $wp_customize->add_setting( 'bg_navigasi_footer', 
        array(
            'default'           => '#242529',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    // Control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_navigasi_footer', 
        array(
            'label'    => __( 'Background Color', 'goblog-free' ),
            'section'  => 'navigasi_footer',
            'settings' => 'bg_navigasi_footer',
        ) 
    ));

    // =================== Color link ===================
    // Setting
    $wp_customize->add_setting( 'color_navigasi_footer', 
        array(
            'default'           => '#b7aaaa',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    // Control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_navigasi_footer', 
        array(
            'label'    => __( 'Color Link', 'goblog-free' ),
            'section'  => 'navigasi_footer',
            'settings' => 'color_navigasi_footer',
        ) 
    ));

    // =================== Color Link Hover ===================
    // Setting
    $wp_customize->add_setting( 'color_link_hover_navigasi_footer', 
        array(
            'default'           => '#278cf1',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    // Control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_link_hover_navigasi_footer', 
        array(
            'label'    => __( 'Color Link Hover', 'goblog-free' ),
            'section'  => 'navigasi_footer',
            'settings' => 'color_link_hover_navigasi_footer',
        ) 
    ));

    // =================== Color icon sosmed ===================
    // Setting
    $wp_customize->add_setting( 'color_icon_sosmed_navigasi_footer', 
        array(
            'default'           => '#b7aaaa',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    // Control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_icon_sosmed_navigasi_footer', 
        array(
            'label'    => __( 'Color Icon Social Media', 'goblog-free' ),
            'section'  => 'navigasi_footer',
            'settings' => 'color_icon_sosmed_navigasi_footer',
        ) 
    ));

    // =================== Color Hover Social Media===================
    // Setting
    $wp_customize->add_setting( 'color_icon_hover_navigasi_footer', 
        array(
            'default'           => '#278cf1',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    // Control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_icon_hover_navigasi_footer', 
        array(
            'label'    => __( 'Color Icon Hover Social Media', 'goblog-free' ),
            'section'  => 'navigasi_footer',
            'settings' => 'color_icon_hover_navigasi_footer',
        ) 
    ));

    // =================== Facebook URL ===================
    // Setting
    $wp_customize->add_setting( 'url_fb_navigasi_footer',
        array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
 
    // Control
    $wp_customize->add_control( 'url_fb_navigasi_footer',
        array(
            'label'   => __( 'Link Facebook: ', 'goblog-free' ),
            'section' => 'navigasi_footer',
            'type'    => 'url',
            'input_attrs'     => array( 
                'class'       => 'customizer-type-input-text',
                'style'       => 'border: 1px solid #f5f5f5',
                'placeholder' => __( 'Enter a valid URL', 'goblog-free' ),
            ),
        )
    );

    // =================== Twitter URL ===================
    // Setting
    $wp_customize->add_setting( 'url_twt_navigasi_footer',
        array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
 
    // Control
    $wp_customize->add_control( 'url_twt_navigasi_footer',
        array(
            'label'   => __( 'Link Twitter: ', 'goblog-free' ),
            'section' => 'navigasi_footer',
            'type'    => 'url',
            'input_attrs'     => array( 
                'class'       => 'customizer-type-input-text',
                'style'       => 'border: 1px solid #f5f5f5',
                'placeholder' => __( 'Enter a valid URL', 'goblog-free' ),
            ),
        )
    );

    // =================== Youtube URL ===================
    // Setting
    $wp_customize->add_setting( 'url_yt_navigasi_footer',
        array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
 
    // Control
    $wp_customize->add_control( 'url_yt_navigasi_footer',
        array(
            'label'   => __( 'Link Youtube: ', 'goblog-free' ),
            'section' => 'navigasi_footer',
            'type'    => 'url',
            'input_attrs'     => array( 
                'class'       => 'customizer-type-input-text',
                'style'       => 'border: 1px solid  #f5f5f5',
                'placeholder' => __( 'Enter a valid URL', 'goblog-free' ),
            ),
        )
    );

    // =================== Instagram URL ===================
    // Setting
    $wp_customize->add_setting( 'url_ig_navigasi_footer',
        array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
 
    // Control
    $wp_customize->add_control( 'url_ig_navigasi_footer',
        array(
            'label'   => __( 'Link Instagram: ', 'goblog-free' ),
            'section' => 'navigasi_footer',
            'type'    => 'url',
            'input_attrs'     => array( 
                'class'       => 'customizer-type-input-text',
                'style'       => 'border: 1px solid  #f5f5f5',
                'placeholder' => __( 'Enter a valid URL', 'goblog-free' ),
            ),
        )
    );

    // =================== Linkedin URL ===================
    // Setting
    $wp_customize->add_setting( 'url_lk_navigasi_footer',
        array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
 
    // Control
    $wp_customize->add_control( 'url_lk_navigasi_footer',
        array(
            'label'   => __( 'Link Linkedin: ', 'goblog-free' ),
            'section' => 'navigasi_footer',
            'type'    => 'url',
            'input_attrs'     => array( 
                'class'       => 'customizer-type-input-text',
                'style'       => 'border: 1px solid  #f5f5f5',
                'placeholder' => __( 'Enter a valid URL', 'goblog-free' ),
            ),
        )
    );

}
add_action( 'customize_register', 'goblog_free_customizer_navigasi_footer' );