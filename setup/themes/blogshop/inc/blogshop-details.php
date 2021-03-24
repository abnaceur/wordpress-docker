<?php

/**
 * Adding Getting Started Page in admin menu
 */
function blogshop_admin_notice() {
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'blogshop-update-notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if ( is_admin() && 'themes.php' == $pagenow && !$meta ) {
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
            return;
        }

        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'blogshop' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'blogshop' ), esc_html( $name ) ) ; ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=blogshop-getting-started' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php esc_html_e( 'Go to the getting started.', 'blogshop' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?blogshop-update-notice=1"><?php esc_html_e( 'Dismiss','blogshop' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'blogshop_admin_notice' );

if( ! function_exists( 'blogshop_ignore_admin_notice' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function blogshop_ignore_admin_notice() {

    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset( $_GET['blogshop-update-notice'] ) && $_GET['blogshop-update-notice'] = '1' ) {

        update_option( 'blogshop-update-notice', true );
    }
}
endif;
add_action( 'admin_init', 'blogshop_ignore_admin_notice' );
