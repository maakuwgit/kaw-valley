<?php
  global $post;
  $position = get_the_terms($post->ID, 'team_position');
  if( $position ) {
    $position = '<p class="red">' . $position[0]->name . '</p>';
  }
?>
<figure class="thumbnail" data-background>
    <div class="feature">
      <?php the_post_thumbnail(); ?>
    </div>
  <figcaption>
    <h3 class="h1">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>
    <?php echo $position; ?>
    <a href="<?php the_permalink(); ?>">Read Bio</a>
  </figcaption>
</figure>