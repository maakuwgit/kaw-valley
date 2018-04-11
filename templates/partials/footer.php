<footer class="footer dark" role="contentinfo">
  <div class="container row">
    <figure class="footer__social col-lg-4of12">
      <a href="<?php echo $href ?>" class="logo">
    <?php if ( $logo ) : ?>
        <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php echo $name; ?>">
    <?php else : ?>
        <img class="logo logo--header" src="<?php echo get_template_directory_uri() . '/assets/img/logo-kaw_valley_engineering.svg'; ?>" alt="<?php bloginfo('name'); ?>">
    <?php endif; ?>
      </a>
      <figcaption>
        <?php ll_get_social_list(); ?>
      </figcaption>
    </figure>
    <nav class="footer__social col-lg-8of12">
      <?php
      if (has_nav_menu('secondary_navigation')) :
        wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav navbar-nav'));
      endif;
      ?>
    </nav><!-- .footer__social -->
  </div>
  <div class="footer__bottom container row small">
      <div class="footer__copyright col-lg-4of12">
        <?php bloginfo('name'); ?>. All Rights Reserved <?php echo date('Y'); ?>
      </div><!-- .footer__copyright -->

      <div class="footer__credits col-lg-4of12">
        <a href="https://liftedlogic.com/" target="_blank">Web Design in Kansas City</a> by <a href="https://liftedlogic.com/" target="_blank">Lifted Logic</a>
      </div><!-- .footer__credits -->

      <div class="footer__ll-logo col-lg-4of12">
        <a href="https://liftedlogic.com/" target="_blank"><a href="https://liftedlogic.com/" target="_blank">LL</a>
      </div><!-- .footer__ll-logo -->
    </div>
  </div>
</footer>
