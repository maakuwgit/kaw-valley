<?php
  global $post;

  $position = get_the_terms($post->ID, 'team_position');
  $email    = get_field('member_email', $post->ID);
  $linkedin = get_field('member_linkedin', $post->ID);

?>
<figure class="member-thumbnail thumbnail">

  <div class="member-thumbnail__inner_wrap relative" data-background>

    <div class="member-thumbnail__feature feature">
      <?php if( !has_post_thumbnail() ) : ?>

        <img class="member-thumbnail__feature__img" width="378" height="601" src="http://via.placeholder.com/1600x1280" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://via.placeholder.com/1280x1600 378w, http://via.placeholder.com/320x640 189w" sizes="(max-width: 378px) 100vw, 378px"><!-- .member-thumbnail__feature__img -->

      <?php  else : ?>

        <?php the_post_thumbnail(); ?>

      <?php endif; ?>
    </div><!-- .feature.member-thumbnail__feature -->

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

  </div><!-- .member-thumbnail__inner_wrap -->

  <figcaption class="member-thumbnail__figcaption" data-modal="#member-thumb-<?php the_ID(); ?>" data-component="modal">

    <h3 class="h1 js-init-popup" data-modal="#member-thumb-<?php the_ID(); ?>" data-component="modal"><?php the_title(); ?></h3>

    <?php if( $position ) : ?>
    <p class="member-thumbnail__position red js-init-popup" data-modal="#member-thumb-<?php the_ID(); ?>" data-component="modal"><?php echo $position[0]->name; ?></p>
    <!-- .member-thumbnail__position -->
    <?php endif; ?>

    <a href="#read_bio" class="member-thumbnail__modal_trigger js-init-popup" data-modal="#member-thumb-<?php the_ID(); ?>" data-component="modal">Read Bio</a>
    <!-- .member-thumbnail__modal_trigger -->

  </figcaption><!-- .member-thumbnail__figcaption -->

</figure><!-- .member-thumbnail -->