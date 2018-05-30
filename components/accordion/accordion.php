<?php
/**
* Accordion
* -----------------------------------------------------------------------------
*
* Accordion component
* @since 1.4
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
  'accordion_service'       => false,
  'accordion_background'    => array(),
  'accordion_theme'         => 'dark',
  'accordion_wrapper'       => array(
    array(
      'accordion_element' => array(
        array(
          'accordion_bg'          => array(),
          'accordion_content'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'accordion_sidebar'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        )
      )
    )
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
if( $args['classes'] || $data['accordion_theme'] ) {
  $css = ' class="accordion ';
  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  if( $data['accordion_theme'] && $args['classes'] ) $css .= ' ';
  if( $data['accordion_theme'] ) $css .= $data['accordion_theme'] . '-bg';
  $css .= '"';
}
if ( $data['accordion_background'] ) {
  $acc_bg = $data['accordion_background'];
  if( $acc_bg ) $acc_bg = ' style="background-image: url(' . $acc_bg['url'] . ')"';
}else{
  $acc_bg = '';
}

$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');
$accordions = $data['accordion_wrapper'][0]['accordion_element'];
?>
<section<?php echo $id . $css; ?> data-component="accordion"<?php echo $acc_bg; ?>>
  <dl class="container row">
<?php if( $accordions ) : ?>
<?php
  $aID = 1;
  foreach( $accordions as $accordion ) :
    $bg   = $accordion['accordion_bg'];
    $sbg  = $accordion['accordion_sidebar_bg'];
    $service    = $accordion['accordion_service'];
    $icon_color = get_field('triangle_color', $service);
?>
    <dt class="accordion--trigger" data-clickthrough data-background>
      <figure class="feature">
        <?php echo ll_get_triangle($icon_color); ?>
      </figure>
      <div>
        <?php echo $service->post_title; ?>
        <a class="hidden" href="<?php echo $service->guid; ?>"></a>
      </div>
    </dt>
    <dd class="accordion" data-background>
      <div class="accordion--spotlight">
        <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <defs>
            <radialGradient cx="63.1500244%" cy="62.1083984%" fx="63.1500244%" fy="62.1083984%" r="57.4003906%" gradientTransform="translate(0.631500,0.621084),scale(0.625000,1.000000),rotate(90.000000),scale(1.000000,1.006260),translate(-0.631500,-0.621084)" id="radialGradient-1">
                <stop stop-color="#000000" stop-opacity="0" offset="0%"></stop>
                <stop stop-color="#000000" offset="100%"></stop>
            </radialGradient>
          </defs>
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g fill="url(#radialGradient-1)">
              <rect x="0" y="0" width="100%" height="100%"></rect>
            </g>
          </g>
        </svg>
      </div>
      <figure class="feature">
        <?php echo ll_format_image($bg); ?>
      </figure>
      <div class="row">
        <aside class="accordion--sidebar flex" data-background>
          <figure class="feature">
            <?php echo ll_format_image($sbg); ?>
          </figure>
          <?php echo ll_get_triangle($icon_color, 'triangle'); ?>
          <?php echo $accordion['accordion_sidebar']; ?>
          <a class="accordion--id" name="<?php echo 'accordion--id-' . $aID; ?>">0<?php echo $aID; ?></a>
        </aside>
        <article class="accordion--content">
          <div>
          <h4><?php echo $service->post_title; ?></h4>
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
