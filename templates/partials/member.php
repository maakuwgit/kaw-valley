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
      <?php
        if( !has_post_thumbnail() ) {
          echo '<img width="378" height="601" src="http://via.placeholder.com/1600x1280" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://via.placeholder.com/1280x1600 378w, http://via.placeholder.com/320x640 189w" sizes="(max-width: 378px) 100vw, 378px">';
        }else{
          the_post_thumbnail();
        }
      ?>
    </div>
  </div>
  <figcaption>
    <h3 class="h1"><?php the_title(); ?></h3>
    <?php echo $position; ?>
    <a href="#read_bio" data-mfp-src="#member-thumb-<?php the_ID(); ?>">Read Bio</a>
  </figcaption>
</figure>