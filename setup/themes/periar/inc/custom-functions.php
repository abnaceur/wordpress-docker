<?php

/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'periar_fonts_url' ) ) :

function periar_fonts_url() {
  $periar_fonts_url  = '';
  $periar_merri   = _x( 'on', 'Merriweather font: on or off', 'periar' );
  $periar_open = _x( 'on', 'Open Sans font: on or off', 'periar' );

  if ( 'off' !== $periar_merri || 'off' !== $periar_open ) {
    $periar_font_families = array();

    if ( 'off' !== $periar_merri ) {
      $periar_font_families[] = 'Merriweather:wght@300,400,700';
    }

    if ( 'off' !== $periar_open ) {
      $periar_font_families[] = 'Open Sans:wght@300;400;600;700';
    }
  }

  $periar_query_args = array(
    'family' => urlencode( implode( '|', $periar_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $periar_fonts_url = add_query_arg( $periar_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $periar_fonts_url );
}

endif;

/*************************************************************************************************************************
 * Set the content width
 ************************************************************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/*************************************************************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ************************************************************************************************************************/

class Periar_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$periar_output, $periar_depth = 0, $periar_args = array() ) {
        $periar_indent = str_repeat( "\t", $periar_depth );
        if( 'mobile_menu' == $periar_args->theme_location ) {
            $periar_output .='<a href="#" class="dropdown-toggle"><i class="icofont-caret-down"></i></a>';
        }
        $periar_output .= "\n$periar_indent<ul class=\"sub-menu\">\n";
    }
}

/*************************************************************************************************************************
 * Estimated reading time
 ************************************************************************************************************************/

/* Word read count */
function periar_post_read_time( $post_id ) {

      // get the post content
      $content = get_post_field( 'post_content', $post_id );

      // count the words
      $word_count = str_word_count( strip_tags( $content ) );

      // reading time itself
      $readingtime = ceil($word_count / 200);

      if ($readingtime == 1) {
       $timer = " Minute read";
      } else {
       $timer = " Minutes read"; // or your version :) I use the same wordings for 1 minute of reading or more
      }

      // I'm going to print 'X minute read' above my post
      $totalreadingtime = $readingtime . $timer;
      echo esc_html( $totalreadingtime, 'periar' );

}

/****************************************************************************
 *  Custom Excerpt Length
 ****************************************************************************/

function periar_excerpt( $limit ) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

/****************************************************************************
 *  Excerpt Dots change
 ****************************************************************************/
function periar_excerpt_more( $more ) {
  return '...';
}

add_filter('excerpt_more', 'periar_excerpt_more');

/*****************************************************************************
* Notice: Premium Version
*****************************************************************************/
/* Setup Transients after theme activation */
if ( ! function_exists( 'periar_theme_setup' ) ) :

function periar_after_activation() {
  // Add Notification Options and Transients
  set_transient( 'ct-times-shown-transient', 1, 43200 ); // 12 hours in seconds
  add_option( 'dismissed-ct_premium', 'unset' );
}

endif;
add_action( 'after_switch_theme', 'periar_after_activation' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
add_action( 'wp_ajax_ct_premium_notice_handler', 'periar_premium_ajax_notice_handler' );
function periar_premium_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, 'set' );
    }
}

// Actual Notice
function periar_premium_admin_notice() {
    $theme = wp_get_theme();
    $theme_name = esc_html( $theme->get( 'Name' ) );
    $theme_slug = esc_html( $theme->get( 'TextDomain' ) );

    // Check if it's been dismissed...
    if ( !get_transient( 'ct-times-shown-transient' ) ) {
        // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
        // and added "data-notice" attribute in order to track multiple / different notices
        // multiple dismissible notice states
        if ( get_option( 'dismissed-ct_premium' ) == 'unset' ) {
        ?>
        <div class="updated notice notice-ct-premium-class is-dismissible" data-notice="ct_premium">
            <div class="crafthemes-ct-premium-notice clearfix">
                <h2><?php printf( esc_html__( 'UPGRADE to %1$s Pro and unlock all the PREMIUM Features!', 'periar' ), esc_html( $theme_name ) ); ?></h2>
                <p><?php _e( 'Get the best out of your blog with Periar Pro! Periar Pro offers Intro Header, Slider, Author Introduction Section, <b>Dark Mode Feature</b>, <b>Auto Loading Single Posts on Scroll</b>, Customizable typography, Optimized SEO and many more fearures. You will also get Premium support for your theme.', 'periar' ); ?></p>
                <div class="ct-action-buttons">
                    <a href="<?php echo esc_url( "https://www.crafthemes.com/theme/". $theme_slug . "-pro/"); ?>" target="_blank"><button id="buy-pro-btn" type="button" class="button button-primary"><?php esc_html_e( 'Upgrade to Pro!', 'periar' ); ?></button></a>
                    <strong><a class="left-margin-compare" href="<?php echo esc_url( "https://www.crafthemes-demo.com/". $theme_slug . "-pro/"); ?>"><?php esc_html_e( 'Live Demo', 'periar' ); ?></a></strong>
                </div>
            </div><!-- /.ct-theme-notice-content -->
        </div>
    <?php } }
}

add_action( 'admin_notices', 'periar_premium_admin_notice' );















