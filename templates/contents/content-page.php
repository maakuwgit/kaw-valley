<?php
$output = '';
if( have_rows( 'components' ) ) {
  while( have_rows( 'components' ) ) {
    the_row();
    if( get_row_layout() === 'headlines' ) {
      $headline   = get_sub_field('generic_headline_text');
      $has_bg     = get_sub_field('generic_section_bg');
      $theme      = get_sub_field('generic_headline_theme');
      $layout     = get_sub_field('generic_headline_layout');
      $direction  = get_sub_field('generic_headline_direction');
      //Dev Note: Move this to a component
      $css        = ' class="';
      if( $theme !== '' ) $css .= $theme . '-bg';
      if( $layout !== '' ) $css .= ' ' . $layout;
      $css .= '"';
      $output .= '<section' . $css . '>';
      $output .= '<div class="container row">';
      $output .= '<h3 class="hero text-med">' . $headline . '</h3>';
      $output .= '</div></section>';
    }elseif( get_row_layout() === 'bands' ) {
      $theme      = get_sub_field('band_theme');
      $has_bg     = get_sub_field('generic_section_bg');
      //Dev Note: Move this to a component
      $css      = ' class="';
      if( $theme !== '' ) $css .= $theme . '-bg';
      $css .= '"';
      $output .= '<section' . $css . '>';
      $output .= '<div class="container row">';
      while( have_rows( 'band_columns' ) ) {
        the_row();
        $num_cols   = get_sub_field('band_colspan');
        $content    = get_sub_field('band_content');
        $output .= '<div class="col-' . $num_cols . 'of12">' . $content . '</div>';
      }
      $output .= '</div></section>';
    }elseif( get_row_layout() === 'accordions' ) {
      $theme      = get_sub_field('band_theme');
      $has_bg     = get_sub_field('generic_section_bg');
      ll_include_component(
        'accordion',
        $accordion
      );
    }
  }
}
echo $output;
?>