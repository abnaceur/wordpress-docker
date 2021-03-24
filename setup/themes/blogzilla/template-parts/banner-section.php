<?php
$blogzilla_options = blogzilla_theme_options();
$banner_title = $blogzilla_options['banner_image_title'];
$banner_desc = $blogzilla_options['banner_image_description'];
$banner_image = (($blogzilla_options['upload_banner_image']) ? $blogzilla_options['upload_banner_image'] : '');
$banner_btn_txt = $blogzilla_options['single_btn1'];
$banner_url = $blogzilla_options['single_link1'];
$banner_show_checkbox = $blogzilla_options['banner_show_checkbox'];


if(!empty($home_video_bg_image)){
    $background_style = "style='background-image:url(".esc_url($home_video_bg_image).")'";
}
else{
    $background_style = '';
}


if ($banner_show_checkbox== '1'){
?>
<div class="banner-wrap">
<div id="banner-wrapper-animated" class="banner-wrapper-fixed" style="background-image: url(<?php echo esc_url($banner_image); ?>);">
  <div class="foreground">
    <div class="banner-text">
    <div class="banner-text-wrap">
    <?php if($banner_title){ ?>
    <h1><?php echo esc_html($banner_title); ?></h1>
    <?php  } ?>

    <?php if($banner_desc){ ?>
    <p><?php echo esc_html($banner_desc); ?></p>
    <?php  } ?>

    <?php if($banner_btn_txt){ ?>
    <a class="btn btn-default" href="<?php echo esc_url($banner_url); ?>"><?php echo esc_html($banner_btn_txt) ?></a>
   <?php  } ?>
    </div>
    </div>
  </div>
</div>
</div>
<?php
}
?>
