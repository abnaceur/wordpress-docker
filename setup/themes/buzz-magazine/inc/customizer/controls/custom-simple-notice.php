<?php

class Buzz_Magazine_Simple_Notice_Custom_control extends WP_Customize_Control {
    /**
     * The type of control being rendered
     */
    public $type = 'buzz-magazine-simple-notice';
    public $style = 'text';
    /**
     * Render the control in the customizer
     */
    public function render_content() {

    ?>
        <div class="simple-notice-custom-control">
            <?php if( !empty( $this->label ) ) { ?>
                <h1><span class="customize-control-title" style="<?php echo esc_attr($this->style)?>"><?php echo esc_html( $this->label ); ?></span></h1>
            <?php } ?>
        </div>
    <?php
    }
}
