<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package buzz_magazine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function buzz_magazine_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if (get_theme_mod('background_image' ,'')){
        $classes[] = 'bg-image';
    }

    $classes[] = esc_attr(get_theme_mod('buzz_magazine_global_sidebar' , 'right')).'-sidebar';

	$classes[] = esc_attr(get_theme_mod('general_title_layout','layout-1'));

	if (is_archive()) {
            $classes[] = 'full-layout';
    }
    
	return $classes;
}
add_filter( 'body_class', 'buzz_magazine_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function buzz_magazine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'buzz_magazine_pingback_header' );

if ( ! function_exists( 'buzz_magazine_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function buzz_magazine_breadcrumb( $args = array() ) {

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require_once get_template_directory() . '/inc/library/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'     => 'div',
            'show_browse'   => false,
            'show_on_front'   => false,
        );
        breadcrumb_trail( $breadcrumb_args );

    }

endif;

/**
 * Page Structure
 */
function buzz_magazine_page_structure()
{

    $page_structure = get_theme_mod('sortable_page', ['image', 'title', 'content']);
    if (!is_array($page_structure)) {
        $page_structure_array = explode(',', $page_structure);
    } else {
        $page_structure_array = $page_structure;
    }
    if (is_array($page_structure_array)) {
        foreach ($page_structure_array as $structure) {
            switch ($structure) {
                case 'title':
                    echo '<div class="heading">
                               <header class="entry-header">
                                <h3 class="entry-title">';
                    the_title();
                    echo '  </h3>
                               </header>
                          </div>';
                    break;
                case 'image':
                    if (has_post_thumbnail()):
                        echo "<figure>";
                        the_post_thumbnail('full');

                        echo "</figure>";
                    endif;
                    break;

                case 'content':
                    echo '<div class="entry-content">';
                    the_content();
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'buzz-magazine'),
                        'after' => '</div>',
                    );
                    echo '</div>';


            }
        }

    }
}

/**
 * Content Type
 */
function buzz_magazine_content_type(){
    if (get_theme_mod('buzz_magazine_content_type', 'content') == 'content') {
        the_content();
    } else {
        the_excerpt();
    }
}


function buzz_magazine_get_slider_template_layout() {
    return get_theme_mod('buzz_magazine_slider_layout', 'layout-one');
}

/**
 * Featured number posts
 *
 * @return int
 */
function buzz_magazine_get_featured_posts_count() {

    $layout = buzz_magazine_get_slider_template_layout();

    switch( $layout ) {

        case 'layout-one':
        default:
        $count = 2;
            break;

        case 'layout-two':
            $count = 6;
            break;

    }

    return $count;
}

/**
 * Top Header Email And Number Option
 */
function buzz_magazine_get_top_header_select_email_number(){
?>
    <div class="top-header-menu">
        <ul>
            <?php if (get_theme_mod('top_header_section_email','')):?>
                <li>
                    <a target="_blank" href = "mailto: <?php echo esc_attr(get_theme_mod('top_header_section_email','')); ?>">
                           <span class="icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                          <?php echo esc_html(get_theme_mod('top_header_section_email','')); ?>
                        </a>
                </li>
            <?php endif;?>

            <?php if (get_theme_mod('top_header_section_phone','')):?>
                <li>

                    <a href="#" target="_blank">
                          <span class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                          </span>
                            <?php echo absint(get_theme_mod('top_header_section_phone','')); ?>
                    </a>
                </li>
            <?php endif;?>
            <?php if (get_theme_mod('top_header_section_address','')):?>
                <li>
                       <span class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                       </span>
                            <?php echo esc_html(get_theme_mod('top_header_section_address','')); ?>
                </li>
            <?php endif;?>
        </ul>
    </div>
    <?php

}

/**
 * Top Header Date Option
 */
function buzz_magazine_get_top_header_date(){?>
        <ul class="top-header-date">
       <li>
           <span class="icon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
           </span>
           <?php echo esc_html(date("l M d")); ?>

        </li>
        </ul>
    <?php
}

/**
 * Top Header Menu Option
 */
function buzz_magazine_get_top_header_menu(){

    wp_nav_menu(
        array(
            'theme_location' => 'top-header',
            'menu_class' => 'top-header-btn',
        )
    );

}

/**
 *  Social Icon
 */
function buzz_magazine_get_social_icon(){
    if (has_nav_menu('social-icon')) {
        wp_nav_menu(
            array(
                'theme_location' => 'social-icon',
                'menu_class' => 'menu',
                'menu_id' => 'menu-social-menu',
                'container_class' => 'social-links'
            )
        );
    }
}


    /**
     * Header Breadcrumb
     *
     * @since 1.0.0
     */
    function buzz_magazine_header_breadcrumb() {

        if (is_front_page() || is_home()){
            return;
        }
        if (!get_theme_mod('toggle_master_breadcrumb',true)){
            return;
        }
        
        if (!is_single() && !is_archive() && !is_404()){
            return;
        }

        ?>
        <div class="container" >
            <div class="page-title-wrap breadcrumb-wrapper" id="breadcrumb-wrap" >
                <div class="background-color-div"></div>
                <div class="container">
                    <?php buzz_magazine_breadcrumb(); ?>
                </div>
            </div>
        </div>
    <?php  }


if (! function_exists('buzz_magazine_slider')):
	/**
	 * Slider Section
	 */
	function buzz_magazine_slider(){
		if (!is_front_page() && is_home() || get_theme_mod('slider_section_option_toggle',true) == false){
			return;
		}

		if (!is_archive() && !is_front_page() ){
			return;
		}

		?>
        <div class="container">
			<?php
			$layout = buzz_magazine_get_slider_template_layout();

			if ('layout-one' === $layout) {
				$partial_file = 'layout1';
			}elseif ('layout-two' === $layout){
				$partial_file = 'layout2';
			}

			get_template_part('template-parts/slider/slider', $partial_file);

			?>

			<?php if (get_theme_mod('advertisement_image','')):
				if (is_archive() && get_theme_mod('toggle_advertisement_archive' ,true) == false ){
					return;
				}
				?>
                <section class="advertisement">
                    <figure>
                        <img src="<?php echo esc_url(get_theme_mod('advertisement_image',''))?>" alt="advertisement">
                    </figure>
                </section>
			<?php endif;?>
        </div>
		<?php
	}

endif;
add_action( 'buzz_magazine_action_header', 'buzz_magazine_slider', 50 );


/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function buzz_magazine_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => esc_html__( 'Aarambha Demo Sites', 'buzz-magazine' ), //The plugin name
			'slug'      => 'aarambha-demo-sites',  // The plugin slug (typically the folder name)
			'required'  => false,  // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

	);

	$config = array(
		'id'           => 'buzz-magazine',         // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'buzz_magazine_register_required_plugins' );

