<?php get_template_part('templates/contents/content', 'hero'); ?>
<article <?php post_class('content light-bg'); ?>>
  <div class="container row boxed">
    <?php get_template_part('templates/partials/post-meta'); ?>
    <h3 class="post__header__title"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </div><!-- /.post -->
</article>