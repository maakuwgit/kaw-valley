<?php
/*
Template Name: Form
*/
$show_prefooter = get_field('has_prefooter');
$show_locations = get_field('form_show_locations');
$show_description = get_field('form_show_description');
$use_form = get_field('form_use');
$css = ' ';
if( $show_locations ) {
  $css .= 'has_locations';
}else{
  $css .= 'fullwidth';
}
?>
<main class="main content dark<?php echo $css; ?>" role="main">
  <div class="container row">
    <?php if( $show_locations ) : ?>
    <aside class="col-12of12 col-lg-6of12 col-xl-6of12">
      <?php ll_get_locations(false);?>
    </aside>
    <?php endif; ?>
    <?php gravity_form( $use_form, true, $show_description ); ?>
  </div>
</main><!--.main-->
<?php while (have_posts()) : the_post(); ?>
<?php if( $show_locations ) : ?>
  <?php get_template_part('templates/contents/content', 'map'); ?>
<?php endif; ?>
<?php endwhile; ?>
<?php if( $show_prefooter ) : ?>
<?php get_template_part('templates/contents/content', 'callout'); ?>
<?php endif; ?>