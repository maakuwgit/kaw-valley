<?php
$headline    = get_field('page_headline');
$subheadline = get_field('page_subheadline');
$excerpt     = get_field('page_excerpt');
$layout      = get_field('page_layout');
$direction   = get_field('page_direction');

switch($layout){
  case 'split':
    $output = '<div class="col-xxl-6of12 col-xl-6of12 col-lg-8of12 col-md-8of12">';
    if( $headline ) {
      $output .= '<h3>' . $headline .'</h3>';
      $output .= '</div>';
      $output .= '<div class="col-xxl-6of12 col-xl-6of12 col-lg-4of12 col-md-4of12">';
    }
    if( $subheadline ) {
      $output .= '<h4>' . $subheadline .'</h4>';
    }
    if( $excerpt ) {
      $output .= $excerpt;
    }
    $output .= '</div>';
  break;
  case 'full':
    if( $headline ) $output .= '<h3>' . $headline .'</h3>';
    if( $subheadline ) $output .= '<h4>' . $subheadline .'</h4>';
    if( $excerpt ) $output .= $excerpt;
  break;
  default:
  break;
}

if( $headline || $subheadline || $excerpt ) :
?>
<article class="content">
  <div class="container row">
    <?php echo $output; ?>
  </div>
</article>
<?php endif; ?>