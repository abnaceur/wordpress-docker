<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'sociable_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'sociable' ),
		'priority'   			=> 900,
		'panel'      			=> 'sociable_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'sociable_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'sociable_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'sociable_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'sociable' ),
		'section'    			=> 'sociable_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'sociable_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright span',
		'settings'            => 'sociable_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'sociable_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'sociable_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'sociable_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Sociable_Switch_Control( $wp_customize, 'sociable_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'sociable' ),
		'section'    		=> 'sociable_section_footer',
		'on_off_label' 		=> sociable_switch_options(),
    )
) );