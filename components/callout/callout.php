<?php
/**
* callout
* -----------------------------------------------------------------------------
*
* callout component
* @since 1.0.0
* @author First Last
*/
global $post;

/**
 * Default component data.
 *
 * @var array
 * @see data[]
 */
$default_data = [
  'theme'     => 'light',
  'headline'  => "Let's Work Together.",
  'link'      => array(
    'label'   => 'Start a project',
    'title'   => 'Lorem ipsum',
    'href'    => '/'
  )
];

$default_args = [
  'classes' => array(),
  'id' => uniqid('callout-')
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

$has_prefooter = get_field('has_prefooter', $post->ID);
if ( ll_empty( $data ) || !$has_prefooter || $has_prefooter === null ) return;
if( $args['classes'] || $data['theme'] ) {
  $css = ' class="';
  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  if( $data['theme'] && $args['classes'] ) $css .= ' ';
  if( $data['theme'] ) $css .= $data['theme'] . '-bg';
  $css .= '"';
}
$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');
?>
<aside<?php echo $id . $css; ?>>
  <div class="container row">
    <h3 class="hero"><?php echo $data['headline']; ?></h3>
    <nav>
      <a
  class="button"
  title="<?php echo $data['link']['title']; ?>"
  href="<?php echo $data['link']['href'] ?>"
  data-component="callout"><?php echo $data['link']['label']; ?></a>
    </nav>
  </div>
</aside>

<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
