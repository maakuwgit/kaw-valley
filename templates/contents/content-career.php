<?php
$application  = get_field('career_application');
$contract     = get_field('career_contract');
$job_link     = get_field('smart_recruiter_url');
$location     = get_field('career_location');

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
      <p class="h1"><?php echo $contract; ?> position in <?php echo $location; ?></p>
    </div>

  </div>

</figure>

<main <?php post_class('content'); ?>>

  <div class="container row boxed">

    <div class="col-12of12">
      <h3 class="post__header__title">Kaw Valley Engineering has an immediate opening for a <b><?php the_title(); ?>.</b></h2>
      <?php the_content(); ?>
    <?php if( $job_link ) : ?>
      <p><a class="button" href="<?php echo $job_link; ?>" target="_blank">Apply Now</a></p>
    <?php endif; ?>
    </h3>

  </div>

</main>