/**
 * Theme Customizer enhancements for a better user experience.
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since  1.0.0
 */

( function( $ ) {
  /*--------------------------------------------------------------
  # Brand
  --------------------------------------------------------------*/
  wp.customize( 'blogname', function( value ) {
    value.bind( function( newVal ) {
      $( '.c-brand__logo span, .c-footer-info__brand span' ).text( newVal );
    } );
  } );
  wp.customize( 'blogdescription', function( value ) {
    value.bind( function( newVal ) {
      $( '.c-brand__tagline' ).text( newVal );
    } );
  } );


  /*--------------------------------------------------------------
  # Colors
  --------------------------------------------------------------*/
  // Brand logo text color.
  wp.customize( 'header_textcolor', function( value ) {
    value.bind( function( newVal ) {
      $( '.c-brand__logo' ).css( {
        'color': to
      } );
    } );
  } );


  /*--------------------------------------------------------------
  # Header
  --------------------------------------------------------------*/
  // Header padding
  wp.customize( 'olevia_options[header_b-site__header_padding]', function( value ) {
    value.bind( function( newVal ) {
      $( '.b-site__header' ).css( {
        'padding': newVal + 'px 0'
      } );
    } );
  } );

  // Display search in primary navigation
  wp.customize( 'olevia_options[header_display_c-nav-primary-search]', function( value ) {
    value.bind( function( newVal ) {
      if ( newVal ) {
        $( '.c-nav-primary__search' ).show();
      } else {
        $( '.c-nav-primary__search' ).hide();
      }
    } );
  } );

  /*--------------------------------------------------------------
  # Footer
  --------------------------------------------------------------*/
  // About title
  wp.customize( 'olevia_options[footer_c-footer-about__title]', function( value ) {
    value.bind( function( newVal ) {
      $( '.c-footer-about__title' ).text( newVal );
    } );
  } );

  // About Description
  wp.customize( 'olevia_options[footer_c-footer-about__desc]', function( value ) {
    value.bind( function( newVal ) {
      $( '.c-footer-about__desc' ).html( newVal );
    } );
  } );

  // Copyright Text
  wp.customize( 'olevia_options[footer_c-footer-info__copyright]', function( value ) {
    value.bind( function( newVal ) {
      $( '.c-footer-info__copyright' ).html( newVal );
    } );
  } );


  /*--------------------------------------------------------------
  # Home Page
  --------------------------------------------------------------*/
  // Display View All button
  wp.customize( 'olevia_options[home_display_c-portfolio-view-all]', function( value ) {
    value.bind( function( newVal ) {
      if ( newVal ) {
        $( '.c-portfolio-view-all' ).show();
      } else {
        $( '.c-portfolio-view-all' ).hide();
      }
    } );
  } );

  // View All button text
  wp.customize( 'olevia_options[home_c-portfolio-view-all_text]', function( value ) {
    value.bind( function( newVal ) {
      $( '.c-portfolio-view-all a' ).text( newVal );
    } );
  } );

} )( jQuery );
