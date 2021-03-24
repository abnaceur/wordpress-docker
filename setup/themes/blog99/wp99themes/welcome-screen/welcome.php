<?php
	if(!class_exists('Blog99_Welcome_Screen')) :

		class Blog99_Welcome_Screen {

			public $tab_sections = array();

			public $theme_name = ''; 
			public $theme_version = ''; 
			public $free_plugins = array(); 
			public $pro_plugins = array();

			/**
			 * Constructor for the Welcome Screen
			 */
			public function __construct() {
				
				$theme = wp_get_theme();
				$this->theme_name = $theme->Name;
				$this->theme_version = $theme->Version;

				/** Define Tabs Sections **/
				$this->tab_sections = array(
					'getting_started'     => esc_html__('Getting Started', 'blog99'),
					'recommended_plugins' => esc_html__('Recommended Plugins', 'blog99'),
					'support'             => esc_html__('Support', 'blog99'),
					'free_vs_pro'         => esc_html__('Free Vs Pro', 'blog99'),
				);

				/** List of Recommended Free Plugins **/
				$this->free_plugins = array(

					'contact-form-7' => array(
						'name' => 'Contact Form 7',
						'slug' => 'contact-form-7',
						'filename' => 'contact-form-7',
						'extensions' => 'icon-256x256.png'
					),

					'elementor' => array(
						'name' => 'Elementor Page Builder',
						'slug' => 'elementor',
						'filename' => 'elementor',
						'extensions' => 'icon-256x256.png'
					),
					'gutentor' => array(
						'name' => 'Gutenberg Blocks - Gutentor Page Builder for Gutenberg Editor',
						'slug' => 'gutentor',
						'filename' => 'gutentor',
						'extensions' => 'icon-256x256.png'
					)
					
				);

				/** List of Recommended Pro Plugins **/
				$this->pro_plugins = array();

				/* Theme Activation Notice */
				add_action( 'admin_notices', array( $this, 'blog99_activation_admin_notice' ) );

				/* Create a Welcome Page */
				add_action( 'admin_menu', array( $this, 'blog99_welcome_register_menu' ) );

				/* Enqueue Styles & Scripts for Welcome Page */
				add_action( 'admin_enqueue_scripts', array( $this, 'blog99_welcome_styles_and_scripts' ) );

				add_action( 'wp_ajax_blog99_activate_plugin', array( $this, 'blog99_activate_plugin') );

			}

			/** Welcome Message Notification on Theme Activation **/
			public function blog99_activation_admin_notice() {
				global $pagenow;

				if( is_admin() && ('themes.php' == $pagenow) && (isset($_GET['activated'])) ) {

					$theme_data	 = wp_get_theme();
					echo '<div class="notice notice-success is-dismissible blog99-activation-notice">';
						
						echo '<h1>';
							/* translators: %s theme name */
							printf( esc_html__( 'Welcome to %s', 'blog99' ), esc_html( $theme_data->Name ) );
						echo '</h1>';

						echo '<p>';
							/* translators: %1$s: theme name, %2$s link */
							printf( __( 'Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our <a href="%2$s">Welcome page</a>', 'blog99' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=blog99-welcome' ) ) );
						echo '</p>';

						echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=blog99-welcome' ) ) .'" class="button button-primary button-hero">';
							/* translators: %s theme name */
							printf( esc_html__( 'Get started with %s', 'blog99' ), esc_html( $theme_data->Name ) );
						echo '</a></p>';

					echo '</div>';
					
				}
			}


			/** Register Menu for Welcome Page **/
			public function blog99_welcome_register_menu() {
				add_theme_page( esc_html__( 'Welcome', 'blog99' ), esc_html__( 'Welcome to Blog99', 'blog99' ) , 'edit_theme_options', 'blog99-welcome', array( $this, 'blog99_welcome_screen' ));
			}

			/** Welcome Page **/
			public function blog99_welcome_screen() {
				$tabs = $this->tab_sections;
				?>
				<div class="wrap about-wrap access-wrap">
					<div class="abt-promo-wrap clearfix">
						<div class="abt-theme-wrap">
							<h1><?php printf( // WPCS: XSS OK.
								/* translators: 1-theme name, 2-theme version*/
								esc_html__( 'Welcome to %1$s: Version %2$s', 'blog99' ), esc_attr( $this->theme_name ), esc_attr( $this->theme_version ) ); ?></h1>
							<div class="about-text"><?php echo esc_html__( 'Blog99 Theme is a modern Gutenberg compatible eye catching designed free WordPress theme for bloggers, agency and business person. This blog theme features a modern, elegant and clean layout along with a fully responsive design especially for creating a personal blog, travel blog, and activity blog. Using Blog99 you can share your ideas on various topics such as travel, lifestyle, food, fashion, magazine and many more.', 'blog99' ); ?></div>
						</div>

						<div class="promo-banner-wrap">
							<p><?php esc_html_e('Upgrade for $50', 'blog99'); ?></p>
							<a href="<?php echo esc_url('https://wp99themes.com/wordpress-themes/blog99-pro/'); ?>" target="_blank" class="button button-primary upgrade-btn"><?php echo esc_html__('Upgrade Now', 'blog99'); ?></a>
							<a class="promo-offer-text" href="<?php echo esc_url('https://wp99themes.com/wordpress-themes/blog99-pro/'); ?>" target="_blank"><?php echo esc_html__('Unlock all the possibitlies with Blog99 Pro.', 'blog99'); ?></a>
						</div>
					</div>

					<div class="nav-tab-wrapper clearfix">
						<?php foreach($tabs as $id => $label) : ?>
							<?php
								$section = isset($_GET['section']) ? sanitize_text_field( wp_unslash( $_GET['section'] ) ) : 'getting_started'; // Input var okay.
								$nav_class = 'nav-tab';
								if($id == $section) {
									$nav_class .= ' nav-tab-active';
								}
							?>
							<a href="<?php echo esc_url(admin_url('themes.php?page=blog99-welcome&section='.$id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
								<?php echo esc_html( $label ); ?>
						   	</a>
						<?php endforeach; ?>
				   	</div>

			   		<div class="welcome-section-wrapper">
		   				<?php $section = isset($_GET['section']) ? sanitize_text_field( wp_unslash( $_GET['section'] ) ) : 'getting_started'; // Input var okay. ?>
	   					
	   					<div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
	   						<?php require_once get_template_directory() . '/wp99themes/welcome-screen/sections/'.$section.'.php'; ?>
						</div>
				   	</div>
			   	</div>
				<?php
			}

			/** Enqueue Necessary Styles and Scripts for the Welcome Page **/
			public function blog99_welcome_styles_and_scripts($hook) {
				if( 'appearance_page_blog99-welcome' == $hook ){
					$importer_params = array(
						'installing_text' => esc_html__('Installing Importer Plugin', 'blog99'),
						'activating_text' => esc_html__('Activating Importer Plugin', 'blog99'),
						'importer_page' => esc_html__('Go to Importer Page >>', 'blog99'),
						'importer_url' => admin_url('themes.php?page=pt-one-click-demo-import'),
						'error' => esc_html__('Error! Reload the page and try again.', 'blog99'),
					);
					wp_enqueue_style( 'blog99-welcome', get_template_directory_uri() . '/wp99themes/welcome-screen/css/welcome.css' );
					wp_enqueue_style( 'plugin-install' );
					wp_enqueue_script( 'plugin-install' );
					wp_enqueue_script( 'updates' );
					wp_enqueue_script( 'blog99-welcome', get_template_directory_uri() . '/wp99themes/welcome-screen/js/welcome.js', array(), '1.0' );
					wp_localize_script( 'blog99-welcome', 'importer_params', $importer_params);
				}

				/**
				 * Notice after the Theme Activation.
				*/
				global $pagenow;
			
				if ( 'themes.php' == $pagenow ) {
					wp_enqueue_style( 'blog99-welcome-screen-admin', get_theme_file_uri( '/assets/css/welcome-screen-admin.css' ) );
				}
			}

			// Check if plugin is installed or not
			public function blog99_check_installed_plugin( $slug, $filename ) {
				return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
			}

			// Check if plugin is activated or not
			public function blog99_check_plugin_active_state( $slug, $filename ) {
				return is_plugin_active( $slug . '/' . $filename . '.php' ) ? true : false;
			}

			/** Generate Url for the Plugin Button **/
			public function blog99_plugin_generate_url($status, $slug, $file_name) {
				switch ( $status ) {
					case 'install':
						return wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'install-plugin',
									'plugin' => esc_attr($slug)
								),
								network_admin_url( 'update.php' )
							),
							'install-plugin_' . esc_attr($slug)
						);
						break;

					case 'inactive':
						return add_query_arg( array(
		                      'action'        => 'deactivate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;

					case 'active':
						return add_query_arg( array(
		                      'action'        => 'activate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;
				}
			}

			public function blog99_activate_plugin(){
				$slug = isset($_POST['slug']) ? sanitize_text_field( wp_unslash( $_POST['slug'] ) ) : '';
				$file = isset($_POST['file']) ? sanitize_text_field( wp_unslash( $_POST['file'] ) ) : '';
				$success = false;

				if( !empty($slug) && !empty($file)){
					$result = activate_plugin( $slug.'/'.$file.'.php' );

					if ( !is_wp_error( $result ) ) {
						$success = true;
					}
				}
				echo wp_json_encode(array('success'=>$success));
				die();
			}

		}

		new Blog99_Welcome_Screen();

	endif;
