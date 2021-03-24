<?php
//about theme info
add_action( 'admin_menu', 'vw_life_coach_gettingstarted' );
function vw_life_coach_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Life Coach', 'vw-life-coach'), esc_html__('About VW Life Coach', 'vw-life-coach'), 'edit_theme_options', 'vw_life_coach_guide', 'vw_life_coach_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_life_coach_admin_theme_style() {
   wp_enqueue_style('vw-life-coach-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstarted/getstarted.css');
   wp_enqueue_script('vw-life-coach-tabs', esc_url(get_template_directory_uri()) . '/inc/getstarted/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_life_coach_admin_theme_style');

//guidline for about theme
function vw_life_coach_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-life-coach' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Life Coach Theme', 'vw-life-coach' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-life-coach'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Life Coach at 20% Discount','vw-life-coach'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-life-coach'); ?> ( <span><?php esc_html_e('vwpro20','vw-life-coach'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_LIFE_COACH_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-life-coach' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="vw_life_coach_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-life-coach' ); ?></button>
			<button class="tablinks" onclick="vw_life_coach_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-life-coach' ); ?></button>
		  	<button class="tablinks" onclick="vw_life_coach_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-life-coach' ); ?></button>	  
		  <button class="tablinks" onclick="vw_life_coach_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'vw-life-coach' ); ?></button>
		  <button class="tablinks" onclick="vw_life_coach_open_tab(event, 'lite_pro')"><?php esc_html_e( 'Support', 'vw-life-coach' ); ?></button>
		</div>

		

		<!-- Tab content -->
		<?php
			$vw_life_coach_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_life_coach_plugin_custom_css ='display: block';
			}
		?>
		<div id="gutenberg_editor" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Life_Coach_Plugin_Activation_Settings::get_instance();
			$vw_life_coach_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-life-coach-recommended-plugins">
				    <div class="vw-life-coach-action-list">
				        <?php if ($vw_life_coach_actions): foreach ($vw_life_coach_actions as $key => $vw_life_coach_actionValue): ?>
				                <div class="vw-life-coach-action" id="<?php echo esc_attr($vw_life_coach_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_life_coach_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_life_coach_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_life_coach_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-life-coach' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-life-coach-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-life-coach'); ?></a>
			    </div>
			<?php } ?>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Life_Coach_Plugin_Activation_Settings::get_instance();
				$vw_life_coach_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-life-coach-recommended-plugins">
				    <div class="vw-life-coach-action-list">
				        <?php if ($vw_life_coach_actions): foreach ($vw_life_coach_actions as $key => $vw_life_coach_actionValue): ?>
				                <div class="vw-life-coach-action" id="<?php echo esc_attr($vw_life_coach_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_life_coach_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_life_coach_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_life_coach_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-life-coach'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_life_coach_plugin_custom_css); ?>">
			  	<h3><?php esc_html_e( 'Block Patterns', 'vw-life-coach' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-life-coach'); ?></p>
              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-life-coach'); ?></span></b></p>
              	<div class="vw-life-coach-pattern-page">
			    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-life-coach'); ?></a>
			    </div>
              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/block-pattern.png" alt="" />				
	        </div>
		</div>

		<div id="lite_theme" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Life_Coach_Plugin_Activation_Settings::get_instance();
				$vw_life_coach_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-life-coach-recommended-plugins">
				    <div class="vw-life-coach-action-list">
				        <?php if ($vw_life_coach_actions): foreach ($vw_life_coach_actions as $key => $vw_life_coach_actionValue): ?>
				                <div class="vw-life-coach-action" id="<?php echo esc_attr($vw_life_coach_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_life_coach_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_life_coach_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_life_coach_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-life-coach'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_life_coach_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-life-coach' ); ?></h3>
				<hr class="h3hr">
		  		<p><?php esc_html_e('Free Life Coach WordPress Theme is designed for life coaches and business coaches that help them to spread the word about the coaching services they have to offer. As a life coach, your website will play a key role in depicting your qualities and expertise. It is a modern WordPress theme that is designed to look amazing on all kinds of mobile devices. You can put your trust in this theme as it is designed to work well with the latest released version of WordPress. Performance and optimized design were the points of focus while designing it. The valid HTML codes in the core and the lightweight design of this theme help you obtain incredible results for your business website. With its detailed documentation, you can get complete clarity regarding the use of different features of this powerful theme. It integrates flawlessly with any third-party plugin giving you the freedom to add any functionality you wish to add to your site.','vw-life-coach'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-life-coach' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-life-coach' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_LIFE_COACH_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-life-coach' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-life-coach'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-life-coach'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-life-coach'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-life-coach'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-life-coach'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url(VW_LIFE_COACH_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-life-coach'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-life-coach'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-life-coach'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_LIFE_COACH_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-life-coach'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-life-coach' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-life-coach'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_life_coach_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-life-coach'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_life_coach_top_header') ); ?>" target="_blank"><?php esc_html_e('Top Header Section','vw-life-coach'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_life_coach_services') ); ?>" target="_blank"><?php esc_html_e('Services Section','vw-life-coach'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-life-coach'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-life-coach'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_life_coach_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-life-coach'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_life_coach_global_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-life-coach'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_life_coach_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-life-coach'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_life_coach_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-life-coach'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-life-coach'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-life-coach'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-life-coach'); ?></span><?php esc_html_e(' Go to ','vw-life-coach'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-life-coach'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-life-coach'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-life-coach'); ?></span><?php esc_html_e(' Go to ','vw-life-coach'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-life-coach'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-life-coach'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-life-coach'); ?> <a class="doc-links" href="https://vwthemesdemo.com/docs/free-vw-life-coach/" target="_blank"><?php esc_html_e('Documentation','vw-life-coach'); ?></a></p>
	                </ul>
			  	</div>
		  	</div>
		</div>

		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-life-coach' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Life Coach WordPress Theme is a robust theme developed for life coaches that help people in personal development. If you are into such a profession and are an expert life coach guiding people, you can have a great website that shows your expertise and skills with the help of this theme. While exploring the themes demo, you will find that the developers had kept all your business requirements in mind while developing the theme. The slider itself is very catchy and makes an appeal. A separate space for displaying any new announcement is given at the top of the header so that your visitors could easily notice it. WP Life Coach WordPress Theme comes with a beautiful and elegant color scheme and has Call To Action (CTA) buttons with gradient color included just in the right places. You cant miss the different sections designed with precision for showing all the different aspects of your profession and business','vw-life-coach'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_LIFE_COACH_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-life-coach'); ?></a>
					<a href="<?php echo esc_url( VW_LIFE_COACH_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-life-coach'); ?></a>
					<a href="<?php echo esc_url( VW_LIFE_COACH_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-life-coach'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-life-coach' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-life-coach'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-life-coach'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-life-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-life-coach'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-life-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-life-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('16', 'vw-life-coach'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-life-coach'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-life-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-life-coach'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-life-coach'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-life-coach'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-life-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-life-coach'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstarted/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_LIFE_COACH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-life-coach'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="lite_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-life-coach'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-life-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_LIFE_COACH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-life-coach'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-life-coach'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-life-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_LIFE_COACH_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-life-coach'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-life-coach'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-life-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_LIFE_COACH_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-life-coach'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-life-coach'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-life-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_LIFE_COACH_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-life-coach'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-life-coach'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-life-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_LIFE_COACH_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-life-coach'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<?php } ?>