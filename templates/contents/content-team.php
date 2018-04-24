<?php
  $default = 'No content for this yet!';
  $hobbies = ( get_field('member_hobbies') !== '' ? get_field('member_hobbies') : $default );
  $project = ( get_field('member_favorite_project') !== '' ? get_field('member_favorite_project') : $default );
  $motto = ( get_field('member_motto') !== '' ? get_field('member_motto') : $default );;
  $album = ( get_field('member_album') !== '' ? get_field('member_album') : $default );

  $position = get_the_terms(get_the_ID(), 'team_position');
  if( $position ) {
    $pdescription = $position[0]->description;
    $position = $position[0]->name;
  }
?>
<main <?php post_class('content light-bg'); ?>>
  <div class="container row">
    <?php include(  locate_template('templates/partials/member-details.php') ); ?>
  </div>
</main>