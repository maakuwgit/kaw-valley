<?php
/**
* Anchor Navigation
* -----------------------------------------------------------------------------
*
* Band component
* @since 1.0.0
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
  array(
    'anchor_btn_label'  => 'flex-start',
    'anchor_btn_target' => '#'
  )
];

$default_args = [
  'classes' => array(),
  'id'      => uniqid('anchor_nav-')
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

if( $args['classes'] ) {
  $css = ' class="';

  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  $css .= '"';

}
$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');

?>
<nav<?php echo $id . $css;?> data-component="anchor_nav">
  <ol class="container row no-bullet">
  <?php foreach( $data as $btn ) : ?>
    <li>
      <a href="<?php echo $btn['anchor_btn_target'];?>">
        <span class="iblock"><?php echo $btn['anchor_btn_label'];?></span>
      </a>
    </li>
<?php endforeach; ?>
  </ol>
</nav>

<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
