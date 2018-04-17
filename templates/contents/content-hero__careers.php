<?php
  $hero_banner = array(
    'main_text'        => array( 'text' => 'Careers.' ),
    'sub_text'         => array( 'text' => '' ),
    'call_to_action'   => false,
    'background_image' => array( get_template_directory_uri() . '/assets/img/hero-careers.jpg'),
    'show_icons'       => true
  );

    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-careers'
      )
    );
?>