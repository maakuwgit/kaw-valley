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
      //Media Query (match the _variables.scss breakpoints)
      breakpoints = {};
      breakpoints.xxs = 399;
      breakpoints.xs  = 479;
      breakpoints.sm  = 767;
      breakpoints.md  = 991;
      breakpoints.lg  = 1199;
      breakpoints.xl  = 1599;


      var adminHeight = ( $('#wpadminbar').length > 0 ? $('#wpadminbar').outerHeight() : 0 ),
          anchor_nav  = '.anchor_nav',
          hero        = '.hero-banner',
          primary_nav = 'body > header',
          footer      = 'body > footer',
          prefooter   = 'body > .callout',
          sections    = $('.home .main > article, .home .main > section, body > article, body > section');

      window.userLoggedIn = false;
      window.adminBarHeight = 0;

      if ( $('#wpadminbar').length > 0 ) {
        window.userLoggedIn = true;
        window.adminBarHeight = '32px';
      }

      /**
       * IF your navbar is fixed
       * use this function
       */
      function checkAdminBar() {
         if ( window.userLoggedIn ) {
           $('header.navbar').css('top', window.adminBarHeight);
         }
      }

      //checkAdminBar();

      $(function() {
        function enterSection(e) {
          var target = $(e.target.triggerElement()),
              id     = target.attr('id');

          target.addClass('enter');
          if( id ) {
            //app.components['section-nav'].setActive(id);
          }
        }

        function leaveSection(e) {
          var target = $(e.target.triggerElement()),
              id     = target.attr('id');

          target.removeClass('enter');
          if( id ) {
            //app.components['section-nav'].setActive(id);
          }
        }
        //If theres a controller for ScrollMagic, spool it up!
        if( typeof ScrollMagic !== 'undefined' ) {
          var controller  = new ScrollMagic.Controller(),
              offset      = 0;

          if ( $(hero) ) {
            offset = ( $(hero).height() - $(primary_nav).height() ) * 2;

            //Adding styles to the anchor nav and pinning
            if( $(anchor_nav) ) {
              var anchor_navs_pin = new ScrollMagic.Scene({
                triggerElement: hero,
                triggerHook: 'onStart',
                offset: offset
              })
              .setClassToggle(anchor_nav,'top')
              .addTo(controller);
            }

            //Adding styles to the primary nav and pinning
            if( $(primary_nav) ) {
              var primary_pin = new ScrollMagic.Scene({
                triggerElement: hero,
                offset: offset
              })
              .setClassToggle(primary_nav,'top')
              .addTo(controller);
            }

            //Animate the Prefooter elements
            if( $(prefooter) ) {
              var prefooter_anim = new ScrollMagic.Scene({
                triggerElement: prefooter,
                offset: -1 * $(prefooter).height()/2
              })
              .setClassToggle(prefooter,'enter')
              .addTo(controller);
            }

            //Animate the Sections in a general fashion
            if ( $(sections) ) {
              for( s = 0; s < sections.length; s++ ) {
                section = sections[s];

                offset = -1.334 * $(section).height();

                var section_animate = new ScrollMagic.Scene({
                  triggerElement: section,
                  offset: offset
                })
                .on("enter", enterSection)
                .on("leave", leaveSection)
                .addTo(controller);
              }
            }
          }
        }

        $('a[href*="#"]:not(.js-no-scroll):not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            var wpadminBarHeight = 0;
            if ( $('#wpadminbar').length > 0 ) {
              wpadminBarHeight = $('#wpadminbar').outerHeight();
            }
            var headerHeight = $('header.navbar').outerHeight();
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').animate({
                scrollTop: target.offset().top - ( headerHeight + wpadminBarHeight )
              }, 1000);
              return false;
            }
          }
        });

        //Animate everything with this one class
        $('body').addClass('loaded');
        var setAnimated = setTimeout(function(){
          $('body').addClass('animated');
        }, 2000);
      });

      // JavaScript to be fired on all pages
      function clickthrough(e) {
        var target = $(this).find('a:first-of-type');
        e.preventDefault();
        document.location.href = target.attr('href');
      }

      // Converts a thumbnail into a link by reading the first link and using that
      $('[data-clickthrough]').each(function(args){
        var target = $(this).find('a:first-of-type');
        if( target ) {
          $(this).on('click.clickthrough', clickthrough);
        }
      });

      //Reads the "featured" image (class based) and sets the target background to whatever image is dynamically loaded then animates it in.
      $('[data-background]').each(function(args){
        var feat    = $(this).find('.feature');
        var target  = feat;//See if there's a featured image here, if not, just use the parent
        if(feat.length <= 0) {
          target = $(this);
        }

        var img     = false;

        if(feat.length > 0) {
          img = $(feat).find('img');
        }else{
          img = $(this).find('img');
        }

        if(img.length > 0) {
          var src = $(img).attr('src');

          if($(img).attr('data-src-xlarge') && size === 'xlarge') {
            src = $(img).attr('data-src-xlarge');
          }
          if($(img).attr('data-src-large') && size === 'large') {
            src = $(img).attr('data-src-large');
          }
          if($(img).attr('data-src-medium') && size === 'medium') {
            src = $(img).attr('data-src-medium');
          }
          if($(this).attr('style')){
              if(feat.length > 0) {
                $(feat).css('background-color',$(this).css('background-color'));
                $(feat).delay(300).fadeOut(300);
              }
              $(this).css({'background-image': 'url('+src+')'});
          }else{
            $(this).css({'background-image':'url('+src+')', 'background-color':$(this).css('background-color')});
            if(feat.length > 0) {
              $(feat).delay(300).fadeOut(300);
            }
          }
        }
      });

      //Basic Collapse toggle for dropdowns and toggle menus
      $('[data-toggle="collapse"]').on('click', function(e) {
        e.preventDefault();
        //if target element is not open already
        //find all open collapse elements and close them
        if ( !$(this).is('.collapsed') ) {
          if ( $('.collapsed[data-toggle="collapse"]').length > 0 ) {
            $('.collapsed[data-toggle="collapse"]').each(function(){
              $(this).trigger('click');
            });
          }
        }
        var target = $(this).data('target');
        $(this).toggleClass('collapsed');
        $(target).toggleClass('collapsed');
      });

      /*
       * Collapse specificially for the nav. Utilizes .slideToggle()
       * for sliding animation for a more "out of the box" nice looking
       * mobile animation. Can easily be removed or altered for
       * more specific funcitonality.
       */
      $('[data-nav="collapse"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $(this).toggleClass('open');
        // $(target).toggleClass('collapsed');
        if( $(target).hasClass('active') ) {
          $(target).animate({'height': 0}, 150, function(){
            $(target).removeClass('active').removeAttr('style');
            $('body').removeClass('locked');
          });
        }else{
          $('body').addClass('locked');
          $(target).animate({'height': '100vh'}, 300, function(){
            $(target).addClass('active').removeAttr('style');
          });
        }
      });

      $(document).click(function(e) {
          //close all [data-toggle="collapse"] elements if
          //target doesn't have any data attributes defined or
          //if the target is does not have a data-toggle and
          //it does not have a data-content and
          //then make sure that the target is not a child of data-content="collapse"
          if (
            ( $(e.target).data('toggle') === undefined || $(e.target).data('toggle') === false ) &&
            ( $(e.target).data('content') === undefined || $(e.target).data('content') ===  false ) &&
            !$(e.target).parents( '[data-content="collapse"]' ).length
            ) {
            $('.collapsed[data-toggle="collapse"]').each(function(e){
              $(this).trigger('click');
            });
        }
      });

      /*
       * Address Autocompletes
       */

      if ( typeof google !== "undefined" && google.maps.places ) {

        // Organizes Info
        var componentForm = {
          street_number: 'short_name',
          route: 'long_name',
          locality: 'long_name',
          administrative_area_level_1: 'short_name',
          country: 'long_name',
          postal_code: 'short_name'
        };

        /*
          Gravity Forms
         */

        if ( $('div.ginput_container_address').length > 0 ) {
          var gformAddressAutocomplete = new google.maps.places.Autocomplete($("span.address_line_1 input")[0], {});

          google.maps.event.addListener(gformAddressAutocomplete, 'place_changed', function() {
            var place = gformAddressAutocomplete.getPlace();
            var street_address = '';

            for (var i = 0; i < place.address_components.length; i++) {
              var addressType = place.address_components[i].types[0];
              if ( componentForm[addressType] ) {
                var val = place.address_components[i][componentForm[addressType]];

                if ( addressType === 'street_number' || addressType === 'route' ) {
                  street_address += val + ' ';
                  $("span.address_line_1 input").val(street_address);
                } else if ( addressType === 'locality' ) {
                  $("span.address_city input").val(val);
                } else if ( addressType === 'administrative_area_level_1' ) {
                  $("span.address_state input").val(val);
                } else if ( addressType === 'postal_code' ) {
                  $("span.address_zip input").val(val);
                } else if ( addressType === 'country' ) {
                  $("span.address_country select").val(val).trigger('change');
                }
              }
            }
          });
        }

      } // --end Address Autocomplete

    },


    finalize: function() {

    }
  };

  app.registerComponent( 'common', COMPONENT );
} )( app );
