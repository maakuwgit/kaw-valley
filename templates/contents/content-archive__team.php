<?php
  $args = array(
    'numberposts' => 12,
    'post_status' => 'publish',
    'post_type'   => 'team',
  );

  $members = new WP_Query( $args );

  if( $members->have_posts() ) :
?>
<section class="content light-bg">
  <div class="container row centered">
  <?php
    while ( $members->have_posts() ) {
      $members->the_post();
      include( locate_template('templates/partials/member.php') );
    }
    wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>