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

	// About Me: Avatar.
	wp.customize( 'av_aboutme_avatar', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( 'img.av_aboutme_avatar' ).css( {
					'width': '0px',
					'height': '0px',
					'border-color': '#FFFFFF',
				} );
			} else {
				$( 'img.av_aboutme_avatar' ).attr( 'src', to );
				$( 'img.av_aboutme_avatar' ).css( {
					'width': '161px',
					'height': '161px',
					'border-color': '#E4E4E4',
				} );
			}
		} );
	} );

	// About Me: Avatar Border
	wp.customize( 'av_aboutme_imgborder', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( 'img.av_aboutme_avatar' ).css( {
					'border-style': 'solid',
					'border-width': '6px',
					'border-color': '#E4E4E4',
					'width': '161px',
					'height': '161px',
					'-webkit-border-radius': '0%',
					'-moz-border-radius': '0%',
					'border-radius': '0%',
				} );
			} else if ( 'layout-1' === to ) {
				$( 'img.av_aboutme_avatar' ).css( {
					'width': '161px',
			    'height': '161px',
			    'border': 'none',
					'-webkit-border-radius': '0%',
					'-moz-border-radius': '0%',
					'border-radius': '0%',
				} );
			} else if ( 'layout-2' === to ) {
				$( 'img.av_aboutme_avatar' ).css( {
					'border-style': 'solid',
					'border-width': '6px',
					'border-color': '#E4E4E4',
					'width': '161px',
					'height': '161px',
					'-webkit-border-radius': '0%',
					'-moz-border-radius': '0%',
					'border-radius': '0%',
				} );
			} else if ( 'layout-3' === to ) {
				$( 'img.av_aboutme_avatar' ).css( {
					'width': '161px',
					'height': '161px',
					'-webkit-border-radius': '50%',
					'-moz-border-radius': '50%',
					'border-radius': '50%',
					'border': 'none'
				} );
			} else if ( 'layout-4' === to ) {
				$( 'img.av_aboutme_avatar' ).css( {
					'border-style': 'solid',
					'border-width': '6px',
					'border-color': '#E4E4E4',
					'width': '161px',
					'height': '161px',
					'-webkit-border-radius': '50%',
					'-moz-border-radius': '50%',
					'border-radius': '50%'
				} );
			}
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
