<?php
  $color_scheme = get_field( 'triangle_color' );

  //The "order" variable is used to determine with numeral to show
  $order = $post->menu_order;
  if( $order < 9 ) $order = '0' . $order;

  $background = get_field('hero_banner_background_image');
  $hero_banner = [
    'main_text' => get_field( 'hero_banner_main_text' ),
    'sub_text' => get_field( 'hero_banner_sub_text' ),
    'call_to_action' => null,
    'show_icons' => get_field( 'hero_banner_show_icons' ),
    'icon_markup' => '<svg class="block triangle_icon" width="18px" height="14px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <polygon points="7.99993161 12.9030516 16 0 0 0" fill="none" stroke="' . $color_scheme . '"></polygon>
</svg>
<span class="hero block order">' . $order . '</span>',
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