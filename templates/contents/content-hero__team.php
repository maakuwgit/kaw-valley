<?php
  $hero_banner = array(
    'main_text'        => array( 'text' => 'Our Team.' ),
    'sub_text'         => array( 'text' => '' ),
    'call_to_action'   => false,
    'spotlight_strength' => 0,
    'background_image' => array( get_template_directory_uri() . '/assets/img/background-header--home.svg'),
    'show_icons'       => true
  );

    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-team'
      )
    );
?>