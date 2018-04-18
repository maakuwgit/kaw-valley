<?php
/**
* Accordion
* -----------------------------------------------------------------------------
*
* Accordion component
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
  array(
    'accordion_element'       => array(
        array(
        'accordion_icon'        => 'orange',
        'accordion_bg'          => array(),
        'accordion_headline'    => 'Lorem ipsum',
        'accordion_content'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'accordion_sidebar'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      )
    )
  )
];

$default_args = [
  'classes' => array(),
  'theme'     => 'dark',
  'id' => uniqid('accordion-')
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
  $css = ' class="';
  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  if( $args['theme'] && $args['classes'] ) $css .= ' ';
  if( $args['theme'] ) $css .= $args['theme'] . '-bg';
  $css .= '"';
}
$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');

?>

<section<?php echo $id . $css; ?> data-component="accordion">
  <dl class="container row">
<?php if( $data[0]['accordion_element'] ) : ?>
<?php
  $aID = 1;
  foreach( $data[0]['accordion_element'] as $accordion ) :
?>
    <dt class="accordion--trigger"><?php echo $accordion['accordion_headline']; ?></dt>
    <dd class="accordion">
      <div class="row">
        <aside class="accordion--sidebar">
          <?php echo $accordion['accordion_sidebar']; ?>
          <a class="accordion--id" name="<?php echo 'accordion--id-' . $aID; ?>">0<?php echo $aID; ?></a>
        </aside>
        <article class="accordion--content">
          <div>
          <h4><?php echo $accordion['accordion_headline']; ?></h4>
          <?php echo $accordion['accordion_content']; ?>
        </article>
      </div>
    </dd>
<?php
  $aID++;
  endforeach;
?>
  </dl>
<?php endif; ?>
</section>

<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
