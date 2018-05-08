<?php

  $cat = get_queried_object();

  $background = get_field( 'careers_hero_background_image', 'options' );
  $hero_banner = [
    'main_text' => array( 'text' => $cat->label . '.', 'tag' => 'h1' ),
    'sub_text' => false,
    'call_to_action' => null,
    'show_icons' => true,
    'icon_markup' => '<img alt="" src="' . get_template_directory_uri() . '/assets/img/icons-triangles.svg' . '">',
    'background_image'   => array(wp_get_attachment_url($background)),
    'spotlight_strength'  => get_field( 'careers_hero_spotlight_strength', 'options' )
  ];

  ll_include_component(
    'hero-banner',
    $hero_banner
  );
?>