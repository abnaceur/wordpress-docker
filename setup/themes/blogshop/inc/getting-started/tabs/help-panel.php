<?php
/**
 * Help Panel.
 *
 * @package Blogshop
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'blogshop' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'blogshop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://documentation.theimran.com/blogshop/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'blogshop' ); ?>" target="_blank">
            <?php esc_html_e( 'View Documentation', 'blogshop' ); ?>
        </a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support', 'blogshop' ); ?></h4>
       
        <p><?php esc_html_e( 'We will get back to you within the next 24 hours with an answer although typically much sooner. Please do not send multiple emails about the same issue/query or it will reset your priority timer. Queries are always answered on a first-come-first-serve basis and we will respond to you as soon as possible so please be patient.', 'blogshop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://theimran.com/contact/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'blogshop' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'blogshop' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Blogshop Demo', 'blogshop' ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design.', 'blogshop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://blogshop.theimran.com/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'blogshop' ); ?>" target="_blank">
            <?php esc_html_e( 'BlogShop Demo', 'blogshop' ); ?>
        </a>
        <br>
    </div><!-- .panel-aside -->
</div>