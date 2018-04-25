<?php
/* Dev Note: should move this to "contents" because it's markup? */
if ( $headline === null ) $headline       = get_field( 'page_headline' );
if ( $subheadline === null ) $subheadline = get_field( 'page_subheadline');
if ( !$excerpt ) $excerpt         = get_field( 'page_excerpt' );
if ( !$layout ) $layout           = get_field( 'page_layout' );
if ( !$theme ) $theme             = ( get_field( 'page_theme' ) ? get_field( 'page_theme' ) : 'light' );
if ( !$direction ) $direction     = get_field( 'page_direction' );
$template = get_page_template_slug();

switch($layout){
  case 'split':
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
  break;
  case 'full':
    if( $headline ) $output .= '<h3>' . $headline .'</h3>';

    if( $template === 'templates/template-home.php' ) {
      $output .= '<div class="col-xxl6of12 col-xl-8of12 col-lg-8of12 col-md-8of12">';
      $output .= '<img alt="" src="' . get_template_directory_uri() . '/assets/img/icons-triangles.svg">';
      $output .= '</div>';
      if( $subheadline || $excerpt ) $output .= '<div class="col-xxl-6of12 col-xl-4of12 col-lg-4of12 col-md-4of12">';
      if( $subheadline ) $output .= '<h4>' . $subheadline .'</h4>';
      if( $excerpt ) $output .= $excerpt;
      if( $subheadline || $excerpt ) $output .= '</div>';
    }else{
      if( $subheadline ) $output .= '<h4>' . $subheadline .'</h4>';
      if( $excerpt ) $output .= $excerpt;
    }
  break;
  default:
  break;
}

if( $headline || $subheadline || $excerpt ) :
?>
<article class="content <?php echo $theme . '-bg';?>">
  <div class="container row">
    <?php echo $output; ?>
  </div>
</article>
<?php endif; ?>