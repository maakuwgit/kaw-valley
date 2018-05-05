<?php
  $args = array(
      'post_type'     => 'location',
      'post_status'   => 'publish',
      'order'         => 'ASC',
      'showposts'     => 6
  );

  $locations = new WP_Query( $args );

  if ( $locations->have_posts() ) :
?>
<article <?php post_class('map'); ?>>
  <div id="contact_map"></div>
  <script>
      function initMap(e) {
      <?php
        $first  = true;
        $pin    = get_template_directory_uri() . '/assets/img/svg/location.svg';

        while( $locations->have_posts() ) :
          $id           = get_the_ID();
          $locations->the_post();
          $latitude     = get_field('latitude');
          $longitude    = get_field('longitude');
          $street       = get_field('location_street');
          $zip          = get_field('location_zip');
          $country      = get_field('location_country');
          $phone        = get_field('location_phone');
          $email        = get_field('location_email');
          $building     = get_field('location_building');
          $openings     = get_field('location_openings');
          $special_days = get_field('location_special_days');
          if( $longitude && $latitude ) :
            $address = get_terms('state');
            $city = $address[0]->name;
            $state = strtoupper($address[1]->slug);
            if ( $first === true ) :
      ?>
        var first_location = {lat:<?php echo $latitude;?>, lng:<?php echo $longitude;?>};
        var map = new google.maps.Map(document.getElementById('contact_map'), {
          zoom: 7,
          center: first_location,
          styles: [
              {
                  "featureType": "water",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#e9e9e9"
                      },
                      {
                          "lightness": 17
                      }
                  ]
              },
              {
                  "featureType": "landscape",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#f5f5f5"
                      },
                      {
                          "lightness": 20
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "geometry.fill",
                  "stylers": [
                      {
                          "color": "#ffffff"
                      },
                      {
                          "lightness": 17
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "geometry.stroke",
                  "stylers": [
                      {
                          "color": "#ffffff"
                      },
                      {
                          "lightness": 29
                      },
                      {
                          "weight": 0.2
                      }
                  ]
              },
              {
                  "featureType": "road.arterial",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#ffffff"
                      },
                      {
                          "lightness": 18
                      }
                  ]
              },
              {
                  "featureType": "road.local",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#ffffff"
                      },
                      {
                          "lightness": 16
                      }
                  ]
              },
              {
                  "featureType": "poi",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#f5f5f5"
                      },
                      {
                          "lightness": 21
                      }
                  ]
              },
              {
                  "featureType": "poi.park",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#dedede"
                      },
                      {
                          "lightness": 21
                      }
                  ]
              },
              {
                  "elementType": "labels.text.stroke",
                  "stylers": [
                      {
                          "visibility": "on"
                      },
                      {
                          "color": "#ffffff"
                      },
                      {
                          "lightness": 16
                      }
                  ]
              },
              {
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "saturation": 36
                      },
                      {
                          "color": "#333333"
                      },
                      {
                          "lightness": 40
                      }
                  ]
              },
              {
                  "elementType": "labels.icon",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "transit",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#f2f2f2"
                      },
                      {
                          "lightness": 19
                      }
                  ]
              },
              {
                  "featureType": "administrative",
                  "elementType": "geometry.fill",
                  "stylers": [
                      {
                          "color": "#fefefe"
                      },
                      {
                          "lightness": 20
                      }
                  ]
              },
              {
                  "featureType": "administrative",
                  "elementType": "geometry.stroke",
                  "stylers": [
                      {
                          "color": "#fefefe"
                      },
                      {
                          "lightness": 17
                      },
                      {
                          "weight": 1.2
                      }
                  ]
              }
          ]
        });
        <?php
            $first = false;
            endif;
        ?>
        var contentString<?php echo $id; ?> = '<div id="content-modal-<?php echo $id; ?>">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h6 class="firstHeading"><?php echo get_the_title(); ?></h1>'+
                '<address><?php echo $street; ?> <br><?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?></address>'+
                '<a class="block"><?php echo format_phone($phone, true);?></a>'+
                '<a class="block" href="mailto:<?php echo $email;?>"><?php echo $email;?></a>'+
                '</div>';

        var infowindow<?php echo $id; ?> = new google.maps.InfoWindow({
              content: contentString<?php echo $id; ?>
            });

        var location<?php echo $id; ?> = {lat:<?php echo $latitude;?>, lng:<?php echo $longitude;?>}

        //Mark <?php echo $id; ?>

        var marker<?php echo $id; ?> = new google.maps.Marker({
          position: location<?php echo $id; ?>,
          icon: "<?php echo $pin;?>",
          title: "<?php echo get_the_title(); ?>",
          map: map
        });

        marker<?php echo $id; ?>.addListener('click', function(e) {
          infowindow<?php echo $id; ?>.setPosition(e.latLng);
          infowindow<?php echo $id; ?>.open(map);
        });
          <?php endif; ?>
      <?php endwhile; ?>
      }

      initMap();
  </script>
</article>
<?php wp_reset_query(); ?>
<?php endif; ?>