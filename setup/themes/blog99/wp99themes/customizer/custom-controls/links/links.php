<?php
/**
 * Customizer Control: multicheck.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blog99_Links_Control' ) ) {

	/**
	 * Adds a multicheck control.
	 */
	class Blog99_Links_Control extends Wp_Customize_Control {

		public $type = 'blog99-links';
        
        public $tooltip = '';
        
        public function to_json() {
        	
			parent::to_json();
			
            if ( isset( $this->default ) ) {

				$this->json['default'] = $this->default;

			} else {

				$this->json['default'] = $this->setting->default;
			}
         
		}
        
        
		protected function content_template() {
			?>
				<a href="#" class="tooltip hint--left" data-hint="{{ data.default }}"><span class='dashicons dashicons-info'></span><?php  esc_html_e(' Menu links','blog99'); ?></a>
			<?php
		}
	}
}
?>
