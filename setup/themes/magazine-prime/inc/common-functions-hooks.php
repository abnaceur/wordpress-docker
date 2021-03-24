<?php
if (!function_exists('magazine_prime_the_custom_logo')):
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since magazine-prime 1.0.0
 */
function magazine_prime_the_custom_logo() {
	if (function_exists('the_custom_logo')) {
		the_custom_logo();
	}
}
endif;

if (!function_exists('magazine_prime_body_class')):

/**
 * body class.
 *
 * @since 1.0.0
 */
function magazine_prime_body_class($magazine_prime_body_class) {
	global $post;
	$global_layout       = magazine_prime_get_option('global_layout');
	$input               = '';
	$home_content_status = magazine_prime_get_option('home_page_content_status');
	if (1 != $home_content_status) {
		$input = 'home-content-not-enabled';
	}
	// Check if single.
	if ($post && is_singular()) {
		$post_options = get_post_meta($post->ID, 'magazine-prime-meta-select-layout', true);
		if( empty( $post_options ) || $post_options == 'global' ){
			$global_layout = esc_attr(magazine_prime_get_option('global_layout'));
		} else {
			$global_layout = esc_attr($post_options);
		}
	}
	if ($global_layout == 'left-sidebar') {
		$magazine_prime_body_class[] = 'left-sidebar '.esc_attr($input);
	} elseif ($global_layout == 'no-sidebar') {
		$magazine_prime_body_class[] = 'no-sidebar '.esc_attr($input);
	} else {
		$magazine_prime_body_class[] = 'right-sidebar '.esc_attr($input);

	}
	return $magazine_prime_body_class;
}
endif;

add_action('body_class', 'magazine_prime_body_class');
/**
 * Returns word count of the sentences.
 *
 * @since magazine-prime 1.0.0
 */
if (!function_exists('magazine_prime_words_count')):
function magazine_prime_words_count($length = 25, $magazine_prime_content = null) {
	$length          = absint($length);
	$source_content  = preg_replace('`\[[^\]]*\]`', '', $magazine_prime_content);
	$trimmed_content = wp_trim_words($source_content, $length, '...');
	return $trimmed_content;
}
endif;

if (!function_exists('magazine_prime_simple_breadcrumb')):

/**
 * Simple breadcrumb.
 *
 * @since 1.0.0
 */
function magazine_prime_simple_breadcrumb() {

	if (!function_exists('breadcrumb_trail')) {

		require_once get_template_directory().'/assets/libraries/breadcrumbs/breadcrumbs.php';
	}

	$breadcrumb_args = array(
		'container'   => 'div',
		'show_browse' => false,
	);
	breadcrumb_trail($breadcrumb_args);

}

endif;

if (!function_exists('magazine_prime_custom_posts_navigation')):
/**
 * Posts navigation.
 *
 * @since 1.0.0
 */
function magazine_prime_custom_posts_navigation() {

	$pagination_type = magazine_prime_get_option('pagination_type');

	switch ($pagination_type) {

		case 'default':
			the_posts_navigation();
			break;

		case 'numeric':
			the_posts_pagination();
			break;

		default:
			break;
	}

}
endif;

add_action('magazine_prime_action_posts_navigation', 'magazine_prime_custom_posts_navigation');

if (!function_exists('magazine_prime_excerpt_length')):

/**
 * Excerpt length
 *
 * @since  magazine-prime 1.0.0
 *
 * @param null
 * @return int
 */
function magazine_prime_excerpt_length($length) {
	if ( is_admin() ) {
	        return $length;
	}
	global $magazine_prime_customizer_all_values;
	$excerpt_length = $magazine_prime_customizer_all_values['excerpt_length_global'];
	if (empty($excerpt_length)) {
		$excerpt_length = $length;
	}
	return absint($excerpt_length);

}

endif;
add_filter('excerpt_length', 'magazine_prime_excerpt_length', 999);

if (!function_exists('magazine_prime_recommended_plugins')):

/**
 * Recommended plugins
 *
 */
function magazine_prime_recommended_plugins() {
	$magazine_prime_plugins = array(
		array(
		    'name'     => __('Social Share With Floating Bar', 'magazine-prime'),
		    'slug'     => 'social-share-with-floating-bar',
		    'required' => false,
		),
	);
	$magazine_prime_plugins_config = array(
		'dismissable' => true,
	);

	tgmpa($magazine_prime_plugins, $magazine_prime_plugins_config);
}
endif;
add_action('tgmpa_register', 'magazine_prime_recommended_plugins');

if( class_exists( 'Booster_Extension_Class' ) ){

    add_filter('booster_extemsion_content_after_filter','magazine_prime_after_content_pagination');

}

if( !function_exists('magazine_prime_after_content_pagination') ):

    function magazine_prime_after_content_pagination($after_content){

        $pagination_single = wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-prime' ),
                    'after'  => '</div>',
                    'echo' => false
                ) );

        $after_content =  $pagination_single.$after_content;

        return $after_content;

    }

endif;

if( !function_exists('magazine_prime_post_floating_nav') ):

    function magazine_prime_post_floating_nav(){

        $default = magazine_prime_get_default_theme_options();
        $ed_floating_next_previous_nav = get_theme_mod( 'ed_floating_next_previous_nav',$default['ed_floating_next_previous_nav'] );

        if( 'post' === get_post_type() && $ed_floating_next_previous_nav ){

            $next_post = get_next_post();
            $prev_post = get_previous_post();

            if( isset( $prev_post->ID ) ){

                $prev_link = get_permalink( $prev_post->ID );?>

                <div class="floating-post-navigation floating-navigation-prev">
                    <?php if( get_the_post_thumbnail( $prev_post->ID,'medium' ) ){ ?>
                            <?php echo wp_kses_post( get_the_post_thumbnail( $prev_post->ID,'medium' ) ); ?>
                    <?php } ?>
                    <a href="<?php echo esc_url( $prev_link ); ?>">
                        <span class="floating-navigation-label"><?php echo esc_html__('Previous post', 'magazine-prime'); ?></span>
                        <span class="floating-navigation-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                    </a>
                </div>

            <?php }

            if( isset( $next_post->ID ) ){

                $next_link = get_permalink( $next_post->ID );?>

                <div class="floating-post-navigation floating-navigation-next">
                    <?php if( get_the_post_thumbnail( $next_post->ID,'medium' ) ){ ?>
                        <?php echo wp_kses_post( get_the_post_thumbnail( $next_post->ID,'medium' ) ); ?>
                    <?php } ?>
                    <a href="<?php echo esc_url( $next_link ); ?>">
                        <span class="floating-navigation-label"><?php echo esc_html__('Next post', 'magazine-prime'); ?></span>
                        <span class="floating-navigation-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                    </a>
                </div>

            <?php
            }

        }

    }

endif;

add_action( 'magazine_prime_navigation_action','magazine_prime_post_floating_nav',10 );