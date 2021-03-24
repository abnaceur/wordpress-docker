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
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all categories in your WordPress site
 */
 class AeonMag_Customize_Category_Dropdown_Control extends WP_Customize_Control {
    
    /**
     * Render the control's content.
     *
     * @return void
     * @since 1.0.0
     */
    public function render_content() {
      $aeonmag_dropdown = wp_dropdown_categories(
          array(
            'name'              => 'customize-dropdown-categories' . $this->id,
            'echo'              => 0,
            'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;','aeonmag'),
            'option_none_value' => '0',
            'selected'          => $this->value(),
          )
      );

      // Hackily add in the data link parameter.
      $aeonmag_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $aeonmag_dropdown );

      printf(
        '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
        $this->label,
        $this->description,
        $aeonmag_dropdown
      );
    }
  }