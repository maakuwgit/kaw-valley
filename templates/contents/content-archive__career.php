<?php
  $cat = get_queried_object();

  $output      = '';
  $theme       = ( get_field( 'page_theme' ) ? get_field( 'page_theme' ) : 'light' );

  $template = get_page_template_slug();

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
<?php
  $output = '<div class="col-xxl-6of12 col-xl-8of12 col-lg-8of12 col-md-8of12">';
  if( $headline ) {
    $output .= '<h3>' . $headline .'</h3>';
    $output .= '</div>';
    $output .= '<div class="col-xxl-6of12 col-xl-4of12 col-lg-4of12 col-md-4of12">';
  }
  if( $subheadline ) {
    $output .= '<h4>' . $subheadline .'</h4>';
  }
  if( $excerpt ) {
    $output .= $excerpt;
  }
  $output .= '</div>';

if( $headline ) :
?>
<article class="content <?php echo $theme . '-bg';?>">
  <div class="container row">
    <?php echo $output; ?>
  </div>
</article>
<?php endif; ?>
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