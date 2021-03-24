<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function kiducation_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kiducation' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'kiducation_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function kiducation_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'On', 'kiducation' ),
            'off'       => esc_html__( 'Off', 'kiducation' )
        );
        return apply_filters( 'kiducation_switch_options', $arr );
    }
endif;


 /**
 * Get an array of google fonts.
 * 
 */
function kiducation_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'kiducation' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'kiducation_font_choices', $font_family_arr );
}

if ( ! function_exists( 'kiducation_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kiducation_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kiducation' ),
            'header-font-1'   => esc_html__( 'Raleway', 'kiducation' ),
            'header-font-2'   => esc_html__( 'Poppins', 'kiducation' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'kiducation' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'kiducation' ),
            'header-font-5'   => esc_html__( 'Lato', 'kiducation' ),
            'header-font-6'   => esc_html__( 'Shadows Into Light', 'kiducation' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'kiducation' ),
            'header-font-8'   => esc_html__( 'Lora', 'kiducation' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'kiducation' ),
            'header-font-10'   => esc_html__( 'Muli', 'kiducation' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'kiducation' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'kiducation' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'kiducation' ),
            'header-font-14'   => esc_html__( 'Cairo', 'kiducation' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'kiducation' ),
        );

        $output = apply_filters( 'kiducation_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'kiducation_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kiducation_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kiducation' ),
            'body-font-1'     => esc_html__( 'Raleway', 'kiducation' ),
            'body-font-2'     => esc_html__( 'Poppins', 'kiducation' ),
            'body-font-3'     => esc_html__( 'Roboto', 'kiducation' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'kiducation' ),
            'body-font-5'     => esc_html__( 'Lato', 'kiducation' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'kiducation' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'kiducation' ),
            'body-font-8'   => esc_html__( 'Lora', 'kiducation' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'kiducation' ),
            'body-font-10'   => esc_html__( 'Muli', 'kiducation' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'kiducation' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'kiducation' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'kiducation' ),
            'body-font-14'   => esc_html__( 'Cairo', 'kiducation' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'kiducation' ),
        );

        $output = apply_filters( 'kiducation_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>