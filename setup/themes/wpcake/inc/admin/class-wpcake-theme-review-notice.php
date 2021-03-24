<?php
/**
 * WPCake Theme Review Notice Class.
 *
 * @author  WPCake
 * @package WPCake
 * @since   1.2.2
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to display the theme review notice after certain period.
 *
 * Class WPCake_Theme_Review_Notice
 */
class WPCake_Theme_Review_Notice {

	/**
	 * Constructor function to include the required functionality for the class.
	 *
	 * WPCake_Theme_Review_Notice constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'review_notice' ) );
		add_action( 'admin_notices', array( $this, 'review_notice_markup' ), 0 );
		add_action( 'admin_init', array( $this, 'ignore_theme_review_notice' ), 0 );
		add_action( 'admin_init', array( $this, 'ignore_theme_review_notice_partially' ), 0 );
		add_action( 'switch_theme', array( $this, 'review_notice_data_remove' ) );
	}

	/**
	 * Set the required option value as needed for theme review notice.
	 */
	public function review_notice() {
		// Set the installed time in `wpcake_theme_installed_time` option table.
		if ( ! get_option( 'wpcake_theme_installed_time' ) ) {
			update_option( 'wpcake_theme_installed_time', time() );
		}
	}

	/**
	 * Show HTML markup if conditions meet.
	 */
	public function review_notice_markup() {
		$user_id                  = get_current_user_id();
		$current_user             = wp_get_current_user();
		$ignored_notice           = get_user_meta( $user_id, 'wpcake_ignore_theme_review_notice', true );
		$ignored_notice_partially = get_user_meta( $user_id, 'nag_wpcake_ignore_theme_review_notice_partially', true );

		/**
		 * Return from notice display if:
		 *
		 * 1. The theme installed is less than 10 days ago.
		 * 2. If the user has ignored the message partially for 10 days.
		 * 3. Dismiss always if clicked on 'I Already Did' button.
		 */
		if ( ( get_option( 'wpcake_theme_installed_time' ) > strtotime( '-10 day' ) ) || ( $ignored_notice_partially > strtotime( '-10 day' ) ) || ( $ignored_notice ) ) {
			return;
		}
		?>
		<div class="notice notice-success wpcake-notice theme-review-notice" style="position:relative;">
			<p>
				<?php
				printf(
				    /* Translators: %1$s current user display name. */
					esc_html__(
						'Hi, %1$s! It seems that you have been using this theme for more than 10 days. We hope you are happy with everything that the theme has to offer. If you can spare a minute, please help us by leaving a 5-star review on WordPress.org.  By spreading the love, we can continue to develop new amazing features in the future, for free!', 'wpcake'
					),
					'<strong>' . esc_html( $current_user->display_name ) . '</strong>'
				);
				?>
			</p>

			<div class="links">
				<a href="https://wordpress.org/support/theme/wpcake/reviews/?filter=5#new-post" class="btn button-primary" target="_blank">
					<span class="dashicons dashicons-thumbs-up"></span>
					<span><?php esc_html_e( 'Sure', 'wpcake' ); ?></span>
				</a>

				<a href="?nag_wpcake_ignore_theme_review_notice_partially=0" class="btn button-secondary">
					<span class="dashicons dashicons-calendar"></span>
					<span><?php esc_html_e( 'Maybe later', 'wpcake' ); ?></span>
				</a>

				<a href="?nag_wpcake_ignore_theme_review_notice=0" class="btn button-secondary">
					<span class="dashicons dashicons-smiley"></span>
					<span><?php esc_html_e( 'I already did', 'wpcake' ); ?></span>
				</a>

				<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/wpcake/' ); ?>" class="btn button-secondary" target="_blank">
					<span class="dashicons dashicons-edit"></span>
					<span><?php esc_html_e( 'Got theme support question?', 'wpcake' ); ?></span>
				</a>
			</div> <!-- /.links -->

			<a class="notice-dismiss" href="?nag_wpcake_ignore_theme_review_notice=0"></a>
		</div> <!-- /.theme-review-notice -->
		<?php
	}

	/**
	 * `I already did` button or `dismiss` button: remove the review notice permanently.
	 */
	public function ignore_theme_review_notice() {
		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset( $_GET['nag_wpcake_ignore_theme_review_notice'] ) && '0' == $_GET['nag_wpcake_ignore_theme_review_notice'] ) {
			add_user_meta( get_current_user_id(), 'wpcake_ignore_theme_review_notice', 'true', true );
		}
	}

	/**
	 * `Maybe later` button: remove the review notice partially.
	 */
	public function ignore_theme_review_notice_partially() {
		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset( $_GET['nag_wpcake_ignore_theme_review_notice_partially'] ) && '0' == $_GET['nag_wpcake_ignore_theme_review_notice_partially'] ) {
			update_user_meta( get_current_user_id(), 'nag_wpcake_ignore_theme_review_notice_partially', time() );
		}
	}

	/**
	 * Remove the data set after the theme has been switched to other theme.
	 */
	public function review_notice_data_remove() {
		$get_all_users        = get_users();
		$theme_installed_time = get_option( 'wpcake_theme_installed_time' );

		// Delete options data.
		if ( $theme_installed_time ) {
			delete_option( 'wpcake_theme_installed_time' );
		}

		// Delete user meta data for theme review notice.
		foreach ( $get_all_users as $user ) {
			$ignored_notice           = get_user_meta( $user->ID, 'wpcake_ignore_theme_review_notice', true );
			$ignored_notice_partially = get_user_meta( $user->ID, 'nag_wpcake_ignore_theme_review_notice_partially', true );

			// Delete permanent notice remove data.
			if ( $ignored_notice ) {
				delete_user_meta( $user->ID, 'wpcake_ignore_theme_review_notice' );
			}

			// Delete partial notice remove data.
			if ( $ignored_notice_partially ) {
				delete_user_meta( $user->ID, 'nag_wpcake_ignore_theme_review_notice_partially' );
			}
		}
	}
}

new WPCake_Theme_Review_Notice();