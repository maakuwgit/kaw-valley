<?php
  $logo = get_field( 'global_logo', 'option' );
  $href = esc_url(home_url('/'));
  $name = get_bloginfo('name');
?>
<header class="navbar dark" role="banner">
  <div class="container row nowrap">
    <button type="button" class="navbar-toggle navbar-toggle--stand" data-nav="collapse" data-target="#primary-nav">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggle__box">
        <span class="navbar-toggle__inner"></span>
      </span><!-- .navbar-toggle__box -->
    </button><!-- .navbar-toggle -->
    <figure class="col-sm-10of12 col-md-6of12">
      <a href="<?php echo $href ?>" class="logo">
    <?php if ( $logo ) : ?>
        <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php echo $name; ?>">
    <?php else : ?>
        <img class="logo logo--header" src="<?php echo get_template_directory_uri() . '/assets/img/logo-kaw_valley_engineering.svg'; ?>" alt="<?php bloginfo('name'); ?>">
    <?php endif; ?>
      </a>
    </figure>
    <?php if (has_nav_menu('primary_navigation')) : ?>
    <nav class="primary-nav" id="primary-nav" role="navigation">
      <?php
      wp_nav_menu(array('theme_location'  => 'primary_navigation',
                        'menu_class'      => 'row'));
      ?>
    </nav>
    <?php endif;?>
  </div>
</header>
