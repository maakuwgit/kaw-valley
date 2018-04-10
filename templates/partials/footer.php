<footer class="footer" role="contentinfo">
  <div class="container row">
    <div class="footer__social col-lg-4of12">
      <?php ll_get_social_list(); ?>
    </div><!-- .footer__social -->
    <nav class="footer__social col-lg-4of12">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
      endif;
      ?>
    </nav><!-- .footer__nav -->
  </div>
  <div class="container row">
      <div class="footer__copyright col-lg-4of12">
        <?php bloginfo('name'); ?>. All Rights Reserved <?php echo date('Y'); ?>
      </div><!-- .footer__copyright -->

      <div class="footer__credits col-lg-4of12">
        <a href="https://liftedlogic.com/" target="_blank">Web Design in Kansas City</a> by <a href="https://liftedlogic.com/" target="_blank">Lifted Logic</a>
      </div><!-- .footer__credits -->
    </div>
  </div>
</footer>
