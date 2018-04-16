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
  'background_image'   => null,
  'loop_video'    => null,
  'popup_video'   => null
];

$component_data = ll_parse_args( $component_data, $defaults );

$main_text        = $component_data['main_text'];
$sub_text         = $component_data['sub_text'];
$call_to_action   = $component_data['call_to_action'];
$show_icons       = ( $component_data['show_icons'] === null ? true : $component_data['show_icons'] );
$background_image = $component_data['background_image'];
$loop_video       = $component_data['loop_video'];
$popup_video      = $component_data['popup_video'];
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
      <div class="col-6of12">
        <img alt="" src="<?php echo get_template_directory_uri() . '/assets/img/icons-triangles.svg';?>">
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
    <?php if ( $call_to_action ) : ?>
      <a class="button" href="<?php echo $call_to_action['url']; ?>" target="<?php echo $call_to_action['target']; ?>"><?php echo $call_to_action['title']; ?></a>
    <?php endif; ?>

    <?php if ( $popup_video ) : ?>
      <a class="play-video-button js-init-video" href="<?php echo $popup_video; ?>">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
          <path class="play-video-button__circle" d="M32 16c0 8.837-7.163 16-16 16s-16-7.163-16-16c0-8.837 7.163-16 16-16s16 7.163 16 16z"></path>
          <path class="play-video-button__icon" d="M20.571 16l-6.857 5.714v-11.429z"></path>
        </svg>
        Watch Video
      </a>
    <?php endif; ?>
  </figcaption>
</figure>