<?php
  $hero_banner = array(
    'main_text'        => array( 'text' => 'Project Case Studies.' ),
    'sub_text'         => array( 'text' => '' ),
    'call_to_action'   => false,
    'background_image' => array( get_template_directory_uri() . '/assets/img/background-terrain.svg'),
    'show_icons'       => true
  );

    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-projects'
      )
    );
?>