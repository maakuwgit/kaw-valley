<figure class="col col-lg-6of12 col-xl-6of12" data-background>
  <div class="feature">
    <?php
    if( !has_post_thumbnail() ) {
      echo '<img width="378" height="601" src="http://via.placeholder.com/1600x1280" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://via.placeholder.com/1280x1600 378w, http://via.placeholder.com/320x640 189w" sizes="(max-width: 378px) 100vw, 378px">';
    }else{
      the_post_thumbnail();
    }
    ?>
  </div>
</figure>
<div class="col-lg-6of12 col-xl-6of12">
  <?php if( is_single() ) : ?>
  <h1 class="h3 post__header__title"><?php the_title(); ?></h1>
<?php else: ?>
  <h3 class="post__header__title"><?php the_title(); ?></h3>
<?php endif; ?>
  <dl>
    <dt class="h5"><?php echo $position; ?></dt>
    <dd><?php echo $pdescription; ?></dd>
    <dt class="h5">Hobbies and Interests</dt>
    <dd><?php echo $hobbies; ?></dd>
    <dt class="h5">Favorite Project</dt>
    <dd><?php echo $project; ?></dd>
    <dt class="h5">Motto</dt>
    <dd><?php echo $motto; ?></dd>
    <dt class="h5">Album</dt>
    <dd><?php echo $album; ?></dd>
  </dl>
</div>