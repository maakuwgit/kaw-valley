/**
* callout JS
* -----------------------------------------------------------------------------
*
* All the JS for the accordion component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-accordion',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

      $( _this.selector() ).hover(function(e) {
        console.log('hovered');
      } );
    },


    finalize: function() {

    }
  };

  // Hooks the component into the app
  app.registerComponent( 'accordion', COMPONENT );
} )( app );
