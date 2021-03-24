<?php
/**
 * Other settings page - admin 
 * 
 * this main settings page contains .. 
 * 
 *  Analytics, .. 
 * 
 * @package ctc
 * @subpackage admin
 * @since 3.0 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HT_CTC_Admin_Rtools' ) ) :

class HT_CTC_Admin_Rtools {


    public function menu() {

        add_submenu_page(
            'click-to-chat',
            'Recommended-Tools',
            'Tools',
            'manage_options',
            'click-to-chat-rtools',
            array( $this, 'settings_page' )
        );
    }


    public function settings_page() {

        if ( ! current_user_can('manage_options') ) {
            return;
        }

        ?>

        <div class="wrap">

            <?php settings_errors(); ?>

            <div class="row">
                <div class="col s12 m12 xl8 options">
                    <form action="options.php" method="post" class="">
                        <?php settings_fields( 'ht_ctc_rtools_page_settings_fields' ); ?>
                        <?php do_settings_sections( 'ht_ctc_rtools_page_settings_sections_do' ) ?>
                        <!-- submit_button() -->
                    </form>
                </div>
                <!-- <div class="col s12 m12 xl6 ht-ctc-admin-sidebar">
                </div> -->
            </div>

        </div>

        <?php

    }



    public function settings() {

        register_setting( 'ht_ctc_rtools_page_settings_fields', 'ht_ctc_othersettings' , array( $this, 'options_sanitize' ) );
        
        add_settings_section( 'ht_ctc_rtools_settings_sections_add', '', array( $this, 'main_settings_section_cb' ), 'ht_ctc_rtools_page_settings_sections_do' );
        
        // add_settings_field( 'ht_ctc_tools', '', array( $this, 'ht_ctc_tools_cb' ), 'ht_ctc_rtools_page_settings_sections_do', 'ht_ctc_rtools_settings_sections_add' );
        
    }

    function main_settings_section_cb() {
        ?>

            <div class="row">
                <div class="col s12">
                    <h4>Recommended Tools</h4>
                </div>
            </div>


            <div class="row">
            
                <div class="col s12 m6 l4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>WhatsApp API</h5></li>
                        <li><a class="collection-item" target="_blank" href="https://landbot.grsm.io/ctc">Landbot</a></li>
                        <li><a class="collection-item" target="_blank" href="https://freshchat.grsm.io/ctc">FreshChat</a></li>
                        <li><a class="collection-item" target="_blank" href="https://trengo.com/en?ref=ht">Trengo</a></li>
                        <li><a class="collection-item" target="_blank" href="https://www.wati.io?ref=ht">Wati</a></li>
                    </ul>
                </div>
            
                <div class="col s12 m6 l4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>Hosting</h5></li>
                        <li><a class="collection-item" target="_blank" href="https://wordpress.com/pricing/?aff=7043">WordPress</a></li>
                        <li><a class="collection-item" target="_blank" href="https://kinsta.com/?kaid=PNHFRBHEOEWF">Kinsta</a></li>
                        <!-- <li><a class="collection-item" target="_blank" href=""></a></li> -->
                        <li><a class="collection-item" target="_blank" href="https://www.bluehost.com/track/ht/">bluehost</a></li>
                    </ul>
                </div>

                <div class="col s12 m6 l4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>Themes</h5></li>
                        <li><a class="collection-item" target="_blank" href="https://wpastra.com/?bsf=891">Astra</a></li>
                        <li><a class="collection-item" target="_blank" href="https://www.elegantthemes.com/affiliates/idevaffiliate.php?id=46605">Divi</a></li>
                        <!-- <li><a class="collection-item" target="_blank" href=""></a></li> -->
                        <!-- <li><a class="collection-item" target="_blank" href=""></a></li> -->
                    </ul>
                </div>

                <div class="col s12 m6 l4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>Services</h5></li>
                        <li><a class="collection-item" target="_blank" href="https://codeable.io/?ref=LXT1k">Codeable</a></li>
                        <li><a class="collection-item" target="_blank" href="https://track.fiverr.com/visit/?bta=215558&brand=fiverrcpa">Fiverr</a></li>
                    </ul>
                </div>

            </div>

            <p class="description" style="font-size: 0.7em; float: right;">Disclosure: contains affiliate links | <a href="<?php echo admin_url( 'admin.php?page=click-to-chat-other-settings#hide_rtools:~:text=Hide,Tools' ); ?>" style="">Hide this</a></p>

        <?php
    }


    // function ht_ctc_tools_cb() {
    // }





}

$ht_ctc_admin_rtools = new HT_CTC_Admin_Rtools();

add_action('admin_menu', array($ht_ctc_admin_rtools, 'menu') );
add_action('admin_init', array($ht_ctc_admin_rtools, 'settings') );

endif; // END class_exists check