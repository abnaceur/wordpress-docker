<?php
/**
 * Theme information Colon
 *
 * @package colon
 */


define('COLON_THEME_URL','https://www.spiraclethemes.com/colon-free-wordpress-theme/');
define('COLON_THEME_PRO_URL','https://www.spiraclethemes.com/colon-pro-addons/');
define('COLON_THEME_DOC_URL','https://www.spiraclethemes.com/colon-documentation/');
define('COLON_THEME_VIDEOS_URL','https://www.spiraclethemes.com/colon-video-tutorials/');
define('COLON_THEME_SUPPORT_URL','https://wordpress.org/support/theme/colon/');
define('COLON_THEME_RATINGS_URL','https://wordpress.org/support/theme/colon/reviews/#new-post');
define('COLON_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/colon/');
define('COLON_THEME_CONTACT_URL','https://www.spiraclethemes.com/contact/');


if ( ! class_exists( 'Colon_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Colon_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Colon_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Colon_About_Page
		 *
		 * @var Colon_About_Page $instance The Colon_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Colon_About_Page instance.
		 *
		 * We make sure that only one instance of Colon_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function colon_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Colon_About_Page ) ) {
				self::$instance = new Colon_About_Page;				
				self::$instance->config = $config;
				self::$instance->colon_setup_config();
				self::$instance->colon_setup_actions();				
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function colon_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
			$this->notification  = isset( $this->config['notification'] ) ? $this->config['notification'] : ( '<p>' . sprintf( 'Welcome! Thank you for choosing %1$s ! To take full advantage of this theme, please make sure you visit our %2$swelcome page%3$s.', $this->theme_name, '<a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '">', '</a>' ) . '</p><p><a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '" class="button" style="text-decoration: none;">' . sprintf( 'Get started with %s', $this->theme_name ) . '</a></p>' );		
		}

		/**
		 * Setup the actions used for this page.
		 */
		public function colon_setup_actions() {
			
			/* activation notice */
			add_action( 'load-themes.php', array( $this, 'colon_activation_admin_notice' ) );						
		}		
		

		/**
		 * Adds an admin notice upon successful activation.
		 */
		public function colon_activation_admin_notice() {
			global $pagenow;
			if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
				add_action( 'admin_notices', array( $this, 'colon_about_page_welcome_admin_notice' ), 99 );
			}
		}

		/**
		 * Display an admin notice linking to the about page
		 */
		public function colon_about_page_welcome_admin_notice() {
			if ( ! empty( $this->notification ) ) {
				echo '<div class="updated notice is-dismissible">';
				echo wp_kses_post( $this->notification );
				echo '</div>';
			}
		}		

	}
}

/**
 *  Adding a About page 
 */
add_action('admin_menu', 'colon_add_menu');

function colon_add_menu() {
     add_theme_page(esc_html__('Colon Options','colon'), esc_html__('Colon Options','colon'),'manage_options', esc_html__('colon-theme-info','colon'), esc_html__('colon_options','colon'));
}

/**
 *  Callback
 */
function colon_options() {
	$theme = wp_get_theme();
?>
	<div class="theme-info">
		<div class="top-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<h1><?php esc_html_e( 'Colon WordPress Theme', 'colon' ); ?> <span><?php echo $theme->get( 'Version' ); ?></span> </h1>
							<p><?php esc_html_e( 'Easy to use, fast and SEO Optimzed WordPress theme for business websites', 'colon' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="middle-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="quick-links">
							<h2><?php esc_html_e( 'Quick Customizer Settings', 'colon' ); ?> </h2>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-format-image"></span>
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=custom_logo')) ?>"> <?php esc_html_e( 'Upload Logo', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-tools"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=colon_header_settings_panel')) ?>"> <?php esc_html_e( 'Header Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-customizer"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_site_primary_color')) ?>"> <?php esc_html_e( 'Color Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-grid-view"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_layout_content_width_settings')) ?>"> <?php esc_html_e( 'Layout Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-media-default"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_enable_page_title')) ?>"> <?php esc_html_e( 'Page Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-columns"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_footer_copyright_text')) ?>"> <?php esc_html_e( 'Footer Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-image-filter"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_enable_preloader')) ?>"> <?php esc_html_e( 'Preloader Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-edit-large"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=colon_blog_settings_panel')) ?>"> <?php esc_html_e( 'Blog Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-generic"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=colon_enable_block_styles')) ?>"> <?php esc_html_e( 'Misc Settings', 'colon' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 sidebar-right">
						<div class="sidebar">
							<div class="section-box first">
								<div class="icon">
									<span class="dashicons dashicons-visibility"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(COLON_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DEMOS', 'colon' ); ?></a></h3>
								</div>	
							</div>	

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-star-filled"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(COLON_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'RATE OUR THEME', 'colon' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-format-aside"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(COLON_THEME_DOC_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DOCUMENTATION', 'colon' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-video-alt2"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(COLON_THEME_VIDEOS_URL); ?>" target="_blank"><?php esc_html_e( 'VIDEO TUTORIALS', 'colon' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-sos"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(COLON_THEME_SUPPORT_URL); ?>" target="_blank"><?php esc_html_e( 'ASK FOR SUPPORT', 'colon' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-admin-tools"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(COLON_THEME_CHANGELOGS_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW CHANGELOGS', 'colon' ); ?></a></h3>
								</div>						
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<div class="review-content">
								<p><?php esc_html_e( ' Please ', 'colon' )  ?>
									<a href="<?php echo esc_url(COLON_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'rate our theme', 'colon' ); ?></a>
									<span>★★★★★</span>
									<?php esc_html_e( ' to help us spread the word. Thank you from the Spiracle Themes team!', 'colon' ); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
<?php
}
