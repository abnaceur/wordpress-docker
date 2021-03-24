/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue and ranbow background controls based on the selected saturation.
 */

(function() {
	wp.customize.bind( 'ready', function() {

		// Only show the color hue control when there's a custom color scheme.
		wp.customize( 'cab_s', function( setting ) {
			wp.customize.control( 'cab_h', function( control ) {
				var visibility = function() {
					if ( 0 == setting.get() ) {
						control.container.slideUp( 180 );
					} else {
						control.container.slideDown( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});

			wp.customize.control( 'cab_rainbow', function( control ) {
				var visibility = function() {
					if ( 0 == setting.get() ) {
						control.container.slideUp( 180 );
					} else {
						control.container.slideDown( 180 );
					}
				};

				visibility();
				setting.bind( visibility );
			});
		});

	});
})( jQuery );
