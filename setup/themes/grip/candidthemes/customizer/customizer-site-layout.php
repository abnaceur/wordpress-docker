<?php
/**
 *  Grip Site Layout Option
 *
 * @since Grip 1.0.0
 *
 */
/*Site Layout Section*/
$wp_customize->add_section( 'grip_site_layout_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Site Layout Options', 'grip' ),
   'panel'     => 'grip_panel',
) );
/*Site Layout settings*/
$wp_customize->add_setting( 'grip_options[grip-site-layout-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-site-layout-options'],
    'sanitize_callback' => 'grip_sanitize_select'
) );
$wp_customize->add_control( 'grip_options[grip-site-layout-options]', array(
   'choices' => array(
    'boxed'    => __('Boxed Layout','grip'),
    'full-width'    => __('Full Width','grip')
),
   'label'     => __( 'Site Layout Option', 'grip' ),
   'description' => __('You can make the overall site full width or boxed in nature.', 'grip'),
   'section'   => 'grip_site_layout_section',
   'settings'  => 'grip_options[grip-site-layout-options]',
   'type'      => 'select',
   'priority'  => 30,
) );