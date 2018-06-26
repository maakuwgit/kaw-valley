<?php

$css = $address  = '';

//Generic Info
$headline         = get_field( 'page_headline' );
$subheadline      = get_field( 'page_subheadline');
$excerpt          = get_field( 'page_excerpt' );
$theme            = ( get_field( 'page_theme' ) ? get_field( 'page_theme' ) : 'light' );
$topography_color = get_field('topography_color');

//Specialized Info
$street           = get_field( 'location_street' );
$state            = get_the_terms(get_the_ID(), 'state');
$title            = get_the_title();

if( $state ) $address = $title . ',&nbsp;' . strtoupper($state[0]->slug);

$phone            = get_field( 'location_phone' );
$zip              = get_field( 'location_zip' );
$country          = get_field( 'location_country' );
$contact          = get_field( 'location_email' );
$director         = get_field( 'location_office_director' );

//Assuming there IS content, let's show this module
if( $headline || $subheadline || $excerpt ) :

if( $topography_color ) {
  if ( $topography_color !== 'default' ) {
    $css .= ' ' . $topography_color . '-bg';
  }
}

?>
<article class="content<?php echo $css;?>">

  <div class="container row">

    <div class="col col-xxl-6of12 col-xl-8of12 col-lg-8of12 col-md-8of12">

    <?php if( $headline ) : ?>
      <h3><?php echo $headline; ?></h3>
    <?php endif; ?>

      <div class="article-location__details">

        <h4 class="h5 article-location__details__headline">Location</h4>
        <!-- .article-location__details__address -->

        <address class="article-location__details__address">
          <?php echo $street; ?><br>
          <?php echo $address; ?>
          <?php echo $zip; ?><br>
          <a class="block" href="tel+1<?php echo $phone; ?>"><?php echo '+' . format_phone($phone, false, '.'); ?></a>
          <a class="block" href="mailto:<?php echo $contact; ?>"><?php echo $contact; ?></a>
        </address>
        <!-- .article-location__details__addresss -->

        <div class="article-location__details__hours">
          <?php if( have_rows( 'location_openings' ) ) : ?>
            <?php while( have_rows( 'location_openings' )  ) : the_row(); ?>
              <?php
                $days = get_sub_field('location_days');
                $from = get_sub_field('location_from');
                $to   = get_sub_field('location_to');

                if( $days ) {
                  $days = implode($days, ', ');
                }
              ?>
              <h4 class="h5 article-location__details__headline">Hours</h4>
              <?php echo format_text( $days . ' ' . $from . ' - ' . $to ); ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <!-- .article-location__details__hours -->

      </div>
        <!-- .article-location__details -->

    </div>
    <!-- .col -->

    <div class="col col-xxl-6of12 col-xl-4of12 col-lg-4of12 col-md-4of12">

    <?php if( $subheadline ) : ?>
      <h4><?php echo $subheadline; ?></h4>
    <?php endif; ?>

    <?php if( $excerpt ) : ?>
      <?php echo $excerpt; ?>
    <?php endif; ?>

    </div>
    <!-- .col -->

  </div>
  <!-- .container.row -->

</article>
<?php endif; ?>