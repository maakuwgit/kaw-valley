<?php
$application = get_field('career_application');
$contract = get_field('career_contract');
if( $contract ) $contract = $application['url'];
$location = get_field('career_location');
if( $location ) {
  $state = get_the_terms($location->ID, 'state');
  $location = $location->post_title;
  if( $state ) $location .= ' ' . ucwords($state[0]->name);
}
?>
<figure class="content" id="hero-career" data-component="hero-banner">
  <div class="container row boxed">
    <nav class="breadcrumb"><a href="../">&lsaquo;&nbsp;Back to all job listings</a></nav>
    <div class="col-12of12">
      <h2 class="hero">We're Hiring.</h2>
      <p class="h1">Full time, salaried position in <?php echo $location; ?></p>
    </div>
  </div>
</figure>
<main <?php post_class('content'); ?>>
  <div class="container row boxed">
    <div class="col-12of12">
      <h3 class="post__header__title">Kaw Valley Engineering has an immediate opening for a <b><?php the_title(); ?>.</b></h2>
      <?php the_content(); ?>
      <p class="text-med">To apply, please complete the application download.</p>
      <h4><a href="<?php echo $application['url']; ?>" target="_blank">Download Application</a></h4>
      <p class="text-bold">OR</p>
      <p class="text-med">Complete the form and upload a resume or cover letter</p>
    </h3>
  </div>
</main>
<section class="content">
  <?php gravity_form(1, false, false); ?>
</section>