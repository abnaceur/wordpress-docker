/**
 * Classic Artisan background script. Runs on a full-window <canvas> element.
 */

var cabg = {};
( function( $ ) {

	// Load settings passed from wp_localize_script().
	cabg.settings = classicArtisanSettings;

	// Start the animation.
	cabg.init = function() {
		cabg.canvas = document.getElementById( 'classicArtisan' );
		if ( null === cabg.canvas ) {
			return;
		}
		cabg.ctx = cabg.canvas.getContext( '2d' );

		cabg.size = parseInt( cabg.settings.size, 10 );
		cabg.s = parseInt( cabg.settings.s );
		cabg.h = parseInt( cabg.settings.h );
		cabg.mode = cabg.settings.mode;
		if ( 'rainbow' === cabg.mode ) {
			cabg.l = 90;
			cabg.s = 2 * cabg.s;
			if ( 100 < cabg.s ) {
				cabg.s = 100;
			}
		}

		cabg.incrx = cabg.size;
		cabg.incry = cabg.size;

		cabg.resizeCanvas();


		$( window).resize( function() {
			cabg.resizeCanvas();
		});
	}

	cabg.resizeCanvas = function() {
		cabg.width = window.innerWidth;
		cabg.height = window.innerHeight;
		cabg.canvas.width = cabg.width;
		cabg.canvas.height = cabg.height;
		cabg.drawGraphic();
	}

	cabg.drawGraphic = function() {
		cabg.x = 0;
		cabg.y = 0;
		while ( cabg.x < cabg.width && cabg.y < cabg.height ) {
			cabg.drawSomething();
		}
	}

	cabg.drawSomething = function() {

		// Random hue and fixed saturation if in rainbow mode.
		// Otherwise, randomize the luminosity.
		if ( 'rainbow' === cabg.mode ) {
			cabg.h = Math.floor(Math.random() * 359);
		} else {
			cabg.l = Math.floor(Math.random() * 8) + 90;
		}

		cabg.ctx.fillStyle = 'hsl('+cabg.h+','+cabg.s+'%,'+cabg.l+'%)';
		cabg.ctx.fillRect( cabg.x, cabg.y, cabg.size, cabg.size );

		cabg.x = cabg.x + cabg.incrx;
		if ( cabg.x >= cabg.width && cabg.y <= cabg.height ) {
			cabg.y = cabg.y + cabg.incry;
			cabg.x = 0;
		}
	}

	$(document).ready( function() {
		cabg.init();
	});

} )( jQuery );