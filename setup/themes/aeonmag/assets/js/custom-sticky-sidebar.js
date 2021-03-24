/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * 
 *
 */
/* Custom JS File */

(function($) {

	"use strict";

	jQuery(document).ready(function() {
    	
	     
		//sticky sidebar
		var at_body = $("body");
		var at_window = $(window);
		if(at_body.hasClass('at-sticky-sidebar')){
			if(at_body.hasClass('right-sidebar left-sidebar')){
				$('#secondary, #primary').theiaStickySidebar();
			}
			else{
				$('#secondary, #primary').theiaStickySidebar();
			}
		}

	});
})(jQuery);

