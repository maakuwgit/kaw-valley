<?php
  $logo = get_field( 'global_logo', 'option' );
  $href = esc_url(home_url('/'));
  $name = get_bloginfo('name');
?>
<header class="navbar dark" role="banner">
  <div class="container row nowrap">
    <figure>
      <a href="<?php echo $href ?>" class="logo block">
    <?php if ( $logo ) : ?>
        <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php echo $name; ?>">
    <?php else : ?>
        <img class="logo logo--header" src="<?php echo get_template_directory_uri() . '/assets/img/logo-kaw_valley_engineering.svg'; ?>" alt="<?php echo $name; ?>">
    <?php endif; ?>
      </a>
    </figure>
    <nav class="secondary-nav" id="secondary-nav" role="navigation">
      <div class="container row text-left">
        <ul class="no-bullet header__menu col-sm-4of12 col-md-4of12 col-lg-6of12">
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
              ?>
                  <li>
                    <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
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
        <?php
            $args = array(
                'post_type'     => 'location',
                'post_status'   => 'publish',
                'order'         => 'ASC',
                'showposts'     => 6
            );

            $locations = new WP_Query( $args );

            if ( $locations->have_posts() ) :
        ?>
          <ul class="no-bullet header__menu col-sm-8of12 col-md-8of12 col-lg-6of12">
            <li>
            <dl class="menu row">
              <?php
                while( $locations->have_posts() ) :
                  $locations->the_post();
                  $title = get_the_title();
                  $location_cat = get_the_terms(get_the_ID(), 'state');
                  if( $location_cat ) $title .= ',&nbsp;' . strtoupper($location_cat[0]->slug);
              ?>
                <div class="col-6of12">
                  <dt class="h5"><?php echo $title; ?></dt>
                  <dd>
                    <address>2319 North Jackson<br>Junction City, KS 66441</address>
                    <a class="block" href="tel:+17857625040">+ 785.762.5040</a>
                    <a class="block" href="mailto:jc@kveng.com">jc@kveng.com</a>
                  </dd>
                </div>
              <?php
                endwhile;
                wp_reset_postdata();
              ?>
             </dl>
            </li>
          </ul><!-- Locations -->
        </div>
        <?php endif; ?>
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
