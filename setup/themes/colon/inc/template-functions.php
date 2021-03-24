<?php
/**
 * @package colon
 */  


/**
 * Top Bar
 */
if ( ! function_exists( 'colon_enable_header_topbar_style1' ) ) :
function colon_enable_header_topbar_style1() {
    ?>  
        <div class="top-bar colon-top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="left-column">
                            <?php 
                                if ( is_active_sidebar('topbar-left')) :
                                    get_sidebar('topbar-left'); 
                                endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="right-column">
                            <?php  
                                if ( is_active_sidebar('topbar-right')) :
                                    get_sidebar('topbar-right'); 
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
endif;
add_action('colon_action_enable_header_topbar_style1', 'colon_enable_header_topbar_style1');


/**
 * Preconnect Fonts
 */
function colon_preconnect_fonts() {
    if(get_theme_mod( 'colon_enable_poppings_font',false)) :
        ?> 
            <link rel="dns-prefetch" href="https://fonts.gstatic.com"> 
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
        <?php
    endif;
}
add_action( 'wp_head', 'colon_preconnect_fonts' ); 

/**
 * Function for Minimizing dynamic CSS
 */
function colon_minimize_css($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}

/**
 * Check if woocommerce is activated.
 */
if ( ! function_exists( 'colon_is_active_woocommerce' ) ) {
    function colon_is_active_woocommerce() {
        if ( class_exists( 'WooCommerce' ) ) :
            return true;
        else :
            return false;
        endif;
    }
}