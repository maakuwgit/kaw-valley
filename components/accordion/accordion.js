/**
* callout JS
* -----------------------------------------------------------------------------
*
* All the JS for the accordion component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'accordion',

    selector : function() {
      return '.' + this.className;
    },

    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      var _this     = this,
          accordion = $('[data-component="accordion"]'),
          triggers  = $( accordion ).find('.accordion--trigger');

      $(window).on('resize.refactorAccordions', refactorAccordions );
      refactorAccordions();

      function refactorAccordions(e) {
        if( $(window).outerWidth() > breakpoints.lg ) {
          $(accordion).find('.accordion').css({'display':'none', 'opacity':0});
          $(accordion).on('mouseleave.checkAccordion', resetAccordions);
          triggers.on('mouseenter.hoverAccordion', hoverAccordion);
        }else{
          $(accordion).find('.accordion').css({'display':'block', 'opacity':1});
          $(accordion).off('mouseleave.checkAccordion');
          triggers.off('mouseenter.hoverAccordion');
        }
      }

      function resetAccordions(e) {
        triggers.removeClass('active').off('mouseenter.hoverAccordion').on('mouseenter.hoverAccordion', hoverAccordion);
        showAccordion();
      }

      function hoverAccordion(e) {
        console.log('run!');
        e.preventDefault();
        resetAccordions(e);
        $(this).off('mouseenter.hoverAccordion');
        $(accordion).on('mouseleave.checkAccordion', resetAccordions);

        var trigger = $(this);

        triggers.removeClass('active');
        showAccordion(trigger);
      }

      function showAccordion(target) {
        var speedIn   = 150,
            speedOut  = 100;

        $(accordion).find('.accordion').stop().animate({'opacity':0}, speedOut, function(){
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
