<?php
  while (have_posts()) :
    the_post();
    $type = get_post_type();
    if($type === 'post') $type = 'single';
    get_template_part('templates/contents/content', $type); ?>
<?php endwhile; ?>
