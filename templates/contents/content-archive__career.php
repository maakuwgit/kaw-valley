<?php
  $cat = get_queried_object();

  $headline = get_field( 'careers_subheadline', 'options' );
  $subheadline = false;
  $excerpt = format_text(get_field( 'careers_excerpt', 'option' ));
  $direction = 'left';
  $layout = 'split';
?>
<section class="content light-bg">
  <div class="container row">
    <?php
      if( $headline ) {
        echo '<h2 class="h1 superhead">' . get_field( 'careers_headline', 'options' ) . '</h2>';
      }
    ?>
  </div>
</section>
<?php include( locate_template( 'templates/partials/article-page.php' ) );?>
<?php
  $args = array(
    'numberposts' => get_field( 'careers_num_output', $cat ),
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