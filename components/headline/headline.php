<?php
/**
* headline
* -----------------------------------------------------------------------------
*
* headline component
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
  'generic_headline_theme'      => 'dark',
  'generic_headline_layout'     => 'left',
  'generic_headline_position'   => 'above',
  'generic_headline_direction'  => 'ltr',
  'has_background'              => false,
  'generic_section_bg'          => array(),
  'generic_headline_text'       => "Lorem Ipsum."
];

$default_args = [
  'classes' => array(),
  'id' => uniqid('headline-')
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
$css = ' class="headline ';
$layout = $data['generic_headline_layout'];
$direction = $data['generic_headline_direction'];
$position = $data['generic_headline_position'];

if ( ll_empty( $data ) || !$has_prefooter || $has_prefooter === null ) return;
if( $args['classes'] || $data['generic_headline_theme'] ) {
  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  if( $data['generic_headline_theme'] && $args['classes'] ) $css .= ' ';
  if( $data['generic_headline_theme'] ) $css .= $data['generic_headline_theme'] . '-bg';
  if( $layout ) $css .= ' ' . $layout;
}
$css .= '"';
$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');
?>
<section<?php echo $id . $css; ?>>
  <div class="container row">
    <h3 class="hero text-med <?php echo $direction; ?>"><?php echo $data['generic_headline_text']; ?></h3>
  </div>
</section>
<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
