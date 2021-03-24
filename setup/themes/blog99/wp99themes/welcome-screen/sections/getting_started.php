<div class="getting-started-top-wrap clearfix">
	<div class="theme-steps-list">
		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 1 - Customize Theme', 'blog99'); ?></h3>
			<p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'blog99'); ?></p>
			<a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'blog99'); ?></a>
		</div>

	</div>

	<div class="theme-image">
		<h3><?php echo esc_html__('Sample Demo', 'blog99'); ?></h3>
		<img src="<?php echo esc_url(get_template_directory_uri(). '/screenshot.png'); ?>" alt="<?php echo esc_html__('Blog99 Demo', 'blog99'); ?>">

		<div class="theme-import-demo">
			<?php 
			$blog99_demo_importer_slug = 'one-click-demo-import';
			$blog99_demo_importer_filename ='one-click-demo-import';
			$blog99_import_url = '#';

			if ( $this->blog99_check_installed_plugin( $blog99_demo_importer_slug, $blog99_demo_importer_filename ) && !$this->blog99_check_plugin_active_state( $blog99_demo_importer_slug, $blog99_demo_importer_filename ) ) :
				$blog99_import_class = 'button button-primary blog99-activate-plugin';
				$blog99_import_button_text = esc_html__('Activate Importer Plugin', 'blog99');
			elseif( $this->blog99_check_installed_plugin( $blog99_demo_importer_slug, $blog99_demo_importer_filename ) ) :
				$blog99_import_class = 'button button-primary';
				$blog99_import_button_text = esc_html__('Go to Importer Page >>', 'blog99');
				$blog99_import_url = admin_url('themes.php?page=pt-one-click-demo-import');
			else :
				$blog99_import_class = 'button button-primary blog99-install-plugin';
				$blog99_import_button_text = esc_html__('Install Importer Plugin', 'blog99');
			endif;
			?>
			<p><?php echo sprintf(esc_html__('Or you can import the demo with just one click. It is recommended to import the demo on a fresh WordPress install. Or you can reset the website using %s plugin.', 'blog99'), '<a target="_blank" href="https://wordpress.org/plugins/wordpress-reset/">WordPress Reset</a>'); ?></p>

			<p><?php echo esc_html__('Note: First Install All Theme Recommended Plugins.', 'blog99'); ?></p>

			<p><?php echo esc_html__('Click on the button below to install and activate demo importer plugin.', 'blog99'); ?></p>
			<a data-slug="<?php echo esc_attr($blog99_demo_importer_slug); ?>" data-filename="<?php echo esc_attr($blog99_demo_importer_filename); ?>" class="<?php echo esc_attr($blog99_import_class); ?>" href="<?php echo esc_url( $blog99_import_url ); ?>"><?php echo esc_html($blog99_import_button_text); ?></a>
		</div>
	</div>
</div>

<div class="getting-started-bottom-wrap">
	<h3><?php echo esc_html__('Check our premium demos. You might be interested in purchasing premium version.', 'blog99'); ?></h3>
	<p><?php echo esc_html__('Check out the websites that you can create with the premium version of the Blog99 Pro theme. These demos can be imported with just one click in the premium version.', 'blog99'); ?></p>

</div>

<div class="upgrade-box">
	<div class="upgrade-box-text">
		<h3><?php echo esc_html__('Upgrade To Premium Version (Blog99 Pro)', 'blog99'); ?></h3>
		<p><?php echo esc_html__('Blog99 Pro Theme you can create a beautiful website. if you want to unlock more possibilites then upgrade to premium version.', 'blog99'); ?></p>
		<p><?php echo esc_html__('Try the Premium version and check if it fits to your need or not.', 'blog99'); ?></p>
	</div>

	<a class="upgrade-button" href="https://wp99themes.com/wordpress-themes/blog99-pro/" target="_blank"><?php esc_html_e('Upgrade Now', 'blog99'); ?></a>
</div>