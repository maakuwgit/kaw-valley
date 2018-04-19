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
  'band_columns'     => array(
    array(
      'band_bg'      => array(),
      'band_theme'   => 'dark',
      'band_colspan' => '4',
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
if( $args['classes'] || $data['theme'] ) {
  $css = ' class="ll-accordion ';
  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  if( $data['theme'] && $args['classes'] ) $css .= ' ';
  if( $data['theme'] ) $css .= $data['theme'] . '-bg';
  $css .= '"';
}
$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');
?>
<section<?php echo $id . $css; ?>>
  <div class="container row">
<?php if( $data['band_columns'] ) : ?>
<?php
  foreach( $data['band_columns'] as $band ) :
?>
    <div class="col-lg-<?php echo $band['band_colspan'];?>of12"><?php echo $band['band_content']; ?></div>
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
