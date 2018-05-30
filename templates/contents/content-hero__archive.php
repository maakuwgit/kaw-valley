<?php
  $cat = get_queried_object();

  $hero_banner = array(
    'main_text'        => array(
      'text' => $cat->name,
      'tag' => 'h1'
    ),
    'sub_text'            => false,
    'call_to_action'      => false,
    'spotlight_strength'  => get_field('news_hero_spotlight_strength', $cat),
    'background_image'    => array(
      get_field('news_hero_background_image', $cat)
    ),
    'loop_video'          => get_field('news_hero_loop_video', $cat),
    'popup_video'         => get_field('news_hero_popup_video', $cat),
    'show_icons'          => true
  );

    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-archive'
      )
    );
?>