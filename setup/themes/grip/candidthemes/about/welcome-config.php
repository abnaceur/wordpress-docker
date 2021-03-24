<?php
	/**
	 * Welcome Page Initiation
	*/

	include get_template_directory() . '/candidthemes/about/welcome.php';

    /** Plugins **/
    $plugins = array(
    // *** Companion Plugins
    'companion_plugins' => array(),
        
    // *** Recommended Plugins
    'recommended_plugins' => array(
        // Free Plugins
        'free_plugins' => array(
            
            'one-click-demo-import' => array(
                'slug' 		=> 'one-click-demo-import',
                'filename' 	=> 'one-click-demo-import.php',
                'class' 	=> 'One Click Demo Import'
            ),
            'candid-advanced-toolset' => array(
                'slug' 		=> 'candid-advanced-toolset',
                'filename' 	=> 'candid-advanced-toolset.php',
                'class' 	=> 'Candid Advanced Toolset'
            ),
            'everest-forms' => array(
                'slug' 		=> 'everest-forms',
                'filename' 	=> 'everest-forms.php',
                'class' 	=> 'Everest_Forms'
            ),
        ),
        
        // Pro Plugins
        'pro_plugins' => array(
        )
    ),
);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' 		=> esc_html__( 'Grip Setup', 'grip' ),
		'theme_short_description' 	=> esc_html__( 'Fast &nbsp; | &nbsp; Light  &nbsp; | &nbsp; Powerful', 'grip' ),
        'theme_description' 	=> esc_html__( 'A free news and magazine theme. Grip is easy to use modern Free WordPress theme with lots of useful features. It is search engine optimized theme with built in schema.org structured data to rank your website on search engines griper. It comes with dummy data so that even a layman can easily setup it. Furthermore, Grip is best ever crafted free WordPress theme for Blog, news and Magazine. Grip is a simple, easy to use, modern and creative, user friendly WordPress theme with typography, fonts and color options. In addition Grip is responsive, cross browser compatible and child theme ready. Grip comes with added custom widgets for social, recent post and author, sticky sidebar options, footer widget, sidebar options, meta option, copyright option, off-canvas menu, social options etc.', 'grip' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'grip'),
		'deactivate' 			=> esc_html__('Deactivate', 'grip'),
		'activate' 				=> esc_html__('Activate', 'grip'),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Pro Plugins', 'grip' ),
		'pro_plugin_description' 	=> esc_html__( 'Take Advantage of some of our Premium Plugins.', 'grip' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'grip' ),
		'free_plugin_description' 	=> esc_html__( 'These Free Plugins might be handy for you.', 'grip' ),

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'grip'),
		'installed_btn' 	=> esc_html__('Activated', 'grip'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'grip'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'grip'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'grip'),
		'pro_link'			=> 'https://candidthemes.com/themes/grip-pro/',
		'doc_link'			=> 'https://docs.candidthemes.com/grip/',
        'video_link'		=> 'https://www.youtube.com/watch?v=eEWvb_B0GHI',

		//free vs pro
		'free_vs_pro' => array(

            'features' => array(
                'Preloader Options' => array('Available','Available'),
                'Theme Option Panel'=> array('Customizer Based','Customizer Based Settings'),
                'Custom Widgets'=> array('8+','10+'),
                'Widgets Settings'=> array('Limited','As per Required'),
                'Typography Style & Colors' => array('Yes', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                'Header and Footer Types' => array('Default', '3 Types', 'dashicons-no-alt', 'dashicons-yes'),
                'Social Sharings' => array('yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                'Related Posts' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                'Hide Theme Credit Link' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                'Responsive Layout' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                'Translations Ready' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                'SEO' => array('Optimized', 'Optimized'),
                'Support' => array('Yes', 'High Priority Dedicated Support'),
            ),
        ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Grip_Welcome( $plugins, $strings );
