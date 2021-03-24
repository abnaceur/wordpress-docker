<?php
$ft_directory_listing_options = ft_directory_listing_theme_options();

$banner_title = $ft_directory_listing_options['banner_title'];
$banner_bg_image = $ft_directory_listing_options['banner_bg_image'];
if(!empty($banner_bg_image)){
    $background_style = "style='background-image:url(".esc_url($banner_bg_image).")'";
}
else{
    $background_style = '';
}

?>


<div class="hero-section">
     <div class="image" data-type="background" data-speed="2"  <?php echo wp_kses_post($background_style); ?>></div>
    <div class="stuff" data-type="content">
        <h1><?php echo esc_html($banner_title); ?></h1>

        <div class="banner-search-form">
        <p>
        	<?Php 

        	 if (in_array('hivepress/hivepress.php', apply_filters('active_plugins', get_option('active_plugins')))) { 
        		echo do_shortcode('[hivepress_listing_search_form]'); 
        	} ?></p>
    	</div>
        
       
    </div>
</div>
</div>




