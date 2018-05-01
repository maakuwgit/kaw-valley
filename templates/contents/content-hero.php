<?php
  if( !$spotlight_strength ) {
    $spotlight_strength = get_field( 'hero_banner_spotlight_strength' );
  }
  if( !$banner_text ) $banner_text = get_field( 'hero_banner_main_text' );
  $next_post   = get_next_post( true );
  if( !$show_icons ) $show_icons  = get_field( 'hero_banner_show_icons' );
  $hero_banner = ll_format_post_banner();

  if( $spotlight_strength ) {
    $hero_banner['spotlight_strength'] = $spotlight_strength;
  }
  if( $banner_text ) {
    $hero_banner['main_text']['text'] = $banner_text['text'];
  }
  if( $banner_sub_text ) {
    $hero_banner['sub_text']['text'] = false;
  }
  if( $background_image ) {
    $hero_banner['background_image'] = wp_get_attachment_image_src($background_image, 'large');
  }

  ll_include_component(
    'hero-banner',
    $hero_banner
  );
?>