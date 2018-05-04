<?php
$output = '';
if( have_rows( 'components' ) ) {
  while( have_rows( 'components' ) ) {
    the_row();
    if( get_row_layout() === 'headlines' ) {
      $headline   = array(
        'generic_headline_text'       => get_sub_field('generic_headline_text'),
        'has_background'              => get_sub_field('has_background'),
        'section_bg'                  => get_sub_field('section_bg'),
        'generic_headline_theme'      => get_sub_field('generic_headline_theme'),
        'generic_headline_layout'     => get_sub_field('generic_headline_layout'),
        'generic_headline_direction'  => get_sub_field('generic_headline_direction')
      );

      $output .= ll_include_component(
        'headline',
        $headline,
        array(
         'id' => sanitize_title(get_sub_field('target_name'))
        ),
        true
      );

    }elseif( get_row_layout() === 'bands' ) {
      $cols = [];

      while( have_rows( 'band_columns' ) ) {
        the_row();
        $cols[] = array(
          'band_colspan'  => get_sub_field('band_colspan'),
          'band_bg'       => get_sub_field('band_bg'),
          'band_align'    => get_sub_field('band_align'),
          'band_content'  => get_sub_field('band_content')
        );
      }

      $band   = array(
        'has_background' => get_sub_field('has_background'),
        'is_stretched'   => get_sub_field('is_stretched'),
        'navbar'         => get_sub_field('navbar'),
        'section_bg'     => get_sub_field('section_bg'),
        'band_theme'     => get_sub_field('band_theme'),
        'padded_top'    => get_sub_field('padded_top'),
        'padded_bottom' => get_sub_field('padded_bottom'),
        'band_columns'   => $cols
      );

      $output .= ll_include_component(
        'band',
        $band,
        array(
         'id' => sanitize_title(get_sub_field('target_name'))
        ),
        true
      );

    }elseif( get_row_layout() === 'accordions' ) {
      $accordions = array(
        'accordion_background' => get_sub_field('accordion_background'),
        'accordion_theme'      => get_sub_field('accordion_theme'),
        'accordion_wrapper'    => get_sub_field('accordion_wrapper')
      );

      $output .= ll_include_component(
        'accordion',
        $accordions,
        array(
         'id' => sanitize_title(get_sub_field('target_name'))
        ),
        true
      );
    }
  }
}
echo $output;
?>