/**
* Hero Banner JS
* -----------------------------------------------------------------------------
*
* All the JS for the Hero Banner component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'urb-hero-banner',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'hero-banner', COMPONENT );
} )( app );
