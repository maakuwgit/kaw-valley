<?php
  $banner_text = get_field( 'hero_banner_main_text' );
  $show_banner = $banner_text['text'] ? true : false;
  $next_post   = get_next_post( true );
  $color_scheme = get_field( 'triangle_color' );

  //The "order" variable is used to determine with numeral to show
  $order = $post->menu_order;
  if( $order < 9 ) $order = '0' . $order;

  $hero_banner = ll_format_post_banner();
  $hero_banner['spotlight_strength'] = 1;
  $hero_banner['icon_markup'] = '<svg class="block triangle_icon" width="18px" height="14px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <polygon points="7.99993161 12.9030516 16 0 0 0" fill="none" stroke="' . $color_scheme . '"></polygon>
</svg>
<span class="hero block order">' . $order . '</span>';
?>
<?php if ( $show_banner ) : ?>
  <?php
    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-services'
      )
    );
  ?>
<?php endif; ?>