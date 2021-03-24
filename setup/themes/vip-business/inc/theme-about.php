<?php
/**
 * Adds Theme page
 *
 * @package Vip_Business
 */

function vip_business_about_admin_style( $hook ) {
	if ( 'appearance_page_vip-business-about' === $hook ) {
		wp_enqueue_style( 'vip-business-theme-about', get_theme_file_uri( 'css/theme-about.css' ), null, '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'vip_business_about_admin_style' );

/**
 * Add theme page
 */
function vip_business_menu() {
	add_theme_page( esc_html__( 'About Theme', 'vip-business' ), esc_html__( 'About Theme', 'vip-business' ), 'edit_theme_options', 'vip-business-about', 'vip_business_about_display' );
}
add_action( 'admin_menu', 'vip_business_menu' );

/**
 * Display About page
 */
function vip_business_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( 'https://fireflythemes.com/themes/vip-business-pro/' ); ?>" class="button button-primary green" target="_blank"><?php esc_html_e( 'Upgrade to Premium', 'vip-business' ); ?></a>

					<a href="<?php echo esc_url( 'https://fireflythemes.com/themes/vip-business' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Info', 'vip-business' ); ?></a>

					<a href="<?php echo esc_url( 'https://fireflythemes.com/documentation/vip-business/' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Documentation', 'vip-business' ); ?></a>

					<a href="<?php echo esc_url( 'https://fireflythemes.com/themes/vip-business/#tabs-2' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Free Vs Pro', 'vip-business' ); ?></a>

					<a href="<?php echo esc_url( 'https://fireflythemes.com/demo/vip-business' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Demo', 'vip-business' ); ?></a>

					<a href="<?php echo esc_url( 'https://fireflythemes.com/support' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Support', 'vip-business' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'vip-business' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'vip-business-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'vip-business-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'vip-business' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'vip-business-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'vip-business' ); ?></a>
		</nav>

		<?php
			vip_business_main_screen();

			vip_business_changelog_screen();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'vip-business' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'vip-business' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'vip-business' ) : esc_html_e( 'Go to Dashboard', 'vip-business' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function vip_business_main_screen() {
	if ( isset( $_GET['page'] ) && 'vip-business-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'vip-business' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'vip-business' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'vip-business' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'vip-business' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'vip-business' ) ?></p>
				<p><a href="<?php echo esc_url( 'https://fireflythemes.com/support-forum' ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'vip-business' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function vip_business_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">
			<?php
				$changelog_file = apply_filters( 'vip_business_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = vip_business_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function vip_business_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
			$changelog_isolated = str_replace( 'Changelog ==', '', $value );
		}
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';
		
	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}
