<?php
/**
 * Help Panel.
 *
 * @package blog_starter
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'craftyblog' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'craftyblog' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://documentation.theimran.com/craftyblogpro/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'craftyblog' ); ?>" target="_blank">
            <?php esc_html_e( 'View Documentation', 'craftyblog' ); ?>
        </a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support', 'craftyblog' ); ?></h4>
       
        <p><?php esc_html_e( 'We will get back to you within the next 24 hours with an answer although typically much sooner. Please do not send multiple emails about the same issue/query or it will reset your priority timer. Queries are always answered on a first-come-first-serve basis and we will respond to you as soon as possible so please be patient.', 'craftyblog' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://theimran.com/contact/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'craftyblog' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'craftyblog' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Craftyblog Demo', 'craftyblog' ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design.', 'craftyblog' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://demo.theimran.com/carftyblogpro/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'craftyblog' ); ?>" target="_blank">
            <?php esc_html_e( 'Free Version Demo', 'craftyblog' ); ?>
        </a>
        <br>
        <br>
        <a class="button button-primary" href="<?php echo esc_url( 'http://demo.theimran.com/carftyblogpro/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'craftyblog' ); ?>" target="_blank">
            <?php esc_html_e( 'Pro Version Demo', 'craftyblog' ); ?>
        </a>
        <br>
        <br>
        <?php if (class_exists('OCDI_Plugin')): ?>
            <a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>" title="<?php esc_attr_e( 'One Click Demo Import', 'craftyblog' ); ?>" target="_blank">
                <?php esc_html_e( 'One Click Demo Import.', 'craftyblog' ); ?>
            </a>
        <?php endif; ?>
    </div><!-- .panel-aside -->
</div>