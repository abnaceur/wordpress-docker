<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Sociable
	 * @since Sociable 1.0.0
	 */

	/**
	 * sociable_doctype hook
	 *
	 * @hooked sociable_doctype -  10
	 *
	 */
	do_action( 'sociable_doctype' );

?>
<head>
<?php
	/**
	 * sociable_before_wp_head hook
	 *
	 * @hooked sociable_head -  10
	 *
	 */
	do_action( 'sociable_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * sociable_page_start_action hook
	 *
	 * @hooked sociable_page_start -  10
	 *
	 */
	do_action( 'sociable_page_start_action' ); 

	/**
	 * sociable_header_action hook
	 *
	 * @hooked sociable_header_start -  10
	 * @hooked sociable_site_branding -  20
	 * @hooked sociable_site_navigation -  30
	 * @hooked sociable_header_end -  50
	 *
	 */
	do_action( 'sociable_header_action' );

	/**
	 * sociable_content_start_action hook
	 *
	 * @hooked sociable_content_start -  10
	 *
	 */
	do_action( 'sociable_content_start_action' );

	/**
	 * sociable_header_image_action hook
	 *
	 * @hooked sociable_header_image -  10
	 *
	 */
	do_action( 'sociable_header_image_action' );

    if ( sociable_is_frontpage() ) {
    	$options = sociable_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'sociable_primary_content', 'sociable_add_'. $section .'_section' );
		}
		do_action( 'sociable_primary_content' );
	}