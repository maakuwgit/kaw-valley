<?php
  global $post;
  $position = get_the_terms($post->ID, 'team_position');
  if( $position ) {
    $position = '<p class="red">' . $position[0]->name . '</p>';
  }
?>
<figure class="thumbnail" data-mfp-src="#member-thumb-<?php the_ID(); ?>">
  <div data-background>
    <div class="feature">
      <?php the_post_thumbnail(); ?>
    </div>
  </div>
  <figcaption>
    <h3 class="h1"><?php the_title(); ?></h3>
    <?php echo $position; ?>
    <a href="#read_bio" data-mfp-src="#member-thumb-<?php the_ID(); ?>">Read Bio</a>
  </figcaption>
</figure>