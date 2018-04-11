<footer class="footer dark" role="contentinfo">
  <div class="container row">
    <div class="footer__social col-lg-4of12">
      <?php ll_get_social_list(); ?>
    </div><!-- .footer__social -->
    <nav class="footer__social col-lg-4of12">
      <?php
      if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar-nav'));
      endif;
      ?>
    </nav><!-- .footer__nav -->
  </div>
  <div class="container row small">
      <div class="footer__copyright col-lg-4of12">
        <?php bloginfo('name'); ?>. All Rights Reserved <?php echo date('Y'); ?>
      </div><!-- .footer__copyright -->

      <div class="footer__credits col-lg-4of12 text-center">
        <a href="https://liftedlogic.com/" target="_blank">Web Design in Kansas City</a> by <a href="https://liftedlogic.com/" target="_blank">Lifted Logic</a>
      </div><!-- .footer__credits -->

      <div class="footer__ll-logo col-lg-4of12 text-right">
        <a href="https://liftedlogic.com/" target="_blank"><a href="https://liftedlogic.com/" target="_blank">LL</a>
      </div><!-- .footer__ll-logo -->
    </div>
  </div>
</footer>
