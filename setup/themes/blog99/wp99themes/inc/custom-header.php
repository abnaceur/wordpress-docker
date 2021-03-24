<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses blog99_header_style()
 */
function blog99_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'blog99_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1350,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'blog99_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'blog99_custom_header_setup' );

if ( ! function_exists( 'blog99_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see blog99_custom_header_setup().
	 */
	function blog99_header_style() {
		
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a, .site-description ,.sidenav-menu li a, .page_item_has_children:after, .menu-item-has-children:after, .page_item_has_children:hover:after
			 {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
