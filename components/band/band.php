<?php
/**
* Band
* -----------------------------------------------------------------------------
*
* Band component
* @since 1.3.1
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
  'has_background' => false,
  'section_bg'     => array(),
  'band_theme'     => 'dark',
  'is_stretched'   => false,
  'navbar'         => array(),
  'band_columns'   => array(
    array(
      'band_colspan'  => '3',
      'padded_top'    => false,
      'padded_bottom' => false,
      'band_bg'       => array(),
      'band_align'    => 'flex-start',
      'band_content'  => '<h5>Lorem ipsum</h5><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
    )
  )
];

$default_args = [
  'classes' => array(),
  'id'      => uniqid('band-')
];

$data = ll_parse_args( $component_data, $default_data );
$args = ll_parse_args( $component_args, $default_args );

/**
 * component_name_before_display hook
 * Type: Action
 */
do_action( "component_name_before_display", $component_data, $component_args );

if ( ll_empty( $data ) ) return;

$theme          = $data['band_theme'];
$has_background = $data['has_background'];
$section_bg     = $data['section_bg'];
$stretch        = $data['is_stretched'];
$padded_top     = $data['padded_top'];
$padded_bottom  = $data['padded_bottom'];
$navbar         = $data['navbar'];

$css = ' class="band';
if( $args['classes'] || $data['band_theme'] ) {
  $css .= ' ';
  if ( $section_bg ) $css .= 'has-image ';
  if( $args['classes'] ) $css .= implode( " ", $args['classes'] );
  if( $theme && $args['classes'] ) $css .= ' ';
  if( $theme ) $css .= $theme . '-bg';
  if( $has_background ) {
    $css .=  ' '. $theme;
  }
  if( $stretch ) {
    $css .= ' stretch';
  }
  if( $padded_top === true ) {
    $css .= ' padded-top';
  }
  if( $padded_bottom === true ) {
    $css .= ' padded-bottom';
  }

  if( $has_background === false ) {
    $css .= ' no_bg';
  }
}

$css .= '"';

$id = ($args['id'] ? ' id="' . $args['id'] . '"' : '');

//Background for the section element
if ( $section_bg ) {
 $style = ' style="background-image: url( '. $section_bg['url'] .' );"';
} else {
 $style = '';
}
?>
<section<?php echo $id . $css . $style; ?>>
  <div class="container row">
<?php if( $data['band_columns'] ) : ?>
<?php
  foreach( $data['band_columns'] as $band ) :
    //Column Alignment
    $align = ( $band['band_align'] === null ? '' : ' ' . $band['band_align'] );

    //Background for a column
    $band_bg = $band['band_bg'];
    if ( $band_bg ) {
     $col_style = ' style="background-image: url( '. $band_bg['url'] .' );"';
    } else {
     $col_style = '';
    }
    $col_span = $band['band_colspan'];
    $col_suff = 'of12';
    /*Dev Note: this logic is still very... loose*/
    $col_sm = 'col-sm-' . ( $col_span < 6 ? 6 : floor( $col_span / 2 ) ) . $col_suff;
    $col_md = 'col-md-';
    if( $col_span < 3 || $col_span === 5 ){
      $col_md .= 3;
    }else{
      $col_md .= $col_span;
    }
    $col_md .= $col_suff;
    $col_lg = 'col-lg-' . $col_span . $col_suff;
    $col_xl = 'col-xl-' . $col_span . $col_suff;
    $col_class = ' class="' . $col_sm . ' ' . $col_md . ' ' . $col_lg . ' ' . $col_xl . $align . '"';
?>
    <div<?php echo $col_class . $col_style; ?>><?php echo $band['band_content']; ?></div>
<?php
  endforeach;
?>
  <?php if( $navbar ) : ?>
    <nav class="col-12of12">
    <?php foreach( $navbar as $button ) : ?>
      <!--- Dev Note: return here to make this a component call instead -->
      <a href="<?php echo $button['btn']['url']; ?>" class="button hollow"><?php echo $button['btn']['title']; ?></a>
    <?php endforeach; ?>
    </nav>
  <?php endif; ?>
  </div>
<?php endif; ?>
</section>

<?php
/**
 * component_name_after_display hook
 * Type: Action
 */
do_action( "component_name_after_display", $component_data, $component_args ); ?>
