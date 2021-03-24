<?php
/**
 * Added Opus Blog Page.
*/

/**
 * Add a new page under Appearance
 */
function opus_blog_menu() {
	add_theme_page( __( 'Opus Blog Options', 'opus-blog' ), __( 'Opus Blog Options', 'opus-blog' ), 'edit_theme_options', 'opus-blog-theme', 'opus_blog_page' );
}
add_action( 'admin_menu', 'opus_blog_menu' );

/**
 * Enqueue styles for the help page.
 */
function opus_blog_admin_scripts( $hook ) {
	if ( 'appearance_page_opus-blog-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'opus-blog-admin-style', get_template_directory_uri() . '/inc/about/about.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'opus_blog_admin_scripts' );

/**
 * Add the theme page
 */
function opus_blog_page() {
	?>
	<div class="das-wrap">
		<div class="opus-blog-panel">
			<div class="opus-blog-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/inc/about/images/opus-blog-logo.png' ); ?>" alt="Logo">
			</div>
			<a href="https://www.templatesell.com/item/opus-blog-plus-minimal-wordpress-blog-theme/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade to Pro $49', 'opus-blog' ); ?></a>
			<p>
			<?php esc_html_e( 'A simple and minimal WordPress theme with post format ready design and easy to use theme features. It has options for blog page and single page. Click the button below to use the features.', 'opus-blog' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'opus-blog' ); ?></a>
		</div>

		<div class="opus-blog-panel">
			<div class="opus-blog-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'opus-blog' ); ?></h3>
				</div>
				<a href="http://docs.akithemes.com/" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Documentation - Click Here', 'opus-blog' ); ?></a>
			</div>
		</div>
		<div class="opus-blog-panel">
			<div class="opus-blog-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'opus-blog' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/opus-blog/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'opus-blog' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
