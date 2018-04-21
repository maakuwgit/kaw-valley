<?php
/**
* Band
* -----------------------------------------------------------------------------
*
* Band component
* @since 1.1
* @author MaakuW
*/
global $post;

/**
 * Default component data.
 *
 * @var array
 * @see data[]
 */

$default_data = [
  'has_background' => false,
  'band_bg'        => array(),
  'band_theme'     => 'dark',
  'band_align'     => 'flex-start',
  'band_columns'   => array(
    array(
      'band_colspan' => '3',
      'band_content' => '<h5>Lorem ipsum</h5><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
    )
  )
];

$default_args = [
  'classes' => array(),
  'id'      => uniqid('band-')
];

$data = ll_parse_args( $component_data, $default_data );
$args = ll_parse_args( $component_args, $default_args );

/**
 * component_name_before_display hook
 * Type: Action
 */
do_action( "component_name_before_display", $component_data, $component_args );
?>

<?php
if ( ll_empty( $data ) ) return;

$theme = $data['band_theme'];
$background_image = $data['band_bg'];

if( $args['classes'] || $data['band_theme'] ) {
  $css = ' class="band ';

  if ( $background_image ) $css .= 'has-image ';
  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  if( $theme && $args['classes'] ) $css .= ' ';
  if( $theme ) $css .= $theme . '-bg';
  if( $data['has_background'] ) {
    $css .=  ' '. $theme;
  }

  $css .= '"';
}
$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');
$align = ( $data['band_align'] === null ? '' : $data['band_align'] . ' ' );

//image is image object
if ( $background_image ) {
 $style = ' style="background-image: url( '. $background_image['url'] .' );"';
} else {
 $style = '';
}
?>
<section<?php echo $id . $css . $style; ?>>
  <div class="container row">
<?php if( $data['band_columns'] ) : ?>
<?php
  foreach( $data['band_columns'] as $band ) :
    $col_span = $band['band_colspan'];
    $col_suff = 'of12';
    /*Dev Note: this logic is still very... loose*/
    $col_md = 'col-md-' . ( $col_span < 6 ? 6 : floor( $col_span / 2 ) ) . $col_suff;
    $col_lg = 'col-lg-' . $col_span . $col_suff;
    $col_xl = 'col-xl-' . $col_span . $col_suff;
    $col_class = ' class="' . $align . $col_md . ' ' . $col_lg . ' ' . $col_xl . '"';
?>
    <div<?php echo $col_class; ?>><?php echo $band['band_content']; ?></div>
<?php
  endforeach;
?>
  </div>
<?php endif; ?>
</section>

<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
