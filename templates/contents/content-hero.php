<?php
  $background = get_field('hero_banner_background_image');
  $hero_banner = [
    'main_text' => get_field( 'hero_banner_main_text' ),
    'sub_text' => get_field( 'hero_banner_sub_text' ),
    'call_to_action' => null,
    'show_icons' => get_field( 'hero_banner_show_icons' ),
    'icon_markup' => '<img alt="" src="' . get_template_directory_uri() . '/assets/img/icons-triangles.svg' . '">',
    'background_image'   => array(wp_get_attachment_url($background)),
    'spotlight_strength'  => get_field( 'hero_banner_spotlight_strength' ),
    'loop_video'    => get_field( 'hero_banner_loop_video' ),
    'popup_video'   => get_field( 'hero_banner_popup_video' )
  ];

  ll_include_component(
    'hero-banner',
    $hero_banner
  );
?>