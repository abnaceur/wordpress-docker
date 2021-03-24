<?php
/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
*/
/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('aeonmag_social_sharing')) :
    function aeonmag_social_sharing($post_id)
    {
        $aeonmag_url = get_the_permalink($post_id);
        $aeonmag_title = get_the_title($post_id);
        $aeonmag_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $aeonmag_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $aeonmag_title . '&url=' . $aeonmag_url);
        $aeonmag_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $aeonmag_url);
        $aeonmag_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $aeonmag_url . '&media=' . $aeonmag_image . '&description=' . $aeonmag_title);
        $aeonmag_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $aeonmag_title . '&url=' . $aeonmag_url);
        
        ?>
        <div class="meta_bottom">
            <div class="post-share">
                <a class="share-facebook" target="_blank" href="<?php echo $aeonmag_facebook_sharing_url; ?>">
                    <i class="fa fa-facebook"></i>
                    <span><?php _e('Facebook','aeonmag');?></span>
                </a>
                <a class="share-twitter" target="_blank" href="<?php echo $aeonmag_twitter_sharing_url; ?>">
                    <i class="fa fa-twitter"></i>
                    <span><?php _e('Twitter','aeonmag');?></span>
                </a>
                <a class="share-pinterest" target="_blank" href="<?php echo $aeonmag_pinterest_sharing_url; ?>">
                    <i class="fa fa-pinterest"></i>
                    <span><?php _e('Pinterest','aeonmag');?></span>
                </a>
                <a class="share-linkedin" target="_blank" href="<?php echo $aeonmag_linkedin_sharing_url; ?>">
                    <i class="fa fa-linkedin"></i>
                    <span><?php _e('Linkedin','aeonmag');?></span>
                </a>
            </div>
        </div>
        <?php
    }
endif;
add_action('aeonmag_social_sharing', 'aeonmag_social_sharing', 10);