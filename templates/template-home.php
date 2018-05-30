<?php
/*
Template Name: Landing Page
*/
?>
<?php get_template_part('templates/contents/content', 'hero'); ?>
<main class="main content dark" role="main">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/partials/article', 'page'); ?>
    <?php get_template_part('templates/contents/content', 'page'); ?>
  <?php endwhile; ?>
</main><!--.main-->
<?php get_template_part('templates/contents/content', 'callout'); ?>