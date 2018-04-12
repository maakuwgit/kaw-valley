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
                  $id       = get_the_ID();
                  $title    = get_the_title();
                  $city     = $title;
                  $state    = get_the_terms($id, 'state');
                  if( $state ) {
                    $title .= ',&nbsp;' . strtoupper( $state[0]->slug );
                  }
                  $street   = get_field('location_street');
                  $zip      = get_field('location_zip');
                  $country  = get_field('location_country');
                  $phone    = get_field('location_phone');
                  $email    = get_field('location_email');

                  $address  = $street . '<br>' . $title . '&nbsp;' . $zip;
                  if( $phone ) {
                    $p_href = 'tel:+1' . substr($phone, 0, 3) . substr($phone, 4, 3) . substr($phone, 6);
                    $phone  = '+' . substr($phone, 0, 3) . '.' . substr($phone, 4, 3) . '.' . substr($phone, 6);
                  }
                  if( $email ) {
                    $e_href = 'mailto:' . $email;
                  }
              ?>
                <div class="col-6of12">
                  <dt class="h5"><?php echo $title; ?></dt>
                  <dd>
                    <address><?php echo $address; ?></address>
                  <?php if( $phone ) : ?>
                    <a class="block" href="<?php echo $p_href; ?>"><?php echo $phone; ?></a>
                  <?php endif; ?>
                  <?php if( $email ) : ?>
                    <a class="block" href="<?php echo $e_href; ?>"><?php echo $email; ?></a>
                  <?php endif;?>
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
