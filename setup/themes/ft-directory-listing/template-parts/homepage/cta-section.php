<?php
$ft_directory_listing_options = ft_directory_listing_theme_options();

$cta_show            = $ft_directory_listing_options['cta_show'];
$cta_title		 	 = $ft_directory_listing_options['cta_title'];
$cta_button_txt	 = $ft_directory_listing_options['cta_button_txt'];
$cta_button_url		 = $ft_directory_listing_options['cta_button_url'];
$cta_bg_image		 = $ft_directory_listing_options['cta_bg_image'];


if(!empty($cta_bg_image)){
    $background_style = "style='background-image:url(".esc_url($cta_bg_image).")'";
}
else{
    $background_style = '';
}



if($cta_show) { 
    if (1 == $cta_show):?>
    <div class="section cta-sec" <?php echo wp_kses_post($background_style); ?>>
        <div class="container">
            <div class="row">
                <div class="cta-content">
                    <h2 class="cta-title"><?php echo esc_html($cta_title); ?></h2>
                    
                    <!--                    <button class="button"><span>Book Now</span></button>-->
                    <?php  if( $cta_button_txt && $cta_button_url):?>
                        <a href="<?php echo esc_url($cta_button_url); ?>" class="btn btn-default"><?php echo esc_html($cta_button_txt); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

        <?php
        
    endif;
}