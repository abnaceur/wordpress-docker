<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Enqueue scripts and styles.
 */
function aeonmag_scripts() {

	/*google font  */
	global $aeonmag_theme_options;
    /*body  */
    wp_enqueue_style('aeonmag-body', '//fonts.googleapis.com/css?family=Merriweather', array(), null);
    /*heading  */
    wp_enqueue_style('aeonmag-heading', '//fonts.googleapis.com/css?family=Oswald', array(), null);
    /*Author signature google font  */
    wp_enqueue_style('aeonmag-sign', '//fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap', array(), null);
    
	//*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/grid.css', array(), '4.5.0' );
    
    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0' );

   /*Main CSS*/
    wp_enqueue_style( 'aeonmag-style', get_stylesheet_uri() );

	/*RTL CSS*/
	wp_style_add_data( 'aeonmag-style', 'rtl', 'replace' );

    $aeonmag_pagination_option =  esc_attr($aeonmag_theme_options['aeonmag-pagination-options']);
    
    if( 'ajax' == $aeonmag_pagination_option )  {
    	
    	wp_enqueue_script( 'aeonmag-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0', true );
    }

	wp_enqueue_script( 'aeonmag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '4.6.0', true  );
    
    $offcanvas =  absint($aeonmag_theme_options['aeonmag_enable_offcanvas']);
    if( 1  == $offcanvas )  {
        wp_enqueue_script( 'offcanvas-custom', get_template_directory_uri() . '/assets/js/canvas-custom.js', array('jquery'), '4.6.0', true );
    }
    /*marquee Scripts*/
    wp_enqueue_script( 'aeonmag-marquee', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );
    
    
    /*Custom Script JS*/
	wp_enqueue_script( 'aeonmag-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20200412', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'aeonmag-custom', get_template_directory_uri() . '/assets/js/jquery.marquee.min.js', array(), '20200412', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'aeonmag-custom', 'aeonmag_ajax', array(
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'paged'     => absint($paged),
        'max_num_pages'      => absint($max_num_pages),
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'View More', 'aeonmag' ),
        'no_more_posts'        => __( 'No More', 'aeonmag' ),
    ));

	wp_enqueue_script( 'aeonmag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $aeonmag_theme_options;
	if( 1 == absint($aeonmag_theme_options['aeonmag-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'aeonmag-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'aeonmag_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function aeonmag_block_styles() {
    wp_enqueue_style( 'aeonmag-editor-styles', get_theme_file_uri( 'css/block-editor.css' ) );

    /*body  */
    wp_enqueue_style('aeonmag-body', '//fonts.googleapis.com/css?family=Merriweather', array(), null);
    /*heading  */
    wp_enqueue_style('aeonmag-heading', '//fonts.googleapis.com/css?family=Oswald', array(), null);

    $aeonmag_custom_css = '
    .edit-post-visual-editor.editor-styles-wrapper{ font-family: Merriweather;}

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{font-family:Oswald;} 
    ';

    wp_add_inline_style( 'aeonmag-editor-styles', $aeonmag_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'aeonmag_block_styles' );

