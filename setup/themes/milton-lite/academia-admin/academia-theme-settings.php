<?php
/**
 * Define Constants
 */
if( ! defined( 'ACADEMIATHEMES_SHORTNAME' ) ) {
	define( 'ACADEMIATHEMES_SHORTNAME', 'milton-lite' );
}
if( ! defined( 'ACADEMIATHEMES_PAGE_BASENAME' ) ) {
	define( 'ACADEMIATHEMES_PAGE_BASENAME', 'milton-doc' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_DETAILS' ) ) {
	define( 'ACADEMIATHEMES_THEME_DETAILS', 'https://www.academiathemes.com/free-wordpress-themes/milton-lite/?utm_source=dashboard&utm_medium=doc-page&utm_campaign=milton-lite&utm_content=theme-details-link' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_DEMO' ) ) {
	define( 'ACADEMIATHEMES_THEME_DEMO', 'https://demo.academiathemes.com/?theme=milton-lite&utm_source=dashboard&utm_medium=doc-page&utm_campaign=milton-lite&utm_content=demo-link' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_VIDEO_GUIDE' ) ) {
	define( 'ACADEMIATHEMES_THEME_VIDEO_GUIDE', 'https://youtu.be/Jx0nDPF4-4o');
}
if( ! defined( 'ACADEMIATHEMES_THEME_VIDEO_COMPARISON' ) ) {
	define( 'ACADEMIATHEMES_THEME_VIDEO_COMPARISON', 'https://youtu.be/Jx0nDPF4-4o?t=382');
}
if( ! defined( 'ACADEMIATHEMES_THEME_DOCUMENTATION_URL' ) ) {
	define( 'ACADEMIATHEMES_THEME_DOCUMENTATION_URL', 'https://www.academiathemes.com/documentation/milton-lite/?utm_source=dashboard&utm_medium=doc-page&utm_campaign=milton-lite&utm_content=documentation-link' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_SUPPORT_FORUM_URL' ) ) {
	define( 'ACADEMIATHEMES_THEME_SUPPORT_FORUM_URL', 'https://wordpress.org/support/theme/milton-lite/' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_REVIEW_URL' ) ) {
	define( 'ACADEMIATHEMES_THEME_REVIEW_URL', 'https://wordpress.org/support/theme/milton-lite/reviews/#new-post' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_UPGRADE_URL' ) ) {
	define( 'ACADEMIATHEMES_THEME_UPGRADE_URL', 'https://www.academiathemes.com/themes/milton/?utm_source=dashboard&utm_medium=doc-page&utm_campaign=milton-lite&utm_content=upgrade-button' );
}
if( ! defined( 'ACADEMIATHEMES_THEME_DEMO_IMPORT_URL' ) ) {
	define( 'ACADEMIATHEMES_THEME_DEMO_IMPORT_URL', false );
}

/**
 * Specify Hooks/Filters
 */
add_action( 'admin_menu', 'academiathemes_add_menu' );

/**
* The admin menu pages
*/
function academiathemes_add_menu(){
	
	add_theme_page( __('Milton Lite Theme','milton-lite'), __('Milton Lite Theme','milton-lite'), 'edit_theme_options', ACADEMIATHEMES_PAGE_BASENAME, 'academiathemes_settings_page_doc' ); 

}

// ************************************************************************************************************

/*
 * Theme Documentation Page HTML
 * 
 * @return echoes output
 */
function academiathemes_settings_page_doc() {
	// get the settings sections array
	$theme_data = wp_get_theme();
	?>
	
	<div class="academiathemes-wrapper">
		<div class="academiathemes-header">
			<div id="academiathemes-theme-info">
				<div class="academiathemes-message-image">
					<img class="academiathemes-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_attr_e( 'Milton Lite Theme Screenshot', 'milton-lite' ); ?>" />
				</div><!-- ws fix
				--><p><?php 

					echo sprintf( 
					/* translators: Theme name and version */
					__( '<span class="theme-name">%1$s Lite Theme</span> <span class="theme-version">(version %2$s)</span>', 'milton-lite' ), 
					esc_html($theme_data->name),
					esc_html($theme_data->version)
					); ?></p>
					<p class="theme-buttons"><a class="button button-primary" href="<?php echo esc_url(ACADEMIATHEMES_THEME_DETAILS); ?>" rel="noopener" target="_blank"><?php esc_html_e('Theme Details','milton-lite'); ?></a>
				<a class="button button-primary" href="<?php echo esc_url(ACADEMIATHEMES_THEME_DEMO); ?>" rel="noopener" target="_blank"><?php esc_html_e('Theme Demo','milton-lite'); ?></a>
				<?php if ( ACADEMIATHEMES_THEME_VIDEO_GUIDE ) { ?><a class="button button-primary academiathemes-button academiathemes-button-youtube" href="<?php echo esc_url(ACADEMIATHEMES_THEME_VIDEO_GUIDE); ?>" rel="noopener" target="_blank"><span class="dashicons dashicons-youtube"></span> <?php esc_html_e('Theme Video Tutorial','milton-lite'); ?></a><?php } ?></p>
			</div><!-- #academiathemes-theme-info --><!-- ws fix
			--><div id="academiathemes-logo">
				<a href="https://www.academiathemes.com/?utm_source=dashboard&utm_medium=doc-page&utm_campaign=milton-lite&utm_content=academiathemes-logo" target="_blank" rel="noopener"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/academia-admin/images/academiathemes-logo-black.png" width="175" height="79" alt="<?php esc_attr_e('AcademiaThemes.com Logo','milton-lite'); ?>" /></a>
			</div><!-- #academiathemes-logo -->
		</div><!-- .academiathemes-header -->
		
		<div class="academiathemes-documentation">

			<ul class="academiathemes-doc-columns clearfix">
				<li class="academiathemes-doc-column academiathemes-doc-column-1">
					<div class="academiathemes-doc-column-wrapper">
						<div class="doc-section">
							<h3 class="column-title"><span class="academiathemes-icon dashicons dashicons-editor-help"></span><span class="academiathemes-title-text"><?php esc_html_e('Documentation and Support','milton-lite'); ?></span></h3>
							<div class="academiathemes-doc-column-text-wrapper">
								<?php if ( ACADEMIATHEMES_THEME_LITE && ACADEMIATHEMES_THEME_SUPPORT_FORUM_URL ) { ?><p><?php 
								echo sprintf( 
								/* translators: Theme name and link to WordPress.org Support forum for the theme */
								__( 'Support for %1$s Theme is provided in the official WordPress.org community support forums. ', 'milton-lite' ), 
								esc_html($theme_data->name)	); ?></p><?php } elseif ( ACADEMIATHEMES_THEME_PRO ) { ?>
									<p><?php esc_html_e('The usual response time is less than 45 minutes during regular work hours, Monday through Friday, 9:00am - 6:00pm (GMT+01:00). <br>Response time can be slower outside of these hours.','milton-lite'); ?></p>
								<?php } ?>

								<p class="doc-buttons"><a class="button button-primary" href="<?php echo esc_url(ACADEMIATHEMES_THEME_DOCUMENTATION_URL); ?>" rel="noopener" target="_blank"><?php esc_html_e('View Milton Lite Documentation','milton-lite'); ?></a><?php if ( ACADEMIATHEMES_THEME_SUPPORT_FORUM_URL ) { ?> <a class="button button-secondary" href="<?php echo esc_url(ACADEMIATHEMES_THEME_SUPPORT_FORUM_URL); ?>" rel="noopener" target="_blank"><?php esc_html_e('Go to Milton Lite Support Forum','milton-lite'); ?></a><?php } ?></p>

							</div><!-- .academiathemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
						<?php if ( ACADEMIATHEMES_THEME_VIDEO_GUIDE ) { ?>
						<div class="doc-section">

							<h3 class="column-title"><span class="academiathemes-icon dashicons dashicons-youtube"></span><span class="academiathemes-title-text"><?php esc_html_e('Theme Video Tutorial','milton-lite'); ?></span></h3>
							<div class="academiathemes-doc-column-text-wrapper">
							
								<p><strong><?php esc_html_e('Click the image below to open the video guide in a new browser tab.','milton-lite'); ?></strong></p>
								<p><a href="<?php echo esc_url(ACADEMIATHEMES_THEME_VIDEO_GUIDE); ?>" rel="noopener" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/academia-admin/images/milton-video-preview.jpg" class="video-preview" alt="<?php esc_attr_e('Milton Lite Theme Video Tutorial','milton-lite'); ?>" /></a></p>

							</div><!-- .academiathemes-doc-column-text-wrapper-->

						</div><!-- .doc-section -->
						<?php } ?>
						<div class="doc-section">
							<?php
							$current_user = wp_get_current_user();

							?>
							<h3 class="column-title"><span class="academiathemes-icon dashicons dashicons-email-alt"></span><span class="academiathemes-title-text"><?php esc_html_e('Subscribe to our newsletter','milton-lite'); ?></span></h3>
							<div class="academiathemes-doc-column-text-wrapper">
								<form action="https://academiathemes.us18.list-manage.com/subscribe/post?u=2e4ed535a2db4d9381275cebe&amp;id=08bd553137" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
									<p class="newsletter-description"><?php esc_html_e('We send out the newsletter once every few months. It contains information about our new themes and important theme updates.','milton-lite'); ?></p>
									<div id="mc_embed_signup_scroll" style="margin: 24px 0; ">
										<input type="email" value="<?php echo esc_attr($current_user->user_email); ?>" name="EMAIL" class="email" id="mce-EMAIL" style="min-width: 250px; padding: 2px 8px;" placeholder="email address" required="">
										<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
										<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_2e4ed535a2db4d9381275cebe_08bd553137" tabindex="-1" value=""></div>
										<input type="submit" value="<?php esc_attr_e('Subscribe','milton-lite'); ?>" name="subscribe" id="mc-embedded-subscribe" class="button button-primary">
									</div><!-- #mc_embed_signup_scroll -->
									<p class="newsletter-disclaimer" style="font-size: 14px;"><?php esc_html_e('We use Mailchimp as our marketing platform. By clicking above to subscribe, you acknowledge that your information will be transferred to Mailchimp for processing.','milton-lite'); ?></p>
								</form>

							</div><!-- .academiathemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
						<?php if ( ACADEMIATHEMES_THEME_REVIEW_URL ) { ?>
						<div class="doc-section">
							<h3 class="column-title"><span class="academiathemes-icon dashicons dashicons-awards"></span><span class="academiathemes-title-text"><?php esc_html_e('Leave a Review','milton-lite'); ?></span></h3>
							<div class="academiathemes-doc-column-text-wrapper">
								<p><?php esc_html_e('If you enjoy using Milton Lite Theme, please leave a review for it on WordPress.org. It helps us continue providing updates and support for it.','milton-lite'); ?></p>

								<p class="doc-buttons"><a class="button button-primary" href="<?php echo esc_url(ACADEMIATHEMES_THEME_REVIEW_URL); ?>" rel="noopener" target="_blank"><?php esc_html_e('Write a Review for Milton Lite','milton-lite'); ?></a></p>

							</div><!-- .academiathemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
						<?php } ?>
					</div><!-- .academiathemes-doc-column-wrapper -->
				</li><!-- .academiathemes-doc-column --><li class="academiathemes-doc-column academiathemes-doc-column-2">
					<div class="academiathemes-doc-column-wrapper">
						<?php if ( ACADEMIATHEMES_THEME_UPGRADE_URL ) { ?>
						<div class="doc-section">
							<h3 class="column-title"><span class="academiathemes-icon dashicons dashicons-cart"></span><span class="academiathemes-title-text"><?php esc_html_e('Upgrade to Milton Pro','milton-lite'); ?></span></h3>
							<div class="academiathemes-doc-column-text-wrapper">
								<p><?php 
								echo sprintf( 
								/* translators: Theme name and link to WordPress.org Support forum for the theme */
								__( 'If you like the free version of %1$s Theme, you will love the PRO version.', 'milton-lite' ), 
								esc_html($theme_data->name)	); ?></p>
								<p><?php esc_html_e('You will be able to create an even more unique website using the additional custom widgets, templates and customization options.','milton-lite'); ?><br>

								<p class="doc-buttons"><a class="button button-primary" href="<?php echo esc_url(ACADEMIATHEMES_THEME_UPGRADE_URL); ?>" rel="noopener" target="_blank"><?php esc_html_e('Upgrade to Milton PRO','milton-lite'); ?></a><?php if ( ACADEMIATHEMES_THEME_VIDEO_COMPARISON ) { ?><a class="button button-primary academiathemes-button academiathemes-button-youtube" href="<?php echo esc_url(ACADEMIATHEMES_THEME_VIDEO_COMPARISON); ?>" rel="noopener" target="_blank"><span class="dashicons dashicons-youtube"></span> <?php esc_html_e('Video: Milton Lite vs Milton Pro','milton-lite'); ?></a><?php } ?></p>

								<table class="theme-comparison-table">
									<tr>
										<th class="table-feature-title"><?php esc_html_e('Feature','milton-lite'); ?></th>
										<th class="table-lite-value"><?php esc_html_e('Milton Lite','milton-lite'); ?></th>
										<th class="table-pro-value"><?php esc_html_e('Milton PRO','milton-lite'); ?></th>
									</tr>
									<tr>
										<td><div class="academia-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="academia-tooltiptext"><?php esc_html_e('You can use the theme on any number of websites for as long as you wish.','milton-lite'); ?></span></div><?php esc_html_e('Unlimited theme usage','milton-lite'); ?></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><?php esc_html_e('Responsive Layout','milton-lite'); ?></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><?php esc_html_e('Color Customization','milton-lite'); ?></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="academia-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="academia-tooltiptext"><?php esc_html_e('Change the font and font size for the main elements on the website directly from the Customizer.','milton-lite'); ?></span></div><?php esc_html_e('Font Customization','milton-lite'); ?></td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span> <strong><?php esc_html_e('1000+ Google Fonts','milton-lite'); ?></strong></td>
									</tr>
									<tr>
										<td><div class="academia-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="academia-tooltiptext"><?php esc_html_e('Enable/disable the primary and secondary sidebars for the full website.','milton-lite'); ?></span></div><?php esc_html_e('Global Layout Settings','milton-lite'); ?></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="academia-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="academia-tooltiptext"><?php esc_html_e('Enable/disable the primary and secondary sidebars separately for each page or post.','milton-lite'); ?></span></div><?php esc_html_e('Separate Layout Settings for each Page & Post','milton-lite'); ?></td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><?php esc_html_e('Custom Widgets','milton-lite'); ?></td>
										<td><?php esc_html_e('0','milton-lite'); ?></td>
										<td><div class="academia-tooltip"><strong><?php esc_html_e('2','milton-lite'); ?></strong><span class="academia-tooltiptext"><?php esc_html_e('Gain access to two more custom widgets: "Call to Action" and "Featured Page".','milton-lite'); ?></span></div></td>
									</tr>
									<tr>
										<td><?php esc_html_e('Widgetized Areas','milton-lite'); ?></td>
										<td><?php esc_html_e('4','milton-lite'); ?></td>
										<td><?php esc_html_e('7','milton-lite'); ?></td>
									</tr>
									<tr>
										<td><div class="academia-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="academia-tooltiptext"><?php esc_html_e('Import the demo content for an easier start with the theme.','milton-lite'); ?></span></div><?php esc_html_e('Demo Content Importer','milton-lite'); ?></td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><?php esc_html_e('Support','milton-lite'); ?></td>
										<td><div class="academia-tooltip"><?php esc_html_e('Nonpriority','milton-lite'); ?><span class="academia-tooltiptext"><?php esc_html_e('Support is provided in the WordPress.org community forums.','milton-lite'); ?></span></div></td>
										<td><div class="academia-tooltip"><strong><?php esc_html_e('Priority Support','milton-lite'); ?></strong><span class="academia-tooltiptext"><?php esc_html_e('Quick and friendly support is available via email and Skype.','milton-lite'); ?></span></div></td>
									</tr>
									<tr>
										<td colspan="3" style="text-align: center;"><a class="button button-primary" href="<?php echo esc_url(ACADEMIATHEMES_THEME_UPGRADE_URL); ?>" rel="noopener" target="_blank"><?php esc_html_e('Upgrade to Milton PRO','milton-lite'); ?></a>
										</td>
									</tr>
								</table>

							</div><!-- .academiathemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
						<?php } ?>
					</div><!-- .academiathemes-doc-column-wrapper -->
				</li><!-- .academiathemes-doc-column -->
			</ul><!-- .academiathemes-doc-columns -->

		</div><!-- .academiathemes-documentation -->

	</div><!-- .academiathemes-wrapper -->

<?php }