<?php
  $email    = get_field('member_email', get_the_ID());
  $linkedin = get_field('member_linkedin', get_the_ID());
?>
<figure class="col col-lg-6of12 col-xl-6of12 relative" data-background>
  <div class="feature">
<?php if( !has_post_thumbnail() ) : ?>

    <img class="member-thumbnail__feature__img" width="378" height="601" src="http://via.placeholder.com/1600x1280" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://via.placeholder.com/1280x1600 378w, http://via.placeholder.com/320x640 189w" sizes="(max-width: 378px) 100vw, 378px"><!-- .member-thumbnail__feature__img -->

  <?php  else : ?>

    <?php the_post_thumbnail(); ?>

  <?php endif; ?>
  </div>

  <?php if( $email || $linkedin ) : ?>

    <ul class="member-thumbnail__social social-list">

    <?php if ($email) : ?>
      <li class="social-list__item">

        <a class="social-list__link email white" href="mailto:<?php echo $email; ?>" target="_blank">

          <svg class="icon icon-email">
            <use xlink:href="#icon-email"></use>
          </svg>

        </a>

      </li>
    <?php endif; ?>

    <?php if ($linkedin) : ?>
      <li class="social-list__item">

        <a class="social-list__link linkedin white" href="<?php echo $linkedin; ?>" target="_blank">

          <svg class="icon icon-linkedin">
            <use xlink:href="#icon-linkedin"></use>
          </svg>

        </a>

      </li>
    <?php endif; ?>

    </ul><!-- .member-thumbnail__social -->

  <?php endif; ?>
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