<?php
/**
 *  Grip Logo Option
 *
 * @since Grip 1.0.0
 *
 */
/*Logo Options*/
$wp_customize->add_setting( 'grip_options[grip-custom-logo-position]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['grip-custom-logo-position'],
    'sanitize_callback' => 'grip_sanitize_select'
) );
$wp_customize->add_control( 'grip_options[grip-custom-logo-position]', array(
   'choices' => array(
    'default'    => __('Left Align','grip'),
    'center'    => __('Center Logo','grip')
),
   'label'     => __( 'Logo Position Option', 'grip' ),
   'description' => __('Your logo will be in the center position.', 'grip'),
   'section'   => 'title_tagline',
   'settings'  => 'grip_options[grip-custom-logo-position]',
   'type'      => 'select',
   'priority'  => 30,
) );