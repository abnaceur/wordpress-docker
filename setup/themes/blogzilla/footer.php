<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogzilla
 */

$blogzilla_options = blogzilla_theme_options();
$prefooter_checkbox = $blogzilla_options['prefooter_checkbox'];
$facebook_link = $blogzilla_options['facebook_link'];
$youtube_link = $blogzilla_options['youtube_link'];
$twitter_link = $blogzilla_options['twitter_link'];
$pinterest_link = $blogzilla_options['pinterest_link'];
$instagram_link = $blogzilla_options['instagram_link'];
?>

<footer>

<?php if ($prefooter_checkbox== 1){ ?>
    <section id="secondary" class="footer-sec">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('blogzilla_footer_1')) : ?>
                    <div class="col-md-4 mob-margin-top">
                        <?php dynamic_sidebar('blogzilla_footer_1') ?>
                    </div>
                    <?php
                else: blogzilla_blank_widget();
                endif; ?>
                <?php if (is_active_sidebar('blogzilla_footer_2')) : ?>
                    <div class="col-md-4 mob-margin-top">
                        <?php dynamic_sidebar('blogzilla_footer_2') ?>
                    </div>
                    <?php
                else: blogzilla_blank_widget();
                endif; ?>
                <?php if (is_active_sidebar('blogzilla_footer_3')) : ?>
                    <div class="col-md-4 mob-margin-top">
                        <?php dynamic_sidebar('blogzilla_footer_3') ?>
                    </div>
                    <?php
                else: blogzilla_blank_widget();
                endif; ?>
            </div>
        </div>
    </section>
<?php } ?>
    <section class="bot-footer">
        <div class="container">
            <div class="bot-footer-icons">
                <ul class="social-icons">
                    <?php if($facebook_link){ ?>
                    <li><span class="social-icon"> <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i><?php esc_html_e('Facebook' , 'blogzilla'); ?></a></span></li>
                    <?php  } ?>

                    <?php if($twitter_link){ ?>
                    <li><span  class="social-icon"><a href="<?php echo esc_url($twitter_link); ?>"> <i class="fa fa-twitter"></i><?php esc_html_e('Twitter' , 'blogzilla'); ?></a></span></li>
                    <?php  } ?>

                    <?php if($pinterest_link){ ?>
                    <li><span  class="social-icon"><a href="<?php echo esc_url($pinterest_link); ?>"> <i class="fa fa-pinterest"></i><?php esc_html_e('Pinterest' , 'blogzilla'); ?></a></span></li>
                    <?php  } ?>

                    <?php if($youtube_link){ ?>
                    <li><span  class="social-icon"><a href="<?php echo esc_url($youtube_link); ?>"> <i class="fa fa-youtube"></i><?php esc_html_e('Youtube' , 'blogzilla'); ?></a></span></li>
                    <?php  } ?>

                    <?php if($instagram_link){ ?>
                    <li><span  class="social-icon"><a href="<?php echo esc_url($instagram_link); ?>">  <i class="fa fa-instagram"></i><?php esc_html_e('Instagram' , 'blogzilla'); ?></a></span></li>
                    <?php  } ?>
                </ul>
                <p><?php esc_html_e('Powered By WordPress', 'blogzilla');
                    esc_html_e(' | ', 'blogzilla') ?>
                    <span><a target="_blank" rel="nofollow"
                       href="<?php echo esc_url('https://nomadicguy.com/product/blogzilla/'); ?>"><?php esc_html_e('Blog Zilla' , 'blogzilla'); ?></a></span>
                </p>
            </div>
        </div>
    </section>

</footer>
</div>
<div class="loader-overlay">
  <div class="loader"></div>
</div>

<a href='#' class='scroll-to-top'></a>
<?php wp_footer(); ?>
