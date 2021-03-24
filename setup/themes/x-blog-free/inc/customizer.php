<?php
/**
 * eyepress Theme Customizer
 *
 * @package eyepress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
// adctive call back function for header slider
if ( ! function_exists( 'x_blog_free_blank_image_show' ) ) :
function x_blog_free_blank_image_show(){
    if (get_theme_mod('x_blog_free_posts_image') == '1') {
        return true;
    }else{
    return false;
    }

}
endif;
// adctive call back function for header slider
if ( ! function_exists( 'x_blog_free_image_height' ) ) :
function x_blog_free_image_height(){
    if (get_theme_mod('x_blog_free_posts_image') == '1' &&  get_theme_mod('x_blog_free_posts_blank_image') == '1' ) {
        return true;
    }else{
    return false;
    }

}
endif;



function x_blog_free_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'x_blog_free_posts_meta' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'x_blog_free_posts_meta_control', array(
        'label'      => __('Show post meta? ', 'x-blog-free'),
        'description'=> __('You can show or hide posts meta.', 'x-blog-free'),
        'section'    => 'x_blog_options',
        'settings'   => 'x_blog_free_posts_meta',
        'type'       => 'checkbox',
        
    ) );
    $wp_customize->add_setting( 'x_blog_free_posts_image' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'x_blog_free_posts_image_control', array(
        'label'      => __('Show post image? ', 'x-blog-free'),
        'description'=> __('You can show or hide posts image.', 'x-blog-free'),
        'section'    => 'x_blog_options',
        'settings'   => 'x_blog_free_posts_image',
        'type'       => 'checkbox',
        
    ) );
    $wp_customize->add_setting( 'x_blog_free_posts_blank_image' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'x_blog_free_posts_blank_image_control', array(
        'label'      => __('Show blank image? ', 'x-blog-free'),
        'description'=> __('You can show or hide posts blank image.', 'x-blog-free'),
        'section'    => 'x_blog_options',
        'settings'   => 'x_blog_free_posts_blank_image',
        'type'       => 'checkbox',
        'active_callback' => 'x_blog_free_blank_image_show',

        
    ) );
    $wp_customize->add_setting('x_blog_free_post_btntext', array(
        'default'        => __('Continue Reading ..', 'x-blog-free'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
        'priority'       => 15,
    ));
    $wp_customize->add_control('x_blog_free_post_btntext', array(
        'label'      => __('Posts Button Text', 'x-blog-free'),
        'description'     => __('You can change post button Continue Reading text.', 'x-blog-free'),
        'section'    => 'x_blog_options',
        'settings'   => 'x_blog_free_post_btntext',
        'type'       => 'text',

    ));

    $wp_customize->add_setting('x_blog_free_grid_height', array(
        'default'        => 750,
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
        'priority'       => 10,
    ));
    $wp_customize->add_control('x_blog_free_grid_height_control', array(
        'label'      => __('Set grid minimum height', 'x-blog-free'),
        'description'     => __('You can reduce or increase the grid minimum height..', 'x-blog-free'),
        'section'    => 'x_blog_options',
        'settings'   => 'x_blog_free_grid_height',
        'type'       => 'text',
        'active_callback' => 'x_blog_free_image_height',

    ));

    $wp_customize->add_setting('x_blog_free_top_address', array(
        'default'        => esc_html__('Welcome','x-blog-free'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('x_blog_free_top_address_control', array(
        'label'      => __('Top bar text', 'x-blog-free'),
        'description'     => __('Enter top bar text here.', 'x-blog-free'),
        'section'    => 'x_blog_options',
        'settings'   => 'x_blog_free_top_address',
        'type'       => 'text',
    ));
    


}
add_action( 'customize_register', 'x_blog_free_customize_register',99 );

