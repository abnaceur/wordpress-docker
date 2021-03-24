<?php
/**
 * Deep Modern Business.
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Deep_Modern_Business_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     Deep_Modern_Business_Admin
	 */
	public static $instance;

	/**
	 * Page title.
	 *
	 * @since   1.0.0	 
	 * @var     page_title
	 */
	public static $page_title = 'deep-modern-business';

	/**
	 * Menu title.
	 *
	 * @since   1.0.0	 
	 * @var     menu_title
	 */
	public static $menu_title = 'Deep Theme';

	/**
	 * Plugin Slug.
	 *
	 * @since   1.0.0	 
	 * @var     plugin_slug
	 */
	public static $plugin_slug = 'deep-modern-business';
	
	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   1.0.0
	 * @return  object
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define the core functionality of the theme.
	 *
	 * Load the dependencies.
	 *
	 * @since   1.0.0
	 */
	public function __construct() {
        
        if ( ! is_admin() ) {
            return;
        }        

		add_action( 'admin_menu', [$this, 'deep_modern_business_admin_menu'] );
		add_action( 'deep_modern_business_rate', [$this, 'deep_modern_business_rate'] );		
		add_action( 'admin_notices', [$this, 'deep_modern_business_admin_notices'] );
		add_action( 'deep_modern_business_community', [$this, 'deep_modern_business_community'] );
		add_action( 'admin_enqueue_scripts', [$this, 'deep_modern_business_admin_assets'] );
		add_action( 'deep_modern_business_admin_header', [$this, 'deep_modern_business_admin_header'] );
		add_action( 'deep_modern_business_more_options', [$this, 'deep_modern_business_more_options'] );
		add_action( 'deep_modern_business_admin_content', [$this, 'deep_modern_business_admin_content'] );
		add_action( 'deep_modern_business_plugin_notice', [$this, 'deep_modern_business_plugin_notice'] );		
		add_action( 'deep_modern_business_knowledge_base', [$this, 'deep_modern_business_knowledge_base'] );
		add_action( 'deep_modern_business_import_template', [$this, 'deep_modern_business_import_template'] );		
		add_action( 'deep_modern_business_customizer_links', [$this, 'deep_modern_business_customizer_links'] );		

	}
	
	/**
	 * Deep Admin Assets.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_admin_assets() {
		
		wp_enqueue_style( 'deep-modern-business-admin', DEEP_MODERN_BUSINESS_URI . 'inc/assets/css/deep-modern-business-admin.css' , array(), DEEP_MODERN_BUSINESS );
		
	}
	
	/**
	 * Deep Admin Menu.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_admin_menu() {

		$capability = 'manage_options';
		$menu_slug  = self::$plugin_slug;
		$page_title = self::$page_title;
		$menu_title = self::$menu_title;
		$admin_menu_callback = __CLASS__ . '::deep_modern_business_admin_menu_callback';

		add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $admin_menu_callback );
		
	}
	
	/**
	 * Deep Admin Menu Callback.
	 *
	 * @since   1.0.0
	 */
	public static function deep_modern_business_admin_menu_callback() {
		
		?>
		<div class="deep-modern-business-admin-page">
			<?php 
				do_action( 'deep_modern_business_admin_header' );
				do_action( 'deep_modern_business_admin_content' );
			?>
		</div>
		<?php

	}

	/**
	 * Deep Admin Header.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_admin_header() {

		?>
		<div class="deep-modern-business-admin-header">
			<div class="dp-admin-top-bar">
				<div class="dp-admin-top-title">
					<a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme/' ); ?>" target="_blank">
						<img src="<?php echo esc_url( DEEP_MODERN_BUSINESS_URI . 'inc/assets/img/deep-logo.svg' ) ?>" width="120">
					</a>
				</div>
				<div class="dp-admin-top-links">						
					<a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme/' ) ?>" target="_blank"><?php esc_html_e( 'Intro', 'deep-modern-business' ); ?></a>					
					<a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme/#demos' ) ?>" target="_blank"><?php esc_html_e( 'Demos', 'deep-modern-business' ); ?></a>					
					<a href="<?php echo esc_url( 'https://webnus.net/pricing/' ) ?>" target="_blank"><?php esc_html_e( 'Pro', 'deep-modern-business' ); ?></a>					
					<a href="<?php echo esc_url( 'https://webnus.net/support/' ); ?>" target="_blank"><?php esc_html_e( 'Support', 'deep-modern-business' ); ?></a>
					<a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme-documentation/' ); ?>" target="_blank"><?php esc_html_e( 'Help', 'deep-modern-business' ); ?></a>
				</div>
			</div>
		</div>
		<?php

	}

	/**
	 * Deep Admin Content.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_admin_content() {
		
		?>
		<div class="deep-modern-business-admin-content">
			<?php
				do_action( 'deep_modern_business_plugin_notice' );					
			?>
			<div class="deep-modern-business-admin-left">
			<?php 
				do_action( 'deep_modern_business_customizer_links' );
				do_action( 'deep_modern_business_more_options' );
			?>
			</div>
			<div class="deep-modern-business-admin-right">
			<?php 
				do_action( 'deep_modern_business_import_template' );
				do_action( 'deep_modern_business_knowledge_base' );
				do_action( 'deep_modern_business_community' );
				do_action( 'deep_modern_business_rate' );
			?>
			</div>			
		</div>
		<?php

	}

	/**
	 * Deep Install plugin Notice.
	 *
	 * @since   1.0.0
	 */
	public static function deep_modern_business_plugin_notice() {
		if ( ! defined( 'DEEPCOREPRO' ) ) {
			?>
			<div class="deep-modern-business-plugin-notice">
				<?php if( ! defined( 'DEEPCORE' ) ): ?>
					<h2><?php esc_html_e( 'Enable all Features of the Deep theme', 'deep-modern-business' ); ?></h2>
					<p><?php esc_html_e( 'In order to take full advantage of the Deep theme and enabling its demo importer, please install the recommended plugins.', 'deep-modern-business' ); ?></p>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>" target="_blank"><?php esc_html_e( 'Install Plugin', 'deep-modern-business' ); ?></a>
				<?php else: ?>
					<h2><?php esc_html_e( 'Go Pro & Full Access to Advanced Features', 'deep-modern-business' ); ?></h2>
					<p><?php esc_html_e( 'Get full access to more demos and all advanced features of Deep theme by upgrading to Pro version right away.', 'deep-modern-business' ); ?></p>
					<a href="<?php echo esc_url( 'https://webnus.net/pricing/' ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'deep-modern-business' ); ?></a>
				<?php endif; ?>
			</div>
			<?php
		}
	}

	/**
	 * Deep Customizer Links.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_customizer_links() {

		if ( is_plugin_active( 'deepcore/deepcore.php' ) || is_plugin_active( 'deep-core-pro/deep-core-pro.php' ) ) {
			
			$customizer_url = admin_url( 'customize.php' ) . '?autofocus[panel]=';
			
			$customizer_links = apply_filters(
				'deep_customizer_links',
				array(
					'general' => array(
						'name'     => __( 'General', 'deep-modern-business' ),
						'icon'  => 'dashicons-admin-generic',
						'url' => $customizer_url . 'general_opts',
					),
					'typography'       => array(
						'name'     => __( 'Typography', 'deep-modern-business' ),
						'icon'  => 'dashicons-editor-textcolor',
						'url' => $customizer_url . 'typography_opts',
					),
					'blog'   => array(
						'name'     => __( 'Blog Settings', 'deep-modern-business' ),
						'icon'  => 'dashicons-welcome-write-blog',
						'url' => $customizer_url . 'blog-opts',
					),
					'styling'       => array(
						'name'     => __( 'Styling', 'deep-modern-business' ),
						'icon'  => 'dashicons-layout',
						'url' => $customizer_url . 'styling_opts',
					),
					'header-builder'       => array(
						'name'     => __( 'Header Builder', 'deep-modern-business' ),
						'icon'  => 'dashicons-align-center',
						'url' => admin_url( 'admin.php?page=webnus_header_builder' ),
					),
					'pages'  => array(
						'name'     => __( 'Pages Settings', 'deep-modern-business' ),
						'icon'  => 'dashicons-welcome-write-blog',
						'url' => $customizer_url . 'pages_opts',
					),
					'footer'       => array(
						'name'     => __( 'Footer Settings', 'deep-modern-business' ),
						'icon'  => 'dashicons-admin-generic',
						'url' => $customizer_url . 'start_footer_opts',
					),
					'sidebars'     => array(
						'name'     => __( 'Site Identity', 'deep-modern-business' ),
						'icon'  => 'dashicons-format-image',
						'url' => admin_url( 'customize.php?autofocus[section]=title_tagline' ),
					),
				)
			);

			?>

			<div class="deep-modern-business-customizer-links">
				<h2 class="deep-modern-business-admin-title">
				<i class="dashicons dashicons-admin-customizer"></i>
				<?php esc_html_e( 'Start Customizing', 'deep-modern-business' ); ?>				
				</h2>
				<?php
				if ( ! empty( $customizer_links ) ) :
					?>					
					<ul class="customizer-links">
						<?php
						foreach ( $customizer_links as $link ) {
							echo '<li><a href="' . esc_url( $link['url'] ) . '" target="_blank"><span class="dashicons ' . esc_attr( $link['icon'] ) . '"></span> ' . esc_html( $link['name'] ) . '</a></li>';
						}
						?>
					</ul>					
				<?php endif; ?>			
			</div>

			<?php
		}			

	}

	/**
	 * Deep More Options.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_more_options() {

		$more_options = apply_filters(
			'deep_modern_business_pro_options',
			array(																		
				'header-builder' => array(
					'title' => __( 'Header Builder', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/header-builder/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),
				'defined-headers' => array(
					'title' => __( 'Pre-defined Headers', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/import-pre-defined-headers/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),	
				'footer-builder' => array(
					'title' => __( 'Footer Builder', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/footer-builder/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
				'portfolio' => array(
					'title' => __( 'Portfolio', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/webnus-portfolio/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
				'gallery' => array(
					'title' => __( 'Gallery', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/webnus-gallery/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
				'shop' => array(
					'title' => __( 'Shop', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/shop-theme-options/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
				'typography' => array(
					'title' => __( 'Typography', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/typography/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
				'blog' => array(
					'title' => __( 'Blog Options', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/blog-options/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
				'importer' => array(
					'title' => __( 'One Click Demo Importer', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/import-demo/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
				'plugins' => array(
					'title' => __( 'Premium Plugins', 'deep-modern-business' ),																				
					'link'  => array(
						'url'     =>   'https://webnus.net/deep-premium-wordpress-theme-documentation/other-premium-plugins/',
						'text'    => __( 'Learn More', 'deep-modern-business' ),						
					),
				),		
			)
		);
		
		?>
		<div class="deep-modern-business-more-options">
			<h2 class="deep-modern-business-admin-title">
			<i class="dashicons dashicons-star-filled"></i>
			<?php esc_html_e( 'Deep Features', 'deep-modern-business' ); ?>
			</h2>
			<?php
			if ( ! empty( $more_options ) ) :
				?>					
				<ul class="pro-more-options">
					<?php
						foreach ( $more_options as $option ) {
							$title = $option['title'];
							$url   = $option['link']['url'];
							$text  = $option['link']['text'];
							
							echo '<li>';
								echo '<a href="' . esc_url( $url ) . '" target="_blank"> ' . esc_html( $title ) . ' <span> ' . esc_html( $text ) . ' <i class="dashicons dashicons-arrow-right-alt2"></i> </span> </a>';								
							echo '</li>';
						}
					?>
				</ul>					
			<?php endif; ?>			
		</div>
		<?php

	}

	/**
	 * Deep Import Starter Template.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_import_template() {
		
		?>
		<div class="deep-modern-business-import-template deep-modern-business-r-admin">
			<h2><i class="dashicons dashicons-database-import"></i> <?php esc_html_e( 'Demo Importer', 'deep-modern-business' ); ?></h2>
			<img src="<?php echo esc_url( DEEP_MODERN_BUSINESS_URI . 'inc/assets/img/deep-importer-sc05.png' ); ?>" width="245">
			<p>
			<?php esc_html_e( 'In order to import the demo, you need to install the Deep Core plugin.', 'deep-modern-business' ); ?>
			</p>
			<p>
			<?php esc_html_e( 'Click', 'deep-modern-business' ); ?> <a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme-documentation/import-demo/' )?>" target="_blank"><?php esc_html_e( 'here', 'deep-modern-business' ); ?></a><?php esc_html_e( ' to see the documentation.', 'deep-modern-business' ); ?>			
			</p>
		</div>
		<?php

	}

	/**
	 * Deep Knowledge Base.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_knowledge_base() {
		
		?>
		<div class="deep-modern-business-knowledge-base deep-modern-business-r-admin">
			<h2><i class="dashicons dashicons-book"></i> <?php esc_html_e( 'Knowledge Base', 'deep-modern-business' ); ?></h2>
			<p><?php esc_html_e( 'To find out more details of the features and sections please follow the documentation.', 'deep-modern-business' ); ?></p>
			<p><a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme-documentation/' ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'deep-modern-business' ); ?></a></p>
		</div>
		<?php

	}

	/**
	 * Deep Community.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_community() {
		
		?>
		<div class="deep-modern-business-community deep-modern-business-r-admin">
			<h2><i class="dashicons dashicons-reddit"></i> <?php esc_html_e( 'Deep Theme Community', 'deep-modern-business' ); ?></h2>
			<p><?php esc_html_e( 'Join the Deep Theme subreddit to get help and ask your technical questions.', 'deep-modern-business' ); ?></p>
			<p><a href="<?php echo esc_url( '#' ); ?>" target="_blank"><?php esc_html_e( 'Join The Deep Theme Subreddit ', 'deep-modern-business' ); ?></a></p>
		</div>
		<?php

	}

	/**
	 * Deep Rate.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_rate() {
		
		?>
		<div class="deep-modern-business-rate deep-modern-business-r-admin">
			<h2><i class="dashicons dashicons-star-filled"></i> <?php esc_html_e( 'Rate us', 'deep-modern-business' ); ?></h2>
			<p><?php esc_html_e( 'If you interested in the Deep Theme please rate us on WordPress.', 'deep-modern-business' ); ?></p>
			<p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/deep/reviews/#new-post' ); ?>" target="_blank"><?php esc_html_e( 'Rate Us', 'deep-modern-business' ); ?></a></p>
		</div>
		<?php

	}

	/**
	 * Deep Admin Notices.
	 *
	 * @since   1.0.0
	 */
	public function deep_modern_business_admin_notices() {

		if ( ! get_theme_mod( 'deep_modern_business_install' ) ) set_theme_mod( 'deep_modern_business_install', 'true' );

		if ( ! defined( 'DEEPCOREPRO' ) ) {			
			
			if ( get_theme_mod( 'deep_modern_business_install' ) == 'false' ) {
				return;
			}
			
			if ( isset( $_GET['deep_modern_business_hide'] ) && $_GET['deep_modern_business_hide'] == 'false' ) {
				if ( isset( $_GET['deep_modern_business_hide'] ) ) {
					set_theme_mod( 'deep_modern_business_install', 'false' );
				}	

				return;
			}
	
			?>
			<div class="deep-modern-business-admin-notice">
				<?php
				self::deep_modern_business_plugin_notice();			
				?>
				<a class="notice-dismiss" href="?deep_modern_business_hide=false"></a>
			</div>
			<?php
			
		}

	}

}
// Run
Deep_Modern_Business_Admin::get_instance();