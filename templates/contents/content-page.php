<?php
$output = '';
if( have_rows( 'components' ) ) {
  while( have_rows( 'components' ) ) {
    the_row();
    if( get_row_layout() === 'headlines' ) {
      $headline   = array(
        'generic_headline_text'       => get_sub_field('generic_headline_text'),
        'has_background'              => get_sub_field('has_background'),
        'section_background'          => get_sub_field('section_background'),
        'generic_headline_theme'      => get_sub_field('generic_headline_theme'),
        'generic_headline_layout'     => get_sub_field('generic_headline_layout'),
        'generic_headline_direction'  => get_sub_field('generic_headline_direction')
      );

      $output .= ll_include_component(
        'headline',
        $headline,
        array(),
        true
      );

    }elseif( get_row_layout() === 'bands' ) {
      $cols = [];

      while( have_rows( 'band_columns' ) ) {
        the_row();
        $cols[] = array(
          'band_colspan' => get_sub_field('band_colspan'),
          'band_content' => get_sub_field('band_content')
        );
      }

      $band   = array(
        'has_background' => get_sub_field('has_background'),
        'band_align'     => get_sub_field('band_align'),
        'band_bg'        => get_sub_field('section_bg'),
        'band_theme'     => get_sub_field('band_theme'),
        'band_columns'   => $cols
      );

      $output .= ll_include_component(
        'band',
        $band,
        array(),
        true
      );

    }elseif( get_row_layout() === 'accordions' ) {
      $theme       = get_sub_field('accordion_theme');
      $bg          = get_sub_field('accordion_bg');
      $accordions  = get_sub_field('accordion_wrapper');

      $output .= ll_include_component(
        'accordion',
        $accordions,
        array(
          'theme' => $theme,
          'background' => $bg
        ),
        true
      );
    }
  }
}
echo $output;
?>