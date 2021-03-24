<?php
/**
 * Template part for displaying social media for footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Goblog Free
 * @since Goblog Free 1.0
 * @version 1.0
 */

// Get a social media link from the customizer
$linkFb  = esc_url( get_theme_mod( 'url_fb_navigasi_footer', '' ) );
$linkTwt = esc_url( get_theme_mod( 'url_twt_navigasi_footer', '' ) );
$linkYt  = esc_url( get_theme_mod( 'url_yt_navigasi_footer', '' ) );
$linkIg  = esc_url( get_theme_mod( 'url_ig_navigasi_footer', '' ) );
$linkLk  = esc_url( get_theme_mod( 'url_lk_navigasi_footer', '' ) );  

?>
<div class="footer-sosmed">
    <div class="box-sosmed-contact">
        <div class="facebook sosmed">
            <a rel="nofollow noreferrer noopener" href="<?php echo $linkFb; ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('facebook', 'goblog-free'); ?></span><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
        </div>
        <div class="twitter sosmed">
            <a rel="nofollow noreferrer noopener" href="<?php echo $linkTwt; ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('twitter', 'goblog-free'); ?></span><i class="fab fa-twitter" aria-hidden="true"></i></a>
        </div>	
        <div class="youtube sosmed">
            <a rel="nofollow noreferrer noopener" href="<?php echo $linkYt; ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('youtube', 'goblog-free'); ?></span><i class="fab fa-youtube" aria-hidden="true"></i></a> 
        </div>	
        <div class="instagram sosmed">
            <a rel="nofollow noreferrer noopener" href="<?php echo $linkIg; ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('instagram', 'goblog-free'); ?></span><i class="fab fa-instagram" aria-hidden="true"></i></a> 
        </div>					
        <div class="linkedin sosmed">
            <a rel="nofollow noreferrer noopener" href="<?php echo $linkLk; ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('linkedin', 'goblog-free'); ?></span><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> 
        </div>
    </div>
</div>