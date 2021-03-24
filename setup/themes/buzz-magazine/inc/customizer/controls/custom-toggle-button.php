<?php
/**
 * Toggle Custom Control
 */

if( ! class_exists( 'Buzz_Magazine_Customizer_Toggle_Control' ) ) {

    class Buzz_Magazine_Customizer_Toggle_Control extends WP_Customize_Control {

        public $type = 'buzz-magazine-flat';

        /**
         * Enqueue our scripts and styles
         */
        public function enqueue() {

            wp_enqueue_script( 'buzz-magazine-toggle', BUZZ_MAGAZINE_JS_URI.'toggle-button.js', array( 'jquery' ), BUZZ_MAGAZINE_VERSION  ,true );

            wp_enqueue_style( 'buzz-magazine-toggle', BUZZ_MAGAZINE_CSS_URI.'toggle-button.css' );
        }

        /**
         * Render the control's content.
         *
         * @version 1.0.0
         */
        public function render_content() {
            ?>
            <label>
                <div style="display:flex;flex-direction: row;justify-content: space-between;">
                    <span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
                    <input id="cb<?php echo esc_attr( $this->instance_number ); ?>" type="checkbox" class="tgl tgl-<?php echo esc_attr( $this->type ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
                    <label for="cb<?php echo esc_attr( $this->instance_number ); ?>" class="tgl-btn"></label>
                </div>
                <?php
                if ( ! empty( $this->description ) ) :
                    ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php
                endif;
                ?>
            </label>
            <?php
        }
    }
}