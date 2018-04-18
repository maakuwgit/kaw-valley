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
  'theme'     => 'dark',
  'acc'       => array(
    'icon'        => 'orange',
    'bg'   => get_template_directory_uri() . '/assets/img/background-header--home.svg',
    'headline'    => 'Lorem ipsum',
    'content'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'sidebar'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
  )
];

$default_args = [
  'classes' => array(),
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
  if( $data['theme'] && $args['classes'] ) $css .= ' ';
  if( $data['theme'] ) $css .= $data['theme'] . '-bg';
  $css .= '"';
}
$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');
?>

<section<?php echo $id . $css; ?> data-component="accordion">
  <dl class="container row">
<?php if( $data['acc'] ) : ?>
  <?php foreach( $data['acc'] as $accordion ) : ?>
    <dt class="h4 col-md-4of12 col-lg-3of12 col-xl-3of12 col-xxl-3of12"><?php echo $accordion->headline; ?></dt>
    <dd class="col-md-4of12 col-lg-3of12 col-xl-3of12 col-xxl-3of12">
      <div class="row">
        <div class="accordion--sidebar">
          <?php echo $accordion->sidebar; ?>
        </div>
        <div class="accordion--content">
          <?php echo $accordion->content; ?>
        </div>
      </div>
    </dd>
  <?php endforeach; ?>
  </dl>
<?php endif; ?>
</section>

<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
