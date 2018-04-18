/**
* callout JS
* -----------------------------------------------------------------------------
*
* All the JS for the accordion component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'accordion--trigger',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      var _this = this;
      var accordion = $( this.selector() );

      $( accordion ).hover(function(e) {
        $('.accordion').hide();
        $(this).next().show();
      } );
    },


    finalize: function() {

    }
  };

  // Hooks the component into the app
  app.registerComponent( 'accordion', COMPONENT );
} )( app );
