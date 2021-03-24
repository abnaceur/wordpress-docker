<?php
/**
 * Theme admin functions.
 *
 * @package Everse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Add admin menu
*
* @since 1.0.0
*/
function everse_theme_admin_menu() {
	add_theme_page(
		__( 'Everse Getting Started', 'everse' ),
		__( 'Everse', 'everse' ),
		'manage_options',
		'everse-theme',
		'everse_admin_page_content',
		30
	);
}
add_action( 'admin_menu', 'everse_theme_admin_menu' );


/**
* Add admin page content
*
* @since 1.0.0
*/
function everse_admin_page_content() {
	$docs_url = 'https://docs.deothemes.com/everse/knowledgebase/';

	$urls = array(
		'docs' 											=> 'https://docs.deothemes.com/everse',	
		'header-footer-builder'			=> $docs_url . 'header-footer-builder',
		'woocommerce-builder'				=> $docs_url . 'woocommerce-builder',
		'advanced-customization'		=> $docs_url . 'advanced-customization',
		'importing-pro-templates'		=> $docs_url . 'importing-pro-templates',
		'advanced-woocommerce' 			=> $docs_url . 'advanced-woocommerce',	
		'premium-elementor-widgets' => $docs_url . 'premium-elementor-widgets',	
		'dynamic-custom-post-types'	=> $docs_url . 'dynamic-custom-post-types',
		'learndash-integration'			=> $docs_url . 'learndash-integration',
		'adobe-fonts-integration'		=> $docs_url . 'adobe-fonts-integration',
		'page-layouts'							=> $docs_url . 'page-layouts',
		'acf-pro'										=> $docs_url . 'acf-pro-included',
		'gdpr'											=> $docs_url . 'gdpr-tools',
	);

	$info = array(
		'header-footer-builder' => array(
			'title'			=> __( 'Header / Footer Builder', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['header-footer-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['header-footer-builder'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'woocommerce-builder' => array(
			'title'			=> __( 'WooCommerce Builder', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['woocommerce-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['woocommerce-builder'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'advanced-customization' => array(
			'title'			=> __( 'Advanced Customization', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['advanced-customization'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['advanced-customization'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'importing-pro-templates' => array(
			'title'			=> __( 'Pro Demos', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['importing-pro-templates'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['importing-pro-templates'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'advanced-woocommerce' => array(
			'title'			=> __( 'Advanced WooCommerce', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['advanced-woocommerce'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['advanced-woocommerce'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'premium-elementor-widgets' => array(
			'title'			=> __( 'Premium Elementor Widgets', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['premium-elementor-widgets'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['premium-elementor-widgets'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'dynamic-custom-post-types' => array(
			'title'			=> __( 'Dynamic Custom Post Types', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['dynamic-custom-post-types'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['dynamic-custom-post-types'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'learndash-integration' => array(
			'title'			=> __( 'LearnDash Integration', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['learndash-integration'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['learndash-integration'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'adobe-fonts-integration' => array(
			'title'			=> __( 'Adobe Fonts Integration', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['adobe-fonts-integration'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['adobe-fonts-integration'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'page-layouts' => array(
			'title'			=> __( 'Page Layouts', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['page-layouts'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['page-layouts'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'acf-pro' => array(
			'title'			=> __( 'ACF Pro Included', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['acf-pro'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['acf-pro'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),
		'gdpr' => array(
			'title'			=> __( 'GDPR Tools', 'everse' ),
			'class'			=> 'everse-addon-list-item',
			'title_url' => $urls['gdpr'],
			'links'			=> array(
				array(
					'link_class'	 => 'everse-learn-more',
					'link_url'		 => $urls['gdpr'],
					'link_text'    => __( 'Learn More &#187;', 'everse' ),
					'target_blank' => true
				),
			),
		),				
	);
	?>
		<div class="everse-page-header">
			<div class="everse-page-header__container">
				<div class="everse-page-header__branding">
					<img src="<?php echo esc_url( EVERSE_URI . '/assets/admin/img/everse_logo.png' ); ?>" class="everse-page-header__logo" alt="Everse">
					<span class="everse-theme-version"><?php echo esc_html( EVERSE_VERSION ); ?></span>
				</div>
				<div class="everse-page-header__tagline">
					<span class="everse-page-header__tagline-text"><?php echo esc_html__( 'Visual Website Builder Tool', 'everse' ); ?></span>					
				</div>				
			</div>
		</div>

		<div class="wrap everse-container">

			<div class="everse-grid">

				<div class="everse-grid-content">
					<div class="everse-body">
						<h1 class="everse-title"><?php esc_html_e( 'Welcome to Everse!', 'everse' ); ?></h1>
						<p class="everse-intro-text">
							<?php echo esc_html__( 'Everse is now installed and ready to use. Get ready to build something beautiful. To get started check the links below. We hope you enjoy it!', 'everse' ); ?>
						</p>
						<h3><?php echo esc_html__( 'What is next?', 'everse' ); ?></h3>
						<ul class="everse-list">
							<li>
								<?php
									/* translators: %1$s: Docs URL. */
									printf(
										esc_html__( 'Check the %1$s for installation and customization guides.', 'everse' ),
										sprintf(
											'<a href="%s" target="_blank">%s</a>',
											esc_url( $urls['docs'] ),
											esc_html__( 'Documentation', 'everse' )
										)
									);
								?>
							</li>
							<li>
								<?php
									/* translators: %1$s: Customizer URL. */
									printf(
										esc_html__( 'Go to %1$s to modify the look of your site. (requires active Kirki plugin)', 'everse' ),
										sprintf(
											'<a href="%s" target="_blank">%s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customizer', 'everse' )
										)
									);
								?>
							</li>
							<li>
								<?php
									/* translators: %1$s: Contact URL. */
									printf(
										esc_html__( 'Need help? %1$s We\'re happy to help!', 'everse' ),
										sprintf(
											'<a href="%s">%s</a>',
											esc_url( admin_url( 'themes.php?page=everse-theme-contact' ) ),
											esc_html__( 'Get in touch with us.', 'everse' )
										)
									);
								?>
							</li>
						</ul>
					</div> <!-- .everse-body -->			

					<div class="everse-postbox">
						<h2 class="everse-addon-title"><?php echo esc_html__( 'More features with Everse Pro', 'everse' ); ?></h2>
						<ul class="everse-addon-list">
							<?php
							foreach ( (array) $info as $addon => $info ) {
								$title_url     = ( isset( $info['title_url'] ) && ! empty( $info['title_url'] ) ) ? 'href="' . esc_url( $info['title_url'] ) . '"' : '';
								$anchor_target = ( isset( $info['title_url'] ) && ! empty( $info['title_url'] ) ) ? "rel='noopener'" : '';

								echo '<li class="' . esc_attr( $info['class'] ) . '"><a class="everse-addon-item-title"' . $title_url . $anchor_target . ' >' . esc_html( $info['title'] ) . '</a><div class="everse-addon-link-wrapper">';

									foreach ( $info['links'] as $key => $link ) {
										printf(
											'<a class="%1$s" %2$s %3$s> %4$s </a>',
											esc_attr( $link['link_class'] ),
											isset( $link['link_url'] ) ? 'href="' . esc_url( $link['link_url'] ) . '"' : '',
											( isset( $link['target_blank'] ) && $link['target_blank'] ) ? 'target="_blank" rel="noopener"' : '', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											esc_html( $link['link_text'] )
										);
									}

								echo '</div></li>';
							}
							?>
						</ul>
					</div>
				</div> <!-- .content -->			

			</div> <!-- .grid -->		
			
		</div>
	<?php
}

/**
* Change theme icon
*
* @since 1.0.0
*/
function everse_fs_custom_icon() {
  return EVERSE_DIR . '/assets/admin/img/theme-icon.jpg';
} 
everse_fs()->add_filter( 'plugin_icon' , 'everse_fs_custom_icon' );


/**
 * Add extra permissions to Freemius
 */
function everse_freemius_extra_permissions( $permissions ) {
	$permissions['newsletter'] = array(
		'icon-class' => 'dashicons dashicons-email-alt',
		'label'      => everse_fs()->get_text_inline( 'Newsletter', 'everse' ),
		'desc'       => everse_fs()->get_text_inline( 'Your email is added to our newsletter. Updates, announcements, marketing, no spam. Unsubscribe anytime.', 'everse' ),
		'priority'   => 15,
	);
	return $permissions;
}
everse_fs()->add_filter( 'permission_list', 'everse_freemius_extra_permissions' );
