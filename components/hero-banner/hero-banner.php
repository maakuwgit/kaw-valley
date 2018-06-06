<?php
/**
* Hero Banner
* -----------------------------------------------------------------------------
*
* Hero Banner component
*/

$default_data = [
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

$default_args = [
  'id' => uniqid('hero-banner-'),
  'classes' => array()
];

$data = ll_parse_args( $component_data, $default_data );
$args = ll_parse_args( $component_args, $default_args );

$main_text  = $data['main_text']['text'];
$main_tag   = $data['main_text']['tag'];
$sub_text   = $data['sub_text']['text'];
$sub_tag    = $data['sub_text']['tag'];

$background_image = $data['background_image'];

//image is image object
if ( $background_image ) {
  $classes[] = 'has-image';
  $bg = ( $background_image[0] ? $background_image[0] : 'http://via.placeholder.com/1600x1280' );
  $style = 'style="background-image: url( '. $bg .' );"';
} else {
 $style = '';
}

$spotlight = ' data-spotlight="'.$data['spotlight_strength'].'" style="opacity:'.$data['spotlight_strength'].'"';

?>

<?php if ( ll_empty( $data ) ) return; ?>
<figure class="hero-banner <?php echo implode( " ", $args['classes'] ); ?>" <?php echo ( $args['id'] ? 'id="'.$args['id'].'"' : '' ) ?> data-component="hero-banner" <?php echo $style; ?>>
  <div id="hero-spotlight">
    <svg <?php echo $spotlight;?> width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
  <?php if ( $data['loop_video'] ) : ?>
    <?php
      ll_include_component(
        'loop-video',
        array(
          'video' => $data['loop_video'],
          'fallback' => $background_image[0]
        )
      );
    ?>
  <?php endif; ?>
  <div class="container row figcaption">
    <?php if ( $data['show_icons'] ) : ?>
      <div class="col-4of12 relative center">
        <?php echo $data['icon_markup']; ?>
      </div>
    <?php endif; ?>
    <?php if ( $data['show_icons'] ) : ?>
      <div class="col-8of12 flex-end">
    <?php endif; ?>
    <?php if ( $data['main_text'] ) : ?>
      <<?php echo $main_tag; ?> class="hero"><?php echo $main_text; ?></<?php echo $main_tag; ?>>
    <?php endif; ?>

    <?php if ( $data['sub_text']) : ?>
      <<?php echo $sub_tag; ?> class="h1"><?php echo $sub_text; ?></<?php echo $sub_tag; ?>>
    <?php endif; ?>
    <?php if ( $data['show_icons'] ) : ?>
      </div>
    <?php endif; ?>
  </div>
  <?php if ( $data['call_to_action'] ) : ?>
    <a class="button" href="<?php echo $data['call_to_action']['url']; ?>" target="<?php echo $data['call_to_action']['target']; ?>"><?php echo $data['call_to_action']['title']; ?></a>
  <?php endif; ?>
  <?php if ( $data['popup_video'] ) : ?>
    <a class="play-video-button js-init-video" data-component="modal" href="<?php echo $data['popup_video']; ?>">
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