/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

( function( app ) {


  var COMPONENT = {

    init: function() {
      var _this = this;

      // Get dark bg element offset information
      var navRectangle = $( '.navbar' )[0].getBoundingClientRect();

      function checkForDarkBackground( navRectangle, target ) {

        // Flag
        var insideDarkBackground = false;

        // Loop through each dark bg element and check if nav element is inside it
        $( '.light-bg' ).each( function( index, element ) {

          // Get dark bg element offset information
          elementRectangle = element.getBoundingClientRect();

          // Check if the nav element is inside of the dark bg element
          var overlap = !(navRectangle.bottom < elementRectangle.top ||
                          navRectangle.top > elementRectangle.bottom);

          // Overlap found, set flag true
          if ( overlap ) {
            insideDarkBackground = true;
          }
        });

        // Check if flag successful
        if ( insideDarkBackground ) {
          // Menu was inside a dark bg, add class
          $( target ).addClass( 'navbar--dark' );
          return;
        } else {
          // Menu was not inside a dark bg, remove class
          $( target ).removeClass( 'navbar--dark' );
        }
      }

      checkForDarkBackground( navRectangle, '.navbar' );

      // $( '.nav-social__social li' ).each( function( index, element ) {
      //   var elementRectangle = element.getBoundingClientRect();
      //   checkForDarkBackground( elementRectangle, element );
      // });

      var timer = false;

      $( document ).on( 'scroll', function() {

        if( timer ) {
          window.clearTimeout( timer );
        }

        timer = window.setTimeout( function() {
          checkForDarkBackground( navRectangle, '.navbar' );

          // $( '.nav-social__social li' ).each( function( index, element ) {
          //   var elementRectangle = element.getBoundingClientRect();
          //   checkForDarkBackground( elementRectangle, element );
          // });
        }, 10);
      });




      // $( '.dark-bg:not(.ignore-bg)' ).each( function( index, element ) {
      //   var duration = $( element ).outerHeight();

      //   new ScrollMagic.Scene({triggerElement: this, duration: duration })
      //           .setClassToggle( _this.navId, _this.navToggle )
      //           .addTo( _this.scrollController );
      // });
    },

    finalize: function() {
      var _this = this;
    }
  };

  app.registerComponent( 'nav-scroll', COMPONENT );
} )( app );
