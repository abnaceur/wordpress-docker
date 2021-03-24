<div class="candid-theme-steps-list">
<div class="left-box-wrapper-outer">
<div class="op-box-wrapper candid-welcome-box-white">
	<div class="op-box-wrapper candid-welcome-box-white">
	<div class="op-box-header"><?php esc_html_e('Welcome to Grip','grip'); ?></div>
	<div class="box-content">
		<p><?php esc_html_e('Thank you for choosing Grip. Check plugin recommendation section and below setting to know more about theme.','grip'); ?></p>
	</div>
</div>
	<div class="op-box-header"><?php esc_html_e('Access Your Customizer Setting Easily','grip'); ?></div>
	<div class="op-box-content">
		<ul class="op-list clearfix">
			<?php
			 $url = admin_url( 'customize.php' );

	        $links = array(
	        	array(
	                'label' => __( 'Check Theme Settings', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'panel' => 'grip_panel' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-generic',
	            ),
	            array(
	                'label' => __( 'Logo & Site Identity', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'title_tagline' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-format-image',
	            ),
	            array(
	                'label' => __( 'Manage Widgets Settings', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'panel' => 'widgets' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-generic',
	            ),
	            array(
	                'label' => __( 'Header Image', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'header_image' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-align-center',
	            ),
	            array(
	                'label' => __( 'Primary Color', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'colors' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-customizer',
	            ),
	            array(
	                'label' => __( 'Sidebar Settings', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'grip_sidebar_section' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-welcome-write-blog',
	            ),
	            array(
	                'label' => __( 'Blog Page Settings', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'grip_blog_page_section' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-share',
	            ),
	            array(
	                'label' => __( 'Footer Settings', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'grip_footer_section' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-generic',
	            ),
	            array(
	                'label' => __( 'Typography(fonts) Settings', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'grip_font_options' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-generic',
	            ),
	            array(
	                'label' => __( 'Category Color Settings', 'grip' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'grip_category_color_setting' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-generic',
	            ),
	           
	        );

	        $links = apply_filters( 'arrival/dashboard/links', $links );
	        ?> 

			<?php foreach( $links as $l ) { ?>
                <li>
                	<span class="<?php echo esc_attr($l['icon'])?>"></span>
                    <a class="op-quick-setting-link" href="<?php echo esc_url( $l['url'] ); ?>" target="_blank"><?php echo esc_html( $l['label'] ); ?></a>
                    <a class="ct-learn-more" href="<?php echo esc_url( $l['url'] ); ?>" target="_blank" rel="noopener"><?php esc_html('Learn More', 'grip'); ?> </a>
                </li>
            <?php } ?>
		</ul>
	</div>
</div>	
</div>


<?php $this->admin_sidebar_contents(); ?>

</div>