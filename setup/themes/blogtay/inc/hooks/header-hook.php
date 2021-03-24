<?php 

// social
if( !function_exists('blogtay_render_social_media_links')) :
    function blogtay_render_social_media_links() {
        wp_nav_menu( array(
                                    'theme_location' => 'social-links',
                                    'menu_id'        => 'social-links',
                                    'menu_class'        => 'social-list'
                                    
                                ) );
    }
endif;

add_action('blogtay_social_action', 'blogtay_render_social_media_links');

// Info
if( !function_exists('blogtay_render_header_info')) :
    function blogtay_render_header_info( $options ) {


            $header_info_number = isset( $options['blogtay_top_number'] ) ? $options['blogtay_top_number'] : '';

            $header_info_email = isset( $options['blogtay_top_email'] ) ? $options['blogtay_top_email'] : '';    

            if ( empty( $header_info_number ) && empty( $header_info_email )) {
                return;
            }
            echo '<ul class="info-list">';
            if ( ! empty( $header_info_number ) ) {
                echo '<li> <i class="fas fa-mobile-alt"></i>' .esc_html( $header_info_number ). '</li>';
            }
            if ( ! empty( $header_info_email ) ) {
                echo '<li><i class="far fa-envelope"></i>' . esc_html( $header_info_email ) . '</li>';
            }   
            echo '</ul>'; 
    }
endif;
add_action('blogtay_top_header_info_action', 'blogtay_render_header_info');