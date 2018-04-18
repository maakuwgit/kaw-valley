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
      var _this     = this,
          dl = $( this.selector() ),
          triggers  = $( dl ).find('.accordion--trigger');

      triggers.on('mouseenter.hoverAccordion', hoverAccordion);

      function resetAccordions(e) {
        triggers.removeClass('active').off('mouseenter.hoverAccordion').on('mouseenter.hoverAccordion', hoverAccordion);
        showAccordion();
      }

      function hoverAccordion(e) {
        e.preventDefault();
        resetAccordions(e);
        $(this).off('mouseenter.hoverAccordion');
        $(dl).on('mouseleave.checkAccordion', resetAccordions);

        var dt = $(this);

        triggers.removeClass('active');
        showAccordion(dt);
      }

      function showAccordion(target) {
        var speedIn   = 150,
            speedOut  = 100;

        $('.accordion').stop().animate({'opacity':0}, speedOut, function(){
          $(this).hide();
          if( target ) {
            target.addClass('active');
            $(target).next().stop().css('display','block').animate({'opacity':1}, speedIn, function(){
              //Animate the guts later on...
            });
          }
        });
      }
    },


    finalize: function() {

    }
  };

  // Hooks the component into the app
  app.registerComponent( 'accordion', COMPONENT );
} )( app );
