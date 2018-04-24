<?php
  $when = get_field('project_start');
  if( get_field('project_end') ) $when .= ' to ' . get_field('project_end');
  $where = get_field('project_location');
  $type = get_field('project_type');

  $main_text = get_field('hero_banner_main_text');
  $sub_text = get_field('hero_banner_sub_text');
  $background = get_field('hero_banner_background_image');

  if (!$background) {
    $background = array( get_template_directory_uri() . '/assets/img/background-terrain.svg');
  }else{
    $background = array( wp_get_attachment_url($background));
  }
  $main_text = ( !$main_text['text'] ? 'Project Case <br>Study.' : $main_text['text'] );
  $sub_text = ( !$sub_text['text'] ? get_the_title() : $sub_text['text'] );

  $hero_banner = array(
    'main_text'        => array( 'text' => $main_text ),
    'sub_text'         => array( 'text' => $sub_text ),
    'call_to_action'   => false,
    'background_image' => $background,
    'show_icons'       => true,
    'icon_markup'      => '<svg class="block triangle_icon-big" width="36px" height="29px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <polygon points="7.99993161 12.9030516 16 0 0 0" fill="none" stroke="red"></polygon>
</svg>
<dl>
  <dt>Where:</dt>
  <dd>' . $where . '</dd>
  <dt>When:</dt>
  <dd>' . $when . '</dd>
  <dt>Project Type:</dt>
  <dd>' . $type . '</dd>
</dl>');

    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-project-' . get_the_ID()
      )
    );
?>