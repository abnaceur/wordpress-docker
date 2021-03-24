/**
 * Customizer preview scripts.
 *
 * Contains handlers to make the customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Footer copyright name.
	wp.customize( 'copy_name', function( value ) {
		value.bind( function( to ) {
			$( '#footer-copy-name' ).text( to );
		} );
	} );

	// Footer credits.
	wp.customize( 'powered_by_wp', function( value ) {
		value.bind( function( to ) {
			$( '.wordpress-credit' ).toggle( to );
		} );
	} );
	wp.customize( 'theme_meta', function( value ) {
		value.bind( function( to ) {
			$( '.theme-credit' ).toggle( to );
		} );
	} );

	wp.customize( 'cab_h', function( value ) {
		value.bind( function( to ) {

			// Update background graphic.
			window.cabg.settings.h = to;
			window.cabg.init();

			// Update custom color CSS
			var style = $( '#classic-artisan-colors' ),
			    color = style.data( 'cab_h' ),
			    css = style.html();
			css = css.split( color + ', ' ).join( to + ', ' ); // css.replaceAll, only do unitless numbers.
			$( '#classic-artisan-colors' ).html( css )
			                              .data( 'cab_h', to );
		} );
	} );

	wp.customize( 'cab_s', function( value ) {
		value.bind( function( to ) {

			// Update background graphic.
			window.cabg.settings.s = to;
			window.cabg.init();

			// Update custom color CSS
			var style = $( '#classic-artisan-colors' ),
			    color = style.data( 'cab_s' ),
			    css = style.html();
			css = css.split( ', ' + color + '%, ' ).join( ', ' + to + '%, ' ); // css.replaceAll, try to only change the center number.
			$( '#classic-artisan-colors' ).html( css )
			                              .data( 'cab_s', to );
		} );
	} );

	wp.customize( 'cab_size', function( value ) {
		value.bind( function( to ) {
			window.cabg.settings.size = to;
			window.cabg.init();
		} );
	} );

	wp.customize( 'cab_rainbow', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				to = 'rainbow';
			} else {
				to = 'monochrome';
			}
			window.cabg.settings.mode = to;
			window.cabg.init();
		} );
	} );

} )( jQuery );
