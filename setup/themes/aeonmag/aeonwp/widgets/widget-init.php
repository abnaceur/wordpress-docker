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
if ( ! function_exists( 'aeonmag_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function aeonmag_load_widgets() {

        // Recent Post.
        register_widget( 'AeonMag_Recent_Post_Sidebar' );

        // Author Widget.
        register_widget( 'AeonMag_Author_Widget' );
		
		// Social Widget.
        register_widget( 'AeonMag_Social_Widget' );

        //Tabbed Widget
        register_widget( 'AeonMag_Tabbed' );

        //Grid Widget
        register_widget( 'AeonMag_Post_Grid' );

        //Featured Widget
        register_widget( 'AeonMag_Featured_Post_Content');

        //Post Column Widget
        register_widget( 'AeonMag_Post_Column');

        //Post Column Widget
        register_widget( 'AeonMag_Latest_Post');
    }
endif;
add_action( 'widgets_init', 'aeonmag_load_widgets' );


