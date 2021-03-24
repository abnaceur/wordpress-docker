<?php

/**
 * Add panels
 */

 /* adding labestblogt panel */
 Kirki::add_panel( 'upgradepro_options', array(
     'priority'    => 10,
     'title'       => esc_attr__( 'About Theme', 'safreen' ),
     'description' => esc_attr__( 'This panel will provide all Site layout and Background color typography options of the Theme.', 'safreen' ),
     'icon' => 'dashicons-warning'
 ) );

/* adding layout panel */
Kirki::add_panel( 'theme_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Theme Options', 'safreen' ),
    'description' => esc_attr__( 'This panel will provide all the options of the Theme.', 'safreen' ),
) );

?>
