<?php
/**
 * Documentation for AeonMag
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonmag
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Add the menu item under Appearance, themes.
 */
function aeonmag_menu() {
	add_theme_page( __( 'About AeonMag', 'aeonmag' ), __( 'About AeonMag', 'aeonmag' ), 'edit_theme_options', 'aeonmag-theme', 'aeonmag_page' );
}
add_action( 'admin_menu', 'aeonmag_menu' );

/**
 * Enqueue styles for the help page.
 */
function aeonmag_admin_scripts( $hook ) {
	if ( 'appearance_page_aeonmag-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'aeonmag-admin-style', get_template_directory_uri() . '/css/admin.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'aeonmag_admin_scripts' );

/**
 * Add the theme page
 */
function aeonmag_page() {
	?>
	<div class="wrap">
		<div class="welcome-panel aeon-panel">
			<div class="welcome-panel-content">
				<img class="aeonlogo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/aeonwp.png' ); ?>" alt="" height="130px">
				<div class="aeontitle"><h1><?php esc_html_e( 'AeonMag', 'aeonmag' ); ?></h1>
					<br>
					<b><?php esc_html_e( 'Thank you for chosing AeonMag', 'aeonmag' ); ?></b><br>
				</div>
			</div>
		</div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h2><?php esc_html_e( 'Frequently asked questions', 'aeonmag' ); ?></h2>
				<h3><?php esc_html_e( 'Where can I get support for the theme?', 'aeonmag' ); ?></h3>
				<?php _e( 'You are welcome to post your questions in the <a href="https://wordpress.org/support/theme/aeonmag/">support forum</a>.', 'aeonmag' ); ?>
				<h3><?php esc_html_e( 'How to make home page?', 'aeonmag' ); ?></h3>
				<?php _e( 'You need to go to Appearance and then Customize section and see the font page options.', 'aeonmag' ); ?><br>
				<?php _e( 'Also, follow the theme docs and video too.', 'aeonmag' ); ?><br>
				<h3><?php esc_html_e( 'Can you add more features?', 'aeonmag' ); ?></h3>
				<?php esc_html_e( 'The Plus version of the theme has additional features.', 'aeonmag' ); ?> <?php _e( 'You can learn more about the premium version of the theme here: <a href="https://aeonwp.com/aeonmag-plus/">AeonMag Plus</a>.', 'aeonmag' ); ?><br>
				<?php _e( 'We also offer a <a href="https://aeonwp.com/services/">customization service</a>. ', 'aeonmag' ); ?><br>
				<h3><?php esc_html_e( 'Where can I download demo content?', 'aeonmag' ); ?></h3>
				<?php _e( 'You can download the demo content on our <a href="https://aeonwp.com/aeonmag/#demo">website</a>.', 'aeonmag' ); ?>
				<br>
				<br>
			</div>
		</div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h2><?php esc_html_e( 'Have you built something awesome with AeonMag?', 'aeonmag' ); ?></h2>
				<br>
				<?php esc_html_e( 'We would love to see what you have created!', 'aeonmag' ); ?>
				<?php esc_html_e( 'If you would like your website to be featured on our blog, please email us at aeonwpofficial@gmail.com', 'aeonmag' ); ?>
				<br>
				<br>
			</div>
		</div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h2><?php esc_html_e( 'If you like the theme, please leave a review', 'aeonmag' ); ?></h2><br>
				<a href="https://wordpress.org/support/theme/aeonmag/reviews/#new-post"><?php esc_html_e( 'Rate this theme', 'aeonmag' ); ?></a>
				<br><br>
			</div>
		</div>
	</div>
	<?php
}
