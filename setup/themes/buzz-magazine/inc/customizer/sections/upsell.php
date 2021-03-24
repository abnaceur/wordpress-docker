<?php
/**
 * Upsell Panel
 * Registers Upsell Panels
 * @package Buzz_Magazine
 */

/**
 * Registering Buzz_Magazine_Upsell_Section.
 */

$wp_customize->register_section_type( 'Buzz_Magazine_Upsell_Section' );

$wp_customize->add_section( new Buzz_Magazine_Upsell_Section($wp_customize,'buzz_magazine_upsell_section',
        array(
            'priority' => 0,
            'title'    => esc_html__( 'View Pro Version', 'buzz-magazine' ),
            'url'      => 'https://aarambhathemes.com/themes/buzz-magazine-pro/'
        ))
);