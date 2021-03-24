<?php
$ft_directory_listing_options = ft_directory_listing_theme_options();

$listing_item_show = $ft_directory_listing_options['listing_item_show'];
$listing_item_title = $ft_directory_listing_options['listing_item_title'];
$listing_item_desc = $ft_directory_listing_options['listing_item_desc'];


if($listing_item_show) { 
    if (1 == $listing_item_show):?> 
<div class="listing-item-wrap">
    <div class="container">
        <div class="row">
            <?php if ($listing_item_title || $listing_item_desc): ?>
                <div class="section-title">
                    <?php
                    if ($listing_item_title)
                        echo '<h2>' . esc_html($listing_item_title) . '</h2>';
                    if ($listing_item_desc)
                        echo '<p>' . esc_html($listing_item_desc) . '</p>';
                    ?>
                </div>
            <?php endif; 

            if (in_array('hivepress/hivepress.php', apply_filters('active_plugins', get_option('active_plugins')))) { 
            echo do_shortcode('[hivepress_listings number="6" columns="3"]'); 

            } ?>
        </div>
    </div>
</div>

        <?php
        
    endif;
}