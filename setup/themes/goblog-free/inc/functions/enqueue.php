<?php 
/**
 * Enqueues scripts and styles.
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 */

 /**
 * Function add script and styles.
 */
function goblog_free_enqueue_register() {

	// Style
	wp_enqueue_style( 'goblog-free-style', get_stylesheet_uri(), array(), '1.0.0' );
	
	// Responsive 1000px
	wp_enqueue_style( 'goblog-free-responsive-1000', get_template_directory_uri() . '/assets/css/responsive-1000.css', array(), '1.0.0', '(max-width: 1000px)' );

	// Responsive 750px
	wp_enqueue_style( 'goblog-free-responsive-750', get_template_directory_uri() . '/assets/css/responsive-750.css', array(), '1.0.0', '(max-width: 750px)' );

	// Responsive 700px
	wp_enqueue_style( 'goblog-free-responsive-700', get_template_directory_uri() . '/assets/css/responsive-700.css', array(), '1.0.0', '(max-width: 700px)' );

	// Responsive 600px
	wp_enqueue_style( 'goblog-free-responsive-600', get_template_directory_uri() . '/assets/css/responsive-600.css', array(), '1.0.0', '(max-width: 600px)' );

	// Responsive 500px
	wp_enqueue_style( 'goblog-free-responsive-500', get_template_directory_uri() . '/assets/css/responsive-500.css', array(), '1.0.0', '(max-width: 500px)' );

	// Responsive 400px
	wp_enqueue_style( 'goblog-free-responsive-400', get_template_directory_uri() . '/assets/css/responsive-400.css', array(), '1.0.0', '(max-width: 400px)' );

	// Font Awesome
	wp_enqueue_style( 'goblog-free-font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/all.min.css', array(), '5.13.0', 'all' );

	// Scripts JS
	wp_enqueue_script( 'goblog-free-myscripts', get_template_directory_uri() . '/assets/js/myscripts.js', array(), '1.0.0', true);   

	// Skip link focus
	wp_enqueue_script( 'goblog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20200827', true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'goblog_free_enqueue_register' );

 /**
 * Function add style admin panel.
 */
function goblog_free_enqueue_admin( $hook ) {
	if ( 'widgets.php' != $hook ) {
        return;
    }
	wp_enqueue_style( 'goblog-free-admin', get_template_directory_uri() . '/admin/css/admin.css', array(), '1.0.0' );
	
}
add_action( 'admin_enqueue_scripts', 'goblog_free_enqueue_admin' );

 /**
 * Function add style and js admin Goblog Free.
 */
function goblog_free_enqueue_admin_tabs( $hook ) {

	$allowed = array("appearance_page_goblog");
	if ( !in_array( $hook, $allowed) ) {
		return;
	}
	wp_enqueue_style('goblog-free-style-tabs', get_template_directory_uri() . '/admin/css/tabs.css', array());
	wp_enqueue_script('goblog-free-js-tabs', get_template_directory_uri() . '/admin/js/tabs.js', array(), '', true );
	wp_enqueue_style( 'goblog-free-icon-awesome', get_template_directory_uri() . '/assets/font-awesome/css/all.min.css', array(), '5.12.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'goblog_free_enqueue_admin_tabs' );