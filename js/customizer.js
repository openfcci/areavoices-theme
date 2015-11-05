/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site description.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// About Me: Avatar. //UPDATE: TEXT TO?
	wp.customize( 'av_aboutme_avatar', function( value ) {
		value.bind( function( to ) {
			//$( 'img.av_aboutme_avatar' ).attr( 'src', to );
			var $img = $('<img>').attr('src', response);
      $( '.site-branding' ).html( $img );
		} );
	} );

	// About Me: Name.
	wp.customize( 'av_aboutme_username', function( value ) {
		value.bind( function( to ) {
			$( '.aboutme_username' ).text( to );
		} );
	} );

	// About Me: Description.
	wp.customize( 'av_aboutme_description', function( value ) {
		value.bind( function( to ) {
			$( '.aboutme_description' ).text( to );
		} );
	} );


	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
//////////////
} )( jQuery );
