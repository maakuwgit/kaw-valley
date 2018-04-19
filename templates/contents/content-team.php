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
    <figure class="col-lg-6of12 col-xl-6of12" data-background>
      <div class="feature">
        <?php the_post_thumbnail(); ?>
      </div>
    </figure>
    <div class="col-lg-6of12 col-xl-6of12">
      <h1 class="h3 post__header__title"><?php the_title(); ?></h1>
      <dl>
        <dt><?php echo $position; ?></dt>
        <dd><?php echo $pdescription; ?></dd>
        <dt>Hobbies and Interests</dt>
        <dd><?php echo $hobbies; ?></dd>
        <dt>Favorite Marketing Project</dt>
        <dd><?php echo $project; ?></dd>
        <dt>Motto</dt>
        <dd><?php echo $motto; ?></dd>
        <dt>Album</dt>
        <dd><?php echo $album; ?></dd>
      </dl>
    </div>
  </div>
</main>