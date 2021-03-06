<?php
/**
* button
* -----------------------------------------------------------------------------
*
* button component
* @since 1.2
* @author First Last
*/

/**
 * Default component data.
 *
 * @var array
 * @see data[]
 */
$default_data = [
  'text' => 'Learn More',
  'link' => array(
    'title' => 'Learn More',
    'href'  => '/'
  )
];

$default_args = [
  'id' => uniqid('button-'),
  'classes' => array()
];

$data = ll_parse_args( $component_data, $default_data );
$args = ll_parse_args( $component_args, $default_args );

/**
 * component_name_before_display hook
 * Type: Action
 */
do_action( "component_name_before_display", $component_data, $component_args );
?>

<?php if ( ll_empty( $data ) ) return; ?>

<a
  class="button <?php echo implode( " ", $args['classes'] ); ?>"
  title="<?php echo $data['link']['title']; ?>"
  href="<?php echo $data['link']['href'] ?>"
  <?php echo $args['id'] ? 'id="' . $args['id'] . '"' : ''; ?>
  data-component="button"
>
  <?php echo $data['text']; ?>
</a>

<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
