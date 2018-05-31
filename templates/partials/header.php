<?php
  $logo = get_field( 'global_logo', 'option' );
  $href = esc_url(home_url('/'));
  $name = get_bloginfo('name');

  $img_path = get_template_directory_uri() . '/assets/img/';
?>
<header class="navbar" role="banner">
  <div class="container row nowrap">
    <figure>
      <a href="<?php echo $href ?>" class="logo block">
    <?php if ( $logo ) : ?>
        <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php echo $name; ?>">
    <?php else : ?>
      <?php echo ll_get_logo([255,79]); ?>
    <?php endif; ?>
      </a>
    </figure>
    <nav class="secondary-nav" id="secondary-nav" role="navigation">
      <div class="container row text-left">
        <div class="no-bullet col-lg-1of12 col-xl-1of12 hide-for-md-down"></div>
        <ul class="no-bullet header__menu col-sm-4of12 col-md-4of12 col-lg-5of12 col-xl-5of12">
        <?php if (has_nav_menu('secondary_navigation')) : ?>
            <li>
              <h5>General.</h5>
              <nav>
              <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'menu no-bullet'));?>
              </nav>
            </li><!-- .menu -->
        <?php endif;?>
        <?php
            $args = array(
                'post_type'     => 'service',
                'post_status'   => 'publish',
                'order'         => 'ASC',
                'showposts'     => 6
            );

            $services = new WP_Query( $args );

            if ( $services->have_posts() ) :
        ?>
            <li>
              <h5>Services.</h5>
              <nav>
                <ul class="no-bullet menu">
              <?php
                while( $services->have_posts() ) :
                  $services->the_post();
                  $triangle = get_field('triangle_color', get_the_ID());
                  if( !$triangle ) $triangle = 'orange';
              ?>
                  <li>
                    <img alt="" class="iblock" src="<?php echo $img_path . 'graphic-triangle--' . $triangle . '.svg'; ?>"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
              <?php
                endwhile;
                wp_reset_postdata();
              ?>
                </ul>
              </nav>
            </li><!-- Services -->
        <?php endif; ?>
        </ul>
        <?php ll_get_locations();?>
        </div>
      </nav>
    <?php if (has_nav_menu('primary_navigation')) : ?>
    <nav class="primary-nav" id="primary-nav" role="navigation">
      <?php
      wp_nav_menu(array('theme_location'  => 'primary_navigation',
                        'menu_class'      => 'row'));
      ?>
    </nav>
    <?php endif;?>
    <button type="button" class="navbar-toggle navbar-toggle--stand" data-nav="collapse" data-target="#secondary-nav">
      <span class="navbar-toggle__box">
        <span class="navbar-toggle__inner"></span>
      </span><!-- .navbar-toggle__box -->
      <span class="block menu-txt">Menu</span>
      <span class="block close-txt">Close</span>
    </button><!-- .navbar-toggle -->
  </div>
</header>
