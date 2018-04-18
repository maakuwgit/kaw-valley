<?php
/* Dev Note: this logic is shotty, but on the right track.*/
  if( get_field( 'careers_hero_main_text' ) ) {
    $banner_text = get_field( 'careers_hero_main_text' );
    $show_banner = true;
    $next_post   = false;
    $show_icons   = get_field( 'careers_hero_show_icons' );
    $hero_banner = ll_format_post_banner();
  }else{
    $hero_banner = array(
      'main_text'           => array( 'text' => 'Careers.' ),
      'sub_text'            => array( 'text' => '' ),
      'call_to_action'      => false,
      'spotlight_strength'  => 1,
      'background_image'    => array( get_template_directory_uri() . '/assets/img/hero-careers.jpg'),
      'show_icons'          => true
    );
  }
    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-careers'
      )
    );
?>