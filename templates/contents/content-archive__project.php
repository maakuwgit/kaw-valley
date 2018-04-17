<section class="content">
  <div class="container row centered">
<?php
  $args = array(
    'numberposts' => 9,
    'post_status' => 'publish',
    'post_type'   => 'project',
  );

  $articles = new WP_Query( $args );

  while ( $articles->have_posts() ) {
    $articles->the_post();
    include( locate_template('templates/partials/band.php') );
  }

  wp_reset_postdata();
?>
  </div>
</section>