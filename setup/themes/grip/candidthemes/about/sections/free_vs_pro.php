<?php 
$content = ( isset( $this->strings['free_vs_pro'] ) ) ? $this->strings['free_vs_pro'] : array();
if ( empty( $content ) ) {
    return;
}
?>
<div class="wpopsection candid-comparision-wrapper">
<div class="compare-table table-responsive">
<table class="table">
    <thead>
        <tr>
            <th class="db-bk-color-one"><?php esc_html_e('Theme Features', 'grip'); ?></th>
            <th class="db-bk-color-two"><?php esc_html_e('Grip Free', 'grip'); ?></th>
            <th class="db-bk-color-two"><?php esc_html_e('Grip Premium', 'grip'); ?></th>
        </tr>
    </thead>
     <tbody>
        <?php foreach($content['features'] as $key => $value):
            $class_1 = isset($value[2]) ? 'dashicons-before '.$value[2] : '';
            $class_2 = isset($value[3]) ? 'dashicons-before '.$value[3] : '';
        ?>
        <tr>
            <td class="db-width-perticular"><?php echo esc_html($key); ?></td>
            <td class="<?php echo esc_attr($class_1); ?>"><?php echo esc_html($value[0]); ?></td>
            <td class="<?php echo esc_attr($class_2); ?>"><?php echo esc_html($value[1]); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

    </div><!-- .demo-description -->
<div class="button-wrapper">
	<a href="https://www.candidthemes.com/themes/grip-pro/" class="btn" target="_blank"><?php esc_html_e('Buy Now','grip'); ?></a>
</div>
</div><!-- .wpopsection -->
<?php

$this->admin_sidebar_contents();