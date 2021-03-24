<?php
/**
 * Register Custom Controls
 * 
 * @since 1.0.0
*/
function blog99_toggle_controls( $wp_customize ){
    
    //Customizer Settings
    load_template( trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/custom-controls/toggle/class-toggle-control.php' );
    load_template( trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/custom-controls/multicheck/class-multicheck-control.php' );
    load_template( trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/custom-controls/radio/class-control-radio.php' );
    load_template( trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/custom-controls/links/links.php' );
    
    
    // //register control type
    $wp_customize->register_control_type( 'Blog99_MultiCheck_Control' );
    $wp_customize->register_control_type( 'Blog99_Toggle_Control' );

}
add_action( 'customize_register', 'blog99_toggle_controls' );