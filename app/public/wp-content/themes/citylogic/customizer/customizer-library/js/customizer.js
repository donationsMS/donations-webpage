/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-header .branding .title' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-header .branding .description' ).text( to );
		} );
	} );
	
	/*
	// Background color
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$( '.content-container' ).css( {
				'background-color': to
			} );
		} );
	} );
	*/
	
} )( jQuery );
