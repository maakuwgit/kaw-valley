<footer class="footer dark" role="contentinfo">
  <div class="container row">
    <figure class="footer__social col-md-6of12 col-lg-4of12">
      <a href="<?php echo $href ?>" class="logo block">
    <?php if ( $logo ) : ?>
        <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php echo $name; ?>">
    <?php else : ?>
        <img class="logo logo--header" src="<?php echo get_template_directory_uri() . '/assets/img/logo-kaw_valley_engineering.svg'; ?>" alt="<?php bloginfo('name'); ?>">
    <?php endif; ?>
      </a>
    <?php if ( ll_has_social() ) : ?>
      <figcaption>
        <h5>Follow us.</h5>
        <?php ll_get_social_list(); ?>
      </figcaption>
    <?php endif; ?>
    </figure>
    <section class="footer__navigation col-md-6of12 col-lg-8of12 text-center">
      <div class="row text-left">
      <?php if (has_nav_menu('secondary_navigation')) : ?>
        <ul class="no-bullet footer__menu">
          <li>
            <h5>General.</h5>
            <nav>
            <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'menu no-bullet'));?>
            </nav>
          </li>
        </ul><!-- .menu -->
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
        <ul class="no-bullet footer__menu">
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
          </li>
        </ul><!-- Services -->
      <?php endif; ?>
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
        <ul class="no-bullet footer__menu">
          <li>
            <h5>Locations.</h5>
            <nav>
              <ul class="no-bullet menu">
            <?php
              while( $locations->have_posts() ) :
                $locations->the_post();

                $title = get_the_title();
                $location_cat = get_the_terms(get_the_ID(), 'state');
                if( $location_cat ) $title .= ',&nbsp;' . strtoupper($location_cat[0]->slug);
            ?>
                <li><?php echo $title; ?></li>
            <?php
              endwhile;
              wp_reset_postdata();
            ?>
              </ul>
            </nav>
          </li>
        </ul><!-- Locations -->
      <?php endif; ?>
      </div>
    </section><!-- .footer__social -->
  </div>
  <div class="footer__bottom container row small">
      <div class="footer__copyright col-md-5of12 col-lg-4of12">
        <?php bloginfo('name'); ?>. All Rights Reserved <?php echo date('Y'); ?>
      </div><!-- .footer__copyright -->

      <div class="footer__credits col-md-6of12 col-lg-4of12">
        <a href="https://liftedlogic.com/" target="_blank">Web Design in Kansas City</a> by <a href="https://liftedlogic.com/" target="_blank">Lifted Logic</a>
      </div><!-- .footer__credits -->

      <div class="footer__ll-logo col-md-1of12 col-lg-4of12">
        <a href="https://liftedlogic.com/" target="_blank"><a href="https://liftedlogic.com/" target="_blank">LL</a>
      </div><!-- .footer__ll-logo -->
    </div>
  </div>
</footer>
