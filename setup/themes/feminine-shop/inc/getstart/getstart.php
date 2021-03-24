<?php
//about theme info
add_action( 'admin_menu', 'feminine_shop_gettingstarted' );
function feminine_shop_gettingstarted() {
	add_theme_page( esc_html__('About Feminine Shop', 'feminine-shop'), esc_html__('About Feminine Shop', 'feminine-shop'), 'edit_theme_options', 'feminine_shop_guide', 'feminine_shop_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function feminine_shop_admin_theme_style() {
	wp_enqueue_style('feminine-shop-custom-admin-style', get_template_directory_uri() . '/inc/getstart/getstart.css');
	wp_enqueue_script('feminine-shop-tabs', get_template_directory_uri() . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'feminine_shop_admin_theme_style');

//guidline for about theme
function feminine_shop_mostrar_guide() { 
	//custom function about theme customizer
	$feminine_shop_return = add_query_arg( array()) ;
	$feminine_shop_theme = wp_get_theme( 'feminine-shop' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Feminine Shop', 'feminine-shop' ); ?> <span class="version"><?php esc_html_e( 'Version', 'feminine-shop' ); ?>: <?php echo esc_html($feminine_shop_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','feminine-shop'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Feminine Shop at 20% Discount','feminine-shop'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','feminine-shop'); ?> ( <span><?php esc_html_e('vwpro20','feminine-shop'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( FEMININE_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'feminine-shop' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
    		<button class="tablinks" onclick="feminine_shop_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'feminine-shop' ); ?></button>
			<button class="tablinks" onclick="feminine_shop_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'feminine-shop' ); ?></button>
			<button class="tablinks" onclick="feminine_shop_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'feminine-shop' ); ?></button>
			<button class="tablinks" onclick="feminine_shop_open_tab(event, 'feminine_pro')"><?php esc_html_e( 'Get Premium', 'feminine-shop' ); ?></button>
		  	<button class="tablinks" onclick="feminine_shop_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'feminine-shop' ); ?></button>
		</div>

		<?php
			$feminine_shop_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$feminine_shop_plugin_custom_css ='display: block';
			}
		?>
		<div id="gutenberg_editor" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Feminine_Shop_Plugin_Activation_Settings::get_instance();
			$feminine_shop_actions = $plugin_ins->recommended_actions;
			?>
				<div class="feminine-shop-recommended-plugins">
				    <div class="feminine-shop-action-list">
				    	<div class="feminine-shop-activation-note">
							<?php esc_html_e('Your filesystem not have write permission, please give writable access to your filesystem','feminine-shop'); ?>
						</div>
				        <?php if ($feminine_shop_actions): foreach ($feminine_shop_actions as $key => $feminine_shop_actionValue): ?>
				                <div class="feminine-shop-action" id="<?php echo esc_attr($feminine_shop_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($feminine_shop_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($feminine_shop_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($feminine_shop_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'feminine-shop' ); ?></h3>
				<hr class="h3hr">
				<div class="feminine-shop-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','feminine-shop'); ?></a>
			    </div>
			<?php } ?>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Feminine_Shop_Plugin_Activation_Settings::get_instance();
			$feminine_shop_actions = $plugin_ins->recommended_actions;
			?>
				<div class="feminine-shop-recommended-plugins">
				    <div class="feminine-shop-action-list">
				    	<div class="feminine-shop-activation-note">
							<?php esc_html_e('Your filesystem not have write permission, please give writable access to your filesystem','feminine-shop'); ?>
						</div>
				        <?php if ($feminine_shop_actions): foreach ($feminine_shop_actions as $key => $feminine_shop_actionValue): ?>
				                <div class="feminine-shop-action" id="<?php echo esc_attr($feminine_shop_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($feminine_shop_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($feminine_shop_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($feminine_shop_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','feminine-shop'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($feminine_shop_plugin_custom_css); ?>">
			  	<h3><?php esc_html_e( 'Block Patterns', 'feminine-shop' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','feminine-shop'); ?></p>
              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','feminine-shop'); ?></span></b></p>
              	<div class="feminine-shop-pattern-page">
			    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','feminine-shop'); ?></a>
			    </div>
              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />				
	        </div>
		</div>

		<div id="lite_theme" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Feminine_Shop_Plugin_Activation_Settings::get_instance();
				$feminine_shop_actions = $plugin_ins->recommended_actions;
				?>
				<div class="feminine-shop-recommended-plugins">
				    <div class="feminine-shop-action-list">
				    	<div class="feminine-shop-activation-note">
							<?php esc_html_e('Your filesystem not have write permission, please give writable access to your filesystem','feminine-shop'); ?>
						</div>
				        <?php if ($feminine_shop_actions): foreach ($feminine_shop_actions as $key => $feminine_shop_actionValue): ?>
				                <div class="feminine-shop-action" id="<?php echo esc_attr($feminine_shop_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($feminine_shop_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($feminine_shop_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($feminine_shop_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','feminine-shop'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($feminine_shop_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'feminine-shop' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('This wonderfully carved Free Feminine WordPress Theme is a great theme with a soft feel to its visual design. This female-oriented theme proves to be a great option for female entrepreneurs to make their online presence felt. It is a perfect choice for those who want to go online without spending much for the cause. It proves as a versatile solution for female bloggers to get started with their blog that might relate to various topics. Designed using a strong and robust Bootstrap CSS3 framework, this theme is visually loud and speaks volumes about the business or profession you are into. Its retina-ready design is capable enough to bring your business in the spotlight. It has enough branding and styling options that will allow your business or store to give a tough competition to your fellow competitors. With RTL support and WPML compatibility, you can get an international website ready.','feminine-shop'); ?></p>			  	
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'feminine-shop' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'feminine-shop' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FEMININE_SHOP_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'feminine-shop' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'feminine-shop'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'feminine-shop'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'feminine-shop'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'feminine-shop'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'feminine-shop'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FEMININE_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'feminine-shop'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'feminine-shop'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'feminine-shop'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( FEMININE_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'feminine-shop'); ?></a>
					</div>
					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'feminine-shop' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','feminine-shop'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=feminine_shop_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','feminine-shop'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=feminine_shop_top_header') ); ?>" target="_blank"><?php esc_html_e('Top Header Settings','feminine-shop'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=feminine_shop_about_section') ); ?>" target="_blank"><?php esc_html_e('About Section','feminine-shop'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','feminine-shop'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','feminine-shop'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=feminine_shop_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','feminine-shop'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=feminine_shop_global_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','feminine-shop'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=feminine_shop_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','feminine-shop'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=feminine_shop_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','feminine-shop'); ?></a>
								</div>
							</div>
						</div>
				</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','feminine-shop'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','feminine-shop'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','feminine-shop'); ?></span><?php esc_html_e(' Go to ','feminine-shop'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','feminine-shop'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','feminine-shop'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','feminine-shop'); ?></span><?php esc_html_e(' Go to ','feminine-shop'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','feminine-shop'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','feminine-shop'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','feminine-shop'); ?> <a class="doc-links" href="<?php echo esc_url( FEMININE_SHOP_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','feminine-shop'); ?></a></p>
			  	</div>
			</div>
		</div>	

		<div id="feminine_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'feminine-shop' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Feminine WordPress Theme is a gorgeous female-oriented theme for business, blogs, and other endeavors. It is a smart choice to be made by females to get their business online. Though it is a female-centric theme, it doesnt limit its use to female-oriented websites. Even marketing firms and eCommerce businesses can use it to maximize their sales because a female-centric website is known to work well for fashion stores, eCommerce and marketing related websites as visitors find it alluring and they keep coming back on the site. WP Feminine WordPress Theme comes with an attractive layout that uses soft colors and minimalist approach. It is made to give a seamless performance on various popular web browsers. For ensuring that users and end-users get a flawless experience, it has been provided with a clean codebase. The smooth effects and navigation make it even more loved by the audience.','feminine-shop'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( FEMININE_SHOP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'feminine-shop'); ?></a>
					<a href="<?php echo esc_url( FEMININE_SHOP_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'feminine-shop'); ?></a>
					<a href="<?php echo esc_url( FEMININE_SHOP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'feminine-shop'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'feminine-shop' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'feminine-shop'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'feminine-shop'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'feminine-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'feminine-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'feminine-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'feminine-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'feminine-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'feminine-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'feminine-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'feminine-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'feminine-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'feminine-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'feminine-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>

							<tr>
								<td><?php esc_html_e('Advanced Slider', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Product, Contact Blog & 404 pages', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gutenberg Page Builder Compatible', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Preloader', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Mega Menu', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Cutom Instagram layout', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Product Compare Pop-up builder', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Product wishlist', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Product Gallery Slider', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Product Share Option', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Product Swatchs & Variations', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Anouncement Bar', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>

							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'feminine-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( FEMININE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'feminine-shop'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'feminine-shop'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'feminine-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FEMININE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'feminine-shop'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'feminine-shop'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'feminine-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FEMININE_SHOP_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'feminine-shop'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'feminine-shop'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'feminine-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FEMININE_SHOP_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'feminine-shop'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'feminine-shop'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'feminine-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FEMININE_SHOP_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','feminine-shop'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'feminine-shop'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'feminine-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FEMININE_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'feminine-shop'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>