/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
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

	//404 primary title
	wp.customize( '404_page_primary_title', function( value ) {

		value.bind( function( to ) {
			$( '.error-404 h2' ).text( to );
		} );
	} );

	//404 secondary title
	wp.customize( '404_page_secondary_title', function( value ) {

		value.bind( function( to ) {
			$( '.error-404 h4' ).text( to );
		} );
	} );

	//404 menu button title
	wp.customize( '404_page_button_title', function( value ) {

		value.bind( function( to ) {
			if (to === ''){
				$('.error-404 a').hide()
			}else {
				$('.error-404 a').show()
				$( '.error-404 a' ).text( to );
			}
		} );
	} );


	//footer copyright
	wp.customize( 'footer_bar_copy_right', function( value ) {

		value.bind( function( to ) {
			$( '.site-generator .copy-right .section-copy-right' ).text( to );
		} );
	} );


	//archive text alignment
	wp.customize( 'archive_post_align', function( value ) {
		value.bind( function( to ) {
			$( '.archive-align-wrap' ).css( 'text-align', to );
		} );
	} );

	//Single Post Text Alignment
	wp.customize( 'single_post_align', function( value ) {
		value.bind( function( to ) {
			$( '.single-post-wrap, .single-post-wrap .entry-header, .single-post-wrap .entry-meta , .single-post-wrap .entry-content , .single-post-wrap .post-cat-list .cat-links a , .single-post-wrap .social-links' ).css( 'text-align', to );
		} );
	} );

	//Page Text Alignment
	wp.customize( 'page_align', function( value ) {
		value.bind( function( to ) {
			$( '.page-wrap' ).css( 'text-align', to );
		} );
	} );

	//Flash News Title
	wp.customize( 'flash_news_title', function( value ) {
		value.bind( function( to ) {
			$( '.header-info-bar .notice-info-title' ).text( to );
		} );
	} );


}( jQuery ) );
