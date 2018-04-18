<section class="content light-bg">
  <div class="container row">
    <?php
      if( get_field( 'careers_subheadline', 'options') ) {
        echo '<h2 class="h1 superhead">' . get_field( 'careers_headline', 'options') . '</h2>';
      }
    ?>
  </div>
</section>
<?php
    $headline = get_field( 'careers_subheadline', 'options');
    $subheadline = false;
    $excerpt = get_field( 'careers_excerpt', 'options');
    $direction = 'left';
    $layout = 'split';

    include( locate_template( 'templates/partials/article-page.php' ) );
  ?>
<?php
  $args = array(
    'numberposts' => 9,
    'post_status' => 'publish',
    'post_type'   => 'career',
  );

  $articles = new WP_Query( $args );

  if( $articles->have_posts() ) :
?>
<section class="content light-bg">
  <div class="container row centered">
    <table>
      <thead>
        <tr>
          <th>Position</th>
          <th>Contract</th>
          <th>Location</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      <?php
        while ( $articles->have_posts() ) {
          $articles->the_post();
          include( locate_template('templates/partials/table.php') );
        }
      ?>
      </tbody>
    </table>
  <?php wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>