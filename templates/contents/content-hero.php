<?php
  $banner_text = get_field( 'hero_banner_main_text' );
  $show_banner = $banner_text['text'] ? true : false;
  $next_post   = get_next_post( true );
  $show_icons   = get_field( 'hero_banner_show_icons' );
  $hero_banner = ll_format_post_banner();
?>
<?php if ( $show_banner ) : ?>
  <?php
    ll_include_component(
      'hero-banner',
      $hero_banner,
      array(
        'id' => 'hero-banner-1'
      )
    );
  ?>
<?php endif; ?>