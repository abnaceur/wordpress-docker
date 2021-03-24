<?php
/**
 * sidebar content
 */


if ( ! defined( 'ABSPATH' ) ) exit;

$othersettings = get_option('ht_ctc_othersettings');

?>

<div class="sidebar-content">

    <div class="col s12 m8 l12 xl12">

        <?php
        // rtools
        if ( ! isset ( $othersettings['hide_rtools'] ) ) {
        ?>

            <div class="row">
                <ul class="collapsible popout">
                    <li class="active">


                        <ul class="collapsible popout">	
                            <li class="active">	
                            <div class="collapsible-header"><?php _e( 'Contact Us', 'click-to-chat-for-whatsapp' ); ?></div>	
                            <div class="collapsible-body">	
                                <p class="description"><?php _e( 'Please let us know if you have any suggestions or feedback!!', 'click-to-chat-for-whatsapp' ); ?> <br><br> <a href="http://api.whatsapp.com/send?phone=919494429789&text=<?php echo get_bloginfo('url'); ?>%0AHi%20HoliThemes,%0AI%20have%20a%20Suggestion/Feedback:" target="_blank"><?php _e( 'WhatsApp', 'click-to-chat-for-whatsapp' ); ?></a></p>	
                                <p class="description"><?php _e( 'Mail', 'click-to-chat-for-whatsapp' ); ?>:<a href="mailto: ctc@holithemes.com"> ctc@holithemes.com</a></p>	
                            </div>	
                            </li>	
                        </ul>

            

                        <!-- <div class="collapsible-header">WhatsApp Solution Providers
                        </div> -->

                        <!-- <div class="collapsible-body">
                            <p class="description"><a target="_blank" href="#">WhatsApp Business solutions</a> API, Team Inbox, Chatbot, Verfication ..</p>
                            <br> -->

                            <!-- <div class="collection">
                                <a target="_blank" href="" class="collection-item"></a>
                                <a target="_blank" href="" class="collection-item"></a>
                                <a target="_blank" href="" class="collection-item"></a>
                                <a target="_blank" href="" class="collection-item"></a>
                            </div> -->
                            
                            <!-- <br> -->
                            <!-- <p class="description" style="font-size: 0.7em; float: right;">Disclosure: contains affiliate links | <a target="_blank" href="<?php echo admin_url( 'admin.php?page=click-to-chat-other-settings#hide_rtools:~:text=Hide,Tools' ); ?>" style="color: unset;">Hide this</a></p> -->
                        <!-- </div> -->

                    </li>
                </ul>
            </div>
    
        <?php
        }
        ?>
    
    </div>


</div>