<?php
/**
* Hero Banner
* -----------------------------------------------------------------------------
*
* Hero Banner component
*/

$defaults = [
  'main_text' => array(
    'text' => null,
    'tag'  => 'h2'
  ),
  'sub_text' => array(
    'text' => null,
    'tag'  => 'p',
  ),
  'call_to_action' => null,
  'show_icons' => true,
  'icon_markup' => '<img alt="" src="' . get_template_directory_uri() . '/assets/img/icons-triangles.svg' . '">',
  'background_image'   => null,
  'spotlight_strength'  => 0.8,
  'loop_video'    => null,
  'popup_video'   => null
];

$component_data = ll_parse_args( $component_data, $defaults );

$main_text        = ( $component_data['main_text'] === null ? $defaults['main_text'] : $component_data['main_text'] );
$sub_text         = ( $component_data['sub_text'] === null ? $defaults['sub_text'] : $component_data['sub_text'] );
$call_to_action   = $component_data['call_to_action'];
$show_icons       = ( $component_data['show_icons'] === null ? $defaults['show_icons'] : $component_data['show_icons'] );
$background_image = $component_data['background_image'];
$overlay_strength = ( $component_data['spotlight_strength'] === null ? $defaults['spotlight_strength'] : $component_data['spotlight_strength'] );
$loop_video       = $component_data['loop_video'];
$popup_video      = $component_data['popup_video'];

$icon_markup = ( $component_data['icon_markup'] === null ? $defaults['icon_markup'] : $component_data['icon_markup'] );

$overlay_strength = ' style="opacity:' . $overlay_strength . ';"';
?>

<?php
/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes        = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$component_id   = $component_args['id'];

//image is image object
if ( $background_image ) {
  $classes[] = 'has-image';
 $style            = 'style="background-image: url( '.$background_image[0].' );"';
} else {
 $style            = '';
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<figure class="hero-banner <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="hero-banner" <?php echo $style; ?>>
  <div id="hero-spotlight">
    <svg <?php echo $overlay_strength;?> width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <defs>
        <radialGradient cx="63.1500244%" cy="62.1083984%" fx="63.1500244%" fy="62.1083984%" r="57.4003906%" gradientTransform="translate(0.631500,0.621084),scale(0.625000,1.000000),rotate(90.000000),scale(1.000000,1.006260),translate(-0.631500,-0.621084)" id="radialGradient-1">
            <stop stop-color="#000000" stop-opacity="0" offset="0%"></stop>
            <stop stop-color="#000000" offset="100%"></stop>
        </radialGradient>
      </defs>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.955242301">
        <g fill="url(#radialGradient-1)">
          <rect id="hero-spotlight__rect" x="0" y="0" width="100%" height="100%"></rect>
        </g>
      </g>
    </svg>
  </div>
  <?php if ( $loop_video ) : ?>
    <?php
      ll_include_component(
        'loop-video',
        array(
          'video' => $loop_video,
          'fallback' => $background_image[0]
        )
      );
    ?>
  <?php endif; ?>
  <figcaption class="container row">
    <?php if ( $show_icons ) : ?>
      <div class="col-6of12 relative">
        <?php echo $icon_markup; ?>
      </div>
    <?php endif; ?>
    <?php if ( $show_icons ) : ?>
      <div class="col-6of12">
    <?php endif; ?>
    <?php if ( $main_text['text'] ) : ?>
      <<?php echo $main_text['tag'] ?> class="hero"><?php echo $main_text['text']; ?></<?php echo $main_text['tag']; ?>>
    <?php endif; ?>

    <?php if ( $sub_text['text'] ) : ?>
      <<?php echo $sub_text['tag'] ?> class="h1"><?php echo $sub_text['text']; ?></<?php echo $sub_text['tag']; ?>>
    <?php endif; ?>
    <?php if ( $show_icons ) : ?>
      </div>
    <?php endif; ?>
  </figcaption>
  <?php if ( $call_to_action ) : ?>
    <a class="button" href="<?php echo $call_to_action['url']; ?>" target="<?php echo $call_to_action['target']; ?>"><?php echo $call_to_action['title']; ?></a>
  <?php endif; ?>
  <?php if ( $popup_video ) : ?>
    <a class="play-video-button js-init-video" href="<?php echo $popup_video; ?>">
      <svg width="25px" height="31px" viewBox="0 0 25 31" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-703.000000, -740.000000)" stroke="#FFFFFF">
            <g>
              <g transform="translate(703.000000, 741.000000)">
                <g>
                  <polygon id="inner-triangle" fill="#FFFFFF" transform="translate(8.000000, 10.000000) rotate(-90.000000) translate(-8.000000, -10.000000) " points="7.99992306 17.3636364 17 2.63636364 -1 2.63636364"></polygon>
                  <polygon transform="translate(12.500000, 14.500000) rotate(-90.000000) translate(-12.500000, -14.500000) " points="12.499876 26.3636364 27 2.63636364 -2 2.63636364"></polygon>
                </g>
              </g>
            </g>
          </g>
        </g>
      </svg>
      <span>Watch Video</span>
    </a>
  <?php endif; ?>
</figure>